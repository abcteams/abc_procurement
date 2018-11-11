<?php

namespace App\Http\Controllers;

use App\gml;
use App\important\checkMenu;
use App\Notifications\GetNotification;
use App\Notifications\InvoicePaid;
use App\Notifications\Notifications;
use App\User;
use Illuminate\Http\Request;
use App\important\checkAuth;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class GmlController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $authGml        =   $this->checkAuth->checkGML();
        $menuData   =   $this->menu->Menu('gml','showGml');
        if($authGml->can_show)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;

            $gml    =   new gml();
            $data   =   $gml->fetchAll($search);
            return view('GML.gml')->with('menu',$menuData)->with('data',$data)->with('auth',$authGml);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function showsub(Request $request){
        $authGml        =   $this->checkAuth->checkGML();
        $menuData   =   $this->menu->Menu('gml','');
        if($authGml->can_show)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;
            $search['id']       =   $request->id;
            $gml    =   new gml();
            $data   =   $gml->getSub($search);
            $mainData   =   $gml->getMainGmlTitle($request->id);
            return view('GML.subgml')->with('menu',$menuData)->with('data',$data)->with('main_data',$mainData)->with('auth',$authGml);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function add(Request $request){
        $authGml        =   $this->checkAuth->checkGML();
        $menuData   =   $this->menu->Menu('gml','addGml');
        if($authGml->can_edit) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->getRecord($request->id);

                return view('GML.add')->with('menu', $menuData)->with('theRecord', $data);
            } else {
                return view('GML.add')->with('menu', $menuData)->with('subMenu', 'add');
            }
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }

    }

    /**************Edited By Iqbal***********************/

    public function addGml(Request $request){ //edited by roja

        $this->validate($request, [
            'title' => 'required',
        ]);

        $authGml        =   $this->checkAuth->checkGML();
        $menuData   =   $this->menu->Menu('gml','showGml');
        if($authGml->can_edit) {
            $data   =   array();
            $data['title']  =   $request->title;
            $data['desc']   =   $request->description;

            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $gml    =   new gml();
                $gml->updateRecord($data);

                $notification['title']       =   'GML Edited';
                $notification['description'] =   'Please Approve the edited GML';
                $notification['link']        =   asset('/gml/pendingGml');

                $notfy  =   new GetNotification();
                $notfy->gmlFirstApprove($notification);
            }else{
                $gml    =   new gml();
                $gml->addRecord($data);

                $notification['title']       =   'New GML';
                $notification['description'] =   'A new general material list is waiting for Your approval';
                $notification['link']        =   asset('/gml/pendingGml');

                $notfy  =   new GetNotification();
                $notfy->gmlFirstApprove($notification);

            }

            return redirect('gml/show')->with('menu', $menuData);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }
    public function addsub(Request $request){
        $authGml        =   $this->checkAuth->checkGML();
        $menuData   =   $this->menu->Menu('gml','');
        if($authGml->can_edit) {
            $gml = new gml();
            $mainGml   =   $gml->getMainGmlTitle($request->gmlId);
            if (isset($request->gmlId) && $request->gmlId) {
                if (isset($request->id) && $request->id > 0) {
                    $data = $gml->getSubRecord($request->id);

                    return view('GML.addsub')->with('menu', $menuData)->with('theRecord', $data)->with('main_data', $mainGml);
                } else {
                    return view('GML.addsub')->with('menu', $menuData)->with('main_data', $mainGml);
                }
            }
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }

    }

    //************** Edited By Iqbal*************************
    public function addsubgml(Request $request){ //edited by roja

        $this->validate($request, [
            'title' => 'required',
        ]);

        $authGml        =   $this->checkAuth->checkGML();
        if($authGml->can_edit) {
            if (isset($request->gmlId) && $request->gmlId > 0) {
                $data = array();
                $data['gmlId'] = $request->gmlId;
                $data['title'] = $request->title;
                $data['desc']   = $request->description;

                if (isset($request->id) && $request->id > 0) {
                    $data['id'] = $request->id;
                    $gml = new gml();
                    $gml->updateSubRecord($data);

                    $notification['title']       =   'Sub GML Edited';
                    $notification['description'] =   'Please Approve the edited Sub GML';
                    $notification['link']        =   asset('/gml/pendingSub');

                    $notfy  =   new GetNotification();
                    $notfy->subGmlApprove1($notification);

                } else {
                    $gml = new gml();
                    $gml->addSubRecord($data);

                    $notification['title']       =   'New Sub GML '.$data['title'];
                    $notification['description'] =   'A new sub general material list is waiting for approval';
                    $notification['link']        =   asset('/gml/pendingSub');

                    $notfy  =   new GetNotification();
                    $notfy->subGmlApprove1($notification);
                }

            }

        }

        return redirect('gml/showsub/'.$request->gmlId);
    }


    public function gmlSearch(Request $request){
        $data['type']       =   $request->type;
        $data['search']     =   $request->search;

        $gml    =   new gml();
        $result =   $gml->searchGml($data);

        die(json_encode($result));
        die('0');
    }

    public function subGmlSearch(Request $request){
        $data['gml_id']       =   $request->gml_id;
        $data['type']       =   $request->type;
        $data['search']     =   $request->search;

        $gml    =   new gml();
        $result =   $gml->searchSubGml($data);

        die(json_encode($result));
        die('0');
    }

    public function removegml(Request $request)
    {
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_edit) {
            $gml    = new gml();
            $recNumber   = $gml->checkGmlIsUsed($request->id);
            if(intval($recNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $gml->removeRec($request->id);
            }
        }
        die();
    }

    public function removesubgml(Request $request){
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_edit) {
            $gml = new gml();
            $subRecNumber   = $gml->checkSubGmlIsUsed($request->id);
            if(intval($subRecNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $gml->removeSubGml($request->id);
            }

        }
        die();
    }

    public function pendingGml(Request $request)
    {
        $menuData   =   $this->menu->Menu('gml','pendingGml');
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_show ) {
            $gml    =   new gml();
            $data = $gml->getPendingGml($request->id);

            return view ('GML.pendingGml')->with('menu',$menuData)->with('data',$data)->with('auth',$authGml);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function pendingSub(Request $request)
    {
        $menuData   =   $this->menu->Menu('gml','pendingSub');
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_show) {
            $gml    =   new gml();
            $data = $gml->getPendingSub($request->id);

            return view ('GML.pendingSub')->with('menu',$menuData)->with('data',$data)->with('auth',$authGml);
        }else{
            redirect(asset('home'))->with('menu', $menuData);
        }
    }

    public function approvePending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approvePending($request->id,1);

                $notification['title']       =   'Sub GML '.$data['title'];
                $notification['description'] =   'A sub general material list is waiting for approval';
                $notification['link']        =   asset('/gml/pendingSub');

                $notfy  =   new GetNotification();
                $notfy->subGmlApprove1($notification);
            }
            return back();
        }
    }

    public function approve2Pending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve2) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approvePending($request->id,2);

                $notification['title']       =   'Sub GML '.$data['title'];
                $notification['description'] =   'A sub general material list is waiting for approval';
                $notification['link']        =   asset('/gml/pendingSub');

                $notfy  =   new GetNotification();
                $notfy-> gmlApprove2($notification);
            }
            return back();
        }
    }

    public function approve3Pending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve3) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approvePending($request->id,3);

                $notification['title']       =   'Sub GML '.$data['title'];
                $notification['description'] =   'A sub general material list is approved';
                $notification['link']        =   asset('/gml/pendingSub');

                $notfy  =   new GetNotification();
                $notfy-> gmlApprove3($notification);
            }
            return back();
        }
    }

    public function approveGmlPending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approveGmlPending($request->id,1);

                $notification['title']       =   'GML'.$data['title'];
                $notification['description'] =   'A material  waiting for approval';
                $notification['link']        =   asset('/gml/pendingGml');

                $notfy  =   new GetNotification();
                $notfy->subGmlApprove1($notification);

            }
            return back();
        }
    }

    public function approve2GmlPending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve2) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approveGmlPending($request->id,2);

                $notification['title']       =   'GML'.$data['title'];
                $notification['description'] =   'A material  waiting for approval';
                $notification['link']        =   asset('/gml/pendingGml');

                $notfy  =   new GetNotification();
                $notfy->subGmlApprove2($notification);
            }
            return back();
        }
    }

    public function approve3GmlPending(Request $request){ //edited by roja
        $authGml = $this->checkAuth->checkGML();
        if ($authGml->can_approve3) {
            if (isset($request->id) && $request->id > 0) {
                $gml = new gml();
                $data = $gml->approveGmlPending($request->id,3);

                $notification['title']       =   'GML'.$data['title'];
                $notification['description'] =   'A material  is approved';
                $notification['link']        =   asset('/gml/pendingGml');

                $notfy  =   new GetNotification();
                $notfy->subGmlApprove3($notification);
            }
            return back();
        }
    }


    /*********************************iqbal *******************************/

    //Function to reject the pending gml with reason
    public function RejectPendingGml(Request $request){
        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->id;
        if(trim($data['reason']) == '')
            $data['reason']     =   'rejected without reason';

        $delete = new gml();
        $deleteGML = $delete->deleteGML($data['id']);

        $notification['title']       =   'GML Rejected';
        $notification['description'] =   'Rejected Reason : '.$data['reason'];
        $notification['link']        =   asset('/home');

        $notfy  =   new GetNotification();
        $notfy->gmlCanAdd($notification);
    }

    //Function to reject the pending Sub gml with reason
    public function RejectPendingSubGml(Request $request){

        $data = array();
        $data['reason'] = $request->reason;
        $data['id'] = $request->id;
        if(trim($data['reason']) == '')
            $data['reason']     =   'rejected without reason';

        $delete = new gml();
        $deleteGML = $delete->deleteSubGML($data['id']);

        $notification['title']       =   $request->gml_title.'Sub GML Rejected';
        $notification['description'] =   'Rejected Reason : '.$data['reason'];
        $notification['link']        =   asset('/home');

        $notfy  =   new GetNotification();
        $notfy->gmlCanAdd($notification);
    }

}

