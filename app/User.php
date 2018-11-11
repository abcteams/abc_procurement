<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','user_type','is_approved','is_approved2'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rules(){
        return $this->hasMany(rule::class);
    }


    public function getUsers($search = null){

        $q  =   DB::table('users');
        $q->leftjoin('users_general_info','users.id','=','users_general_info.user_id');
        if(isset($search['type']))
        {
            $value  =   $search['value'];
            if($search['type'] == 'name'){
                $q->where('name','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'email'){
                $q->where('email','like','%'.$search['value'].'%');
            }else{
                $q->where(function($query )use ($value)
                {
                    $query->where('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%');
                });
            }
        }
        $q->where('user_type', '=', $search['user']);
        $q->where('is_approved', '=', 1);
        $q->select('users.name','users.email','users_general_info.phone_number','users.id','users.active_status');
        $data   =   $q->orderBy('users.id', 'desc')->paginate(10);


        return $data;
    }

    public function getEmployesName($search = null){
        $q  =   DB::table('users');
        $q->select('id' , 'name');
        $q->where('user_type', '=', 1);
        $q->where('is_approved', '=', 1);
        $data   =   $q->orderBy('id', 'desc')->get();

        return $data;
    }

    public function getSuppliersAndSubContractors($search = null){
        $q  =   DB::table('users');
        $q->join('users_details','users.id','users_details.user_id');
        $q->join('country','users_details.country','country.id');

        $value  =   $search['value'];
        if(isset($search['type']))
        {
            if($search['type'] == 'name'){
                $q->where('users.name','like','%'.$search['value'].'%');
            }elseif ($search['type'] == 'email'){
                $q->where('users.email','like','%'.$search['value'].'%');
            }else{
                $q->where(function($query )use ($value)
                {
                    $query->where('users.name', 'like', '%' . $value . '%')
                        ->orWhere('users.email', 'like', '%' . $value . '%');
                });
            }
        }
        $q->where('users.user_type', '=', $search['user']);
        $q->where('users.is_approved', '=', 1);
        $q->where('users.is_approved2', '=', 1);
        $q->select('users.*', 'users_details.company_name', 'users_details.address','country.nicename');

        $data   =   $q->orderBy('users.id', 'desc')->paginate(10);


        return $data;
    }

    public function getPendingSuppliersAndSubContractors($type){
        $q = DB::table('users');
        $q->join('users_details','users.id','users_details.user_id');
        $q->join('country','users_details.country','country.id');
        $q->select('users.*', 'users_details.company_name', 'users_details.address','country.nicename');
        $q->where('user_type', '=', $type);
        $q->where(function ($query) {
            $query->where('is_approved', '=', 0)
                ->orWhere('is_approved2', '=', 0);
        });

        $data   =   $q->get();
        return $data;
    }

    public function getPendingUsers($type){
        $data = DB::table('users')
            ->where('user_type', '=', $type)
            ->where('is_approved', '=', 0)
            ->get();
        return $data;
    }


    public function approveUser($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['is_approved' => '1']);
        return;
    }

    public function approve2User($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['is_approved2' => '1']);
        return;
    }

    public function updateMyInfo($data)
    {
        DB::table('users')
            ->where('id', $data['id'])
            ->update(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'remember_token' => $data['remember_token'],
                    'updated_at' => $data['updated_at'],
                ]);
        DB::table('users_general_info')
            ->where('user_id', $data['id'])
            ->update(
                [
                    'age' => $data['age'],
                    'country' => $data['country'],
                    'material_status' => $data['material_status'],
                    'address' => $data['address'],
                    'phone_number' => $data['phone_number'],
                    'gender' => $data['gender'],
                ]);
    }

    public function updateRecord($data){
        DB::table('users')
            ->where('id', $data['id'])
            ->update(
                [
                    'name'          =>  $data['name'],
                    'email'         =>  $data['email'],
                    'remember_token'=>  $data['remember_token'],
                    'updated_at'    =>  $data['updated_at'],
                    'active_status' =>  $data['active_status'],
                ]);
        DB::table('users_general_info')
            ->where('user_id', $data['id'])
            ->update(
                [
                    'age'               =>  $data['age'],
                    'country'           =>  $data['country'],
                    'material_status'   =>  $data['material_status'],
                    'address'           =>  $data['address'],
                    'phone_number'      =>  $data['phone_number'],
                    'gender'            =>  $data['gender'],
                ]);
        DB::table('users_work_info')
            ->where('user_id', $data['id'])
            ->update(
                [
                    'position_id'           =>  $data['position'],
                ]);

        if(intval($data['position']) > 0){
            $result = DB::table('position_rules')->where('position_id', '=', $data['position'])->get();
            foreach ($result as $k => $val)
            {
                DB::insert(
                    "insert into `rules` (`user_id`, `screen_id`, `can_show`, `can_edit`, `can_approve` ,`can_approve2` ,`can_approve3`) 
                             values (
                             $data[id],
                             $val->screen_id,
                             $val->can_show,
                             $val->can_edit,
                             $val->can_approve,
                             $val->can_approve2,
                             $val->can_approve3)
                on duplicate key update
                            `can_show`  =$val->can_show,
                            `can_edit`  =$val->can_edit,
                            `can_approve`=$val->can_approve,
                            `can_approve2`=$val->can_approve2,
                            `can_approve3`=$val->can_approve3"
                );
            }
        }

    }

    public function addRecord($data){

        $id = DB::table('users')->insertGetId(
            [
                'name'          =>  $data['name'],
                'email'         =>  $data['email'],
                'password'      =>  $data['password'],
                'remember_token'=>  $data['remember_token'],
                'created_at'    =>  $data['created_at'],
                'updated_at'    =>  $data['updated_at'],
                'user_type'     =>  $data['user_type'],
                'is_approved'   =>  $data['is_approved'],
                'active_status' =>  $data['active_status'],
            ]
        );

        DB::table('users_general_info')->insert(
            [
                'user_id'           =>  $id,
                'age'               =>  $data['age'],
                'country'           =>  $data['country'],
                'material_status'   =>  $data['material_status'],
                'address'           =>  $data['address'],
                'phone_number'      =>  $data['phone_number'],
                'gender'            =>  $data['gender'],
            ]
        );

        DB::table('users_work_info')->insert(
            [
                'user_id'               =>  $id,
                'position_id'           =>  $data['position'],
            ]
        );

        if(intval($data['position']) > 0){
            $result = DB::table('position_rules')->where('position_id', '=', $data['position'])->get();
            foreach ($result as $k => $val)
            {
                DB::table('rules')->insert(
                    [
                        'user_id'               =>  $id,
                        'screen_id'             =>  $val->screen_id,
                        'can_show'              =>  $val->can_show,
                        'can_edit'              =>  $val->can_edit,
                        'can_approve'           =>  $val->can_approve,
                        'can_approve2'          =>  $val->can_approve2,
                        'can_approve3'          =>  $val->can_approve3,
                    ]
                );
            }
        }


    }

    public function getUserInfo($user_id){
        $data['main'] = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();
        $data['genral'] = DB::table('users_general_info')
            ->join('country','users_general_info.country','country.id')
            ->where('user_id', '=', $user_id)
            ->get();
        $data['work'] = DB::table('users_work_info')
            ->join('positions','users_work_info.position_id','positions.id')
            ->where('user_id', '=', $user_id)
            ->get();

        return $data;
    }

    public function getSupplierOrSubContractorInfo($user_id){
        $data   = DB::table('users')
            ->join('users_details','users.id','users_details.user_id')
            ->join('country','users_details.country','country.id')
            ->where('users.id', '=', $user_id)
            ->get();
        return $data;
    }

    public function getUserRules($user_id){
        $data = DB::table('screens')
            ->leftJoin('rules', function ($join) use($user_id) {
                $join->on('screens.id', '=', 'rules.screen_id')->where('rules.user_id', '=', $user_id);
            })->select('screens.id as screen','screens.name','rules.*')->get();
        return $data;
    }
    public function getUserName($user_id){
        $data = DB::table('users')->where('id','=',$user_id)->get();

        return $data;
    }

    public function setRules($data,$user_id){
        foreach ($data as $k => $val)
        {
            DB::insert(
                "insert into `rules` (`user_id`, `screen_id`, `can_show`, `can_edit`, `can_approve` ,`can_approve2` ,`can_approve3`) 
                             values (
                             '$user_id', 
                             '$val[screen]', 
                             '$val[can_show]',
                             '$val[can_edit]',
                             '$val[can_approve]',
                             '$val[can_approve2]',
                             '$val[can_approve3]')
                on duplicate key update 
                            `can_show`='$val[can_show]',
                            `can_edit`='$val[can_edit]',
                            `can_approve`='$val[can_approve]',
                            `can_approve2`='$val[can_approve2]',
                            `can_approve3`='$val[can_approve3]'"
            );
        }
        return;
    }

    public function setWorkzonetRules($data,$user_id){
        DB::table('work_zone_rules')->where('user_id', '=', $user_id)->delete();

        if(count($data) > 0)
        {
            foreach ($data as $k => $val)
            {
                DB::table('work_zone_rules')->insert(['user_id' =>  $user_id,'work_zone_id'=> $val['workzone'] ]);
            }
        }
        return;
    }

    public function getPositions(){
        $data = DB::table('positions')->get();
        return $data;
    }
    public function getMyPositions($user_id){
        $data = DB::table('users_work_info')
            ->join('positions', 'positions.id', '=', 'users_work_info.position_id')
            ->where('users_work_info.user_id','=',$user_id)
            ->select('positions.*')->get();
        return $data;
    }
    public function getscreens(){
        $data = DB::table('screens')
            ->where('id','<','12')->get();
        return $data;
    }

    public function setPositions($data,$title,$position_id){

        DB::beginTransaction();
        try
        {
            if(intval($position_id) > 0)
            {
                DB::table('positions')->where('id', $position_id)->update(['title' => $title]);
                $id=intval($position_id);
            }
            else
            {
                $id = DB::table('positions')->insertGetId(['title'  =>  $title]);
            }

            foreach ($data as $k => $val)
            {
                DB::insert(
                    "insert into `position_rules` (`position_id`, `screen_id`, `can_show`, `can_edit`, `can_approve` ,`can_approve2` ,`can_approve3`) 
                             values (
                             '$id', 
                             '$val[screen]', 
                             '$val[can_show]',
                             '$val[can_edit]',
                             '$val[can_approve]',
                             '$val[can_approve2]',
                             '$val[can_approve3]')
                on duplicate key update 
                            `can_show`='$val[can_show]',
                            `can_edit`='$val[can_edit]',
                            `can_approve`='$val[can_approve]',
                            `can_approve2`='$val[can_approve2]',
                            `can_approve3`='$val[can_approve3]'"
                );
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function getPositionScreens($position_id){
        $data = DB::table('screens')
            ->leftJoin('position_rules', function ($join) use($position_id) {
                $join->on('screens.id', '=', 'position_rules.screen_id')->where('position_rules.position_id', '=', $position_id);
            })
            ->join('positions', 'positions.id', '=', 'position_rules.position_id')
            ->where('screens.id','<','12')->select('screens.id as screen','screens.name','position_rules.*','positions.title as title')->get();
        return $data;
    }

    public function getPositionUsers($position_id){
        $data = DB::table('users_work_info')
            ->join('users','users_work_info.user_id','users.id')
            ->where('users_work_info.position_id','=',$position_id)->get();
        return $data;
    }

    public function getCountries(){
        $data = DB::table('country')->get();
        return $data;
    }

    public function userDetails($user_id,$data){

        DB::table('users_details')->insert(
            [
                'user_id'           =>  $user_id,
                'company_name'      =>  $data['company_name'],
                'phone_number'      =>  $data['phone_number'],
                'phone_number2'     =>  $data['phone2'],
                'country'           =>  $data['country'],
                'address'           =>  $data['address'],
            ]
        );
    }

    public function updateMyPassword($new_password){
        $id     =   Auth::user()->id;
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => $new_password]);
        return;
    }

    public function getWorkzoneRules($id){
        $q  =   DB::table('work_zone_rules');
        $q->where('user_id','=', $id);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function getCCEmails($id){
        $q  =   DB::table('cc_emails');
        $q->where('user_id','=', $id);
        $data   =   $q->orderBy('id', 'desc')->get();
        return $data;
    }

    public function addccEmails($ccemails,$user_id){
        DB::table('cc_emails')->where('user_id', '=', $user_id)->delete();
        foreach ($ccemails as $val)
        {
            DB::table('cc_emails')->insert(
                [
                    'user_id'  =>  $user_id,
                    'email'    =>  $val
                ]
            );
        }
    }

    public function getAllSuppliers(){
        $q  =   DB::table('users');
        $q->leftjoin('users_details','users_details.user_id', 'users.id');
        $q->select('users.id','users.email','users_details.company_name');
        $q->where('user_type','=', '2');
        $q->where('users.is_approved','=', '1');
        $data   =   $q->get();
        return $data;
    }

    public function getUsersCanApproveGml(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve','=', '1');
        $q->where('rules.screen_id','=', '1');/*** gml screen number 1 ***/
        $data   =   $q->get();

        return $data;
    }

    public function getUsersCanApproveGml2(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2','=', '1');
        $q->where('rules.screen_id','=', '1');/*** gml screen number 1 ***/
        $data   =   $q->get();

        return $data;
    }

    public function getUsersCanApproveGml3(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve3','=', '1');
        $q->where('rules.screen_id','=', '1');/*** gml screen number 1 ***/
        $data   =   $q->get();

        return $data;
    }

    public function getUsersCanCreateInqiry(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_edit','=', '1');
        $q->where('rules.screen_id','=', '5');/*** inqiry screen number 5 ***/
        $data   =   $q->get();

        return $data;
    }

    public function getUsersCanApproveInquiry(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve','=', '1');
        $q->where('rules.screen_id','=', '5');/*** inqiry screen number 5 ***/
        $data   =   $q->get();

        return $data;
    }

    public function getSuppliersUnderInquiry($id){

        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve','=', '1');
        $data = $q->where('rules.screen_id','=', '5');/*** inqiry screen number 5 ***/



        $data2 = DB::table('supplier_proposal')
            ->where('supplier_proposal.material_inquiry_id', '=', $id)
            ->join('users', 'supplier_proposal.supplier_id', '=', 'users.id')
            ->select('users.id as id','users.name as name','users.email as email')
            ->union($data)
           ->get();
        return $data2;
    }


    public function getUsersCanApproveProposal(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2','=', 1);
        $q->where('rules.screen_id','=', '5');/*** inqiry screen number 5 ***/
        $data   =   $q->get();

        return $data;
    }
    public function getUsersCanApproveProposal2(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve3','=', 1);
        $q->where('rules.screen_id','=', '5');/*** inqiry screen number 5 ***/
        $data   =   $q->get();

        return $data;
    }

    /*************************ADDED BY ROSHAN***********************************/
    public function deleteUser($id){
        DB::table('users')
            ->where('id', $id)
            ->delete();
        DB::table('users_details')
            ->where('user_id', $id)
            ->delete();
        DB::table('cc_emails')
            ->where('user_id', $id)
            ->delete();
        return;
    }

    //***************************iqbal ****************
    public function resetPassword($id){

        DB::table('users')
            ->where('id', $id)
            ->update(['password' => Hash::make('User123!')]);
        return;
    }

    public function getUsersCanApprove1Supplier(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve', '=', 1);
        $q->where('rules.screen_id','=', '7');/*** supplier screen number 7 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApprove2Supplier(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2', '=', 1);
        $q->where('rules.screen_id','=', '7');/*** supplier screen number 7 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanShowSupplier(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_show', '=', 1);
        $q->where('rules.screen_id','=', '7');/*** supplier screen number 7 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanShowScl(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_show', '=', 1);
        $q->where('rules.screen_id','=', '3');/*** scl screen number 3 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApproveScl(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve', '=', 1);
        $q->where('rules.screen_id','=', '3');/*** scl screen number 3 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApproveScl2(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2', '=', 1);
        $q->where('rules.screen_id','=', '3');/*** scl screen number 3 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApproveScl3(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve3', '=', 1);
        $q->where('rules.screen_id','=', '3');/*** scl screen number 3 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApproveSubcontractor(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve', '=', 1);
        $q->where('rules.screen_id','=', '8');/*** subcontractor screen number 8 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanApprove2Subcontractor(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2', '=', 1);
        $q->where('rules.screen_id','=', '8');/*** subcontractor screen number 8 ***/
        $data = $q->get();
        return $data;
    }

    public function getUsersCanShowSubcontractor(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_show', '=', 1);
        $q->where('rules.screen_id','=', '8');/*** subcontractor screen number 8 ***/
        $data = $q->get();
        return $data;
    }
    /**************************************************************************/
    /**************************** Iqbal **************/
    public function getUsersCanAddeGml(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_edit','=', '1');
        $q->where('rules.screen_id','=', '1');/*** gml screen number 1 ***/
        $data   =   $q->get();

        return $data;
    }
    //***************Delete supplier by iqbal *****************
    public function  deleteSupplier($id){
        DB::table('users')->where('id',$id)->delete();
    }

    public function getSupplierDetails($id)
    {
        $data = DB::table('users')
            ->where('users.id','=',$id)
            ->select('users.*')
            ->get();
        return $data;
    }

    public function getStorekeeper(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_edit','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }

    public function getManagers(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }

    public function getProcurement(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve2','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }

    public function getProjectEngineer(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_show','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }

    public function getCommercialManager(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve3','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }

    public function getFinanceManager(){
        $q  =   DB::table('users');
        $q->join('rules','users.id', 'rules.user_id');
        $q->select('users.id','users.name','users.email');
        $q->where('rules.can_approve3','=', 1);
        $q->where('rules.screen_id','=', '9');
        $data   =   $q->get();

        return $data;
    }
}
