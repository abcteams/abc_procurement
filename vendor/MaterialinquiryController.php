<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\MaterialInquiry;
use App\Supplier;
use App\User;
use App\work_zones;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MaterialinquiryController extends Controller
{
    private $menu;
    private $checkAuth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->menu         =   new checkMenu();
        $this->checkAuth    =   new checkAuth();
    }
    public function show()
    {
        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        $menuData   =   $this->menu->Menu('materialInq','showMtinq');
        if($authMTinq->can_show)
        {
            $MTinquiry      =       new MaterialInquiry();
            $data           =       $MTinquiry->getRecords();
            return view('MTInquiry.show')->with('menu', $menuData)->with('data',$data);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function closed(Request $request)
    {

        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        $menuData   =   $this->menu->Menu('materialInq','closeMtinq');
        if($authMTinq->can_show)
        {

            $search['workzone']      =   $request->workzone;
            $search['subzone']      =   $request->subzone;
            $search['from_date']      =   $request->from_date;
            $search['to_date']      =   $request->to_date;
            $search['search']       =   $request->search;

            $workzones      =   new work_zones();
            $workzone       =   $workzones->fetchAll();
            $subzones  = array();
            if($search['workzone'] > 0){
                $subzones   =   $workzones->getSub($search['workzone']);
            }

            $MTinquiry      =       new MaterialInquiry();
            $data           =       $MTinquiry->getClosedInquiry($search);
            return view('MTInquiry.closed')->with('menu', $menuData)->with('data',$data)->with('workzone',$workzone)->with('subzones',$subzones);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function add(Request $request){
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');
        if($authMTInquiry->can_edit) {
                return view('MTInquiry.add')->with('menu', $menuData)->with('boq_id',$request->id);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }



    public function addmtinquiry(Request $request){
        $menuData   =   $this->menu->Menu('workzone','materialInq');
        $this->validate($request, [
            'date'             => 'required|date|date_format:Y-m-d|after:yesterday',
            'closeDate'        => 'required|date|date_format:Y-m-d|after:date'
        ]);

        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        if($authMTinq->can_edit) {
            $data   =   array();
            $data['boq_id']         =   intval($request->boq_id);
            $data['date']           =   date($request->date);
            $data['close_date']     =   date($request->closeDate);
            $data['description']    =   $request->description;


            $MTinquiry    =   new MaterialInquiry();
            $MTinquiry->addRecord($data);

            return redirect('boq/showsubboq/'.$request->boq_id)->with('menu', $menuData);

        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function pending(){
        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        $menuData   =   $this->menu->Menu('materialInq','pendingMtinq');
        if($authMTinq->can_approve)
        {
            $MTinquiry      =       new MaterialInquiry();
            $data           =       $MTinquiry->getPendingInquiry();
            return view('MTInquiry.pending')->with('menu', $menuData)->with('data',$data);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function approve(Request $request){
        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        if($authMTinq->can_approve)
        {
            $id         =   $request->id;
            $supplier   =   new Supplier();
            $data       =   $supplier->getInquiryDetails($id);
            if(count($data) > 0)
            {
                $subgml_id  =   $data[0]->subgml;
                $suppliers  =   $supplier->getSuppliersByMaterial($subgml_id);

                $MTinquiry  =   new MaterialInquiry();
                $sentEmails     =   array();
                if(count($suppliers) > 0)
                {
                    foreach ($suppliers as  $k => $supplier)
                    {
                        $hashids    =   new Hashids();
                        $name       =   $supplier->name;
                        $email      =   $supplier->email;
                        $link       =   asset('forms/supplierForm/'.$hashids->encode($id).'/'.$hashids->encode($supplier->supplier_id));
                        $data       =   array('name'=>$supplier->name,'body'=>'this is your email for Procurement '.$link);
                        Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name){
                            $message->to($email , $name)
                                ->subject('this email just for test');
                            $message->from('procurement@abc-gcc.com' , 'procurement');
                        });
                    }
                }else{
                    die('this is no supplier for this Material');
                }
            }
            $MTinquiry->approveInquiry($request->id);
            return Redirect::back()->with('message','Operation Successful !');
            return back();
            die('xxxxxxxx');

        }
        else{
            redirect(asset('home'));
        }
    }

    public function suplierProposal(Request $request)
    {
        $authMTinq = $this->checkAuth->checkMTInquiry();
        $menuData = $this->menu->Menu('materialInq', 'showMtinq');
        if ($authMTinq->can_show) {
            $id   =   $request->id;
            $MTinquiry = new MaterialInquiry();
            $data = $MTinquiry->getSupplierProposals($id);

            return view('MTInquiry.suppliersProposal')->with('menu', $menuData)->with('data', $data);
        } else {
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function proposalDetails(Request $request)
    {
        $menuData = $this->menu->Menu('materialInq', 'showMtinq');
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            if(intval($request->id) > 0){
                $proposalDetails   =   $materialsInq->proposalDetails($request->id);
                return view('MTInquiry.proposalDetails')->with('menu', $menuData)->with('data', $proposalDetails);
            }
        }
        return Redirect::back();

    }
    public function considerItem(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            if(intval($request->id) > 0){
                $considerItem   =   $materialsInq->considerItem($request->id);
            }
        }
        return Redirect::back();
    }

    public function consideredItems(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        $menuData = $this->menu->Menu('materialInq', 'showMtinq');
        if ($authMTinq->can_show) {
            $id   =   $request->id;
            $MTinquiry = new MaterialInquiry();
            $data = $MTinquiry->getConsideredItems($id);

            return view('MTInquiry.consideredSuppliers')->with('menu', $menuData)->with('data', $data);
        } else {
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function approveProposal(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            if(intval($request->id) > 0){
                $considerItem   =   $materialsInq->approveProposal($request->id);
            }
        }
        return redirect()->action('MaterialinquiryController@closed');
    }


    public function showAccepted(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        $menuData = $this->menu->Menu('materialInq', 'closeMtinq');
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            $data    =   $materialsInq->getAcceptedProposal($request->id);
            return view('MTInquiry.showAccepted')->with('menu', $menuData)->with('data', $data);
        }
        return redirect()->action('MaterialinquiryController@closed');
    }





    public function createAgreement(Request $request){
        $id =   $request->id;
        $authMTinq = $this->checkAuth->checkMTInquiry();
        $menuData = $this->menu->Menu('materialInq', 'closeMtinq');
        if ($authMTinq->can_edit) {
            return view('MTInquiry.createAgreement')->with('menu', $menuData)->with('id', $id);
        }
        return Redirect::back();
    }


    /**
     * @param Request $request
     */
    public function approveAgreement(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_approve) {
            $materialsInq   =   new MaterialInquiry();
            $supplier_id    =   $materialsInq->approveAgreement($request->id);
            return Redirect::back();
        }
    }

    public function addAgreement(Request $request){

        $this->validate($request, [
            'proposal_id' => 'required|not_in:0',
            'quotation_ref' => 'required',
            'supplier_code' => 'required',
            'payment_terms' => 'required',
        ]);
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_edit) {
            $materialsInq   =   new MaterialInquiry();
            $supplier_id    =   $materialsInq->getSupplierId($request->proposal_id);

            $data['proposal_id']        =  $request->proposal_id ;
            $data['supplier_id']        =  $supplier_id[0]->supplier_id;
            $data['sub_gml_id']         =  $supplier_id[0]->sub_gml_id;
            $data['quotation_ref']      =  $request->quotation_ref;
            $data['supplier_code']      =  $request->supplier_code ;
            $data['payment_terms']      =  $request->payment_terms ;
            $data['submital_requisted'] =  $request->submital_requisted ;
            $data['copies_number']      =  $request->copies_number ;
            $data['all_materials']      =  isset($request->allMaterial)?'All Materials':'Some Materials';

            $agreement_id   =   $materialsInq->addAgreement($data);
            //print_r($agreement_id);die();
            $user   =   new User();
            $supplierDetails    =   $user->getSupplierOrSubContractorInfo($supplier_id[0]->supplier_id);

            if(count($agreement_id) > 0)
            {
                $hashids    =   new Hashids();
                $link       =   asset('forms/supplierAgreement/'.$hashids->encode($agreement_id));
                $name       =   'ahmad';
                $email      =   $supplierDetails[0]->email;
                $data       =   array('name'=>'supplier','body'=>'this is your email for Procurement '.$link);
                Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name){
                    $message->to($email , $name)
                        ->subject('this email just for test');
                    $message->from('procurement@abc-gcc.com' , 'procurement');
                });
            }


        }
        $menuData = $this->menu->Menu('materialInq', 'closeMtinq');
        return redirect()->action('MaterialinquiryController@closed');
    }

    public function showAgreement(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $menuData = $this->menu->Menu('materialInq', 'closeMtinq');
            $materialsInq   =   new MaterialInquiry();
            $data    =   $materialsInq->getAgreement($request->id);
            return view('MTInquiry.showAgreement')->with('menu', $menuData)->with('data', $data[0]);

        }
    }

    public function decline(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            $data    =   $materialsInq->getDeclines($request->id);

            $menuData   =   $this->menu->Menu('materialInq','showMtinq');
            return view('MTInquiry.showDecline')->with('menu', $menuData)->with('data', $data);
        }
        return Redirect::back();
    }

    public function getSubzones(Request $request){

        $workzones  =   new work_zones();
        $subzones   =   $workzones->getSub($request->workzone);

        die($subzones);
    }

}
