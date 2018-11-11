<?php

namespace App\Http\Controllers;

use App\Boq;
use App\important\checkAuth;
use App\important\checkMenu;
use App\MaterialInquiry;
use App\Scr;
use App\Supplier;
use App\User;
use App\Notifications\GetNotification;
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
            $search['workzone']     =   $request->workzone;
            $search['from_date']    =   $request->from_date;
            $search['to_date']      =   $request->to_date;
            $search['search']       =   $request->search;

            $workzones      =   new work_zones();
            $workzone       =   $workzones->getAllWorkzones();

            $MTinquiry      =       new MaterialInquiry();
            $data           =       $MTinquiry->getClosedInquiry($search);
            return view('MTInquiry.closed')->with('menu', $menuData)->with('data',$data)->with('workzone',$workzone);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function chooseMaterial(Request $request){
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');

        $boq        =   new Boq();
        $materials  =   $boq->getMaterialsByWorkzone($request->id);
        if($authMTInquiry->can_edit) {
            return view('MTInquiry.choosematerialtoinquiry')->with('menu', $menuData)->with('data',$materials   );
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    //****created by iqbal
    public function chooseSubContractorMaterialToInquiry(Request $request){
        $authSubComInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('subcont','subcontReq');

        $subContractor        =   new Scr();
        $materials  =   $subContractor->getSubScrMaterialByWorkZone($request->id);

        if($authSubComInquiry->can_edit) {
            return view('MTInquiry.chooseSubContractorMaterialToInquiry')->with('menu', $menuData)->with('data',$materials );
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function readytoinquirylist(Request $request)
    {
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');

        if($authMTInquiry->can_edit) {

            $data['sub_gml_id']     =   $request->id;
            $data['work_zone_id']   =   $request->work_zone_id;
            $boq   =   new Boq();
            $data  =   $boq->readytoinquirylist($data);
            
            return view('MTInquiry.readytoinquirylist')->with('menu', $menuData)->with('data',$data   );
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function margeboqs(Request $request){
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');

        if($authMTInquiry->can_edit) {

            $data['sub_gml_id']     =   $request->id;
            $data['work_zone_id']   =   $request->work_zone_id;
            $boq        =   new Boq();
            $data       =   $boq->readytoinquirylist($data);
            $newData    =   $boq->margeboqs($data ,$request->work_zone_id, $request->id );

            return redirect()->action(
                'MaterialinquiryController@margeItemsScreen', ['work_zone' => $request->work_zone_id,'id'=>$request->id]
            );
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }
    public function margeItemsScreen(Request $request)
    {
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');

        if($authMTInquiry->can_edit) {
            $data['sub_gml_id'] = $request->id;
            $data['work_zone_id'] = $request->work_zone_id;
            $boq = new Boq();
            $data = $boq->getMaterialInquiryItems($data);
            return view('MTInquiry.margeItemsScreen')->with('menu', $menuData)->with('data',$data);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }
    public function margeMaterialswithkey(Request $request){
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        if($authMTInquiry->can_edit) {
            $data = $request->data;
            $boq = new Boq();
            $data = $boq->margematerialsbykey($data);
        }
        return;
    }

    public function add(Request $request){
        $authMTInquiry  =   $this->checkAuth->checkMTInquiry();
        $menuData       =   $this->menu->Menu('workzone','materialInq');

        $keys['work_zone']  =   $request->work_zone_id;
        $keys['sub_gml']    =   $request->id;

        $supplier          =   new Supplier();
        $suppliers      =   $supplier->getSuppliersByMaterial($keys['sub_gml']);

        if($authMTInquiry->can_edit) {
                return view('MTInquiry.add')->with('menu', $menuData)->with('suppliers',$suppliers)->with('keys',$keys);
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
            $data['work_zone_id']   =   intval($request->work_zone_id);
            $data['sub_gml_id']     =   intval($request->sub_gml_id);
            $data['date']           =   date($request->date);
            $data['close_date']     =   date($request->closeDate);
            $data['description']    =   $request->description;


            if(isset($request->supplierlist)){
                $data['supplier_list']  =   $request->supplierlist;
            }else{
                return redirect()->back()->withInput()->withErrors(array('Suppliers' => 'You Should Choose one Supplier at least'));
            }

            $MTinquiry    =   new MaterialInquiry();
            $MTinquiry->addRecord($data);

            $notification['title']       =   'Inquiry ready to approve';
            $notification['description'] =   'There is a new Inquiry Ready to Approve';
            $notification['link']        =   asset('/materialinquiry/pending');

            $notfy  =   new GetNotification();
            $notfy->inquiryPending($notification);

            return redirect('workzone/showsub/'.$request->work_zone_id)->with('menu', $menuData);

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

            $MTinquiry  =   new MaterialInquiry();
            $boq        =   new Boq();

            $data       =   $MTinquiry->getInquiryById($id);

            if(count($data) > 0)
            {
                $sentEmails     =   array();
                $suppliers  =   $boq->getMaterialSuppliers($id);

                if(count($suppliers) > 0)
                {
                    foreach ($suppliers as  $k => $supplier)
                    {
                        $hashids    =   new Hashids();
                        $name       =   $supplier->name;
                        $email      =   $supplier->email;
                        $link       =   asset('forms/supplierForm/'.$hashids->encode($id).'/'.$hashids->encode($supplier->supplier_id));
                        $data       =   array('name'=>$supplier->name,'body'=>'this is your email for Procurement ','link'=>$link);

                        Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name){
                            $message->cc(['asim@abc-gcc.com']);
                            $message->to($email , $name)
                                ->subject('this email just for test');
                            $message->from('procurement@abc-gcc.com' , 'ABC-PROCUREMENT');
                        });
                    }
                }else{
                    die('this is no supplier for this Material');
                }
            }else{
                die('there is no data');
            }
            $MTinquiry->approveInquiry($request->id);
            return Redirect::back()->with('message','Operation Successful !');
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

                $notification['title']          = 'New Proposal waiting for Approval';
                $notification['description']    = 'New Proposal is waiting for commercial manager approval';
                $notification['link']           = asset('/materialinquiry/pendingtoclose');

                $notfy  = new GetNotification();
                $notfy->proposalApprove($notification);
            }
        }
        return redirect()->back();
    }

    public function approveProposal2(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            if(intval($request->id) > 0){
                $considerItem   =   $materialsInq->approveProposal2($request->id);

                $notification['title']          = 'Proposal waiting for Approval';
                $notification['description']    = 'New Proposal is waiting for operations manager approval';
                $notification['link']           = asset('/materialinquiry/pendingtoclose');

                $notfy  = new GetNotification();
                $notfy->proposalApprove2($notification);

            }
        }
        return redirect()->back();
    }

    public function approveProposal3(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            if(intval($request->id) > 0){
                $considerItem   =   $materialsInq->approveProposal3($request->id);


                $notification['title']          = 'Proposal Approved';
                $notification['description']    = 'New Proposal is approved';
                $notification['link']           = asset('/materialinquiry/closed');

                $notfy  = new GetNotification();
                $notfy->proposalApprove3($notification);
            }
        }
        return redirect()->back();
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
            'quotation_ref' => 'required',
            'supplier_code' => 'required',
            'payment_terms' => 'required',
        ]);
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_edit) {
            $materialsInq   =   new MaterialInquiry();
            $details    =   $materialsInq->getSupplierId($request->mtinquiry_id);

            $data['proposal_id']        =  $details->proposal_id ;
            $data['supplier_id']        =  $details->supplier_id;
            $data['work_zone_id']       =  $details->work_zone_id;
            $data['sub_gml_id']         =  $details->sub_gml_id;
            $data['quotation_ref']      =  $request->quotation_ref;
            $data['supplier_code']      =  $request->supplier_code ;
            $data['payment_terms']      =  $request->payment_terms ;
            $data['submital_requisted'] =  $request->submital_requisted ;
            $data['copies_number']      =  $request->copies_number ;
            $data['all_materials']      =  isset($request->allMaterial)?'All Materials':'Some Materials';
            $agreement_id   =   $materialsInq->addAgreement($data);

            $user   =   new User();
            $supplierDetails    =   $user->getSupplierOrSubContractorInfo($details->supplier_id);

            if($agreement_id > 0)
            {
                $hashids    =   new Hashids();
                $link       =   asset('forms/supplierAgreement/'.$hashids->encode($agreement_id));
                $name       =   'ahmad';
                $email      =   $supplierDetails[0]->email;
                $data       =   array('name'=>'supplier','body'=>'Please find the attached Link for the inquiry','link'=>$link);

                Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name){
                    //        $message->cc(['asim@abc-gcc.com','tariq@abc-gcc.com']);
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

    public function declinereplay(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            $data    =   $materialsInq->getDeclinReplays($request->id);
            $menuData   =   $this->menu->Menu('materialInq','showMtinq');
            return view('MTInquiry.replayDecline')->with('menu', $menuData)->with('id', $request->id)->with('data',$data);
        }
        return Redirect::back();
    }

    public function addSupplierProposal(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();

        $mtinquiry  =   new MaterialInquiry();
        $data       =   $mtinquiry->getSuppliersByMtinquiry($request->id);
        $menuData   =   $this->menu->Menu('materialInq','showMtinq');
        if ($authMTinq->can_show) {
            return view('MTInquiry.addSupplierProposal')->with('menu', $menuData)->with('data', $data);
        }
    }
    public function addDeclineReplay(Request $request){
        $this->validate($request, [
            'id'  => 'required|not_in:0',
            'subject' => 'required'
        ]);

        $authBOQ        =   $this->checkAuth->checkBOQ();

        $data   =   array();

        $data['id']              =   $request->id;
        $data['subject']         =   $request->subject;
        $data['description']     =   $request->description;


       $mtinquiry  =   new MaterialInquiry();
        $id =   $mtinquiry->addReplayDecline($data);
        $file = $request->file('attachments');
        $emailData  =   $mtinquiry->getDeclines(0,$request->id);
/*
        $path = '';
        if(!empty($file)):
             $filename   =   $file->getClientOriginalName();

            $path   =   base_path() . '/public/attachments';
            if(!is_dir ( $path))
                $path   =   base_path() . '/attachments';

            $path   =   $path.'/emails/'.$data['id'];
            if(!is_dir ( $path))
                mkdir($path);

            $file->move(
                $path.'/',$filename
            );
            $path   =   $path.'/'.$filename;
        endif;
*/
        $hashids    =   new Hashids();
        $name       =   $emailData[0]->name;
        $email      =   $emailData[0]->email;
        $subject    =   $data['subject'];
        $link       =   asset('forms/supplierForm/'.$hashids->encode($emailData[0]->material_inquiry_id).'/'.$hashids->encode($emailData[0]->supplier_id));

        $data       =   array('name'=>$name,'body'=>$data['description'],'link'=>$link);
        Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name , $subject){
          //  $message->cc(['asim@abc-gcc.com']);
            $message->to($email , $name)
                ->subject($subject);
            $message->from('procurement@abc-gcc.com' , 'ABC-PROCUREMENT');
           // $message->attach($path, array(
            //        'as' => 'pdf-report.zip',
            //        'mime' => 'application/pdf')
        //    );
        });

        return redirect()->action('MaterialinquiryController@show');
    }

    public function showInquirydetails(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_approve) {
            $data['work_zone_id']   =   $request->work_zone_id;
            $data['sub_gml_id']     =   $request->sub_gml_id;
            $id                     =   $request->id;

            $boq        =   new Boq();
            $data       =   $boq->getMaterialInquiryItems($data,3);
            $suppliers  =   $boq->getMaterialSuppliers($id);

            $menuData   =   $this->menu->Menu('materialInq','pendingMtinq');
            return view('MTInquiry.inquirydetails')->with('menu', $menuData)->with('suppliers', $suppliers)->with('data',$data);
        }

    }

    public function removeinquiry(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_approve) {

            $data   =   array();
            $data['work_zone_id']   =   $request->work_zone_id;
            $data['sub_gml_id']     =   $request->sub_gml_id;
            $data['id']             =   $request->id;

            $materialsInq   =   new MaterialInquiry();
            $materialsInq->removeinquiry($data);
        }
       return;
    }

    public function proposalReply(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $materialsInq   =   new MaterialInquiry();
            $data    =   $materialsInq->getProposalReplies($request->id);
            $menuData   =   $this->menu->Menu('materialInq','showMtinq');
            return view('MTInquiry.proposalReply')->with('menu', $menuData)->with('id', $request->id)->with('data',$data);
        }
        return Redirect::back();
    }

    public function submitSuplierProposal(Request $request){
        $authMTinq = $this->checkAuth->checkMTInquiry();
        if ($authMTinq->can_show) {
            $this->validate($request, [
                'supplier'             => 'required',
                'material_inquiry'     => 'required',
                'total_price'         => 'required|min:1',
                'compliance'          => 'required',
                'deliveryPeriod'      => 'required',
                'quotation' =>  'required|max:5000',
            ]);

            $data                          =   array();
            $data['supplier']              =   $request->supplier;
            $data['material_inquiry']      =   $request->material_inquiry;
            $data['total_price']           =   $request->total_price;
            $data['compliance']            =   $request->compliance;
            $data['deliveryPeriod']        =   $request->deliveryPeriod;
            $data['supplier_name']         =   $request->supplier_name;
            $data['supplier_email']        =   $request->email;

            $supplier         =   new Supplier();
            $proposal_id      =   $supplier->submitSuplierProposal($data);

            $quotation = $request->file('quotation');
            $datasheet = $request->file('datasheet');

            if(!empty($quotation)):
                $extension  =   $quotation->getClientOriginalExtension();

                $path   =   base_path() . '/public/quotations';
                if(!is_dir ( $path))
                    $path   =   base_path() . '/quotations';

                $path   =   $path.'/'.$proposal_id;
                if(!is_dir ( $path))
                    mkdir($path);

                $quotation->move(
                    $path.'/',$proposal_id.'.'.$extension
                );
            endif;

            if(!empty($datasheet)):
                $extension  =   $datasheet->getClientOriginalExtension();

                $path   =   base_path() . '/public/datasheets';
                if(!is_dir ( $path))
                    $path   =   base_path() . '/datasheets';

                $path   =   $path.'/'.$proposal_id;
                if(!is_dir ( $path))
                    mkdir($path);

                $datasheet->move(
                    $path.'/',$proposal_id.'.'.$extension
                );
            endif;


            return redirect('materialinquiry/suplierProposal/'.$request->material_inquiry);
        }
    }

    public function addProposalReply(Request $request){
        $this->validate($request, [
            'id'  => 'required|not_in:0',
            'subject' => 'required',
            'description' => 'required',
        ]);

        $authBOQ        =   $this->checkAuth->checkBOQ();

        $data   =   array();

        $data['id']              =   $request->id;
        $data['subject']         =   $request->subject;
        $data['description']     =   $request->description;


        $mtinquiry  =   new MaterialInquiry();
        $id         =   $mtinquiry->addProposalReply($data);
        $file       = $request->file('attachments');
        $supplier   =   new Supplier();
        $emailData  =   $supplier->getSupplierDetails($request->id);
        /*
                $path = '';
                if(!empty($file)):
                     $filename   =   $file->getClientOriginalName();

                    $path   =   base_path() . '/public/attachments';
                    if(!is_dir ( $path))
                        $path   =   base_path() . '/attachments';

                    $path   =   $path.'/emails/'.$data['id'];
                    if(!is_dir ( $path))
                        mkdir($path);

                    $file->move(
                        $path.'/',$filename
                    );
                    $path   =   $path.'/'.$filename;
                endif;
        */
        $hashids    =   new Hashids();
        $name       =   $emailData[0]->name;
        $email      =   $emailData[0]->email;
        $subject    =   $data['subject'];
        $link       =   asset('forms/supplierForm/'.$hashids->encode($emailData[0]->material_inquiry_id).'/'.$hashids->encode($emailData[0]->supplier_id));

        $data       =   array('name'=>$name,'body'=>$data['description'],'link'=>$link);
        Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name , $subject){
            //  $message->cc(['asim@abc-gcc.com']);
            $message->to($email , $name)
                ->subject($subject);
            $message->from('procurement@abc-gcc.com' , 'ABC-PROCUREMENT');
            // $message->attach($path, array(
            //        'as' => 'pdf-report.zip',
            //        'mime' => 'application/pdf')
            //    );
        });

        return redirect()->action('MaterialinquiryController@show');
    }

    public function showExtend($id)
    {
        $menuData           = $this->menu->Menu('','');

        $material           = new MaterialInquiry();
        $data               = $material->getInquirydetailsbyid($id);
        $check              = $material->checkAlreadyextended($id);

        if($check==1)
            return redirect('materialinquiry/show');

        return view('MTInquiry.extend')->with('menu', $menuData)->with('data', $data);
    }

    public function updateExtend(Request $request)
    {
        $id                 = $request->inq_id;
        $new_date           = $request->new_date;

        $material           = new MaterialInquiry();
        $material->updateClosedate($id,$new_date);

        return redirect('materialinquiry/show');
    }

    public function pendingtoclose(){
        $authMTinq        =   $this->checkAuth->checkMTInquiry();
        $menuData   =   $this->menu->Menu('materialInq','pendingcloseMtinq');
        if($authMTinq->can_show)
        {
            $MTinquiry      =       new MaterialInquiry();
            $data           =       $MTinquiry->getPendingClose();

            return view('MTInquiry.pendingToClose')->with('menu', $menuData)->with('data',$data)->with('auth',$authMTinq);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }
}
