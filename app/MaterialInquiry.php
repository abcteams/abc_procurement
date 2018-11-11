<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Notifications\GetNotification;

class MaterialInquiry extends Model
{
    public function addRecord($data){
        $mtinq_id   =   DB::table('material_inquiry')->insertGetId(
            [
                'work_zone_id'  =>  $data['work_zone_id'],
                'sub_gml_id'    =>  $data['sub_gml_id'],
                'date'          =>  $data['date'],
                'close_date'    =>  $data['close_date'],
                'description'   =>  $data['description'],
                'is_approved'   =>  '0'
            ]
        );
        DB::table('material_inquiry_suppliers')->insert(
            [
                'material_inquiry_id'        =>  $mtinq_id,
                'suppliers_list'          =>  json_encode($data['supplier_list'])
            ]
        );

        DB::table('boq')
            ->where('work_zone_id', $data['work_zone_id'])
            ->where('sub_gml_id', $data['sub_gml_id'])
            ->update(['status' => '3' , 'inquiry_is_created'=>'1']);

        DB::table('material_inquiry_materials')
            ->where('work_zone_id', $data['work_zone_id'])
            ->where('sub_gml_id', $data['sub_gml_id'])
            ->update(['status' => '3' ]);


        return;



    }
    public function addCloseInquiry($data){
            $id =   DB::table('material_inquiry')->insertGetId(
                [
                    'boq_id'        =>  $data['boq'],
                    'date'          =>  $data['date'],
                    'close_date'    =>  $data['close_date'],
                    'description'   =>  '',
                    'is_approved'   =>  '1',
                    'is_closed'     =>  '1'
                ]
            );

            DB::table('boq')
                ->where('id', $data['boq'])
                ->update(['status' => '3' , 'inquiry_is_created'=>'1']);

            return $id;

    }


    public function changeInqStatus($work_zone_id,$sub_gml_id,$status_number = 3,$mtInqiry_id = 0){
        DB::table('boq')
            ->where('work_zone_id', $work_zone_id)
            ->where('sub_gml_id', $sub_gml_id)
            ->where('status', 3)
            ->update([
                'status' => $status_number,
                'mterial_inquiry_id' =>$mtInqiry_id
            ]);

        DB::table('material_inquiry_materials')
            ->where('work_zone_id', $work_zone_id)
            ->where('sub_gml_id', $sub_gml_id)
            ->where('status', 3)
            ->update(['status' => $status_number ]);
        return;
    }


    public function getRecords(){
        $data = DB::table('material_inquiry')
            ->join('work_zone', 'material_inquiry.work_zone_id', '=', 'work_zone.id')
            ->join('sub_gml', 'material_inquiry.sub_gml_id', '=', 'sub_gml.id')
            ->join('gml', 'sub_gml.gml_id', '=', 'gml.id')
            ->select('material_inquiry.*','work_zone.title as wztitle', 'sub_gml.title as sub_gml_title', 'gml.title as gml_title')
            ->where('material_inquiry.is_approved', '=', '1')
            ->where('material_inquiry.is_closed', '=', '0')
            ->orderBy('material_inquiry.id', 'desc')->get();
        return $data;
    }

    public function getClosedInquiry($search    =   array()){

        $q  = DB::table('material_inquiry');
        $q->join('work_zone', 'material_inquiry.work_zone_id', '=', 'work_zone.id');
        $q->join('sub_gml', 'material_inquiry.sub_gml_id', '=', 'sub_gml.id');
        $q->join('gml', 'sub_gml.gml_id', '=', 'gml.id');
        $q->select('material_inquiry.*','work_zone.title as wztitle', 'sub_gml.title as sub_gml_title', 'gml.title as gml_title');
        $q->where('material_inquiry.is_approved', '=', '1');
        $q->where('material_inquiry.is_closed', '=', '1');

        if(count($search) > 0){
            if(isset($search['workzone']) && $search['workzone'] > 0){
                $q->where('work_zone.id', '=', $search['workzone']);
            }
            if(isset($search['from_date']) && $search['from_date'] != ''){
                $q->where('material_inquiry.date', '>=', $search['from_date']);
            }
            if(isset($search['to_date']) && $search['to_date'] != ''){
                $q->where('material_inquiry.date', '<=', $search['to_date']);
            }
            if(isset($search['search']) && $search['search'] != ' '){
                $q->where('work_zone.title','like','%'.$search['search'].'%');
            }

        }
        $data   =   $q->orderBy('material_inquiry.id', 'desc')->paginate(10);
        return $data;
    }

