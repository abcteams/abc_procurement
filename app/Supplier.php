<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    public function addMateriall($data){
        DB::table('supplier_materials')->insert(
            ['supplier_id' => $data['supplier_id'], 'submaterila_id' => $data['sub_gml_id']]
        );
    }

    public function getSubGmlItems($supplier_id){
        $data = DB::table('supplier_materials')
            ->join('sub_gml', 'supplier_materials.submaterila_id', '=', 'sub_gml.id')
            ->select('sub_gml.*')
            ->where('supplier_materials.supplier_id', '=', $supplier_id)
            ->get();
        return $data;
    }

    public function removeMaterial($data){
        DB::table('supplier_materials')
            ->where('supplier_id', '=', $data['supplier_id'])
            ->where('submaterila_id', '=', $data['sub_gml_id'])->delete();
    }

    public function getPendingInquiry($supplier_id){
        $data = DB::table('material_inquiry')
            ->join('boq', 'material_inquiry.boq_id', '=', 'boq.id')
            ->join('supplier_materials', 'boq.sub_gml_id', '=', 'supplier_materials.submaterila_id')
            ->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id')
            ->select('material_inquiry.*','sub_gml.title as gml')
            ->where('supplier_materials.supplier_id', '=', $supplier_id)
            ->where('material_inquiry.is_approved', '=', 1)
            ->where('material_inquiry.is_closed', '=', 0)
            ->whereNotIn('material_inquiry.boq_id',function ($query)use ($supplier_id) {
                $query->from('supplier_proposal')
                    ->select('boq_id')
                    ->where('supplier_id', '=', $supplier_id);

            })
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getInquiryDetails($boq_id = 0,$inquiry_id){
        $q = DB::table('material_inquiry');
        $q->join('material_inquiry_materials', function($join)
        {
            $join->on('material_inquiry_materials.sub_gml_id', '=', 'material_inquiry.sub_gml_id');
            $join->on('material_inquiry_materials.work_zone_id', '=', 'material_inquiry.work_zone_id');
        });
        $q->join('work_zone', 'work_zone.id', '=', 'material_inquiry.work_zone_id');
        $q->join('sub_gml', 'sub_gml.id', '=', 'material_inquiry.sub_gml_id');
        $q->where('material_inquiry_materials.status', '=', 3);
        $q->select(
            'material_inquiry.id as main_id',
            'material_inquiry.description',
            'material_inquiry_materials.*',
            'sub_gml.title',
            'sub_gml.id as subgml',
            'work_zone.title as work_zone'
        );

        if($boq_id == 0)
            $q->where('material_inquiry.id', '=', $inquiry_id);
        else
            $q->where('material_inquiry.id', '=', $boq_id);
        print_r($boq_id);die();
        $data   = $q->get();

        $data2  =   array();
        foreach ($data as $k => $val)
        {
            $data2[$k]       =   $val;
            $data2[$k]->accessories  =   DB::table('boq_accessories')->where('sub_boq_id', '=', $val->id)->get();
        }
        return $data;
    }

    public function getReadyInquiryDetails($id){
        $q = DB::table('boq');
        $q->join('boq_sub_materials', 'boq.id', '=', 'boq_sub_materials.boq_id');
        $q->join('work_zone', 'work_zone.id', '=', 'boq.work_zone_id');
        $q->join('sub_gml', 'sub_gml.id', '=', 'boq.sub_gml_id');
        $q->where('boq.status', '=', 4);
        $q->select(
            'boq.id as main_id',
            'boq_sub_materials.*',
            'sub_gml.title',
            'sub_gml.id as subgml',
            'work_zone.title as work_zone'
        );
        $q->where('boq.id', '=', $id);
        $data   = $q->get();
        $data2  =   array();
        foreach ($data as $k => $val)
        {
            $data2[$k]       =   $val;
            $data2[$k]->accessories  =   DB::table('boq_accessories')->where('sub_boq_id', '=', $val->id)->get();
        }

        return $data;
    }

    public function addProposal($data,$detalis){
        DB::beginTransaction();

        try {

            $id = DB::table('supplier_proposal')->insertGetId(
                [
                    'supplier_id'           =>  $data['supplier_id'],
                    'boq_id'                =>  $data['boq'],
                    'material_inquiry_id'   =>  $data['material_inquiry'],
                    'proposal'              =>  $data['proposal']
                ]
            );
            foreach ($detalis as $k =>$val)
            {
                DB::table('supplier_proposal_details')->insertGetId(
                    [
                        'propsal_id'            =>  $id,
                        'sub_materials_id'      =>  $val['sub_materials_id'],
                        'price'                 =>  $val['price'],
                        'model_number'          =>  $val['model_number'],
                        'description'           =>  $val['description']
                    ]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            echo $e;
        }
    }

    public function addProposalByemail($data,$accepted = 0){
        $id = DB::table('supplier_proposal')->insertGetId(
            [
                'supplier_id'           =>  $data['id'],
                'boq_id'                =>  $data['boq'],
                'material_inquiry_id'   =>  $data['material_inquiry'],
                'total_price'           =>  $data['total_price'],
                'compliance'            =>  $data['compliance'],
                'delivery_period'       =>  $data['deliveryPeriod'],
                'contact_person'        =>  $data['supplier_name'],
                'email'                 =>  $data['supplier_email'],
                'proposal'              =>  '',
                'consider'              =>  $accepted,
                'is_accepted'           =>  $accepted,
            ]
        );
        return $id;

    }
    public function getPendingAgreement($supplier_id){
        $data = DB::table('supplier_agreement')
            ->join('sub_gml', 'supplier_agreement.sub_gml_id', '=', 'sub_gml.id')
            ->select('supplier_agreement.*','sub_gml.title','sub_gml.description')
            ->where('supplier_id', '=', $supplier_id)
            ->where('is_supplier_accepted', '=', 0)
            ->get();
        return $data;
    }

    public function supplierAcceptAgreement($id){
        DB::table('supplier_agreement')
            ->join('supplier_proposal', 'supplier_proposal.id', '=', 'supplier_agreement.proposal_id')
            ->join('boq', 'boq.id', '=', 'supplier_proposal.boq_id')
            ->where('supplier_agreement.id', $id)
            ->update(['supplier_agreement.is_supplier_accepted' => '1','boq.status' => '3']);
        return;
    }

    public function getSentProposals($supplier_id){

        $data    =   DB::table('supplier_proposal')
            ->join('material_inquiry', 'supplier_proposal.material_inquiry_id', '=', 'material_inquiry.id')
            ->join('boq', 'material_inquiry.boq_id', '=', 'boq.id')
            ->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id')
            ->where('material_inquiry.is_closed' ,'=','0')
            ->where('supplier_proposal.supplier_id' ,'=',$supplier_id)
            ->get();

      return $data;
    }

    public function getProposalDetails($supplier_id , $boq_id){
        $result   =   DB::select(
            "SELECT a.* , SUM(b.price) as total FROM `supplier_proposal` as a
                INNER JOIN `supplier_proposal_details` as b  on (a.id = b.propsal_id)
                WHERE `boq_id` = '$boq_id'
                GROUP BY a.id
                Order BY total ASC"
                );
        foreach ($result as $k =>$val)
        {
            if($supplier_id == $val->supplier_id){
                $data           =   $val;
                $data->number   =   $k+1;
            }
        }
        return $data;
    }

    public function addDecline($data){
        DB::table('supplier_decline')->insert(
            ['supplier_id' => $data['supplier_id'], 'material_inquiry_id' => $data['id'],'decline_reason' => $data['decline']]
        );
    }

    public function getSupplierMaterials($gml_id,$supplier_id)
    {

        $query = DB::table('sub_gml');

        $query->leftjoin('supplier_materials', function ($join) use ($supplier_id) {
            $join->on('supplier_materials.submaterila_id', '=', 'sub_gml.id');
            $join->where('supplier_materials.supplier_id', '=', $supplier_id);

        });
        $query->select('sub_gml.*', 'supplier_materials.supplier_id');
        $query->where('sub_gml.gml_id', '=', $gml_id);
        $query->where('sub_gml.is_approved', '=', 1);
        $query->where('sub_gml.is_approved2', '=', 1);
        $query->where('sub_gml.is_approved3', '=', 1);
        $data = $query->get();

        return $data;

    }
    public function getSuppliersByMaterial($submaterial){
        $data  =   DB::table('supplier_materials')
                    ->join('users', 'users.id', '=', 'supplier_materials.supplier_id')
                    ->join('users_details', 'users_details.user_id', '=', 'users.id')
                    ->select('users.id','users.name','users.email','users_details.company_name')
                    ->where('submaterila_id','=',$submaterial)->get();
        return $data;
    }

    public function isProposaled($id,$in_id ){
        $data  =   DB::table('supplier_proposal')
            ->where('supplier_id', '=', $id)
            ->where('material_inquiry_id', '=', $in_id)
            ->first();
        return $data;
    }

/*
    public function getSuppliersByBoq($boq_id){

        $data  =   DB::table('supplier_materials')
            ->join('boq', 'boq.sub_gml_id', '=', 'supplier_materials.submaterila_id')
            ->join('users', 'users.id', '=', 'supplier_materials.supplier_id')
            ->join('users_details', 'users_details.user_id', '=', 'users.id')
            ->select('users.id','users.name','users.email','users_details.company_name')
            ->where('boq.id','=',$boq_id)->get();
        return $data;
    }
*/


    public function submitSuplierProposal($data,$accepted = 0)
    {

        $id = DB::table('supplier_proposal')->insertGetId(
            [
                'supplier_id'           =>  $data['supplier'],
                'boq_id'                =>  '0',
                'material_inquiry_id'   =>  $data['material_inquiry'],
                'total_price'           =>  $data['total_price'],
                'compliance'            =>  $data['compliance'],
                'delivery_period'       =>  $data['deliveryPeriod'],
                'contact_person'        =>  $data['supplier_name'],
                'email'                 =>  $data['supplier_email'],
                'proposal'              =>  '',
                'consider'              =>  $accepted,
                'is_accepted'           =>  $accepted,
                'is_approved'           =>  0,
                'is_approved2'          =>  0
            ]
        );
        return $id;
    }

    public function getSupplierDetails($id){
        $data = DB::table('supplier_proposal')
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->where('supplier_proposal.id', $id)
            ->select('supplier_proposal.*','users.name','users.email')
            ->get();
        return $data;
    }

    public function getDeclines($id){
        $q  = DB::table('supplier_agreement_decline');
        $q->where('supplier_agreement_decline.agreement_id', $id);
        $q->join('supplier_agreement','supplier_agreement.id','=','supplier_agreement_decline.agreement_id');
        $q->join('users', 'supplier_agreement.supplier_id', '=', 'users.id');
        $q->select('supplier_agreement_decline.*','users.name','users.email');

        $data   =  $q->get();
        return $data;
    }

    public function getDeclinReplays($id){
        $data = DB::table('supplier_agreement_decline')
            ->where('supplier_agreement_decline.agreement_id', '=', $id)
            ->orderBy('id', 'desc')->get();
        return $data;
    }
}













