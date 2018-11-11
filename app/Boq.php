<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Boq extends Model
{
    public function fetchAll($search = null){
        $q = DB::table('boq');
        $q->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id');
        $q->join('gml', 'gml.id', '=', 'sub_gml.gml_id');
        $q->join('boq_status', 'boq.status', '=', 'boq_status.id');
        $q->select('boq.*','sub_gml.title', 'sub_gml.description','gml.title as gml_title','boq_status.status as status');
        $value  =   $search['value'];

        if(isset($search['type']))
        {
            if($search['type'] == 'title'){
                $q->where('gml.title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'sub_title'){
                $q->where('sub_gml.title','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'desc'){
                $q->where('sub_gml.description','like','%'.$search['value'].'%');
            }else{
                $q->Where(function($query )use ($value){
                    $query->where('gml.title','like','%'.$value.'%');
                    $query->orWhere('sub_gml.title','like','%'.$value.'%');
                    $query->orWhere('sub_gml.description','like','%'.$value.'%');
                });

            }
        }

        $q->where('boq.sub_work_zone_id', '=', $search['id']);
        $data   =   $q->orderBy('id', 'desc')->paginate(10);
        return $data;
    }

    public function addRecord($data){
        DB::table('boq')->insert(
            [
                'sub_work_zone_id'  => $data['sub_work_zone'],
                'work_zone_id'      => $data['work_zone'],
                'sub_gml_id'        => $data['sub_gml_id'],
                'status'            => '1'
            ]
        );
        return;
    }

    public function updateRecord($data){
        DB::table('boq')
            ->where('id', $data['id'])
            ->update(['sub_gml_id' => $data['sub_gml_id']]);
        return;
    }

    public function readyToInquire($id){
        DB::table('boq')
            ->where('id', $id)
            ->update(['status' => 2]);
        /*status 2 mean ready to inquire*/
        return;
    }

    public function showsubboq($id ,$value = ''){
        $q   =   DB::table('boq_sub_materials');
        $q->join('boq', 'boq.id', '=', 'boq_sub_materials.boq_id');
        $q->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id');
        $q->join('gml', 'sub_gml.gml_id', '=', 'gml.id');

        if(trim($value) != '')
        {
            $q->where('boq_sub_materials.description','like','%'.$value.'%');
        }
        $q->select('boq_sub_materials.*','boq.inquiry_is_created','boq.status','sub_gml.title as sub_gml', 'gml.title as gml_title');
        $q->where('boq_id', '=', $id);
        $data=$q->orderBy('id', 'desc')->paginate(10);

        return $data;
    }

    public function addsubRecord($data){
        $id =   DB::table('boq_sub_materials')->insertGetId(
            ['boq_id'           => $data['boq_id'],
             'quantity'         => $data['quantity'],
             'quantity_unit'    => $data['quantity_unit'],
             'budgetory_price'  => $data['budgetory_price'],
             'size'             => $data['size'],
             'size_unit'        => $data['size_unit'],
             'description' => $data['description'],
              ]
        );
        return $id;
    }


    public function updateSubRecord($data){
        DB::table('boq_sub_materials')
            ->where('id', $data['id'])
            ->update([
                'quantity'          => $data['quantity'],
                'quantity_unit'     => $data['quantity_unit'],
                'budgetory_price'   => $data['budgetory_price'],
                'size'              => $data['size'],
                'size_unit'         => $data['size_unit'],
                'description'       => $data['description']
                ]);
        return $data['id'];
    }

    public function getSubBoqRecord($id){
        $data   =   DB::table('boq_sub_materials')
            ->where('id', '=', $id)->get();
        return $data;
    }

    public function removeSubBoq($id)
    {
        DB::table('boq_sub_materials')->where('id', '=', $id)->delete();
    }
    public function removeBoq($id)
    {
        DB::table('boq_sub_materials')->where('boq_id', '=', $id)->delete();
        DB::table('material_inquiry')->where('boq_id', '=', $id)->delete();
        DB::table('supplier_proposal')->where('boq_id', '=', $id)->delete();
        DB::table('boq')->where('id', '=', $id)->delete();
    }

    public function checkInqIsCreated($id){
        $data   =   DB::table('boq')->where('id', '=', $id)->select('inquiry_is_created')->get();
        return $data[0]->inquiry_is_created;
    }

    public function getsubZone($id){
        $data   =   DB::table('sub_work_zone')->where('id', '=', $id)->first();
        return $data;
    }

    public function getBoq($id){
        $data   =   DB::table('boq')
            ->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id')
            ->select('boq.*','sub_gml.title as title')
            ->where('boq.id', '=', $id)->get();
        return $data[0];
    }

    public function addAccessories($data){
        foreach ($data as $k => $val)
        {
            DB::table('boq_accessories')->insert(
                [
                    'sub_boq_id'    => $val['sub_boq_id'],
                    'description'   => $val['description'],
                    'quantity'      => $val['quantity'],
                    'model'         => $val['model'],
                ]
            );
        }
        return;
    }

    public function getAccessories($id){
        $data   =   DB::table('boq_accessories')
            ->where('sub_boq_id', '=', $id)->get();
        return $data;
    }

    public function updaateBoqStatus($id , $status = 1 ){
        DB::table('boq')
            ->where('id', $id)
            ->update(['status' => $status]);
        return;
    }

    public function removeAccessorie($id){
        DB::table('boq_accessories')->where('id', '=', $id)->delete();
    }

    public function getFullBoq($id){
        $materials   =  DB::table('boq_sub_materials')->where('boq_id', '=', $id)->get();
        $data   =   array();
        foreach ($materials as $k => $val)
        {
            $val->acc   = DB::table('boq_accessories')->where('sub_boq_id', '=', $val->id)->get();
            $data[$k]   =   $val;

        }
        return $data;

    }

    public function addmodelAndRateForMaterials($data)
    {
        foreach ($data as $k => $val)
        {
            DB::table('boq_sub_materials')->where('id', $val['id'])->update(['model' => $val['model'],'rate' => $val['rate']]);
        }
        return;
    }

    public function addmodelAndRateForAcc($data)
    {
        foreach ($data as $k => $val)
        {
            DB::table('boq_accessories')->where('id', $val['id'])->update(['model' => $val['model'],'rate' => $val['rate']]);
        }
        return;
    }

    public function getMaterialsByWorkzone($id)
    {
        $q = DB::table('boq');
        $q->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id');
        $q->join('gml', 'gml.id', '=', 'sub_gml.gml_id');
        $q->join('work_zone', 'boq.work_zone_id', '=', 'work_zone.id');
        $q->select('boq.sub_gml_id','sub_gml.title','sub_gml.id','gml.title as gml','work_zone.title as work_zone');
        $q->where('boq.work_zone_id', '=', $id);
        $q->where('boq.status', '=', 2);
        $q->distinct('boq.sub_gml_id');
        $data   =   $q->get();
        return $data;
    }

    public function readytoinquirylist($data)
    {
        $q = DB::table('boq');
        $q->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id');
        $q->join('gml', 'gml.id', '=', 'sub_gml.gml_id');
        $q->join('sub_work_zone', 'boq.sub_work_zone_id', '=', 'sub_work_zone.id');
        $q->join('boq_sub_materials', 'boq.id', '=', 'boq_sub_materials.boq_id');
        $q->select('boq.*','sub_gml.title','gml.title as gml','sub_work_zone.title as sub_work_zone','boq_sub_materials.*');
        $q->where('boq.work_zone_id', '=', $data['work_zone_id']);
        $q->where('boq.sub_gml_id', '=', $data['sub_gml_id']);
        $q->where('boq.status', '=', 2);
        $data   =   $q->orderBy('boq.sub_work_zone_id', 'asc')->get();

        foreach ($data as $k =>$val)
        {
            $q = DB::table('boq_accessories');
            $q->where('boq_accessories.sub_boq_id', '=',$val->id);
            $data[$k]->acc    =   $q->get();
        }

        return $data;
    }


    public function margeboqs($data , $work_zone,$subgmal){
        DB::table('material_inquiry_materials')
            ->where('sub_gml_id', '=', $subgmal)
            ->where('work_zone_id', '=', $work_zone)
            ->where('status', '=', 2)
            ->delete();

        foreach ($data as $k => $val)
        {
            DB::table('material_inquiry_materials')->insert(
                [
                    'work_zone_id'      => $val->work_zone_id,
                    'sub_gml_id'        => $val->sub_gml_id,
                    'description'       => $val->description,
                    'quantity'          => $val->quantity,
                    'quantity_unit'     => $val->quantity_unit,
                    'size'              => $val->size,
                    'size_unit'         => $val->size_unit,
                    'budgetory_price'   => $val->budgetory_price,
                    'status'            => $val->status
                ]
            );
            if(count($val->acc))
            {
                foreach ($val->acc as $k2 => $val2)
                {
                    DB::table('material_inquiry_materials')->insert(
                        [
                            'work_zone_id'      => $val->work_zone_id,
                            'sub_gml_id'        => $val->sub_gml_id,
                            'description'       => $val2->description,
                            'quantity'          => $val2->quantity,
                            'quantity_unit'     => '',
                            'size'              => 0,
                            'size_unit'         => '',
                            'budgetory_price'   => 0,
                            'status'            => $val->status
                        ]
                    );
                }
            }
        }

        return;
    }

    public function getMaterialInquiryItems($data , $status = 2)
    {
        $q = DB::table('material_inquiry_materials');
        $q->join('work_zone', 'material_inquiry_materials.work_zone_id', '=', 'work_zone.id');
        $q->join('sub_gml', 'material_inquiry_materials.sub_gml_id', '=', 'sub_gml.id');
        $q->select('material_inquiry_materials.*','work_zone.title as work_zone','sub_gml.title as sub_gml');
        $q->where('sub_gml_id', '=', $data['sub_gml_id']);
        $q->where('work_zone_id', '=', $data['work_zone_id']);
        $q->where('status', '=', $status);
        $data   =   $q->get();

        return $data;
    }

    public function getMaterialSuppliers($id){
        $records = DB::table('material_inquiry_suppliers')
        ->where('material_inquiry_id', '=', $id)
        ->get();
        $suppliers  =   json_decode($records[0]->suppliers_list);
        foreach ($suppliers as $k =>$val)
        {
            $data[$k]   =   DB::table('users')
                ->join('users_details', 'users_details.user_id', '=', 'users.id')
                ->select('users.id as supplier_id','users.name','users.email','users_details.company_name','users_details.phone_number','users_details.address')
                ->where('users.id', '=', $val)
                ->get()->first() ;
        }

        return $data;
    }

    public function margematerialsbykey($data)
    {
        $error              =   0;
        $newData            =   array();
        $totalqunatity      =   0;
        $totalbudgetory     =   0;

        $records = DB::table('material_inquiry_materials')
            ->whereIn('id', $data)->get();


        foreach ($records as $k => $val)
        {
            if($k == 0)
            {
                $newData            =   $val;
                $totalqunatity    += $val->quantity;
                $totalbudgetory   += $val->budgetory_price;
            }else{
                if($newData->size == $val->size && $newData->size_unit == $val->size_unit && $newData->quantity_unit == $val->quantity_unit ){
                    $totalqunatity    += $val->quantity;
                    $totalbudgetory   += $val->budgetory_price;
                }else{
                    $error   =   1;
                    break;
                }
            }
        }

        if($error   ==  0)
        {
            DB::table('material_inquiry_materials')->whereIn('id', $data)->delete();

            DB::table('material_inquiry_materials')->insert(
                [
                    'work_zone_id'      => $newData->work_zone_id,
                    'sub_gml_id'        => $newData->sub_gml_id,
                    'description'       => $newData->description,
                    'quantity'          => $totalqunatity,
                    'quantity_unit'     => $newData->quantity_unit,
                    'size'              => $newData->size,
                    'size_unit'         => $newData->size_unit,
                    'budgetory_price'   => $totalbudgetory,
                    'status'            => '2'
                ]
            );
        }else{
            die('error');
        }
        return ;
    }



}
