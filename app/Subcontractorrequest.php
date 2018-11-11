<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcontractorrequest extends Model
{
    public function addRecord($data){
        DB::beginTransaction();

        try {
            DB::table('subcontractor_request')->insert(
                [
                    'scr_id'        =>  $data['scr_id'],
                    'date'          =>  $data['date'],
                    'close_date'    =>  $data['close_date'],
                    'description'   =>  $data['description'],
                    'is_approved'   =>  '0'
                ]
            );

            DB::table('scr')
                ->where('id', $data['scr_id'])
                ->update(['status' => '2' , 'request_is_created'=>'1']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

    }

    public function getRecords(){
        $data = DB::table('subcontractor_request')
            ->join('scr', 'subcontractor_request.scr_id', '=', 'scr.id')
            ->join('sub_work_zone', 'scr.sub_work_zone_id', '=', 'sub_work_zone.id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_request.*','sub_work_zone.title as wztitle', 'sub_scl.title as scltitle')
            ->where('subcontractor_request.is_approved', '=', '1')
            ->where('subcontractor_request.is_closed', '=', '0')->get();
        return $data;
    }

    public function getClosedInquiry(){
        $data = DB::table('subcontractor_request')
            ->join('scr', 'subcontractor_request.scr_id', '=', 'scr.id')
            ->join('sub_work_zone', 'scr.sub_work_zone_id', '=', 'sub_work_zone.id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_request.*','sub_work_zone.title as wztitle', 'sub_scl.title as scltitle')
            ->where('subcontractor_request.is_approved', '=', '1')
            ->where('subcontractor_request.is_closed', '=', '1')->get();
        return $data;
    }

    public function getPendingInquiry(){
        $data = DB::table('subcontractor_request')
            ->join('scr', 'subcontractor_request.scr_id', '=', 'scr.id')
            ->join('sub_work_zone', 'scr.sub_work_zone_id', '=', 'sub_work_zone.id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_request.*','sub_work_zone.title as wztitle', 'sub_scl.title as scltitle')
            ->where('subcontractor_request.is_approved', '=', '0')->get();
        return $data;
    }


    public function approveInquiry($id){
        DB::table('subcontractor_request')->where('id', $id)->update(['is_approved' => '1']);
    }

    public function getSubcontractorProposals($id)
    {
        $data = DB::table('subcontractor_proposal')
            ->join('users', 'subcontractor_proposal.subcontractor_id', '=', 'users.id')
            ->select('subcontractor_proposal.*','users.name as name','users.email as email')
            ->where('subcontractor_proposal.subcontractor_request_id', '=', $id)->get();

        $result = array();
        if(count($data) > 0)
        {

            foreach ($data as $k => $val)
            {
                $result[$k] =  json_decode(json_encode($data[$k]), True);
                $query      =   DB::table('subcontractor_proposal_details');
                $query->select(DB::raw("SUM(price) as Total"));
                $query->where('subcontractor_proposal_details.proposal_id', '=', $val->id);
                $price      =   $query->get();


                $query2      =   DB::table('scr_sub_category');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('scr_sub_category.scr_id', '=', $val->scr_id);
                $ourprice      =   $query2->get();

                $result[$k]['subcontractorPrice']=$price[0]->Total;
                $result[$k]['ourPrice']=$ourprice[0]->Total;
            }
        }

        return (object) $result;
    }

    public function getConsideredItems($id)
    {
        $data = DB::table('subcontractor_proposal')
            ->join('users', 'subcontractor_proposal.subcontractor_id', '=', 'users.id')
            ->select('subcontractor_proposal.*','users.name as name','users.email as email')
            ->where('subcontractor_proposal.subcontractor_request_id', '=', $id)
            ->where('subcontractor_proposal.consider', '=', 1)->get();

        $result = array();
        if(count($data) > 0)
        {

            foreach ($data as $k => $val)
            {
                $result[$k] =  json_decode(json_encode($data[$k]), True);
                $query      =   DB::table('subcontractor_proposal_details');
                $query->select(DB::raw("SUM(price) as Total"));
                $query->where('subcontractor_proposal_details.proposal_id', '=', $val->id);
                $price      =   $query->get();


                $query2      =   DB::table('scr_sub_category');
                $query2->select(DB::raw("SUM(budgetory_price) as Total"));
                $query2->where('scr_sub_category.scr_id', '=', $val->scr_id);
                $ourprice      =   $query2->get();

                $result[$k]['subcontractorPrice']=$price[0]->Total;
                $result[$k]['ourPrice']=$ourprice[0]->Total;
            }
        }

        return (object) $result;
    }



    public function considerItem($id){
        DB::table('subcontractor_proposal')
            ->where('id', $id)
            ->update(['consider' => 1]);
    }

    public function proposalDetails($id){
        $data = DB::table('subcontractor_proposal_details')
            ->join('scr_sub_category', 'subcontractor_proposal_details.sub_category_id', '=', 'scr_sub_category.id')
            ->where('subcontractor_proposal_details.proposal_id', '=', $id)
            ->get();
        return $data;
    }
    public function approveProposal($id){
        DB::table('subcontractor_proposal')
            ->join('subcontractor_request', 'subcontractor_proposal.subcontractor_request_id', '=', 'subcontractor_request.id')
            ->where('subcontractor_proposal.id','=', $id)
            ->update(['subcontractor_proposal.is_accepted' => 1,'subcontractor_request.is_closed' => 1]);
        return;
    }

    public function getAcceptedProposal($id){
        $data = DB::table('subcontractor_proposal')
            ->join('users', 'subcontractor_proposal.subcontractor_id', '=', 'users.id')
            ->join('scr', 'subcontractor_proposal.scr_id', '=', 'scr.id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_proposal.*','users.name as name','users.email as email','users.email as email','sub_scl.title')
            ->where('subcontractor_proposal.id', '=', $id)
            ->get();

        $query      =   DB::table('subcontractor_proposal_details');
        $query->select(DB::raw("SUM(price) as Total"));
        $query->where('subcontractor_proposal_details.proposal_id', '=', $data[0]->id);
        $price      =   $query->get();

        $query      =   DB::table('subcontractor_agreement');
        $query->where('subcontractor_agreement.proposal_id', '=', $data[0]->id);
        $agreementData  =   $query->get();

        $data[0]->price     =   $price[0]->Total;
        $data[0]->agreement =   $agreementData;
        return $data;
    }

    public function getSubcontractorId($id){
        $data = DB::table('subcontractor_proposal')
            ->join('scr', 'subcontractor_proposal.scr_id', '=', 'scr.id')
            ->select('subcontractor_proposal.subcontractor_id','scr.sub_scl_id')
            ->where('subcontractor_proposal.id', '=', $id)->get();
        return $data;
    }

    public function addAgreement($data){
        DB::table('subcontractor_agreement')->insert(
            [
                'proposal_id'           =>  $data['proposal_id'],
                'subcontractor_id'      =>  $data['subcontractor_id'],
                'sub_scl_id'            =>  $data['sub_scl_id'],
                'delivery_agreement'    =>  $data['delivery_agreement'],
                'payment_terms'         =>  $data['payment_terms'],
                'final_price'           =>  $data['final_price'],
                'approve_date'          =>  $data['date'],
            ]
        );
        return;
    }

    public function approveAgreement($id){
        DB::table('subcontractor_agreement')
            ->where('proposal_id', $id)
            ->update(['is_approved' => '1']);
        return;
    }

    public function getAgreement($id){
        $data = DB::table('subcontractor_agreement')
            ->join('sub_scl', 'subcontractor_agreement.sub_scl_id', '=', 'sub_scl.id')
            ->where('proposal_id', $id)
            ->get();
        return $data;
    }


    public function getDeclines($id){
        $data = DB::table('subcontractor_decline')
            ->join('users', 'subcontractor_decline.subcontractor_id', '=', 'users.id')
            ->where('subcontractor_decline.subcontractor_request_id', $id)
            ->get();
        return $data;
    }

}
