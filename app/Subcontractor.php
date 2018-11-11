<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcontractor extends Model
{
    /**********************ADDED BY ROSHAN********************************/
    public function addMateriall($data){
        DB::table('subcontractor_category')->insert(
            ['subcontractor_id' => $data['subcontractor_id'], 'sub_category_id' => $data['sub_scl_id']]
        );
    }

    public function removeMaterial($data){
        DB::table('subcontractor_category')
            ->where('subcontractor_id', '=', $data['subcontractor_id'])
            ->where('sub_category_id', '=', $data['sub_scl_id'])->delete();
    }


    /***************************ADDED BY ROSHAN*****************************************/
    public function getSubcontractorMaterials($scl_id,$subcontractor_id)
    {

        $query = DB::table('sub_scl');

        $query->leftjoin('subcontractor_category', function ($join) use ($subcontractor_id) {
            $join->on('subcontractor_category.sub_category_id', '=', 'sub_scl.id');
            $join->where('subcontractor_category.subcontractor_id', '=', $subcontractor_id);

        });
        $query->select('sub_scl.*', 'subcontractor_category.subcontractor_id');
        $query->where('sub_scl.scl_id', '=', $scl_id);
        $query->where('sub_scl.is_approved', '=', 1);
        $query->where('sub_scl.is_approved2', '=', 1);
        $query->where('sub_scl.is_approved3', '=', 1);
        $data = $query->get();

        return $data;

    }
    /***********************************************************************/

    public function addCategory($data){
        DB::table('subcontractor_category')->insert(
            ['subcontractor_id' => $data['subcontractor_id'], 'sub_category_id' => $data['sub_scl_id']]
        );
    }

    public function getSubSclItems($subcontractor_id){
        $data = DB::table('subcontractor_category')
            ->join('sub_scl', 'subcontractor_category.sub_category_id', '=', 'sub_scl.id')
            ->select('sub_scl.*')
            ->where('subcontractor_category.subcontractor_id', '=', $subcontractor_id)
            ->get();
        return $data;
    }

    public function removeCategory($data){
        DB::table('subcontractor_category')
            ->where('subcontractor_id', '=', $data['subcontractor_id'])
            ->where('sub_category_id', '=', $data['sub_scl_id'])->delete();
    }

    public function getPendingRequest($subcontractor_id){
        $data = DB::table('subcontractor_request')
            ->join('scr', 'subcontractor_request.scr_id', '=', 'scr.id')
            ->join('subcontractor_category', 'scr.sub_scl_id', '=', 'subcontractor_category.sub_category_id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_request.*','sub_scl.title as scl')
            ->where('subcontractor_category.subcontractor_id', '=', $subcontractor_id)
            ->where('subcontractor_request.is_approved', '=', 1)
            ->where('subcontractor_request.is_closed', '=', 0)
            ->whereNotIn('subcontractor_request.scr_id',function ($query)use ($subcontractor_id) {
                $query->from('subcontractor_proposal')
                    ->select('scr_id')
                    ->where('subcontractor_id', '=', $subcontractor_id);

            })
            ->get();
        return $data;
    }

    public function getRequestDetails($id){
        $data = DB::table('subcontractor_request')
            ->join('scr_sub_category', 'subcontractor_request.scr_id', '=', 'scr_sub_category.scr_id')
            ->join('scr', 'subcontractor_request.scr_id', '=', 'scr.id')
            ->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id')
            ->select('subcontractor_request.id as main_id','subcontractor_request.description','sub_scl.title','scr_sub_category.*')
            ->where('subcontractor_request.id', '=', $id)
            ->get();;

        return $data;
    }

    public function addProposal($data,$detalis){
        DB::beginTransaction();

        try {

            $id = DB::table('subcontractor_proposal')->insertGetId(
                [
                    'subcontractor_id'          =>  $data['subcontractor_id'],
                    'scr_id'                    =>  $data['scr_id'],
                    'subcontractor_request_id'  =>  $data['subcontractor_request'],
                    'proposal'                  =>  $data['proposal']
                ]
            );
            foreach ($detalis as $k =>$val)
            {
                DB::table('subcontractor_proposal_details')->insertGetId(
                    [
                        'proposal_id'        =>  $id,
                        'sub_category_id'   =>  $val['sub_category_id'],
                        'price'             =>  $val['price'],
                        'description'       =>  $val['description']
                    ]
                );
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

        }
    }
    public function getPendingAgreement($subcontractor_id){
        $data = DB::table('subcontractor_agreement')
            ->join('sub_scl', 'subcontractor_agreement.sub_scl_id', '=', 'sub_scl.id')
            ->where('subcontractor_id', '=', $subcontractor_id)
            ->where('is_subcontractor_accepted', '=', 0)
            ->get();
        return $data;
    }

    public function subcontractorAcceptAgreement($id){

        DB::table('subcontractor_agreement')
            ->where('proposal_id', $id)
            ->update(['is_subcontractor_accepted' => '1']);
        return;
    }

    public function addDecline($data){
        DB::table('subcontractor_decline')->insert(
            ['subcontractor_id' => $data['subcontractor_id'], 'subcontractor_request_id' => $data['id'],'decline_reason' => $data['decline']]
        );
    }
}
