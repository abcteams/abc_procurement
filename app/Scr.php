<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scr extends Model
{
    public function fetchAll($search){
        $q = DB::table('scr');
        $q->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id');
        $q->join('scl', 'scl.id', '=', 'sub_scl.scl_id');
        $q->join('boq_status', 'scr.status', '=', 'boq_status.id');

        $value  =   $search['value'];
        if(isset($search['type']))
        {
            if($search['type'] == 'title'){
                $q->where('scl.title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'sub_title'){
                $q->where('sub_scl.title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'desc'){
                $q->where('sub_scl.description','like','%'.$search['value'].'%');
            }else{
                $q->Where(function($query )use ($value){
                    $query->where('scl.title','like','%'.$value.'%');
                    $query->orWhere('sub_scl.title','like','%'.$value.'%');
                    $query->orWhere('sub_scl.description','like','%'.$value.'%');
                });

            }
        }

        $q->select('scr.*','sub_scl.title', 'sub_scl.description','scl.title as scl_title','boq_status.status as status'  );
        $q->where('scr.sub_work_zone_id', '=', $search['id']);

        $data   =   $q->orderBy('id', 'desc')->paginate(5);

        return $data;
    }


    public function addRecord($data){
        DB::table('scr')->insert(
            ['sub_work_zone_id' => $data['sub_work_zone_id'], 'sub_scl_id' => $data['sub_scl_id'],'status' => '1', 'work_zone_id' => $data['work_zone_id']]
        );
    }

    public function updateRecord($data){
        DB::table('scr')
            ->where('id', $data['id'])
            ->update(['sub_scl_id' => $data['sub_scl_id']]);
    }

    public function showsubscr($id){
        $data   =   DB::table('scr_sub_category')
            ->join('scr', 'scr.id', '=', 'scr_sub_category.scr_id')
            ->select('scr_sub_category.*','scr.request_is_created')
            ->where('scr_id', '=', $id)
            ->orderBy('id', 'desc')->get();
        return $data;
    }

    public function addsubRecord($data){
        DB::table('scr_sub_category')->insert(
            [
                'scr_id'            => $data['scr_id'],
                'quantity'          => $data['quantity'],
                'budgetory_price'   => $data['budgetory_price'],
                'description'       => $data['description'],
                'work_scope'       => $data['work_scope'],
            ]
        );
        return;
    }

    public function updateSubRecord($data){
        DB::table('scr_sub_category')
            ->where('id', $data['id'])
            ->update([
                'quantity'          => $data['quantity'],
                'budgetory_price'   => $data['budgetory_price'],
                'description'       => $data['description'],
                'work_scope'       => $data['work_scope'],
            ]);
        return;
    }

    public function getSubScrRecord($id){
        $data   =   DB::table('scr_sub_category')
            ->where('id', '=', $id)->get();
        return $data;
    }

    public function removesubscr($id){
        DB::table('scr_sub_category')->where('id', '=', $id)->delete();
    }

    public function removescr($id){
        DB::table('scr_sub_category')->where('scr_id', '=', $id)->delete();
        DB::table('scr')->where('id', '=', $id)->delete();
    }

    //created by iqbal *****************************************
    public function getSubScrMaterialByWorkZone($id)
    {
        $q = DB::table('scr');
        $q->join('sub_scl', 'scr.sub_scl_id', '=', 'sub_scl.id');
        $q->join('scl', 'sub_scl.scl_id', '=', 'scl.id');
        $q->join('work_zone','scr.work_zone_id','=','work_zone.id');
        $q->select('scr.sub_scl_id','sub_scl.title','sub_scl.id','work_zone.title as work_zone','scl.title as scl');
        $q->where('scr.work_zone_id', '=', $id);
        $q->where('scr.status', '=', 2);
        $q->distinct('scr.sub_scl_id');
        $data   =   $q->get();
        return $data;
    }

}
