<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\Scl;
use Illuminate\Http\Request;
use App\Notifications\GetNotification;

class SclController extends Controller
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
        $authScl        =   $this->checkAuth->checkScl();

        if($authScl->can_show)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;

            $scl    =   new Scl();
            $data   =   $scl->fetchAll($search);

            $menuData   =   $this->menu->Menu('scl','showScl');
            return view('SCL.show')->with('menu',$menuData)->with('data',$data)->with('auth',$authScl);
        }
        else{
            return view('home');
        }
    }

    public function showsub(Request $request){
        $authScl        =   $this->checkAuth->checkScl();
        if($authScl->can_show)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;
            $search['id']       =   $request->id;

            $scl    =   new Scl();
            $data   =   $scl->getSub($search);
            $main_scl   =   $scl->getMainSclTitle($request->id);

            $menuData   =   $this->menu->Menu('scl','');
            return view('SCL.subscl')->with('menu',$menuData)->with('data',$data)->with('main_data',$main_scl)->with('auth',$authScl);;
        }
        else{
            return view('home');
        }
    }

    public function add(Request $request){
        $authScl        =   $this->checkAuth->checkScl();
        $menuData   =   $this->menu->Menu('scl','addScl');
        if($authScl->can_edit) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $data = $scl->getRecord($request->id);

                return view('SCL.add')->with('menu', $menuData)->with('theRecord', $data);
            } else {
                return view('SCL.add')->with('menu', $menuData)->with('subMenu', 'add');
            }
        }
        else{
            return view('home')->with('menu', $menuData);
        }

    }

    public function addScl(Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);

        $authScl        =   $this->checkAuth->checkScl();
        if($authScl->can_edit) {
            $data   =   array();
            $data['title']  =   $request->title;
            $data['desc']   =   $request->description;
            $scl    =   new Scl();
            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $scl->updateRecord($data);

                $notification['title']       =   'SCL Edited';
                $notification['description'] =   'Please Approve the edited SCL';
                $notification['link']        =   asset('/scl/pendingScl');

                $notfy  =   new GetNotification();
                $notfy->sclFirstApprove1($notification);
            }else{
                $scl->addRecord($data);

                $notification['title']       =   'New SCL';
                $notification['description'] =   'A new Subcontractor Category list is waiting for approval';
                $notification['link']        =   asset('/scl/pendingScl');

                $notfy  =   new GetNotification();
                $notfy->sclFirstApprove1($notification);
            }
            $menuData   =   $this->menu->Menu('scl','showScl');
            return redirect('scl/show')->with('menu', $menuData);
        }
        else{
            $menuData   =   $this->menu->Menu('');
            return view('home')->with('menu', $menuData);
        }
    }



    public function addsub(Request $request){
        $authScl        =   $this->checkAuth->checkScl();
        if($authScl->can_edit) {
            $menuData   =   $this->menu->Menu('scl','');
            $scl    =   new Scl();
            $main_scl   =   $scl->getMainSclTitle($request->sclId);

            if (isset($request->sclId) && $request->sclId) {
                if (isset($request->id) && $request->id > 0) {
                    $data = $scl->getSubRecord($request->id);

                    return view('SCL.addsub')->with('menu', $menuData)->with('theRecord', $data)->with('main_data', $main_scl);
                } else {
                    return view('SCL.addsub')->with('menu', $menuData)->with('main_data', $main_scl);
                }
            }
        }

    }

    public function addsubscl(Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);

        $authScl        =   $this->checkAuth->checkScl();
        if($authScl->can_edit) {
            if (isset($request->sclId) && $request->sclId > 0) {
                $data = array();
                $data['sclId'] = $request->sclId;
                $data['title'] = $request->title;
                $data['desc'] = $request->description;

                $scl    =   new Scl();
                if (isset($request->id) && $request->id > 0) {
                    $data['id'] = $request->id;
                    $scl->updateSubRecord($data);

                    $notification['title']       =   'Sub SCL Edited';
                    $notification['description'] =   'Please Approve the edited Sub SCL';
                    $notification['link']        =   asset('/scl/pendingSub');

                    $notfy  =   new GetNotification();
                    $notfy->sclFirstApprove1($notification);
                } else {
                    $scl->addSubRecord($data);

                    $notification['title']       =   'New Sub SCL';
                    $notification['description'] =   'A new Subcontractor Sub Category list is waiting for approval';
                    $notification['link']        =   asset('/scl/pendingSub');

                    $notfy  =   new GetNotification();
                    $notfy->sclFirstApprove1($notification);
                }
            }
        }

        return redirect('scl/showsub/'.$request->sclId);
    }


    public function sclSearch(Request $request){
        $data['type']       =   $request->type;
        $data['search']     =   $request->search;

        $scl    =   new Scl();
        $result =   $scl->searchScl($data);

        die(json_encode($result));
        die('0');
    }

    public function subSclSearch(Request $request){
        $data['scl_id']       =   $request->scl_id;
        $data['type']       =   $request->type;
        $data['search']     =   $request->search;

        $scl    =   new Scl();
        $result =   $scl->searchSubScl($data);

        die(json_encode($result));
        die('0');
    }

    public function removescl(Request $request)
    {
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_edit) {

            $scl    =   new Scl();
            $recNumber   = $scl->checkSclIsUsed($request->id);
            if(intval($recNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $scl->removeRec($request->id);
            }
        }
        die();
    }
    public function removesubscl(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_edit) {
            $scl    =   new Scl();
            $subRecNumber   = $scl->checkSubGmlIsUsed($request->id);
            if(intval($subRecNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $scl->removeSubScl($request->id);
            }


        }
        die();
    }

    /**************************EDITED BY ROSHAN************************************/
    public function pendingSub(Request $request)
    {
        $menuData   =   $this->menu->Menu('scl','pendingSub');
        $authScl = $this->checkAuth->checkScl();

        if ($authScl->can_show ) {
            $scl    =   new Scl();
            $data = $scl->getPending($request->id);

            return view ('SCL.pending')->with('menu',$menuData)->with('data',$data)->with('auth',$authScl);

        }else{
            return redirect(asset('home'))->with('menu', $menuData);
        }
    }

    /****************************ADDED BY ROSHAN******************************************/

    public function pendingScl(Request $request)
    {
        $menuData   =   $this->menu->Menu('scl','pendingScl');
        $authScl = $this->checkAuth->checkScl();

        if ($authScl->can_show) {
            $scl    =   new Scl();
            $data = $scl->getPendingScl($request->id);


            return view ('SCL.pendingScl')->with('menu',$menuData)->with('data',$data)->with('auth',$authScl);
        }else{

            return redirect(asset('home'))->with('menu', $menuData);
        }
    }
    /**********************************EDITED BY ROSHAN *************************************/
    public function approveSclPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSclPending($request->id,1);

                $notification['title']       =   'New SCL ';
                $notification['description'] =   'A subcontractor category list is waiting for approval';
                $notification['link']        =   asset('/scl/pendingScl');

                $notfy  =   new GetNotification();
                $notfy->sclApprove12($notification);
            }
            return back();
        }
    }

    public function approve2SclPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSclPending($request->id,2);

                $notification['title']       =   'New SCL ';
                $notification['description'] =   'A subcontractor category list is waiting for approval';
                $notification['link']        =   asset('/scl/pendingScl');

                $notfy  =   new GetNotification();
                $notfy->sclApprove13($notification);
            }
            return back();
        }
    }

    public function approve3SclPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSclPending($request->id,3);

                $notification['title']       =   'SCL Approved ';
                $notification['description'] =   'New subcontractor category list is approved';
                $notification['link']        =   asset('/scl/show');

                $notfy  =   new GetNotification();
                $notfy->sclApproved($notification);
            }
            return back();
        }
    }

    public function approveSubPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSubPending($request->id,1);

                $notification['title']       =   'New sub SCL ';
                $notification['description'] =   'A subcontractor sub category list is waiting for approval';
                $notification['link']        =   asset('/scl/pendingSub');

                $notfy  =   new GetNotification();
                $notfy->sclApprove12($notification);
            }
            return back();
        }
    }

    public function approve2SubPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSubPending($request->id,2);

                $notification['title']       =   'New sub SCL ';
                $notification['description'] =   'A subcontractor sub category list is waiting for approval';
                $notification['link']        =   asset('/scl/pendingSub');

                $notfy  =   new GetNotification();
                $notfy->sclApprove13($notification);
            }
            return back();
        }
    }

    public function approve3SubPending(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_approve) {
            if (isset($request->id) && $request->id > 0) {
                $scl    =   new Scl();
                $scl->approveSubPending($request->id,3);

                $notification['title']       =   'Sub SCL Approved';
                $notification['description'] =   'New subcontractor sub category list is approved';
                $notification['link']        =   asset('/scl/show');

                $notfy  =   new GetNotification();
                $notfy->sclApproved($notification);
            }
            return back();
        }
    }
    /*********************************************************************************************************************/


}
