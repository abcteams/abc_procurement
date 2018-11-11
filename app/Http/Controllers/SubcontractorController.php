<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\Scl;
use App\Subcontractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubcontractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $menu;
    private $checkAuth;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menu = new checkMenu();
    }

    public function category()
    {
        if (Auth::user()->user_type == 3) {
            $menuData = $this->menu->Menu('mycategory', 'showCat');
            if(Auth::user()->is_approved){
                $subcontractor_id = Auth::user()->id;
                $subcontractor = new Subcontractor();
                $getSubGmal = $subcontractor->getSubSclItems($subcontractor_id);
                return view('Subcontractor/category')->with('menu', $menuData)->with('data', $getSubGmal);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        }  else {
            die('you dont have auth call the admin');
        }
    }

    public function addcategory()
    {
        if (Auth::user()->user_type == 3) {
            $menuData = $this->menu->Menu('subRequest', 'pendingReq');
            if(Auth::user()->is_approved){
            $scl = new Scl();
            $data = $scl->fetchAll();
            $menuData = $this->menu->Menu('mycategory', 'addCat');
            return view('Subcontractor/addcategory')->with('menu', $menuData)->with('scl', $data);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        } else {
            die('you dont have auth call the admin');
        }
    }

    public function getsubsclitems(Request $request)
    {

        $scl_id = intval($request->scl_id);
        if ($scl_id > 0) {
            $scl = new Scl();
            $data = $scl->allSub($scl_id);
            die(json_encode($data));

        } else {
            die(0);
        }
    }

    /***************************ADDED BY ROSHAN********************************************/
    public function getsubsclitemsForUser(Request $request)
    {
        if(isset($request->user_id) & $request->user_id > 0)
            $contractor_id    =   $request->user_id;
        else
            $contractor_id    =   auth()->user()->id;

        $scl_id =   intval($request->scl_id);
        if($scl_id > 0){
            $contractor    =   new Subcontractor();
            $data          =   $contractor->getSubcontractorMaterials($scl_id ,$contractor_id );

            die(json_encode($data));
        }else{
            die(0);
        }
    }
    /****************************************************************************************/

    public function addcategoryrec(Request $request)
    {
        $this->validate($request, [
            'sub_scl' => 'required|not_in:0',
        ]);

        $data['sub_scl_id'] = $request->sub_scl;
        $data['subcontractor_id'] = Auth::user()->id;

        $subcontractor = new Subcontractor();
        $result = $subcontractor->addCategory($data);

        $menuData = $this->menu->Menu('mycategory', 'addCat');

        return redirect()->action('SubcontractorController@category');
    }

    public function removeCategory(Request $request)
    {
        if (Auth::user()->user_type == 3) {

            if (intval($request->id) > 0) {
                $data['sub_scl_id'] = $request->id;
                $data['subcontractor_id'] = Auth::user()->id;
                $subcontractor = new Subcontractor();
                $res = $subcontractor->removeCategory($data);
                die();
            } else {
                die();
            }
        }
        die();
    }


    public function pendingRequest()
    {
        if (Auth::user()->user_type == 3) {
            $menuData = $this->menu->Menu('subRequest', 'pendingReq');
            if(Auth::user()->is_approved){

            $subcontractor = new Subcontractor();
            $subcontractor_id = Auth::user()->id;
            $data = $subcontractor->getPendingRequest($subcontractor_id);

            $menuData = $this->menu->Menu('subRequest', 'pendingRequest');
            return view('Subcontractor/pendingReq')->with('data', $data)->with('menu', $menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        } else {
            die('you dont have auth call the admin');
        }
    }

    public function pendingAgreement()
    {
        if (Auth::user()->user_type == 3) {
            $menuData = $this->menu->Menu('subRequest', 'pendingReq');
            if(Auth::user()->is_approved){
            $subcontractor = new Subcontractor();
            $subcontractor_id = Auth::user()->id;
            $data = $subcontractor->getPendingAgreement($subcontractor_id);

            $menuData = $this->menu->Menu('subAgreement', 'pendingAgreement');
            return view('Subcontractor/pendingAgreement')->with('data', $data)->with('menu', $menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        } else {
            die('you dont have auth call the admin');
        }
    }


    public function proposal(Request $request)
    {
        if (Auth::user()->user_type == 3) {
            $menuData = $this->menu->Menu('subRequest', 'pendingReq');
            if(Auth::user()->is_approved){
            $id = $request->id;
            $subcontractor = new Subcontractor();
            $data = $subcontractor->getRequestDetails($id);

            return view('Subcontractor/proposal')->with('data', $data)->with('menu', $menuData);
            }else{
                return view('Users/notapprove')->with('menu', $menuData);
            }
        } else {
            die('you dont have auth call the admin');
        }
    }

    public function decline(Request $request){
        if(Auth::user()->user_type == 3)
        {
            $menuData   =   $this->menu->Menu('subRequest','pendingReq');
            return view('Subcontractor/decline')->with('id',$request->id)->with('menu',$menuData);
        }
    }

    public function addDecline(Request $request){
        if(Auth::user()->user_type == 3)
        {
            $this->validate($request, [
                'id'    => 'required',
                'decline'   => 'required'
            ]);

            $data['id']           =   $request->id;
            $data['decline']      =   $request->decline;
            $data['subcontractor_id']  =   Auth::user()->id;

            $subcontractor  =   new Subcontractor();
            $subcontractor->addDecline($data);

            return redirect()->action('SubcontractorController@pendingRequest');
        }
    }


    public function addProposal(Request $request){

        $this->validate($request, [
            'proposal'          => 'required'
        ]);

        if(Auth::user()->user_type == 3) {

            $maindata['subcontractor_id']           =   Auth::user()->id;
            $maindata['proposal']                   =   $request->proposal;
            $maindata['subcontractor_request']      =   $request->subcontractor_request[0];
            $maindata['scr_id']                     =   $request->scr[0];

            $subData    =   array();
            foreach ($request->id as $k =>$val)
            {
                $subData[$k]['sub_category_id']     =  $val;
                $subData[$k]['price']               =  $request->price[$k];
                $subData[$k]['description']         =  $request->description[$k];
            }

            $subcontractor = new Subcontractor();
            $subcontractor->addProposal($maindata,$subData);

            return redirect()->action('SubcontractorController@pendingRequest');
        }
    }

    public function accepetAgreement(Request $request){

        if(Auth::user()->user_type == 3) {
            $subcontractor   = new Subcontractor();
            $subcontractor->subcontractorAcceptAgreement($request->id);
        }
        return Redirect::back();
    }
    /********************************ADDED BY ROSHAN *********************************/

    public function addmaterial(Request $request){
        $menuData = $this->menu->Menu('mymaterial', 'addMi');
        if(isset($request->id))
        {
            $authClass           = new checkAuth();
            $authSubcontractor   = $authClass->checkSubcontractor();

            if($authSubcontractor->can_show)
            {
                $scl = new Scl();
                $data = $scl->allMaterials();

                return view('Subcontractor/addMaterials')->with('menu', $menuData)->with('scl', $data)->with('id',$request->id);
            }
            else{
                die('you dont have auth call the admin');
            }
        }else{
            if(Auth::user()->user_type == 3)
            {
                if(Auth::user()->is_approved) {
                    $scl = new Scl();
                    $data = $scl->allMaterials();

                    return view('Subcontractor/addMaterials')->with('menu', $menuData)->with('scl', $data);
                }else{
                    return view('Users/notapprove')->with('menu', $menuData);
                }
            }else {
                die('you dont have auth call the admin');
            }
        }
    }

    public function subcontractorMaterialList(Request $request){

        if(isset($request->user_id) && $request->user_id > 0)
            $data['subcontractor_id']    =   $request->user_id;
        else
            $data['subcontractor_id']    =   auth()->user()->id;

        $subcontractor   = new Subcontractor();
        $data['sub_scl_id']     =   $request->id;

        if ($request->checked == 'true') {
            $subcontractor->addMateriall($data);
        }else{
            $subcontractor->removeMaterial($data);
        }
    }
}
