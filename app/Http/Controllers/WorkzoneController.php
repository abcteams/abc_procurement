<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\work_zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkzoneController extends Controller
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
        $authWz        =   $this->checkAuth->checkWorkZone();

        if($authWz->can_show)
        {
            $search['value']    =   $request->value;
            $user_id  =   auth()->user()->id;
            $workzone    =   new work_zones();
            $data   =   $workzone->fetchAll($search ,0,$user_id);
            $menuData   =   $this->menu->Menu('workzone','showWz');
            return view('Workzone.show')->with('menu',$menuData)->with('data',$data)->with('auth',$authWz);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }


    public function showsub(Request $request){
        $authWz         =   $this->checkAuth->checkWorkZone();

        if($authWz->can_show)
        {
            $search['value']    =   $request->value;

            $authBOQ        =   $this->checkAuth->checkBOQ();
            $authSbct       =   $this->checkAuth->checkSCRequest();

            $authx['wz']        =   $authWz->can_edit;
            $authx['BOQ']       =   $authBOQ->can_show;
            $authx['sbr']       =   $authSbct->can_show;

            $workzone    =   new work_zones();

            $data   =   $workzone->getSub($request->id, $search , 1);
            $mainData=  $workzone->getRecord($request->id);
            $menuData   =   $this->menu->Menu('workzone','');

            return view('Workzone.showsub')
                ->with('menu',$menuData)
                ->with('data',$data)
                ->with('auth',$authx)
                ->with('workzone',$mainData);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function add(Request $request)
    {
        $authWz        =   $this->checkAuth->checkWorkZone();
        $menuData   =   $this->menu->Menu('workzone','addWz');
        if($authWz->can_edit) {
            if (isset($request->id) && $request->id > 0) {
                $workzone = new work_zones();
                $data = $workzone->getRecord($request->id);
                return view('Workzone.add')->with('menu',$menuData )->with('subMenu', 'addworkzone')->with('theRecord', $data);
            } else {
                return view('Workzone.add')->with('menu', $menuData)->with('subMenu', 'addworkzone');
            }
        }
        else{
            return redirect()->action('HomeController@index');
        }

    }

    public function addWorkzone(Request $request){
        $this->validate($request, [
            'title' => 'required'
        ]);

        $authWz        =   $this->checkAuth->checkWorkZone();
        if($authWz->can_edit) {
            $data = array();
            $data['title']      = $request->title;
            $data['location'] = $request->location;

            $workzone = new work_zones();
            if (isset($request->id) && $request->id > 0) {
                $data['id'] = $request->id;
                $workzone->updateRecord($data);
            } else {
                $workzone->addRecord($data);
            }
        }
        return redirect()->action('WorkzoneController@show');


    }

    public function addsub(Request $request){
        $authWz     =   $this->checkAuth->checkWorkZone();
        $menuData   =   $this->menu->Menu('workzone','');
        $workzone = new work_zones();



        $main_zone=  $workzone->getRecord($request->workzoneId);
        if ($authWz->can_edit) {
            if (isset($request->workzoneId) && $request->workzoneId) {
                if (isset($request->id) && $request->id > 0) {

                    $data = $workzone->getSubRecord($request->id);

                    return view('Workzone.addsub')->with('menu', $menuData)->with('theRecord', $data)->with('workzone', $main_zone);
                } else {
                    return view('Workzone.addsub')->with('menu', $menuData)->with('workzone', $main_zone);
                }
            }
        }else{
            return redirect()->action('HomeController@index');
        }

    }

    public function addsubworkzone(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $authWz = $this->checkAuth->checkWorkZone();
        if ($authWz->can_edit) {

            if (isset($request->workzoneId) && $request->workzoneId > 0) {

                $data = array();
                $data['workzoneId'] = $request->workzoneId;
                $data['title'] = $request->title;

                $workzone = new work_zones();
                if (isset($request->id) && $request->id > 0) {
                    $id =   $data['id'] = $request->id;
                    $workzone->updateSubRecord($data);
                } else {
                    $id =   $workzone->addSubRecord($data);
                }


                $file  =   $request->file('boundary');
                if(!empty($file)):

                    $extension  =   $file->getClientOriginalExtension();

                    $path   =   base_path() . '/public/boundary';
                    if(!is_dir ( $path))
                        $path   =   base_path() . '/boundary';

                    if(!is_dir ( $path))
                        mkdir($path);

                    $file->move(
                        $path.'/',$id.'.'.$extension
                    );

                endif;
            }

            return redirect('workzone/showsub/' . $request->workzoneId);
        }
        else {
            return redirect()->action('HomeController@index');
        }
    }

    public function workzoneSearch(Request $request){
        $data['search']     =   $request->search;

        $workzone    =   new work_zones();
        $result =   $workzone->workzoneSearch($data);

        die(json_encode($result));
        die('0');
    }

    public function serachSubZone(Request $request){

        $data['search']         =   $request->search;
        $data['workzoneId']     =   $request->workzoneId;

        $workzone    =   new work_zones();
        $result =   $workzone->serachSubZone($data);

        die(json_encode($result));
        die('0');
    }

    public function removeWorkZone(Request $request)
    {
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_edit) {

            $workzone    =   new work_zones();
            $recNumber   = $workzone->checkWorkZoneIsUsed($request->id);
            if(intval($recNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $workzone->removeRec($request->id);
            }
        }
        die();
    }

    public function removeSubWorkZone(Request $request){
        $authScl = $this->checkAuth->checkScl();
        if ($authScl->can_edit) {
            $workzone    =   new work_zones();
            $subRecNumber   = $workzone->checkSubWorkZoneIsUsed($request->id);
            if(intval($subRecNumber) > 0){
                die('This Record Is Used , You Cant Remove it');
            }else{
                $workzone->removeSubWorkZone($request->id);
            }
        }
        die();
    }

    public function removeBoundary(Request $request){
        $specsId    = $request->id;
        $fileName   =   $request->file_name;

        $path   =   base_path() . '/public/boundary';
        if(!is_dir ( $path))
            $path   =   base_path() . '/boundary';

        $path   =   $path.$specsId.'/'.$fileName;
        unlink($path);
        die();
    }
}
