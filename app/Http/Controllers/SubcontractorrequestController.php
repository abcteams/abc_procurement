<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\Subcontractor;
use App\Subcontractorrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubcontractorrequestController extends Controller
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
        $authSCRequest        =   $this->checkAuth->checkSCRequest();
        $menuData   =   $this->menu->Menu('subcont','subcontReq','showSubReq');
        if($authSCRequest->can_show)
        {
            $SCRequest      =       new Subcontractorrequest();
            $data           =       $SCRequest->getRecords();
            return view('SCRequest.show')->with('menu', $menuData)->with('data',$data);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function closed()
    {
        $authSCRequest        =   $this->checkAuth->checkSCRequest();
        $menuData   =   $this->menu->Menu('subcont','subcontReq','closeSubReq');
        if($authSCRequest->can_show)
        {
            $SCRequest      =       new Subcontractorrequest();
            $data           =       $SCRequest->getClosedInquiry();
            return view('SCRequest.closed')->with('menu', $menuData)->with('data',$data);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function add(Request $request){
        $authSCRequestuiry  =   $this->checkAuth->checkSCRequest();
        $menuData       =   $this->menu->Menu('subcont','subcontReq');
        if($authSCRequestuiry->can_edit) {
            return view('SCRequest.add')->with('menu', $menuData)->with('scr_id',$request->id);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }



    public function addSCrequest(Request $request){
        $menuData   =   $this->menu->Menu('subcont','subcontReq');
        $this->validate($request, [
            'date'             => 'required|date|date_format:Y-m-d|after:yesterday',
            'closeDate'        => 'required|date|date_format:Y-m-d|after:date'
        ]);

        $authSCRequest        =   $this->checkAuth->checkSCRequest();
        if($authSCRequest->can_edit) {
            $data   =   array();
            $data['scr_id']         =   intval($request->scr_id);
            $data['date']           =   date($request->date);
            $data['close_date']     =   date($request->closeDate);
            $data['description']    =   $request->description;


            $SCRequest    =   new Subcontractorrequest();
            $SCRequest->addRecord($data);

            return redirect('scr/showsubscr/'.$request->scr_id)->with('menu', $menuData);

        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function pending(){
        $authSCRequest        =   $this->checkAuth->checkSCRequest();
        $menuData   =   $this->menu->Menu('subcont','subcontReq' ,'pendingSubReq');
        if($authSCRequest->can_approve)
        {
            $SCRequest      =       new Subcontractorrequest();
            $data           =       $SCRequest->getPendingInquiry();
            return view('SCRequest.pending')->with('menu', $menuData)->with('data',$data);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function approve(Request $request){
        $authSCRequest        =   $this->checkAuth->checkSCRequest();
        if($authSCRequest->can_approve)
        {
            $SCRequest      =       new Subcontractorrequest();
            $data           =       $SCRequest->approveInquiry($request->id);
            return back();
        }
        else{
            redirect(asset('home'));
        }
    }

    public function subcontractorProposal(Request $request)
    {
        $authSCRequest = $this->checkAuth->checkSCRequest();
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        if ($authSCRequest->can_show) {
            $id   =   $request->id;
            $SCRequest = new Subcontractorrequest();
            $data = $SCRequest->getSubcontractorProposals($id);

            return view('SCRequest.subcontractorProposal')->with('menu', $menuData)->with('data', $data);
        } else {
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function proposalDetails(Request $request)
    {
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_show) {
            $SCRequest   =   new Subcontractorrequest();
            if(intval($request->id) > 0){
                $proposalDetails   =   $SCRequest->proposalDetails($request->id);
                return view('SCRequest.proposalDetails')->with('menu', $menuData)->with('data', $proposalDetails);
            }
        }
        return Redirect::back();

    }
    public function considerItem(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_show) {
            $SCRequest   =   new Subcontractorrequest();
            if(intval($request->id) > 0){
                $considerItem   =   $SCRequest->considerItem($request->id);
            }
        }
        return Redirect::back();
    }

    public function consideredItems(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        if ($authSCRequest->can_show) {
            $id   =   $request->id;
            $SCRequest = new Subcontractorrequest();
            $data = $SCRequest->getConsideredItems($id);

            return view('SCRequest.consideredSubcontractor')->with('menu', $menuData)->with('data', $data);
        } else {
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function approveProposal(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_show) {
            $SCRequest   =   new Subcontractorrequest();
            if(intval($request->id) > 0){
                $considerItem   =   $SCRequest->approveProposal($request->id);
            }
        }
        return redirect()->action('SubcontractorrequestController@closed');
    }


    public function showAccepted(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        if ($authSCRequest->can_show) {
            $SCRequest   =   new Subcontractorrequest();
            $data    =   $SCRequest->getAcceptedProposal($request->id);
            return view('SCRequest.showAccepted')->with('menu', $menuData)->with('data', $data);
        }
        return redirect()->action('SubcontractorrequestController@closed');
    }





    public function createAgreement(Request $request){
        $id =   $request->id;
        $authSCRequest = $this->checkAuth->checkSCRequest();
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        if ($authSCRequest->can_edit) {
            return view('SCRequest.createAgreement')->with('menu', $menuData)->with('id', $id);
        }
        return Redirect::back();
    }


    /**
     * @param Request $request
     */
    public function approveAgreement(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_approve) {
            $SCRequest   =   new Subcontractorrequest();
            $subcontractor_id    =   $SCRequest->approveAgreement($request->id);
            return Redirect::back();
        }
    }

    public function addAgreement(Request $request){

        $this->validate($request, [
            'proposal_id' => 'required|not_in:0',
            'delivery_agreement' => 'required',
            'payment_terms' => 'required',
            'final_price' => 'required',
        ]);
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_edit) {

            $SCRequest          =   new Subcontractorrequest();
            $subcontractor_id   =   $SCRequest->getSubcontractorId($request->proposal_id);

            $data['proposal_id']        =  $request->proposal_id ;
            $data['subcontractor_id']   =  $subcontractor_id[0]->subcontractor_id;
            $data['sub_scl_id']         =  $subcontractor_id[0]->sub_scl_id;
            $data['delivery_agreement'] =  $request->delivery_agreement ;
            $data['payment_terms']      =  $request->payment_terms ;
            $data['final_price']        =  $request->final_price ;
            $data['date']               =  date("Y/m/d");

            $SCRequest->addAgreement($data);

        }
        $menuData = $this->menu->Menu('subcont', 'subcontReq');
        return redirect()->action('SubcontractorrequestController@closed');

    }

    public function showAgreement(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_show) {
            $menuData = $this->menu->Menu('subcont', 'subcontReq');
            $SCRequest   =   new Subcontractorrequest();
            $data    =   $SCRequest->getAgreement($request->id);
            return view('SCRequest.showAgreement')->with('menu', $menuData)->with('data', $data[0]);
        }
    }

    public function decline(Request $request){
        $authSCRequest = $this->checkAuth->checkSCRequest();
        if ($authSCRequest->can_show) {
            $SCRequest   =   new Subcontractorrequest();
            $data    =   $SCRequest->getDeclines($request->id);

            $menuData   =   $this->menu->Menu('subcont','subcontReq','showSubReq');
            return view('SCRequest.showDecline')->with('menu', $menuData)->with('data', $data);
        }
        return Redirect::back();
    }
}
