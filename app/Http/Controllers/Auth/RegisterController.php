<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\GetNotification;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'user_type'     => 'required|in:2,3',
            'country'       => 'required',
            'phone_number'  =>  'required|string|max:1000000000000',
            'company_name'  =>  'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    /*************  EDITED BY ROSHAN   ***************************************************/
    protected function create(array $data)
    {
        $result  =    User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type'=> $data['user_type'],
            'is_approved2'=> '0',
        ]);

        $user       = new User();
        $details    =   $user->userDetails($result['id'],$data);

        if($data['user_type']==2){
            $notification['title']       =   'New Supplier';
            $notification['description'] =   'New Supplier is waiting for approval';
            $notification['link']        =   asset('/users/pendingSuppliers');

            $notfy  =   new GetNotification();
            $notfy->supplierApprove1_1($notification);
        }

        if($data['user_type']==3){
            $notification['title']       =   'New Subcontractor';
            $notification['description'] =   'New Subcontractor is waiting for approval';
            $notification['link']        =   asset('/users/pendingSubcontractor');

            $notfy  =   new GetNotification();
            $notfy->subcontractorApprove1($notification);
        }
        return $result;
    }
}
