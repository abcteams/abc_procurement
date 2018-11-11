<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Scl extends Model
{
    public function fetchAll($search = null){
        $q  =   DB::table('scl');

        if(isset($search['type']))
        {
            if($search['type'] == 'title'){
                $q->where('title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'desc'){
                $q->where('description','like','%'.$search['value'].'%');
            }else{
                $q->where('title','like','%'.$search['value'].'%');
                $q->orWhere('description','like','%'.$search['value'].'%');
            }
        }
        $q->where('is_approved', '=', 1);
        $q->where('is_approved2', '=', 1);
        $q->where('is_approved3', '=', 1);

        $data   =   $q->orderBy('id', 'desc')->paginate(5);
        return $data;
    }

    public function allScl(){
        $data  =   DB::table('scl')->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getSub($search = null){
        $q  =   DB::table('sub_scl');

        $value  =   $search['value'];
        if(isset($search['type']))
        {
            if($search['type'] == 'title'){
                $q->where('title','like','%'.$value.'%');
            }elseif ($search['type'] == 'desc'){
                $q->where('description','like','%'.$value.'%');
            }else{
                $q->where(function($query )use ($value)
                {
                    $query->where('title', 'like', '%' . $value . '%')
                        ->orWhere('description', 'like', '%' . $value . '%');
                });
            }
        }

        $q->where('scl_id', '=', $search['id']);
        $q->where('is_approved', '=', 1);

        $data   =   $q->orderBy('id', 'desc')->paginate(5);
        return $data;
    }

    public function allSub($id){
        $data =   DB::table('sub_scl')->orderBy('id', 'desc')->where('scl_id', '=', $id)->get();
        return $data;
    }


    public function addRecord($data){
        DB::table('scl')->insert(
            ['title' => $data['title'], 'description' => $data['desc']]
        );
    }


    public function getMainSclTitle($id){
        $data  =   DB::table('scl')->where('id', '=', $id)->get();
        return $data[0];
    }

    public function searchScl($data){

        $type   =   $data['type'];

        if(trim($type) == 'title'){
            $result = DB::table('scl')->where('title', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();
        }elseif (trim($type) == 'desc')
        {
            $result = DB::table('scl')->where('description', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();
        }else{
            $result = DB::table('scl')
                ->where('title', 'like', '%'.$data['search'].'%')
                ->orWhere('description', 'like', '%'.$data['search'].'%')
                ->orderBy('id', 'desc')
                ->get();
        }
        return $result;
    }

    public function searchSubScl($data){

        $type   =   $data['type'];

        if(trim($type) == 'title'){
            $result = DB::table('sub_scl')->where('scl_id', '=', $data['scl_id'])->where('title', 'like', '%'.$data['search'].'%')->where('is_approved', '=', 1)->orderBy('id', 'desc')->get();
        }elseif (trim($type) == 'desc')
        {
            $result = DB::table('sub_scl')->where('scl_id', '=', $data['scl_id'])->where('description', 'like', '%'.$data['search'].'%')->where('is_approved', '=', 1)->orderBy('id', 'desc')->get();
        }else{
            $result = DB::table('sub_scl')
                ->where('scl_id', '=', $data['scl_id'])
                ->where(function($query )use ($data)
                {
                    $query->where('title', 'like', '%' . $data['search'] . '%')
                        ->orWhere('description', 'like', '%' . $data['search'] . '%');
                })
                ->where('is_approved', '=', 1)
                ->orderBy('id', 'desc')
                ->get();
        }
        return $result;
    }



    public function getRecord($id){
        $data = DB::table('scl')->where('id', '=', $id)->get();

        return $data;
    }

    public function getSubRecord($id){
        $data = DB::table('sub_scl')->where('id', '=', $id)->get();

        return $data;
    }

    public function updateRecord($data){
        DB::table('scl')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'] , 'description'=>$data['desc'],'is_approved' =>0, 'is_approved2' =>0, 'is_approved3' =>0]);
    }

    public function removeRec($id)
    {
        DB::table('scl')->where('id', '=', $id)->delete();
    }

    public function checkSclIsUsed($id){
        $count  =   DB::table('sub_scl')->where('scl_id','=',$id)->count();
        return $count;
    }

    public function checkSubGmlIsUsed($id){
        $count  =   DB::table('scr')->where('sub_scl_id','=',$id)->count();
        return $count;
    }

    public function addSubRecord($data){
        DB::table('sub_scl')->insert(
            ['scl_id' => $data['sclId'],'title' => $data['title'], 'description' => $data['desc'],'is_approved'=>'0']
        );
    }

    public function updateSubRecord($data){
        DB::table('sub_scl')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'] , 'description'=>$data['desc'],'is_approved' =>0, 'is_approved2' =>0, 'is_approved3' =>0]);
    }


    public function removeSubScl($id)
    {
        DB::table('sub_scl')->where('id', '=', $id)->delete();
        DB::table('subcontractor_category')->where('sub_category_id', '=', $id)->delete();
    }


    /*************************************EDITED BY ROSHAN****************************/
    public function getPending($id){
        if(isset($id) && $id > 0)
        {
            $data   =   DB::table('sub_scl')
                ->join('scl','sub_scl.scl_id','scl.id')
                ->select('scl.title as scl_title','sub_scl.*')
                ->where('scl_id', '=', $id)
                ->where(function($query){
                    $query->where('sub_scl.is_approved', '=', 0)
                        ->orwhere('sub_scl.is_approved2', '=', 0)
                        ->orwhere('sub_scl.is_approved3', '=', 0);
                })
                ->orderBy('sub_scl.id', 'desc')
                ->get();
        }else{
            $data   =   DB::table('sub_scl')
                ->join('scl','sub_scl.scl_id','scl.id')
                ->select('scl.title as scl_title','sub_scl.*')
                ->where(function($query){
                    $query->where('sub_scl.is_approved', '=', 0)
                        ->orwhere('sub_scl.is_approved2', '=', 0)
                        ->orwhere('sub_scl.is_approved3', '=', 0);
                })
                ->orderBy('sub_scl.id', 'desc')
                ->get();
        }
        return $data;
    }

    /*************************************ADDED BY ROSHAN****************************/
    public function getPendingScl($id){
        if(isset($id) && $id > 0)
        {
            $data   =   DB::table('scl')
                ->select('*')
                ->where(function($query){
                    $query->where('is_approved', '=', 0)
                        ->orwhere('is_approved2', '=', 0)
                        ->orwhere('is_approved3', '=', 0);
                })
                ->where('id', '=', $id)
                ->orderBy('scl.id', 'desc')
                ->get();
        }else{
            $data   =   DB::table('scl')
                ->select('*')
                ->where(function($query){
                    $query->where('is_approved', '=', 0)
                        ->orwhere('is_approved2', '=', 0)
                        ->orwhere('is_approved3', '=', 0);
                })
                ->orderBy('scl.id', 'desc')
                ->get();
        }
        return $data;
    }

    public function approveSclPending($id,$approve_type){
        $q  =   DB::table('scl');
        $q ->where('id', $id);
        if($approve_type == 1)
            $q->update(['is_approved' =>1]);
        elseif($approve_type == 2)
            $q->update(['is_approved2' =>1]);
        elseif($approve_type == 3)
            $q->update(['is_approved3' =>1]);

        return;
    }

    public function approveSubPending($id,$approve_type){
        $q  =   DB::table('sub_scl');
        $q ->where('id', $id);
        if($approve_type == 1)
            $q->update(['is_approved' =>1]);
        elseif($approve_type == 2)
            $q->update(['is_approved2' =>1]);
        elseif($approve_type == 3)
            $q->update(['is_approved3' =>1]);

        return;
    }


    public function allMaterials(){

        $q  =   DB::table('scl');
        $q->where('is_approved', '=', 1);
        $q->where('is_approved2', '=', 1);
        $q->where('is_approved3', '=', 1);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }
        /***************************************************************************************/

}
