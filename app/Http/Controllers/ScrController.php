<?php

namespace App\Http\Controllers;
use App\Boq;

use App\important\checkAuth;
use App\important\checkMenu;
use App\Scl;
use App\Scr;
use Illuminate\Http\Request;

class ScrController extends Controller
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


    public function show(Request $request)
    {
        $menuData   =   $this->menu->Menu('workzone','');
        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_show)
        {
            $search['id']       =   $request->id;
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;

            $Boq = new Boq();
            $sub_zone   =   $Boq->getsubZone($search['id']);

            $Scr    =   new Scr();
            $data   =   $Scr->fetchAll($search);

            return view('SCR.show')->with('menu',$menuData)->with('data',$data)->with('id',$request->id)->with('auth',$authScr)->with('sub_zone',$sub_zone);
        }
        else{
            return view('home')->with('menu',$menuData);
        }
    }

    public function add(Request $request,$id){
        $authScr        =   $this->checkAuth->checkSCRequest();
        $menuData   =   $this->menu->Menu('workzone','');
        if($authScr->can_edit) {
            $scl        =   new Scl();
            $scldata    =   $scl->allScl();

            if (isset($request->id) && $request->id > 0) {
                $Scr    =   new Scr();
                $data = $Scr->getRecord($request->id);
                return view('SCR.add')->with('menu', $menuData)->with('theRecord', $data)->with('scl',$scldata);
            } else {
                return view('SCR.add')->with('menu', $menuData)->with('scl',$scldata)->with('sub_work_zone_id',$request->workzoneId);
            }
        }
        else{
            return view('home');
        }
    }

    public function addscr(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $this->validate($request, [
            'sub_scl' => 'required|not_in:0',
        ]);
        $id =  $request->sub_work_zone_id;

        $Boq = new Boq();
        $sub_zone   =   $Boq->getsubZone($id);

        $sub_zones = $sub_zone->work_zone_id;

        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_edit) {
            $data   =   array();
            $data['sub_work_zone_id']   =   intval($request->sub_work_zone_id);
            $data['sub_scl_id']         =   intval($request->sub_scl);
            $data['work_zone_id']       = $sub_zones;

            $Scr    =   new Scr();
            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $Scr->updateRecord($data);
            }else{
                $Scr->addRecord($data);
            }
            return redirect('scr/show/'.$data['sub_work_zone_id'])->with('menu', $menuData);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function getsubsclitems(Request $request)
    {
        $scl_id =   intval($request->scl_id);
        if($scl_id > 0){
            $scl    =   new scl();
            $data   =   $scl->allSub($scl_id);
            die(json_encode($data));

        }else{
            die(0);
        }
    }

    public function showsubscr(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_show)
        {
            $Scr    =   new Scr();
            $data   =   $Scr->showsubscr($request->id);

            return view('SCR.showsub')->with('menu', $menuData)->with('data',$data)->with('id',$request->id)->with('auth',$authScr);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function addscrsub(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_edit) {
            if (isset($request->id) && $request->id > 0) {
                $Scr    =   new Scr();
                $data = $Scr->getSubScrRecord($request->id);
                return view('SCR.addscrsub')->with('menu', $menuData)->with('theRecord', $data)->with('scr_id',$request->scr_id);
            } else {
                return view('SCR.addscrsub')->with('menu', $menuData)->with('scr_id',$request->scr_id);
            }
        }
        else{
            return view('home');
        }
    }

    public function addscrsubcategory(Request $request){
        $menuData   =   $this->menu->Menu('workzone','materialInq');
        $this->validate($request, [
            'quantity'  => 'required|not_in:0',
            'budgetory' => 'required|not_in:0',
            'description' => 'required',
        ]);

        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_edit) {
            $data   =   array();

            $data['scr_id']                 =   $request->scr_id;
            $data['quantity']               =   $request->quantity;
            $data['budgetory_price']        =   $request->budgetory;
            $data['description']            =   $request->description;
            $data['work_scope']            =   $request->work_scope;

            $Scr    =   new Scr();
            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $Scr->updateSubRecord($data);
            }else{
                $Scr->addsubRecord($data);
            }
            return redirect('scr/showsubscr/'.$request->scr_id)->with('menu', $menuData);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function removesubscr(Request $request){
        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_edit) {
            $Scr    =   new Scr();
            $data   =   $Scr->removesubscr($request->id);
        }
        die($request->id);
    }

    public function removescr(Request $request){
        $authScr        =   $this->checkAuth->checkSCRequest();
        if($authScr->can_edit) {
            $Scr    =   new Scr();
            $data   =   $Scr->removescr($request->id);
        }
        die($request->id);
    }
}
