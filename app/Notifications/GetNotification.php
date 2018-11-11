<?php

namespace App\Notifications;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class GetNotification extends Notification
{
    // get notification for the user hava auth to see the notification
    // to get that you should check the screen number and if the user have auth
    // 1- can see 2- can edit 3- can approve 4- can approve 2 5- can approve 3
    // you should get all ruls for the user then check if the notification have the screen id
    // then you should check if the user have the auth

    public function getNotificationByRuls(){
        $notification   =   new \App\Notifications();
        $data   =   $notification->getNotification(Auth::user()->id);
        return $data;
    }


    public function gmlFirstApprove($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveGml();
        $data   =   array();

        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
    }

    public function gmlSecondApprove($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveGml();
        $data   =   array();

        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
    }

    public function subGmlApprove1($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveGml();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function subGmlApprove2($notify){ //added by roja

        $user          =   new User();
        $users         =   $user->getUsersCanApproveGml2();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function subGmlApprove3($notify){ //added by roja
        $user          =   new User();
        $users         =   $user->getUsersCanApproveGml3();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function gmlApprove2($notify){ //added by roja
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveGml2();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function gmlApprove3($notify){ //added by roja
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveGml3();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function creatyNewInquiry($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanCreateInqiry();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function inquiryPending($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveInquiry();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function supplierDecline($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveInquiry();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function supplierAccept($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveInquiry();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function dateUpdate($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveInquiry();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function extendDate($notify,$id){
        $user          =   new User();
        $users         =   $user->getSuppliersUnderInquiry($id);

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        $notfications->byOneEmail();
        return;
    }


    public function getCart(){
        $notfication    =   new Notifications();
        $cart           =   $notfication->getCart(Auth::user()->id);
        return $cart;
    }

    public function proposalApprove($notify){ //added by roja
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveProposal();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function proposalApprove2($notify){ //added by roja
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveProposal();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function proposalApprove3($notify){ //added by roja
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveProposal2();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function agreementDecline($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveProposal();

        $data           =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function agreementAccept($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveProposal();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    /*********************** added by roshan**************/
    public function supplierApprove1($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanShowSupplier();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }
    public function supplierApprove1_1($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApprove1Supplier();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function supplierApprove12($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApprove2Supplier();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }


    public function sclFirstApprove1($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveScl();
        $data   =   array();

        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
    }

    public function sclApprove12($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveScl2();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function sclApprove13($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveScl3();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function sclApproved($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanShowScl();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function subcontractorApprove1($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApproveSubcontractor();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function subcontractorApprove12($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanApprove2Subcontractor();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }

    public function subcontractorApproved($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanShowSubcontractor();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //  $notfications->byOneEmail();
        return;
    }
    /*******************************************************************************************************************/
    /************************* Iqbal ****************/
    public function gmlCanAdd($notify){
        $user          =   new User();
        $users         =   $user->getUsersCanAddeGml();
        $data   =   array();

        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
    }

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

    public function storeKeeperCheck($notify){
        $user          =   new User();
        $users         =   $user->getStorekeeper();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;
    }

    public function storeKeeperApprove($notify){
        $user          =   new User();
        $users         =   $user-> getManagers();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function managerReject($notify){
        $user          =   new User();
        $users         =   $user-> getProjectEngineer();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function managerApprove($notify){
        $user          =   new User();
        $users         =   $user-> getProcurement();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function procurementReject($notify){
        $user          =   new User();
        $users         =   $user-> getUsersCanApproveProposal();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }
    public function procurementApprove($notify){
        $user          =   new User();
        $users         =   $user->getCommercialManager();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function commercialReject($notify){
        $user          =   new User();
        $users         =   $user->getProcurement();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function commercialApprove($notify){
        $user          =   new User();
        $users         =   $user->getFinanceManager();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        // $notfications->byOneEmail();
        return;

    }

    public function financeApprove($notify,$id){
        $user          =   new User();
        $users         =   $user-> getSupplierDetails($id);

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        $notfications->byOneEmail();
        return;

    }

    public function financeReject($notify){
        $user          =   new User();
        $users         =   $user->getProcurement();

        $data   =   array();
        $data['users']  =   $users;
        $data['data']   =   $notify;

        $notfications   =   new Notifications();
        $notfications->set($data);

        $notfications->toDatabase();
        //$notfications->byOneEmail();
        return;

    }

}
