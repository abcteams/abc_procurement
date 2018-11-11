<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Materialrequisuition extends Model
{
    public function addRequsisition($data){

        $delivery_date  =  $data['delivery_date'];
        $complete_date  =  $data['complete_date'];
        $boq_id  =  $data['boq_id'];
        $user_id  = auth()->user()->id;
        $id = DB::table('material_requisition')->insertGetId(
            [
                'boq_id'    => $boq_id,
                'delivery_date' => $delivery_date,
                'complete_date' => $complete_date,
                'site_in_charge' => $user_id,
                'order_date' => date("Y-m-d")
            ]
        );

        if(isset($data['materials'])) {

            foreach ($data['materials'] as $k => $val) {

                DB::table('requisition_materials')->insert(
                    [
                        'requisition_id' => $id,
                        'sub_material_id' => $val['sub_material_id'],
                        'quantity' => $val['quantity']
                    ]
                );
                DB::table('cart_items')
                    ->where('cart_items.id','=',$val['cart_id'])
                    ->update(['boq_id' => $boq_id,'req_id' => $id]);

            }
        }
        if(isset($data['accessories']))
        {
            foreach ($data['accessories'] as $k=>$val)
            {
                DB::table('requisition_accessory')->insertGetId(
                    [
                        'requisition_id'    => $id,
                        'accsessory_id'     => $val['accessory'],
                        'sub_material_id'   => $val['sub_material'],
                        'quantity'          => $val['quantity'],
                    ]
                );

                DB::table('cart_items')
                    ->where('cart_items.id','=',$data['cart_id'])
                    ->update(['boq_id' => $boq_id,'req_id' => $id]);
            }
        }
        return;
    }

    public function getPendingRequisitions($warehouse_approved = 0,$manager_approved = 0,$proc_approved = 0,$com_approved=0,$fin_approved=0,$supplier_approved=0,$is_awaiting = 0,$is_delivered = 0)
    {
        $data = DB::table('material_requisition')
            ->join('boq','boq.id','=','material_requisition.boq_id')
            ->join('work_zone','work_zone.id','=','boq.work_zone_id')
            ->join('sub_gml','sub_gml.id','=','boq.sub_gml_id')
            ->join('gml','gml.id','=','sub_gml.gml_id')
            ->join('users','users.id','=','material_requisition.site_in_charge')
            ->select(
                'material_requisition.delivery_date',
                'users.name as user_name',
                'material_requisition.order_date',
                'material_requisition.complete_date',
                'material_requisition.id as req_id',
                'work_zone.title as workzone',
                'gml.title as gml')
            ->where('material_requisition.warehouse_approved', '=', $warehouse_approved)
            ->where('material_requisition.manager_approved', '=', $manager_approved)
            ->where('material_requisition.proc_approved', '=', $proc_approved)
            ->where('material_requisition.com_approved', '=', $com_approved)
            ->where('material_requisition.fin_approved', '=', $fin_approved)
            ->where('material_requisition.supplier_approved', '=', $supplier_approved)
            ->where('material_requisition.is_awaiting', '=', $is_awaiting)
            ->where('material_requisition.is_delivered', '=', $is_delivered)
            ->get();

        return $data;
    }

    public function getCartITems($manager_approved = 0,$proc_approved = 0,$com_approved = 0,$fin_approved = 0,$supplier_approved = 0,$is_awaiting = 0,$is_delivered = 0){
        $user_id    =  auth()->id();
        $q  =   DB::table('material_requisition');
        $q->join('boq', 'material_requisition.boq_id', '=', 'boq.id');
        $q->join('sub_work_zone', 'boq.sub_work_zone_id', '=', 'sub_work_zone.id');
        $q->join('work_zone', 'sub_work_zone.work_zone_id', '=', 'work_zone.id');
        $q->join('sub_gml', 'boq.sub_gml_id', '=', 'sub_gml.id');
        $q->select(
            'material_requisition.*',
            'work_zone.title as workzone' ,
            'work_zone.id as workzone_id',
            'sub_gml.title as gml',
            'sub_gml.id as sub_gml_id'
        );

        $q->whereNotIn('work_zone.id', function ($query) use ($user_id) {
            $query->select('work_zone_id')->from('work_zone_rules')->where('user_id', $user_id);
        });

        $q->where('material_requisition.manager_approved', '=', $manager_approved);
        $q->where('material_requisition.proc_approved', '=', $proc_approved);
        $q->where('material_requisition.supplier_approved', '=', $com_approved);
        $q->where('material_requisition.com_approved', '=', $fin_approved);
        $q->where('material_requisition.supplier_approved', '=', $supplier_approved);
        $q->where('material_requisition.is_awaiting', '=', $is_awaiting);
        $q->where('material_requisition.is_delivered', '=', $is_delivered);
        $data   =   $q->get();

        return $data;
    }

    public function getSuppliuerFromProposal($boq_id){
        $data = DB::table('supplier_proposal')
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->leftjoin('users_details', 'users.id', '=', 'users_details.user_id')
            ->select('supplier_proposal.*', 'users.*', 'users_details.company_name')
            ->where('supplier_proposal.boq_id', '=', $boq_id)
            ->where('supplier_proposal.is_accepted', '=', 1)->get();
        return $data;
    }

    public function checkOut($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_checked_out' => 1]);
    }
    public function approvePending($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_approved' => 1]);
    }
    public function approveReqPending($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_approved_req' => 1]);
    }
    public function approveLpoPending($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_approved_lpo' => 1]);
    }


    public function getSupplierid($id)
    {
        $data =  DB::table('material_requisition')
            ->join('boq','material_requisition.boq_id','boq.id')
            ->leftjoin('supplier_proposal','supplier_proposal.material_inquiry_id','boq.mterial_inquiry_id')
            ->select('supplier_proposal.supplier_id')
            ->first();

        return $data;
    }
    public function getRequsuitionDetails($id){
        $data['main']   =   DB::table('material_requisition')
            ->join('boq','material_requisition.boq_id','boq.id')
            ->join('sub_work_zone','boq.sub_work_zone_id','sub_work_zone.id')
            ->join('work_zone','sub_work_zone.work_zone_id','work_zone.id')
            ->join('sub_gml','boq.sub_gml_id','sub_gml.id')
            ->leftjoin('supplier_proposal','supplier_proposal.material_inquiry_id','boq.mterial_inquiry_id')
            ->leftjoin('supplier_agreement','supplier_proposal.id','supplier_agreement.proposal_id')
            ->leftjoin('users','material_requisition.site_in_charge','users.id')
            ->leftjoin('users_general_info','users.id','users_general_info.user_id')
            ->select(
                'material_requisition.*',
                'material_requisition.id as req_id',
                'work_zone.title as workzone',
                'work_zone.location',
                'supplier_agreement.quotation_ref',
                'supplier_agreement.payment_terms',
                'users.name',
                'users_general_info.phone_number',
                'supplier_agreement.*',
                'sub_gml.title as sub_gml'
            )
            ->where('material_requisition.id', $id)
            ->get();

        $data['materials']   =   DB::table('requisition_materials')
            ->join('boq_sub_materials','requisition_materials.sub_material_id','boq_sub_materials.id')
            ->select('requisition_materials.quantity as orderQuantity','boq_sub_materials.*')
            ->where('requisition_materials.requisition_id', $id)
            ->get();

        $data['accessories']   =   DB::table('requisition_accessory')
            ->join('boq_accessories','requisition_accessory.accsessory_id','boq_accessories.id')
            ->select('requisition_accessory.quantity as orderQuantity','boq_accessories.*')
            ->where('requisition_accessory.requisition_id', $id)
            ->get();
        // echo '<pre>';
         // print_r($data);die();

        return $data;
    }

    public function getSupplierFromPropsal($mtinquiry_id){
        $data   =   DB::table('supplier_proposal')
            ->select('supplier_id')
            ->where('material_inquiry_id','=',$mtinquiry_id)->first();

        return $data;
    }

    public function getRequsuitionReports($boq_id){
        $data   =   DB::table('material_requisition')
            ->join('boq','boq.id','material_requisition.boq_id')
            ->join('sub_gml','boq.sub_gml_id', 'sub_gml.id')
            ->join('users','material_requisition.site_in_charge', 'users.id')
            ->select('material_requisition.*','sub_gml.title as subgml','users.name')
            ->where('material_requisition.boq_id', $boq_id)
            ->orderBy('id', 'desc')
            ->get();

        return $data;
    }

    public function removeRequisition($id){
        DB::table('material_requisition')->where('id', '=', $id)->delete();
        DB::table('requisition_materials')->where('requisition_id', '=', $id)->delete();
        DB::table('requisition_accessory')->where('requisition_id', '=', $id)->delete();
        return;
    }

    public function requisitionMoreDetails($data){
        DB::table('material_requisition')
            ->where('id', $data['id'])
            ->update([
                'freight'       => $data['freight'],
                'discount'      => $data['discount'],
                'proposal_id'   => $data['proposal_id'],
                'site_in_charge'=> $data['siteInCharge'],
                'job_no'        => $data['job_no'],
                'order_number'  => $data['order_number'],
                'is_approved'   =>1,
            ]);
        return;
    }

    public function getAgreementDts($id){
        $data   =   DB::table('material_requisition')
            ->join('supplier_proposal','supplier_proposal.boq_id','material_requisition.boq_id')
            ->join('supplier_agreement','supplier_agreement.proposal_id','supplier_proposal.id')
            ->select('supplier_agreement.*')
            ->where('supplier_proposal.is_accepted', '=', 1)
            ->where('material_requisition.id', '=', $id)->get();
        return $data;
    }

    public function getRequsuition($id){
        $data   =   DB::table('material_requisition')
            ->join('boq','material_requisition.boq_id','boq.id')
            ->join('sub_gml','boq.sub_gml_id','sub_gml.id')
            ->select('material_requisition.*','sub_gml.title')
            ->where('material_requisition.id', '=', $id)->get();
        return $data;
    }

    public function fetchAllReports($search){
        $q  =   DB::table('material_requisition');
        $q->join('boq','material_requisition.boq_id','boq.id');
        $q->join('sub_gml','boq.sub_gml_id','sub_gml.id');
        $q->join('sub_work_zone','boq.sub_work_zone_id','sub_work_zone.id');
        $q->join('work_zone','sub_work_zone.work_zone_id','work_zone.id');
        $q ->leftjoin('supplier_proposal','supplier_proposal.material_inquiry_id','boq.mterial_inquiry_id');
        $q->leftjoin('supplier_agreement','supplier_proposal.id','supplier_agreement.proposal_id');
        $q->leftjoin('users','supplier_agreement.supplier_id','users.id');
        $q->leftjoin('users_details','users.id','users_details.user_id');
        $q->where('supplier_proposal.is_accepted','=',1)
            ->select(
                'material_requisition.*',
                'work_zone.title as work_zone',
                'sub_gml.title as subgml',
                'sub_work_zone.title as sub_zone',
                'users.name',
                'users_details.company_name'
            );

        if(trim($search['supplier_id']) != '' && $search['supplier_id'] != 0){
            $q->where('users.id','=',$search['supplier_id']);
        }
        if(trim($search['workzone']) != '' && $search['workzone'] != 0){
            $q->where('work_zone.id','=',$search['workzone']);
        }
        if(trim($search['subzone']) != '' && $search['subzone'] != 0){
            $q->where('sub_work_zone.id','=',$search['subzone']);
        }
        if(isset($search['from_date']) && $search['from_date'] != ''){
            $q->where('material_requisition.order_date', '>=', $search['from_date']);
        }
        if(isset($search['to_date']) && $search['to_date'] != ''){
            $q->where('material_requisition.order_date', '<=', $search['to_date']);
        }

        if(trim($search['order_number']) != ''){
            $q->where('material_requisition.order_number','like','%'.$search['order_number'].'%');
        }

        $data   =   $q->orderBy('material_requisition.id', 'desc')->paginate(10);
        // echo '<pre>';
        // print_r($data);die();
        return $data;
    }

    public function addToCart($data){
        DB::table('cart_items')->insert(
            [
                'item_id'   => $data['id'],
                'item_type' => $data['type'],
                'user_id'   => $data['user'],
            ]
        );
        return;
    }

    public function updateCart($data){
        DB::table('cart_items')
            ->where('id','=',$data['id'])
            ->update(
                [
                    'item_qty'   => $data['item_qty']
                ]
            );
        return;
    }

    public function removeFromCart($id){
        DB::table('cart_items')->
        where('id','=',$id)
            ->delete();
        return;
    }

    public function showCartItems($user_id)
    {
        $q = DB::table('cart_items');
        $q->join('boq_sub_materials', 'cart_items.item_id', '=', 'boq_sub_materials.id');
        $q->where([['cart_items.item_type', '=', 1],['cart_items.req_id', '=', 0]]);
        $q->where('cart_items.user_id', '=', $user_id);
        $q->select('cart_items.item_type as item_type','cart_items.id as cart_id', 'boq_sub_materials.*');
        $q->orderBy('cart_items.id', 'desc');
        $data['materials'] = $q->get();

        $q = DB::table('cart_items');
        $q->join('boq_accessories', 'cart_items.item_id', '=', 'boq_accessories.id');
        $q->where([['cart_items.item_type', '=', 2],['cart_items.req_id', '=', 0]]);
        $q->where('cart_items.user_id', '=', $user_id);
        $q->select('cart_items.item_type as item_type','cart_items.id as cart_id','boq_accessories.*');
        $q->orderBy('cart_items.id', 'desc');
        $data['accessories'] = $q->get();

        return $data;
    }

    public function getMyOrders()
    {
        $user = auth()->id();
        $data = DB::table('material_requisition')
            ->where('material_requisition.site_in_charge','=',$user)
            ->join('boq','boq.id','material_requisition.boq_id')
            ->join('sub_gml','boq.sub_gml_id', 'sub_gml.id')
            ->select('material_requisition.*','sub_gml.title as subgml')
            ->orderBy('material_requisition.order_date','desc')
            ->get();
        return $data;
    }

    public function getOrderDetailsByReq($id)
    {
        $data['materials']= DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('requisition_materials','requisition_materials.requisition_id','=','material_requisition.id')
            ->join('boq_sub_materials','boq_sub_materials.boq_id','=','material_requisition.boq_id')
            ->select('requisition_materials.sub_material_id','requisition_materials.quantity as our_qty','material_requisition.*','boq_sub_materials.*')
            ->get();

        $data['accessories']= DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('requisition_accessory','requisition_accessory.requisition_id','=','material_requisition.id')
            ->select('requisition_accessory.sub_material_id','requisition_accessory.quantity as our_qty','material_requisition.*')
            ->get();

        return $data;
    }

    public function getRequisitionData($id)
    {
        $data   = DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('boq','boq.id','material_requisition.boq_id')
            ->join('sub_gml','boq.sub_gml_id', 'sub_gml.id')
            ->select('material_requisition.*','sub_gml.title as subgml')
            ->get();

        return $data;
    }

    public function getData($id)
    {
        $data['materials']= DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('users','users.id','=','material_requisition.site_in_charge')
            ->join('requisition_materials','requisition_materials.requisition_id','=','material_requisition.id')
            ->join('boq_sub_materials','boq_sub_materials.id','=','requisition_materials.sub_material_id')
            ->select(
                'requisition_materials.sub_material_id',
                'requisition_materials.id as mat_id',
                'requisition_materials.quantity as qty_required',
                'material_requisition.id as req_id',
                'material_requisition.*',
                'boq_sub_materials.*',
                'users.name')
            ->get();

        $data['accessories']= DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('users','users.id','=','material_requisition.site_in_charge')
            ->join('requisition_accessory','requisition_accessory.requisition_id','=','material_requisition.id')
            ->join('boq_accessories','boq_accessories.id','=','requisition_accessory.accsessory_id')
            ->select('requisition_accessory.accsessory_id as accessory_id','requisition_accessory.id as acc_id','requisition_accessory.quantity as qty_required','material_requisition.id as req_id','material_requisition.*','boq_accessories.*','users.name')
            ->get();

        return $data;
    }

    public function warehouseApprove($data)
    {
        $requisition_id  =  $data['req_id'];
        if(isset($data['materials'])) {

            foreach ($data['materials'] as $k => $val) {
                DB::table('boq_sub_materials')
                    ->where('id', $val['sub_material_id'])
                    ->update(['rest_quantity' =>  $val['store_quantity']]);
            }
        }

        if(isset($data['accessories'])) {
            foreach ($data['accessories'] as $k => $val) {
                DB::table('boq_accessories')
                    ->where('id', $val['accessory'])
                    ->update(['rest_quantity' => $val['store_quantity']]);
            }
        }

        DB::table('material_requisition')
            ->where('material_requisition.id','=',$requisition_id)
            ->update(['material_requisition.warehouse_approved'=>1]);
        return;
    }

    public function managerApprove($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['manager_approved'=>1]);

        DB::table('material_requisition')
            ->where('material_requisition.id','=',$id)
            ->join('requisition_materials','requisition_materials.requisition_id','=','material_requisition.id')
            ->join('boq_sub_materials','boq_sub_materials.id','=','requisition_materials.sub_material_id')
            ->select('boq_sub_materials.rest_quantity','requisition_materials.quantity')
            ->update(['boq_sub_materials.rest_quantity' =>  DB::raw('boq_sub_materials.rest_quantity - requisition_materials.quantity')]);
    }

    public function managerReject($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['manager_approved'=>2]);
    }

    public function procurementApprove($data){
        DB::table('material_requisition')
            ->where('id','=',$data['req_id'])
            ->update(['proc_approved'=>1,'freight'=>$data['freight'],'discount'=>$data['discount'],'job_no'=>$data['job_no'],'order_number'=>$data['order_no']]);
    }

    public function procurementReject($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['proc_approved'=>2]);
    }

    public function commercialApprove($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['com_approved'=>1]);
    }

    public function commercialReject($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['com_approved'=>2]);
    }

    public function financeApprove($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['fin_approved'=>1]);
    }

    public function financeReject($id){
        DB::table('material_requisition')
            ->where('id','=',$id)
            ->update(['fin_approved'=>2]);
    }

    public function supplier_approved($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['supplier_approved' => 1]);
    }

    public function markasDelivered($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_awaiting' => 1]);
    }

    public function markaspaid($id){
        DB::table('material_requisition')
            ->where('id', $id)
            ->update(['is_delivered' => 1]);
    }

}
