<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\MaterialInquiry;
use App\Notifications\Notifications;
use App\Materialrequisuition;
use App\Supplier;
use App\Notifications\GetNotification;
use App\work_zones;
use Hashids\Hashids;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MaterialrequisitionController extends Controller
{
    public $UserName;
    private $menu;
    private $checkAuth;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UserName     =   "mekdad";
        $this->middleware('auth');
        $this->menu         =   new checkMenu();
        $this->checkAuth    =   new checkAuth();
    }


    public function add(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('workzone','');
        if($authMtRequisition->can_edit) {
            $id         =   $request->id;
            $supplier   =   new Supplier();
            $data       =   $supplier->getReadyInquiryDetails($id , 0);

            return view('MTRequisition.add')->with('menu',$menuData)->with('id',$request->id)->with('data',$data);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function addrequisition(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('workzone','');
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $data       =  $request->data;
            $result =   $mtRequisition->addRequsisition($data);

            $notification['title']          = 'New Checkout waiting ';
            $notification['description']    = 'New Checkout is waiting';
            $notification['link']           = asset('/materialrequisition/storekeeperPending');

            $notfy  = new GetNotification();
            $notfy->storeKeeperCheck($notification);

            die('xx');
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function show(){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('Cart','showCart');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getCartITems(1,0);
            return view('MTRequisition.show')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }
    /*
    public function approvePending(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->approvePending($request->id);
            return back();
        }else{
            return redirect()->action('HomeController@index');
        }
    }
    */
    public function storekeeperPending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingStoreKeeper');
        if($authMtRequisition2->can_show) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getPendingRequisitions();
            return view('MTRequisition.storekeeperPending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function managerPending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingManager');
        if($authMtRequisition2->can_show) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getPendingRequisitions(1);
            return view('MTRequisition.managerPending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function procurementPending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingProcurement');
        if($authMtRequisition2->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getPendingRequisitions(1,1);
            return view('MTRequisition.procurementPending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function commercialPending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingCommercial');
        if($authMtRequisition2->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getPendingRequisitions(1,1,1);
            return view('MTRequisition.commercialPending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }
    public function financePending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingFinance');
        if($authMtRequisition2->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getPendingRequisitions(1,1,1,1);
            return view('MTRequisition.financePending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function awaiting(){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','awaitingMtinq');
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getPendingRequisitions(1,1,1,1,1,1);
            return view('MTRequisition.awaiting')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }


    public function sendToSupplier(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $supplier   =   $mtRequisition->getSuppliuerFromProposal($request->boq_id);
            $data       =   $mtRequisition->getRequsuition($request->id);
            $subject    =   $data[0]->order_number.'-'.$data[0]->title.'-'.$supplier[0]->company_name;

            if(count($supplier) > 0)
            {
                $hashids    =   new Hashids();
                $link       =   asset('forms/requisition/'.$hashids->encode($request->id).'/'.$hashids->encode($supplier[0]->id));
                $name       =   $supplier[0]->name;
                $email      =   $supplier[0]->email;
                $ccEmails   =   array();
                $user       =   new \App\User();
                $ccSupplier =   $user->getCCEmails($supplier[0]->id);

                if(count($ccSupplier) > 0) {
                    foreach ($ccSupplier as $k => $val) {
                        array_push($ccEmails, $val->email);
                    }
                }
                array_push($ccEmails,'asim@abc-gcc.com','john.edward@abc-gcc.com','tariq@abc-gcc.com','tony@abc-gcc.com');

                $data       =   array('name'=>$name,'body'=>'Please find below link for the LPO to proceed further . ','link'=>$link);
                Mail::send('emails.supplierproposal',$data,function($message) use ($email, $name,$subject,$ccEmails){
                    $message->cc($ccEmails);
                    $message->to($email , $name)->subject($subject);
                    $message->from('procurement@abc-gcc.com' , 'ABC-PROCUREMENT');
                });
                $result         =   $mtRequisition->checkOut($request->id);
            }

            return redirect()->back();
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function pending(){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('Cart','pendingCart');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getCartITems(0);
            return view('MTRequisition.pending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function checkout(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->checkout($request->id);
            return redirect()->action('MaterialrequisitionController@show');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function reqPending(){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        $menuData   =   $this->menu->Menu('materialReq','pendingMtReq');
        if($authMtRequisition2->can_show) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getCartITems(1,1,1);
            return view('MTRequisition.reqpending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function approveReqPending(Request $request){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        if($authMtRequisition2->can_show) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->approveReqPending($request->id);
            return redirect()->action('MaterialrequisitionController@reqPending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function approveLpoPending(Request $request){
        $authMtRequisition2        =   $this->checkAuth->checkMTRequisition2();
        if($authMtRequisition2->can_edit) {
            $mtRequisition  =    new Materialrequisuition();

            return redirect()->action('MaterialrequisitionController@lpoPending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function markasDelivered(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->markasDelivered($request->id);
            return redirect()->action('MaterialrequisitionController@awaiting');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function markaspaid(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->markaspaid($request->id);
            return redirect()->action('MaterialrequisitionController@delivered');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function lpoPending(){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','lpoPendingMtinq');
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getCartITems(1,1,1,1);
            return view('MTRequisition.lpoPending')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }



    public function delivered(){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','deliveredMtinq');
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $result =   $mtRequisition->getPendingRequisitions(1,1,1,1,1,1,1);
            return view('MTRequisition.delivered')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function requisitionDetails($id){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','awaitingmtinq');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);
            }
            return view('MTRequisition.requisitionDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function requisitionReports(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData = $this->menu->Menu('materialReq', 'reports');

        if($authMtRequisition->can_edit) {
            $requisition    =   new Materialrequisuition();
            $data   =   $requisition->getRequsuitionReports($request->id);
            return view('MTRequisition.requisitionReports')->with('menu',$menuData)->with('data',$data);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function removeRequisition(Request $request){
        $requisition    =   new Materialrequisuition();
        $requisition->removeRequisition($request->id);
        die();
    }

    public function requisitionMoreInfo(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('Cart','pendingCart');
        $user      =   new \App\User();
        $users      =   $user->getEmployesName();
        $MtRequisition  =   new Materialrequisuition();
        $agreementDts   =   $MtRequisition->getAgreementDts($request->id);

        if($authMtRequisition->can_approve) {
            return view('MTRequisition.requisitionMoreInfo')
                ->with('menu',$menuData)
                ->with('users',$users)
                ->with('agreementDts',$agreementDts);
        }
    }

    public function addrequisitionMoreDetails(Request $request){
        $data['id']              =   $request->id;
        $data['freight']         =   $request->freight;
        $data['discount']        =   $request->discount;
        $data['proposal_id']     =   $request->proposal_id;
        $data['siteInCharge']    =   $request->siteInCharge;
        $data['job_no']          =   $request->job_number;
        $data['order_number']    =   $request->order_number;

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $requisition    = new Materialrequisuition();
            $requisition->requisitionMoreDetails($data);
        }
        return redirect()->action('MaterialrequisitionController@pending');
    }

    public function reports(Request $request){
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('Cart','reports');

        if($authMtRequisition->can_approve) {
            $search     =   array();
            $search['supplier_id']      =   $request->supplier_id;
            $search['workzone']         =   $request->workzone;
            $search['subzone']          =   $request->subzone;
            $search['from_date']        =   $request->from_date;
            $search['to_date']          =   $request->to_date;
            $search['order_number']     =   $request->order_number;

            $mtRequisition  =   new Materialrequisuition();
            $data           =   $mtRequisition->fetchAllReports($search);

            $users      =   new \App\User();
            $suppliers  =   $users->getAllSuppliers();

            $workzone   =   new work_zones();
            $workzones  =   $workzone->getAllWorkzones();

            $subzones   =   array();
            if(trim($request->workzone) != '' && $request->workzone != 0)
                $subzones   =   $workzone->getSub($request->workzone);

            return view('MTRequisition.reports')
                ->with('menu',$menuData)
                ->with('suppliers',$suppliers)
                ->with('workzones',$workzones)
                ->with('subzones',$subzones)
                ->with('data',$data);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function addToCart(Request $request){
        $data['type']       =   $request->type;
        $data['id']         =   $request->id;
        $data['user']       =   Auth::user()->id;

        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->addToCart($data);
        die('xx');
    }

    public function removeItemFromCart(Request $request){
        $id        =   $request->id;

        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->removeFromCart($id);
        die('xx');
    }

    public function updateCart(Request $request){
        $data['id']         =   $request->id;
        $data['item_qty']   =   $request->item_qty;

        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->updateCart($data);
        die('xx');
    }

    public function showCart(){
        $authMtRequisition     =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','');

        $mt         =   new Materialrequisuition();
        $data       =   $mt->showCartItems(Auth::user()->id);

        return view('Cart.showCart')->with('menu',$menuData)->with('data',$data);
    }

    public function removeItems($id){
        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->removeFromCart($id);

        return redirect('materialrequisition/showCart');
    }

    public function myOrders(){
        $authMtRequisition     =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','');

        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->getMyOrders();

        return view('Cart.myOrders')->with('menu',$menuData)->with('data',$data);
    }

    public function orderDetails($id){
        $authMtRequisition     =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','');

        $mtRequisition  =   new Materialrequisuition();
        $data           =   $mtRequisition->getOrderDetailsByReq($id);

        return view('Cart.orderDetails')->with('menu',$menuData)->with('data',$data);
    }

    public function storeQuantity(Request $request)
    {
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('workzone','');
        if($authMtRequisition->can_edit) {
            $mtRequisition  =    new Materialrequisuition();
            $data       =  $request->data;
            $result =   $mtRequisition->warehouseApprove($data);

            $notification['title']          = 'New Checkout waiting ';
            $notification['description']    = 'New Checkout is waiting for manager Approval';
            $notification['link']           = asset('/materialrequisition/managerPending');

            $notfy  = new GetNotification();
            $notfy->storeKeeperApprove($notification);

            die('xx');
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function storekeeperDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','pendingStoreKeeper');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getData($id);
            return view('MTRequisition.storeKeeperDetails')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function managerDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','pendingManager');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $result         =   $mtRequisition->getData($id);
            return view('MTRequisition.managerDetails')->with('menu',$menuData)->with('data',$result);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function procurementDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','pendingProcurement');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);
            }
            return view('MTRequisition.procurementDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function commercialDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','pendingCommercial');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);

            }
            return view('MTRequisition.commercialDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function financeDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','pendingFinance');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);
            }
            return view('MTRequisition.financeDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function awaitingDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','awaitingmtinq');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);
            }
            return view('MTRequisition.awaitingDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function deliveredDetails($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        $menuData   =   $this->menu->Menu('materialReq','awaitingmtinq');
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $data         =   $mtRequisition->getRequsuitionDetails($id);
            $boq            =   $this->checkAuth->checkBOQ();
            $userInfo       =   array();
            if(count($data) > 0)
            {
                $user       =   new \App\User();
                $userInfo   =   $user->getSupplierOrSubContractorInfo($data['main'][0]->supplier_id);
            }
            return view('MTRequisition.deliveredDetails')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('userinfo',$userInfo)
                ->with('auth',$boq);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function managerApprove($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $mtRequisition->managerApprove($id);

            $notification['title']          = 'New Checkout waiting ';
            $notification['description']    = 'New Checkout is waiting for procurement Approval';
            $notification['link']           = asset('/materialrequisition/procurementPending');

            $notfy  = new GetNotification();
            $notfy->managerApprove($notification);

            return redirect('/materialrequisition/managerPending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function managerReject(Request $request){

        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->req_id;

        if(trim($data['reason']) == '')
            $data['reason']     =   'rejected without reason';

        $delete = new Materialrequisuition();
        $delete->managerReject($data['id']);

        $notification['title']       =   'Order Rejected';
        $notification['description'] =   'Order rejected due to '.$data['reason'];
        $notification['link']        =   asset('/notification/viewall');

        $notfy  =   new GetNotification();
        $notfy->managerReject($notification);

        return redirect('/materialrequisition/managerPending');
    }


    public function procurementApprove(Request $request){

        $data = array();
        $data['req_id'] = $request->req_id;
        $data['freight'] = $request->freight;
        $data['discount'] = $request->discount;
        $data['job_no'] = $request->job_no;
        $data['order_no'] = $request->order_no;
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $mtRequisition->procurementApprove($data);

            $notification['title']          = 'New Checkout waiting ';
            $notification['description']    = 'New Checkout is waiting for Commercial Approval';
            $notification['link']           = asset('/materialrequisition/commercialPending');

            $notfy  = new GetNotification();
            $notfy->procurementApprove($notification);

            return redirect('/materialrequisition/procurementPending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function procurementReject(Request $request){

        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->req_id;

        if(trim($data['reason']) == '')
            $data['reason']     =   'no reason';

        $delete = new Materialrequisuition();
        $delete->procurementReject($data['id']);

        $notification['title']       =   'Order Rejected';
        $notification['description'] =   'Order rejected due to '.$data['reason'];
        $notification['link']        =   asset('/notification/viewall');

        $notfy  =   new GetNotification();
        $notfy->procurementReject($notification);

        return redirect('/materialrequisition/procurementPending');
    }

    public function commercialApprove($id){

        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $mtRequisition->commercialApprove($id);

            $notification['title']          = 'New Checkout waiting ';
            $notification['description']    = 'New Checkout is waiting for Finance Approval';
            $notification['link']           = asset('/materialrequisition/financePending');

            $notfy  = new GetNotification();
            $notfy->commercialApprove($notification);

            return redirect('/materialrequisition/commercialPending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function commercialReject(Request $request){

        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->req_id;

        if(trim($data['reason']) == '')
            $data['reason']     =   'no reason';

        $delete = new Materialrequisuition();
        $delete->commercialReject($data['id']);

        $notification['title']       =   'Order Rejected';
        $notification['description'] =   'Order rejected due to '.$data['reason'];
        $notification['link']        =   asset('/notification/viewall/viewall');

        $notfy  =   new GetNotification();
        $notfy->commercialReject($notification);

        return redirect('/materialrequisition/commercialPending');
    }

    public function financeApprove($id){

        $hashids    =   new Hashids();
        $authMtRequisition        =   $this->checkAuth->checkMTRequisition();
        if($authMtRequisition->can_approve) {
            $mtRequisition  =    new Materialrequisuition();
            $mtRequisition->financeApprove($id);
            $supplier_id =  $mtRequisition->getSupplierid($id);
            $s_id = $supplier_id->supplier_id;

            $notification['title']          = 'LPO waiting ';
            $notification['description']    = 'LPO is waiting for your Approval';
            $notification['link']           = asset('/forms/requisition/'.$hashids->encode($id).'/'.$hashids->encode($s_id));

            $notfy  = new GetNotification();
            $notfy->financeApprove($notification,$s_id);

            return redirect('/materialrequisition/financePending');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function financeReject(Request $request){

        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->req_id;

        if(trim($data['reason']) == '')
            $data['reason']     =   'no reason';

        $delete = new Materialrequisuition();
        $delete->financeReject($data['id']);

        $notification['title']       =   'Order Rejected';
        $notification['description'] =   'Order rejected due to '.$data['reason'];
        $notification['link']        =   asset('/notification/viewall');

        $notfy  =   new GetNotification();
        $notfy->financeReject($notification);

        return redirect('/materialrequisition/financePending');
    }

}
