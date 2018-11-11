<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class gml extends Model
{
    public function fetchAll($search = null){

        $q  =   DB::table('gml');

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
        $data   =   $q->orderBy('id', 'desc')->paginate(10);
        return $data;
    }

    public function allMaterials(){

        $q  =   DB::table('gml');
        $q->where('is_approved', '=', 1);
        $q->where('is_approved2', '=', 1);
        $q->where('is_approved3', '=', 1);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getSub($search = null){
        $q  =   DB::table('sub_gml');

        $value  =   $search['value'];
        if(isset($search['type']))
        {
            if($search['type'] == 'title'){
                $q->where('title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'desc'){
                $q->where('description','like','%'.$search['value'].'%');
            }else{
                $q->where(function($query )use ($value)
                {
                    $query->where('title', 'like', '%' . $value . '%')
                        ->orWhere('description', 'like', '%' . $value . '%');
                });
            }
        }

        $q->where('gml_id', '=', $search['id']);
        $q->where('is_approved', '=', 1);
        $q->where('is_approved2', '=', 1);
        $q->where('is_approved3', '=', 1);

        $data   =   $q->orderBy('id', 'desc')->paginate(10);

        return $data;
    }

    public function getMainGmlTitle($id){
        $data  =   DB::table('gml')->where('id', '=', $id)->get();
        return $data[0];
    }


    public function getSubGml($id){
        $q  =   DB::table('sub_gml');
        $q->where('gml_id', '=', $id);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function addRecord($data){
        DB::table('gml')->insert([
            'title' => $data['title'],
            'description' => $data['desc'],
            'is_approved' => 0,
            'is_approved2' => 0,
            'is_approved3' => 0
        ]);
    }

    public function searchGml($data){

        $type   =   $data['type'];

        if(trim($type) == 'title'){
            $result = DB::table('gml')->where('title', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();
        }elseif (trim($type) == 'desc')
        {
            $result = DB::table('gml')->where('description', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();
        }else{
            $result = DB::table('gml')
                ->where('title', 'like', '%'.$data['search'].'%')
                ->orWhere('description', 'like', '%'.$data['search'].'%')
                ->orderBy('id', 'desc')
                ->get();
        }
        return $result;
    }

    public function searchSubGml($data){

        $type   =   $data['type'];

        if(trim($type) == 'title'){
            $result = DB::table('sub_gml')->where('gml_id', '=', $data['gml_id'])->where('title', 'like', '%'.$data['search'].'%')->where('is_approved', '=', 1)->orderBy('id', 'desc')->get();
        }elseif (trim($type) == 'desc')
        {
            $result = DB::table('sub_gml')->where('gml_id', '=', $data['gml_id'])->where('description', 'like', '%'.$data['search'].'%')->where('is_approved', '=', 1)->orderBy('id', 'desc')->get();
        }else{
            $result = DB::table('sub_gml')
                ->where('gml_id', '=', $data['gml_id'])
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
        $data = DB::table('gml')->where('id', '=', $id)->get();

        return $data;
    }

    public function getSubRecord($id){
    $data = DB::table('sub_gml')->where('id', '=', $id)->get();

    return $data;
}

    /*****Edited by iqbal************/
    public function updateRecord($data){
        DB::table('gml')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'] , 'description'=>$data['desc'], 'is_approved' =>0, 'is_approved2' =>0, 'is_approved3' =>0]);
    }


    public function checkGmlIsUsed($id){
        $count  =   DB::table('sub_gml')->where('gml_id','=',$id)->count();
        return $count;
    }

    public function removeRec($id)
    {
        DB::table('gml')->where('id', '=', $id)->delete();
    }


    public function addSubRecord($data){
        DB::table('sub_gml')->insertGetId([
            'gml_id' => $data['gmlId'],
            'title' => $data['title'],
            'description' => $data['desc'],
            'is_approved'=>'0',
            'is_approved2'=>'0',
            'is_approved3'=>'0'
        ]);
    }

    public function checkSubGmlIsUsed($id){
        $count  =   DB::table('boq')->where('sub_gml_id','=',$id)->count();
        return $count;
    }

    public function updateSubRecord($data){
        DB::table('sub_gml')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'] , 'description'=>$data['desc'],'is_approved' =>0, 'is_approved2' =>0, 'is_approved3' =>0]);
    }


    public function removeSubGml($id)
    {
        DB::table('sub_gml')->where('id', '=', $id)->delete();
        DB::table('supplier_materials')->where('submaterila_id', '=', $id)->delete();
    }

    public function getPendingSub(){
        $q =   DB::table('sub_gml');
        $q->join('gml','gml.id','sub_gml.gml_id');
        $q->select('gml.title as gml_title','sub_gml.*');
        $q->where('sub_gml.is_approved', '=', 0);
        $q->orwhere('sub_gml.is_approved2', '=', 0);
        $q->orwhere('sub_gml.is_approved3', '=', 0);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getPendingGml(){
        $q =   DB::table('gml');
        $q->where('gml.is_approved', '=', 0);
        $q->orwhere('gml.is_approved2', '=', 0);
        $q->orwhere('gml.is_approved3', '=', 0);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }
    public function approvePending($id,$approve_type){
        $q  =   DB::table('sub_gml');
        $q ->where('id', $id);
        if($approve_type == 1)
            $q->update(['is_approved' =>1]);
        elseif($approve_type == 2)
            $q->update(['is_approved2' =>1]);
        elseif($approve_type == 3)
            $q->update(['is_approved3' =>1]);

        return;
    }
    public function approveGmlPending($id,$approve_type){
        $q  =   DB::table('gml');
        $q ->where('id', $id);
        if($approve_type == 1)
            $q->update(['is_approved' =>1]);
        elseif($approve_type == 2)
            $q->update(['is_approved2' =>1]);
        elseif($approve_type == 3)
            $q->update(['is_approved3' =>1]);

        return;
    }

    /*********************iqbal***********************************/
    //Remove GML From database
    public function deleteGML($id){
        DB::table('gml')->where('id',$id)->delete();
    }

    //Remove subGML from database
    public function deleteSubGML($id){
        DB::table('sub_gml')->where('id',$id)->delete();
    }
}

