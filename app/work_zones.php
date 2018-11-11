<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class work_zones extends Model
{
    public function fetchAll($search = [],$paginate =   0 ,$user_id = 0){

        $q  =   DB::table('work_zone');
        $q->whereNotIn('id', function ($query) use ($user_id) {
            $query->select('work_zone_id')->from('work_zone_rules')->where('user_id', $user_id);
        });

        if(isset($search['value']) && trim($search['value']) != '')
        {
            $q->where('title', 'like', '%' . $search['value'] . '%');
        }

        if($paginate    == 0){
            $data   =   $q->orderBy('id', 'desc')->paginate(10);
        }else{
            $data   =   $q->orderBy('id', 'desc')->get();
        }
        return $data;
    }

    public function getAllWorkzones(){
        $q      =   DB::table('work_zone');
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getSub($id,$search = [],$paginate =   0){

        $q   =   DB::table('sub_work_zone');
        $q->where('work_zone_id', '=', $id);

        if(isset($search['value']) && trim($search['value']) != '')
        {
            $q->where('title', 'like', '%' . $search['value'] . '%');
        }


        if($paginate    == 1){
            $data   =   $q->orderBy('id', 'desc')->paginate(10);
        }else{
            $data   =   $q->orderBy('id', 'desc')->get();
        }

        return $data;
    }

    public function getRecord($id){
        $data = DB::table('work_zone')->where('id', '=', $id)->get();

        return $data;
    }

    public function addRecord($data){
        DB::table('work_zone')->insert(
            [
                'title' => $data['title'],
                'location' => $data['location']
            ]
        );
        return;
    }

    public function updateRecord($data){
        DB::table('work_zone')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'],'location' => $data['location']]);
        return;
    }

    public function addSubRecord($data){
        $id =   DB::table('sub_work_zone')->insertGetId(
            ['work_zone_id' => $data['workzoneId'],'title' => $data['title']]
        );
        return $id;
    }

    public function updateSubRecord($data){
        DB::table('sub_work_zone')
            ->where('id', $data['id'])
            ->update(['title' => $data['title']]);
    }

    public function getSubRecord($id){
        $data = DB::table('sub_work_zone')->where('id', '=', $id)->get();

        return $data;
    }

    public function workzoneSearch($data){
        $result = DB::table('work_zone')->where('title', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();

        return $result;
    }

    public function serachSubZone($data){
        $result = DB::table('sub_work_zone')->where('work_zone_id', '=', $data['workzoneId'])->where('title', 'like', '%'.$data['search'].'%')->orderBy('id', 'desc')->get();

        return $result;
    }



    public function checkWorkZoneIsUsed($id){
        $count  =   DB::table('sub_work_zone')->where('work_zone_id','=',$id)->count();
        return $count;
    }

    public function removeRec($id)
    {
        DB::table('work_zone')->where('id', '=', $id)->delete();
    }


    public function checkSubWorkZoneIsUsed($id){
        $count1  =   DB::table('boq')->where('sub_work_zone_id','=',$id)->count();
        $count2  =   DB::table('scr')->where('sub_work_zone_id','=',$id)->count();
        $count  =   intval($count1) + intval($count2);
        return $count;
    }


    public function removeSubWorkZone($id)
    {
        DB::table('sub_work_zone')->where('id', '=', $id)->delete();
    }
}
