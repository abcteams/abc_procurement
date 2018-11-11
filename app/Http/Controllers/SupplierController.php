<?php

namespace App\Http\Controllers;

use App\gml;
use App\important\checkAuth;
use App\important\checkMenu;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    private $checkAuth;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu         =   new checkMenu();
    }

    public function materials(){
        if(Auth::user()->user_type == 2)
        {
            $menuData   =   $this->menu->Menu('mymaterial','showMi');
            if(Auth::user()->is_approved){
                $supplier_id    =   Auth::user()->id;
                $supplier       =   new Supplier();
                $getSubGmal     =   $supplier->getSubGmlItems($supplier_id);

                return view('Supplier/materials')->with('menu', $menuData)->with('data', $getSubGmal);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        }else {
            die('you dont have auth call the admin');
        }
    }

    public function addmaterial(Request $request){
        $menuData = $this->menu->Menu('mymaterial', 'addMi');
        if(isset($request->id))
        {
            $authClass            = new checkAuth();
            $authSupplier        =   $authClass->checkSupplier();

            if($authSupplier->can_show)
            {
                $gml = new gml();
                $data = $gml->allMaterials();

                return view('Supplier/addmaterials')->with('menu', $menuData)->with('gml', $data)->with('id',$request->id);
            }
            else{
                die('you dont have auth call the admin');
            }
        }else{
            if(Auth::user()->user_type == 2)
            {
                if(Auth::user()->is_approved) {
                    $gml = new gml();
                    $data = $gml->allMaterials();

                    return view('Supplier/addmaterials')->with('menu', $menuData)->with('gml', $data);
                }else{
                    return view('Users/notapprove')->with('menu', $menuData);
                }
            }else {
                die('you dont have auth call the admin');
            }
        }
    }

    public function getsubgmlitems(Request $request)
    {
        if(isset($request->user_id) & $request->user_id > 0)
            $supplier_id    =   $request->user_id;
        else
            $supplier_id    =   auth()->user()->id;

        $gml_id =   intval($request->gml_id);
        if($gml_id > 0){
            $supplier    =   new Supplier();
            $data   =   $supplier->getSupplierMaterials($gml_id ,$supplier_id );

            die(json_encode($data));
        }else{
            die(0);
        }
    }

    public function addmaterialrec(Request $request){
        $this->validate($request, [
            'sub_gml' => 'required|not_in:0',
        ]);

        $data['sub_gml_id']     =   $request->sub_gml;
        $data['supplier_id']    =   Auth::user()->id;

        $supplier   =   new Supplier();
        $result     =   $supplier->addMateriall($data);

        $menuData   =   $this->menu->Menu('mymaterial','addMi');

        return redirect()->action('SupplierController@materials');
    }

    public function removeMaterial(Request $request){
        if(Auth::user()->user_type == 2)
        {
            if(intval($request->id) > 0){
                $data['sub_gml_id']     = $request->id;
                $data['supplier_id']    = Auth::user()->id;
                $supplier   =   new Supplier();
                $res        =   $supplier->removeMaterial($data);
                die();
            }else{
                die();
            }
        }else {
            die('you dont have auth call the admin');
        }
    }



    public function pendinginquiry(){
        if(Auth::user()->user_type == 2)
        {
            $menuData   =   $this->menu->Menu('MTinquiry','pendingInq');
            if(Auth::user()->is_approved) {
                $supplier       =   new Supplier();
                $supplier_id    =   Auth::user()->id;
                $data           =   $supplier->getPendingInquiry($supplier_id);
                return view('Supplier/pendingInq')->with('data',$data)->with('menu',$menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        }
        else{
            die('you dont have auth call the admin');
        }
    }

    public function pendingAgreement(){
        if(Auth::user()->user_type == 2)
        {
            $menuData   =   $this->menu->Menu('agreement','pendingAgreement');
            if(Auth::user()->is_approved && Auth::user()->is_approved2) {
                $supplier       =   new Supplier();
                $supplier_id    =   Auth::user()->id;
                $data           =   $supplier->getPendingAgreement($supplier_id);
                return view('Supplier/pendingAgreement')->with('data',$data)->with('menu',$menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        }else{
            die('you dont have auth call the admin');
        }
    }


    public function proposal(Request $request){
        if(Auth::user()->user_type == 2)
        {
            $menuData   =   $this->menu->Menu('MTinquiry','pendingInq');
            if(Auth::user()->is_approved) {
                $id         =   $request->id;
                $supplier   =   new Supplier();
                $data       =   $supplier->getInquiryDetails($id);
                return view('Supplier/proposal')->with('data',$data)->with('menu',$menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        }else {
            die('you dont have auth call the admin');
        }
    }

    public function decline(Request $request){
        if(Auth::user()->user_type == 2)
        {
            $menuData   =   $this->menu->Menu('MTinquiry','pendingInq');
            return view('Supplier/decline')->with('id',$request->id)->with('menu',$menuData);
        }
    }

    public function showDecline(Request $request)
    {
        $supplier   =   new Supplier();
        $data    =   $supplier->getDeclines($request->id);

        $menuData   =   $this->menu->Menu('MTinquiry','pendingInq');
        return view('Supplier/showDecline')->with('data', $data)->with('menu', $menuData);
    }

    public function declinereplay(Request $request){

        $supplier   =   new Supplier();
        $data    =   $supplier->getDeclinReplays($request->id);
        $menuData   =   $this->menu->Menu('materialInq','showMtinq');
        return view('Supplier.replayDecline')->with('menu', $menuData)->with('id', $request->id)->with('data',$data);
    }

    public function addDecline(Request $request){
        if(Auth::user()->user_type == 2)
        {
            $this->validate($request, [
                'id'    => 'required',
                'decline'   => 'required'
            ]);

            $data['id']           =   $request->id;
            $data['decline']      =   $request->decline;
            $data['supplier_id']  =   Auth::user()->id;

            $supplier=   new Supplier();
            $supplier->addDecline($data);

            return redirect()->action('SupplierController@pendinginquiry');
        }
    }

    public function addProposal(Request $request){
        $this->validate($request, [
            'proposal'          => 'required'
        ]);

        if(Auth::user()->user_type == 2) {

            $maindata['supplier_id']        =   Auth::user()->id;
            $maindata['proposal']           =   $request->proposal;
            $maindata['material_inquiry']   =   $request->material_inquiry[0];
            $maindata['boq']                =   $request->boq[0];

            $subData    =   array();
            foreach ($request->id as $k =>$val)
            {
                $subData[$k]['sub_materials_id']    =  $val;
                $subData[$k]['price']               =  $request->price[$k];
                $subData[$k]['model_number']        =  $request->model_number[$k];
                $subData[$k]['description']         =  $request->description[$k];
            }

            $supplier   = new Supplier();
            $supplier->addProposal($maindata,$subData);

            return redirect()->action('SupplierController@pendinginquiry');
        }
    }

    public function accepetAgreement(Request $request){
        if(Auth::user()->user_type == 2) {
            $supplier   = new Supplier();
            $supplier->supplierAcceptAgreement($request->id);
        }
        return Redirect::back();
    }


    public function sentProposals(){
        if(Auth::user()->user_type == 2) {
            $supplier   = new Supplier();
            $data       =   $supplier->getSentProposals(Auth::user()->id);
            $menuData   =   $this->menu->Menu('MTinquiry','sentProposals');

            return view('Supplier/sentProposals')->with('data',$data)->with('menu',$menuData);
        }
        return Redirect::back();

    }

    public function myProposalDetails(Request $request){
        if(Auth::user()->user_type == 2) {
            $supplier   = new Supplier();
            $data       =   $supplier->getProposalDetails(Auth::user()->id,$request->id);
            $menuData   =   $this->menu->Menu('MTinquiry','sentProposals');

            return view('Supplier/supplierSort')->with('menu',$menuData)->with('data',$data);
        }
        return Redirect::back();
    }
    public function lop(){
        if(Auth::user()->user_type == 2) {
            $menuData   =   $this->menu->Menu('MTinquiry','sentProposals');
            return view('Supplier/lop')->with('menu',$menuData);
        }
    }
    public function supplierMaterialList(Request $request){

        if(isset($request->user_id) && $request->user_id > 0)
            $data['supplier_id']    =   $request->user_id;
        else
            $data['supplier_id']    =   auth()->user()->id;

        $supplier   = new Supplier();
        $data['sub_gml_id']     =   $request->id;

        if ($request->checked == 'true') {
            $supplier->addMateriall($data);
        }else{
            $supplier->removeMaterial($data);
        }
    }


    public function ccEmails(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if(Auth::user()->id == $request->id)
        {
            $menuData = $this->menu->Menu('home', '');
            $user = new User();
            $data = $user->getCCEmails($request->id);

            return view('Users.ccemails')->with('menu', $menuData)->with('data', $data);
        }else{
            echo 'You Cant inter to this page ';
        }
        die();
    }



}
