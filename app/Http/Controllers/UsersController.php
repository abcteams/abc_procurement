<?php

namespace App\Http\Controllers;

use App\important\checkAuth;
use App\important\checkMenu;
use App\User;
use App\work_zones;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\GetNotification;

class UsersController extends Controller  
{
    /**
     * @var checkMenu
     */
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

    public function showUsers(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if($authSupplier->can_show)
        {

            $search['type']     =   $request->type;
            $search['value']    =   $request->value;
            $search['user']     =   1;

            $users  =   new User();
            $data   =   $users->getUsers($search);

            $menuData   =   $this->menu->Menu('settings','showUsers');
            return view('Users.showUsers')->with('menu',$menuData)->with('data',$data);
        }
        else{
            return view('home');
        }
    }

    public function showSuppliers(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if($authSupplier->can_show)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;
            $search['user']     =   2;

            $users  =   new User();
            $data   =   $users->getSuppliersAndSubContractors($search);

            $menuData   =   $this->menu->Menu('showSuppliers','showSuppliers');
            return view('Users.showSuppliers')->with('menu',$menuData)->with('data',$data)->with('auth',$authSupplier);
        }
        else{
            return view('home');
        }
    }

    public function pendingSuppliers(){
        $authSupplier        =   $this->checkAuth->checkSupplier();

        if($authSupplier->can_approve || $authSupplier->can_approve2)
        {
            $users  =   new User();
            $data   =   $users->getPendingSuppliersAndSubContractors('2');

            $menuData   =   $this->menu->Menu('showSupplieras','pendingSuppliers');
            return view('Users.pendingSuppliers')->with('menu',$menuData)->with('data',$data)->with('auth',$authSupplier);
        }
        else{
            return view('home');
        }
    }
    public function showSubcontractor(Request $request){
        $authSubcontractor        =   $this->checkAuth->checkSubcontractor();

        if($authSubcontractor->can_approve || $authSubcontractor->can_approve2)
        {
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;
            $search['user']     =   3;

            $users  =   new User();
            $data   =   $users->getSuppliersAndSubContractors($search);

            $menuData   =   $this->menu->Menu('subcont','showSubcont');
            return view('Users.showSubcontractors')->with('menu',$menuData)->with('data',$data)->with('auth',$authSubcontractor);
        }
        else{
            return view('home');
        }
    }

    public function showSupplierInfo(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();

        if($authSupplier->can_show)
        {
            $users  =   new User();
            $data   =   $users->getSupplierOrSubContractorInfo($request->id);

            $menuData   =   $this->menu->Menu('showSuppliers','');
            return view('Users.showSupplierInfo')->with('menu',$menuData)->with('data',$data);
        }
        else{
            return view('home');
        }
    }

    public function showSubcontractorInfo(Request $request){
        $authSubcontractor        =   $this->checkAuth->checkSubcontractor();

        if($authSubcontractor->can_show)
        {
            $users  =   new User();
            $data   =   $users->getSupplierOrSubContractorInfo($request->id);

            $menuData   =   $this->menu->Menu('showSubcontractors','');
            return view('Users.showSubcontractorInfo')->with('menu',$menuData)->with('data',$data);
        }
        else{
            return view('home');
        }
    }

    public function pendingSubcontractor(){
        $authSubcontractor        =   $this->checkAuth->checkSubcontractor();

        if($authSubcontractor->can_approve || $authSubcontractor->can_approve2)
        {
            $users  =   new User();
            $data   =   $users->getPendingSuppliersAndSubContractors('3');

            $menuData   =   $this->menu->Menu('subcont','pendingSubcont');
            return view('Users.pendingSubcontractors')->with('menu',$menuData)->with('data',$data)->with('auth',$authSubcontractor);;
        }
        else{
            return view('home');
        }
    }

    /************************************EDITED BY ROSHAN********************************************/
    public function approveSupplier(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();

        if($authSupplier->can_approve) {
            $users  =   new User();
            $users->approveUser($request->id);

            $notification['title']       =   'New Supplier';
            $notification['description'] =   'New Supplier is waiting for approval';
            $notification['link']        =   asset('/users/pendingSuppliers');

            $notfy  =   new GetNotification();
            $notfy->supplierApprove12($notification);
        }

        return redirect()->back();
    }
    /************************************EDITED BY ROSHAN********************************************/
    public function approve2Supplier(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if($authSupplier->can_approve2) {
            if (isset($request->id) && $request->id > 0) {
                $users = new User();
                $users->approve2User($request->id);
                $notification['title'] = 'New Supplier';
                $notification['description'] = 'New Supplier is approved';
                $notification['link'] = asset('/users/showSupplierInfo/' . $request->id);

                $notfy = new GetNotification();
                $notfy->supplierApprove1($notification);
            }
        }
        return redirect()->back();
    }


    /**********************************ADDED BY ROSHAN****************************************/
    public function rejectUser(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        $authSubcontractor   =   $this->checkAuth->checkSubcontractor();

        if($authSupplier->can_approve || $authSupplier->can_approve2 || $authSubcontractor->can_approve || $authSubcontractor->can_approve2)
        {
            $users  =   new User();
            $users->deleteUser($request->id);

        }
        return redirect()->back();
    }

    public function deleteSupplier($id){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if($authSupplier->can_approve || $authSupplier->can_approve2)
        {
            $users  =   new User();
            $users->deleteUser($id);

        }
        return redirect('users/showSuppliers')->with('success','Supplier Deleted Successfully');


    }

    public function deleteSubcontractor($id){
        $authSubcontractor   =   $this->checkAuth->checkSubcontractor();
        if($authSubcontractor->can_approve || $authSubcontractor->can_approve2)
        {
            $users  =   new User();
            $users->deleteUser($id);

        }
        return redirect('users/showSubcontractor')->with('success','Subcontractor Deleted Successfully');


    }

    public function approveSubcontractor(Request $request){
        $authSubcontractor        =   $this->checkAuth->checkSubcontractor();

        if($authSubcontractor->can_approve){
            $users  =   new User();
            $users->approveUser($request->id);

            $notification['title']       =   'New Subcontractor';
            $notification['description'] =   'New Subcontractor is waiting for approval';
            $notification['link']        =   asset('/users/pendingSubcontractor');

            $notfy  =   new GetNotification();
            $notfy->subcontractorApprove12($notification);
        }

        return redirect()->back();
    }

    public function approve2Subcontractor(Request $request){
        $authSubcontractor        =   $this->checkAuth->checkSubcontractor();

        if($authSubcontractor->can_approve2){
            if (isset($request->id) && $request->id > 0) {
                $users = new User();
                $users->approve2User($request->id);
                $notification['title'] = 'New Subcontractor';
                $notification['description'] = 'New Subcontractor is approved';
                $notification['link'] = asset('/users/showSubcontractorInfo/' . $request->id);

                $notfy = new GetNotification();
                $notfy->subcontractorApproved($notification);
            }
        }
        return redirect()->back();
    }

    /************************************************************************************************************************/
    public function editMyInfo(Request $request){
        $menuData   =   $this->menu->Menu('home','');
        $user       =   new User();

        $Countries  =   $user->getCountries();
        $data = $user->getUserInfo(Auth::user()->id);
        return view('Users.editMyInfo')
            ->with('menu', $menuData)
            ->with('data', $data)
            ->with('countries', $Countries);
    }

    public function addUser(Request $request){
        $authUsers        =   $this->checkAuth->checkUsers();
        $menuData   =   $this->menu->Menu('settings','showUsers');
        if($authUsers->can_edit) {
            $data   =   array();
            $this->validate($request, [
                'name'              => 'required|string|max:255',
                'email'             => 'required|string|email|max:255|unique:users,email,'.$request->id,
                'age'               => 'required',
                'country'           => 'required',
                'gender'            => 'required|string|max:255',
                'material_status'   => 'required|string|max:255',
            ]);

            $data['name']                   =   $request->name;
            $data['email']                  =   $request->email;
            $data['password']               =   Hash::make('User123!');
            $data['remember_token']         =   $request->_token;
            $data['created_at']             =   date("Y-m-d H:i:s");
            $data['updated_at']             =   date("Y-m-d H:i:s");
            $data['user_type']              =   1;
            $data['is_approved']            =   1;
            $data['age']                    =   $request->age;
            $data['country']                =   $request->country;
            $data['gender']                 =   $request->gender;
            $data['material_status']        =   $request->material_status  ;
            $data['address']                =   $request->address;
            $data['phone_number']           =   $request->phone_number;
            $data['position']               =   $request->position;
            $data['active_status']               =   $request->active_status;
            $User    =   new User();

            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $User->updateRecord($data);
            }else{
                $User->addRecord($data);
            }
            return redirect()->action('UsersController@showUsers');
        }
        else{
            $menuData   =   $this->menu->Menu('menu', $menuData);
            return view('home')->with('menu', $menuData);
        }

    }
    public function add(Request $request){
        $authUsers        =   $this->checkAuth->checkUsers();
        $menuData   =   $this->menu->Menu('settings','showUsers');
        $user       =   new User();

        $positions  =   $user->getPositions();
        $Countries  =   $user->getCountries();
        if($authUsers->can_edit) {
            if (isset($request->id) && $request->id > 0) {
                $data = $user->getUserInfo($request->id);
                return view('Users.add')
                    ->with('menu', $menuData)
                    ->with('data', $data)
                    ->with('countries', $Countries)
                    ->with('positions',$positions);
            } else {
                return view('Users.add')
                    ->with('menu', $menuData)
                    ->with('countries', $Countries)
                    ->with('positions',$positions);
            }
        }
        else{
            return view('home')->with('menu', $menuData);
        }

    }

    public function addsupplier(){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        $menuData   =   $this->menu->Menu('settings','showUsers');
        if($authSupplier->can_approve) {
            //if (isset($request->id) && $request->id > 0) {
            //$data = $user->getUserInfo($request->id);
            //    return view('Users.add')
            //        ->with('menu', $menuData)
            //        ->with('data', $data)
            //        ->with('countries', $Countries)
            //        ->with('positions',$positions);
            //} else {
            $users      =   new User();
            $Countries  =   $users->getCountries();
            $positions  =   $users->getPositions();

            return view('Supplier.add')
                ->with('menu', $menuData)
                ->with('countries', $Countries)
                ->with('positions',$positions);
           // }
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    /**********************************************EDITED BY ROSHAN****************************************************/
    public function addSupplierInfo(Request $request){
        $data   =   array();
        $this->validate($request, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'country'       => 'required',
            'phone_number'  =>  'required|string|max:1000000000000',
            'company_name'  =>  'required',
        ]);

        $User    =   new User();

        if(isset($request->id )&& $request->id > 0) {
            $id   =   $request->id;
            // $User->updateRecord($data);
        }else{
            $result  =    User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make('User123!'),
                'user_type'     => 2,
                'remember_token'=> $request->_token,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
                'is_approved'   => 1,
                'is_approved2'   => 0
            ]);
            $id   =   $result['id'];

        }

        $data['country']          =   $request->country;
        $data['company_name']     =   $request->company_name;
        $data['address']          =   $request->address;
        $data['phone_number']     =   $request->phone_number;
        $data['phone2']           =   $request->phone_number2;
        $ccemails                 =   $request->ccemails;

        $User->userDetails($id,$data);

        if(isset($ccemails))
            $User->addccEmails($ccemails,$id);

        $notification['title']       =   'New Supplier';
        $notification['description'] =   'New Supplier is waiting for approval';
        $notification['link']        =   asset('/users/pendingSuppliers');

        $notfy  =   new GetNotification();
        $notfy->supplierApprove12($notification);

        return redirect()->action('UsersController@showSupplierInfo',$id);

    }
    /**************************************************************************************/

    /****************************ADDED BY ROSHAN*****************************************/
    public function addSubcontractor(){
        $authSubcontractor       =   $this->checkAuth->checkSubcontractor();
        $menuData   =   $this->menu->Menu('settings','showUsers');

        if($authSubcontractor->can_approve) {
            $users      =   new User();
            $Countries  =   $users->getCountries();
            $positions  =   $users->getPositions();

            return view('Subcontractor.add')
                ->with('menu', $menuData)
                ->with('countries', $Countries)
                ->with('positions',$positions);
        }
        else{
            return view('home')->with('menu', $menuData);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addSubcontractorInfo(Request $request){
        $data   =   array();
        $this->validate($request, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'country'       => 'required',
            'phone_number'  =>  'required|string|max:1000000000000',
            'company_name'  =>  'required',
        ]);

        $User    =   new User();

        if(isset($request->id )&& $request->id > 0) {
            $id   =   $request->id;
        }else{
            $result  =    User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make('User123!'),
                'user_type'     => 3,
                'remember_token'=> $request->_token,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
                'is_approved'   => 1,
                'is_approved2'   => 0
            ]);
            $id   =   $result['id'];

        }

        $data['country']          =   $request->country;
        $data['company_name']     =   $request->company_name;
        $data['address']          =   $request->address;
        $data['phone_number']     =   $request->phone_number;
        $data['phone2']           =   $request->phone_number2;
        $ccemails                 =   $request->ccemails;

        $User->userDetails($id,$data);

        if(isset($ccemails))
            $User->addccEmails($ccemails,$id);

        $notification['title']       =   'New Subcontractor';
        $notification['description'] =   'New Subcontractor is waiting for approval';
        $notification['link']        =   asset('/users/pendingSubcontractor');

        $notfy  =   new GetNotification();
        $notfy->subcontractorApprove12($notification);

        return redirect()->action('UsersController@showSubcontractorInfo',$id);

    }
    /************************************************************************************/


    public function updateMyInfo(Request $request){
        $data   =   array();
        $this->validate($request, [
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'age'               => 'required',
            'country'           => 'required',
            'gender'            => 'required|string|max:255',
            'material_status'   => 'required|string|max:255',
        ]);

        $data['name']                   =   $request->name;
        $data['email']                  =   $request->email;
        $data['remember_token']         =   $request->_token;
        $data['updated_at']             =   date("Y-m-d H:i:s");
        $data['age']                    =   $request->age;
        $data['country']                =   $request->country;
        $data['gender']                 =   $request->gender;
        $data['material_status']        =   $request->material_status  ;
        $data['address']                =   $request->address;
        $data['phone_number']           =   $request->phone_number;

        $User    =   new User();

        $data['id']   =   Auth::user()->id;
        $User->updateMyInfo($data);

        return redirect()->action('UsersController@myProfile',[Auth::user()->id]);
    }

    public function showuserprofiel(Request $request){
        $authUsers        =   $this->checkAuth->checkUsers();
        $menuData   =   $this->menu->Menu('settings','showUsers');
        if($authUsers->can_show) {

            $user = new User();
            $data = $user->getUserInfo($request->id);

            return view('Users.userInfo')->with('menu', $menuData)->with('data', $data);

        } else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function usersrules(Request $request){
        $authRules        =   $this->checkAuth->checkRules();
        $menuData   =   $this->menu->Menu('settings','showRules');
        if($authRules->can_show) {
            $users  =   new User();
            $data   = $users->getUserRules($request->id);
            $user   = $users->getUserName($request->id);
            return view('Users.usersRules')->with('menu', $menuData)->with('data', $data)->with('user',$user);

        } else{
            return view('home')->with('menu', $menuData);
        }
    }

    public function setTheRules(Request $request){
        $authRules        =   $this->checkAuth->checkRules();
        if($authRules->can_edit) {
            $data       =   $request->data;
            $user_id    =   $request->id;

            $user   =   new User();
            $user->setRules($data,$user_id);
        }
        print_r($request->post());die();
        die('xxxx');
    }

    public function setThePositions(Request $request){
        $authRules        =   $this->checkAuth->checkPositions();
        if($authRules->can_edit) {
            $data       =   $request->data;
            $title      =   $request->title;
            $position_id=   $request->id;

            $user       =   new User();
            $user->setPositions($data,$title,$position_id);
        }
        die('xxxx');
    }

    public function showPositions(){
        $authRules        =   $this->checkAuth->checkPositions();
        if($authRules->can_show) {
            $users  =   new User();
            $data   =   $users->getPositions();

            $menuData   =   $this->menu->Menu('settings','showPositions');
            return view('Users.showPositions')->with('menu',$menuData)->with('data',$data)->with('auth',$authRules);
        }
        else{
            return view('home');
        }
    }
    public function addPosition(Request $request){
        $authRules        =   $this->checkAuth->checkPositions();
        if($authRules->can_edit) {
            $users  =   new User();

            if(isset($request->id) && $request->id > 0){
                $data   =   $users->getPositionScreens($request->id);
            }else{
                $data   =   $users->getscreens();
            }

            $menuData   =   $this->menu->Menu('settings','showPositions');
            return view('Users.addPosition')->with('menu',$menuData)->with('data',$data);
        }
        else{
            return view('home');
        }
    }

    public function positionUsers(Request $request){
       $menuData   =   $this->menu->Menu('settings','showPositions');
       $users  =   new User();
       $data   =   $users->getPositionUsers($request->id);
       return view('Users.positionUsers')->with('menu',$menuData)->with('data',$data);
    }

    public function myProfile(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();
        if(Auth::user()->id == $request->id) {
            $menuData = $this->menu->Menu('home', '');
            $user = new User();
            $data = $user->getUserInfo($request->id);

            return view('Users.myProfile')->with('menu', $menuData)->with('data', $data);
        }
        else{
            echo 'You Cant Enter To this Page';
        }
    }

    public function updateMyPassword(){
        $menuData   =   $this->menu->Menu('home','');
        return view('Users.changeMyPassword')->with('menu', $menuData);
    }

    public function changeThePassword(Request $request){

         if(!Hash::check($request->old_password,Auth::user()->password )){
            return Redirect::back()->withErrors(['The Old Password Is Wrong']);
        }

        $this->validate($request,
            [
                'old_password'      => 'required',
                'my_password'       => 'min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|',
                'cpassword'         => 'required|same:my_password'
            ],
            [
                'my_password.regex'=>'Password must contain at least 1 lower-case and capital letter, a number and symbol.',
                'cpassword.same'  =>'The password and confirmation does not match'
            ]
        );
         $user  =   new User();
         $user->updateMyPassword(Hash::make($request->my_password));

        return redirect()->action('HomeController@index');
    }

    public function usersWorkzones(Request $request){
        $authRules        =   $this->checkAuth->checkRules();
        $menuData   =   $this->menu->Menu('settings','showRules');
        if($authRules->can_show) {
            $workzone = new work_zones();
            $workzones = $workzone->fetchAll(array(), 1);

            $users = new User();
            $user   = $users->getUserName($request->id);
            $data   = $users->getWorkzoneRules($request->id);
            return view('Users.workzoneRules')
                ->with('menu', $menuData)
                ->with('user', $user)
                ->with('data', $data)
                ->with('workzones',$workzones);

        } else{
            return view('home')->with('menu', $menuData);
        }


    }
    public function setWorkzoneRules(Request $request){
        $authRules        =   $this->checkAuth->checkRules();
        if($authRules->can_edit) {
            $data       =   $request->data;
            $user_id    =   $request->id;

            $user   =   new User();
            $user->setWorkzonetRules($data,$user_id);
        }
        die();
    }

    public function ccEmails(Request $request){
        $authSupplier        =   $this->checkAuth->checkSupplier();

        $menuData = $this->menu->Menu('home', '');
        $user = new User();
        $data = $user->getCCEmails($request->id);

        return view('Users.ccemails')->with('menu', $menuData)->with('data', $data);

/*

        if($authSupplier->can_edit)
        {
            die('xx');
        }
*/
        die();
    }

    public function addccemails(Request $request){
        $ccemails   =   $request->ccemails;
        $user_id    =   $request->user_id;

        $user       =   new User();
        $user->addccEmails($ccemails,$user_id);

        return redirect()->back();
    }

    //********created by iqbla***********
    public function deleteUser($id){

        $users  =   new User();
        $users->deleteUser($id);

    }

    /**
     * @param $id
     */
    public function resetPassword($id){
        $users  =   new User();
        $users->resetPassword($id);
    }
}