    public function getPendingInquiry(){
        $data = DB::table('material_inquiry')
            ->join('work_zone', 'material_inquiry.work_zone_id', '=', 'work_zone.id')
            ->join('sub_gml', 'material_inquiry.sub_gml_id', '=', 'sub_gml.id')
            ->join('gml', 'sub_gml.gml_id', '=', 'gml.id')
            ->select('material_inquiry.*','work_zone.title as wztitle', 'sub_gml.title as sub_gml_title', 'gml.title as gml_title')
            ->where('material_inquiry.is_approved', '=', '0')
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getPendingClose(){
        $q = DB::table('supplier_proposal');
            $q->join('users', 'supplier_proposal.supplier_id', '=', 'users.id');
            $q->select('supplier_proposal.*','users.name as name');
            $q->where('supplier_proposal.consider', '=', 1);
            $q->where('supplier_proposal.is_accepted', '=', 1);

            $q->where(function($query )
            {
                $query->where('supplier_proposal.is_approved', '=', 0)
                    ->orWhere('supplier_proposal.is_approved2', '=', 0);
            });


            $data   =   $q->orderBy('id', 'desc')->get();

        $result = array();
        if(count($data) > 0)
        {

            foreach ($data as $k => $val)
            {
                $query2      =   DB::table('boq_sub_materials');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('boq_sub_materials.boq_id', '=', $val->boq_id);
                $ourprice      =   $query2->get();

                $data[$k]->ourPrice=$ourprice[0]->Total;
            }
        }

        return $data;
    }


    public function approveInquiry($id){
        DB::table('material_inquiry')->where('id', $id)->update(['is_approved' => '1']);
    }

    public function getSupplierProposals($id)
    {
        $data = DB::table('supplier_proposal')
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->select('supplier_proposal.*','users.name as name')
            ->where('supplier_proposal.material_inquiry_id', '=', $id)
            ->orderBy('id', 'desc')->get();

        $result = array();
        if(count($data) > 0)
        {

            foreach ($data as $k => $val)
            {
                $query2      =   DB::table('boq_sub_materials');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('boq_sub_materials.boq_id', '=', $val->boq_id);
                $ourprice      =   $query2->get();

                $data[$k]->ourPrice=$ourprice[0]->Total;
            }
        }
        //echo '<pre>';
        //print_r($data);die();

        return $data;
    }

    public function getConsideredItems($id)
    {
        $data = DB::table('supplier_proposal')
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->select('supplier_proposal.*','users.name as name')
            ->where('supplier_proposal.material_inquiry_id', '=', $id)
            ->where('supplier_proposal.consider', '=', 1)
            ->where('supplier_proposal.is_accepted', '=', 0)
            ->orderBy('id', 'desc')->get();

        $result = array();
        if(count($data) > 0)
        {

            foreach ($data as $k => $val)
            {
                $query2      =   DB::table('boq_sub_materials');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('boq_sub_materials.boq_id', '=', $val->boq_id);
                $ourprice      =   $query2->get();

                $data[$k]->ourPrice=$ourprice[0]->Total;
            }
        }

        return $data;
    }



    public function considerItem($id){
        DB::table('supplier_proposal')
            ->where('id', $id)
            ->update(['consider' => 1]);
    }

    public function proposalDetails($id){
        $data = DB::table('supplier_proposal_details')
            ->join('boq_sub_materials', 'supplier_proposal_details.sub_materials_id', '=', 'boq_sub_materials.id')
            ->where('supplier_proposal_details.propsal_id', '=', $id)
            ->get();
        return $data;
    }
    public function approveProposal($id){
        /*
        DB::table('supplier_proposal')
            ->join('material_inquiry', 'supplier_proposal.material_inquiry_id', '=', 'material_inquiry.id')
            ->where('supplier_proposal.id','=', $id)
            ->update(['supplier_proposal.is_accepted' => 1,'material_inquiry.is_closed' => 1]);
        return;
        */
        DB::table('supplier_proposal')
            ->join('material_inquiry', 'supplier_proposal.material_inquiry_id', '=', 'material_inquiry.id')
            ->where('supplier_proposal.id','=', $id)
            ->update(['supplier_proposal.is_accepted' => 1]);

        return;
    }

    public function approveProposal2($id){

        DB::table('supplier_proposal')
            ->join('material_inquiry', 'supplier_proposal.material_inquiry_id', '=', 'material_inquiry.id')
            ->where('supplier_proposal.id','=', $id)
            ->update(['supplier_proposal.is_approved' => 1]);

        return;
    }

    public function approveProposal3($id){

        DB::table('supplier_proposal')
            ->join('material_inquiry', 'supplier_proposal.material_inquiry_id', '=', 'material_inquiry.id')
            ->where('supplier_proposal.id','=', $id)
            ->update(['supplier_proposal.is_approved2' => 1]);

        DB::table('material_inquiry')
            ->select('material_inquiry.id','=',$id)
            ->update(['material_inquiry.is_closed' => 1]);

        return;
    }

    public function getAcceptedProposal($id){
        $data = DB::table('supplier_proposal')
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->select('supplier_proposal.*','users.name as name')
            ->where('supplier_proposal.material_inquiry_id', '=', $id)
            ->where('supplier_proposal.is_accepted', '=', 1)
            ->orderBy('id', 'desc')->get();

        if(count($data) > 0)
        {
/*
            foreach ($data as $k => $val)
            {
                $query2      =   DB::table('boq_sub_materials');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('boq_sub_materials.boq_id', '=', $val->boq_id);
                $ourprice      =   $query2->get();

                $data[$k]->ourPrice=$ourprice[0]->Total;
            }
*/
            $query      =   DB::table('supplier_agreement');
            $query->select('supplier_agreement.*');
            $query->where('supplier_agreement.proposal_id', '=', $data[0]->id);
            $agreementData  =   $query->get();

            $data[0]->agreement =   $agreementData;
        }


    return $data;
    }

    public function getSupplierId($id){
        $data = DB::table('supplier_proposal')
            ->join('material_inquiry', 'material_inquiry.id', '=', 'supplier_proposal.material_inquiry_id')
            ->select('supplier_proposal.id as proposal_id','supplier_proposal.supplier_id','material_inquiry.work_zone_id','material_inquiry.sub_gml_id')
            ->where('supplier_proposal.material_inquiry_id', '=', $id)->first();
        return $data;
    }


    public function addAgreement($data,$supplier_accepted = 0){
        $id =   DB::table('supplier_agreement')->insertGetId(
            [
                'proposal_id'           =>  $data['proposal_id'],
                'supplier_id'           =>  $data['supplier_id'],
                'sub_gml_id'            =>  $data['sub_gml_id'],
                'work_zone_id'          =>  $data['work_zone_id'],
                'quotation_ref'         =>  $data['quotation_ref'],
                'supplier_code'         =>  $data['supplier_code'],
                'payment_terms'         =>  $data['payment_terms'],
                'all_materials'         =>  $data['all_materials'],
                'submital_requisted'    =>  $data['submital_requisted'],
                'copies_number'         =>  $data['copies_number'],
                'is_approved'           =>  1,
                'is_supplier_accepted'  =>  $supplier_accepted
            ]
        );
        return $id;
    }

    public function acceptAgreement($id){
        DB::table('supplier_agreement')
            ->where('id', $id)
            ->update(['is_supplier_accepted' => '1']);
        return;
    }

    public function declineAgreement($data){
        DB::table('supplier_agreement_decline')->insert(
            [
                'agreement_id'  =>  $data['agreement_id'],
                'reason'        =>  $data['declineReason']
            ]);
        return;
    }


    public function approveAgreement($id){
        DB::table('supplier_agreement')
            ->where('proposal_id', $id)
            ->update(['is_approved' => '1']);
        return;
    }

    public function getAgreement($id){
        $data = DB::table('supplier_agreement')
            ->join('sub_gml', 'supplier_agreement.sub_gml_id', '=', 'sub_gml.id')
            ->where('proposal_id', $id)
            ->get();
        return $data;
    }

    public function supplierFormAgreement($id){
        $data = DB::table('supplier_agreement')
            ->join('sub_gml', 'supplier_agreement.sub_gml_id', '=', 'sub_gml.id')
            ->join('supplier_proposal', 'supplier_agreement.proposal_id', '=', 'supplier_proposal.id')
            ->join('work_zone', 'supplier_agreement.work_zone_id', '=', 'work_zone.id')
            ->select('supplier_agreement.*','sub_gml.title as sub_gml' ,'work_zone.title as workzone')
            ->where('supplier_agreement.id', $id)
            ->first();

        return $data;
    }

    public function checkAgreementIsaccepted($id){
        $data = DB::table('supplier_decline')
            ->join('users', 'supplier_decline.supplier_id', '=', 'users.id')
            ->where('supplier_decline.material_inquiry_id', $id)
            ->get();
        return $data;
    }

    public function getDeclines($id,$decline_id = 0){
        $q  = DB::table('supplier_decline');
            $q->join('users', 'supplier_decline.supplier_id', '=', 'users.id');

            $q->select('supplier_decline.*','users.name','users.email');

        if($id == 0)
            $q->where('supplier_decline.id', $decline_id);
        else
            $q->where('supplier_decline.material_inquiry_id', $id);

        $data   =  $q->get();
        return $data;
    }

    public function getInquiryById($id){
        $data = DB::table('material_inquiry')
            ->where('material_inquiry.id', '=', $id)
            ->get();
        return $data;
    }

    public function addReplayDecline($data){
        $id =   DB::table('decline_replay')->insertGetId(
            [
                'decline_id'    =>  $data['id'],
                'subject'       =>  $data['subject'],
                'body'          =>  $data['description'],
                'date'          => date("Y-m-d H:i:s")
            ]
        );
        return $id;
    }

    public function getDeclinReplays($id){
        $data = DB::table('decline_replay')
            ->where('decline_replay.decline_id', '=', $id)
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function removeinquiry($data){
        DB::table('material_inquiry')->where('id', '=', $data['id'])->delete();
        DB::table('material_inquiry_materials')
            ->where('work_zone_id', '=', $data['work_zone_id'])
            ->where('sub_gml_id', '=', $data['sub_gml_id'])
            ->where('status', '=', 3)
            ->delete();

        DB::table('boq')
            ->where('work_zone_id', $data['work_zone_id'])
            ->where('sub_gml_id', $data['sub_gml_id'])
            ->update(['status' => '2' , 'inquiry_is_created'=>'0']);

        return;
    }

    public function getProposalReplies($id){
        $data = DB::table('proposal_reply')
            ->where('proposal_reply.proposal_id', '=', $id)
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function addProposalReply($data){
        $id =   DB::table('proposal_reply')->insertGetId(
            [
                'proposal_id'    =>  $data['id'],
                'subject'       =>  $data['subject'],
                'body'          =>  $data['description'],
                'date'          => date("Y-m-d H:i:s")
            ]
        );
        return $id;
    }

    public function getSuppliersByMtinquiry($id){
        $data   =   DB::table('material_inquiry')
            ->join('supplier_materials', 'material_inquiry.sub_gml_id', '=', 'supplier_materials.submaterila_id')
            ->join('users', 'supplier_materials.supplier_id', '=', 'users.id')
            ->select('users.id as user_id','users.name','material_inquiry.id as m_id')
            ->where('material_inquiry.id', '=', $id)
            ->get();
        return $data;

    }

    public function checkClosedate(){
        $data   =   DB::table('material_inquiry')
            ->select('material_inquiry.close_date','material_inquiry.id')
            ->get();

        $today      = date('Y-m-d');
        $today      = strtotime($today);

        foreach($data as $d) {
            $close_date     = strtotime($d->close_date);
            $diff           =  $close_date- $today;
            $diff           = floor($diff/(60*60*24));
            if($diff <= 2 && $diff>=0) {

                $check = DB::table('inquiry_extend')->where([['inquiry_extend.inq_id','=',$d->id],['inquiry_extend.days','=',$diff]])->first();

                if($check===null) {

                    $notification['title']          = 'Inquiry Closes soon';
                    $notification['description']    = 'Inquiry closes in ' . $diff . ' days';
                    $notification['link']           = asset('/materialinquiry/extend/' . $d->id);

                    $notfy  = new GetNotification();
                    $notfy->dateUpdate($notification);

                    DB::table('inquiry_extend')->insert([
                        ['inq_id' => $d->id, 'days' => $diff]
                    ]);
                }
                else{
                    DB::table('inquiry_extend')->where('inquiry_extend.inq_id','=',$d->id)->update(['days' => $diff]);
                }
            }
        }
    }

    public function updateClosedate($id,$close_date)
    {
        $data           = $this->getInquirydetailsbyid($id);
        $old_date       = strtotime($data->close_date);

        DB::table('material_inquiry')
            ->where('material_inquiry.id', '=', $id)
            ->update(['material_inquiry.close_date'=>$close_date]);

        DB::table('inquiry_extend')->where('inquiry_extend.inq_id','=',$id)->delete();

        $new_date = strtotime($close_date);

        $diff        =  $new_date- $old_date;
        $diff        = floor($diff/(60*60*24));

        $notification['title']          = 'Inquiry Date extended';
        $notification['description']    = 'Inquiry date of '.$data->gmltitle.' under '.$data->wztitle.' extended to '.$diff.' more days';
        $notification['link']           = asset('/materialinquiry/show');

        $notfy = new GetNotification();
        $notfy->extendDate($notification,$id);
    }

    public function getInquirydetailsbyid($id)
    {
        $data = DB::table('material_inquiry')->where('material_inquiry.id','=',$id)
            ->join('work_zone', 'material_inquiry.work_zone_id', '=', 'work_zone.id')
            ->join('sub_gml', 'material_inquiry.sub_gml_id', '=', 'sub_gml.id')
            ->select('material_inquiry.*','work_zone.title as wztitle', 'sub_gml.title as gmltitle')
            ->first();

        return $data;
    }

    public function checkAlreadyextended($id)
    {
        $data   =   DB::table('material_inquiry')->where('material_inquiry.id','=',$id)
            ->select('material_inquiry.close_date','material_inquiry.id')
            ->first();

        $today          = date('Y-m-d');
        $today          = strtotime($today);
        $close_date     = strtotime($data->close_date);
        $diff           =  $close_date- $today;
        $diff           = floor($diff/(60*60*24));

        if($diff>2)
            return 1;

        return 0;
    }
}
