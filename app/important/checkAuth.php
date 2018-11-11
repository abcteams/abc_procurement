<?php
/**
 * Created by PhpStorm.
 * User: Miqdad
 * Date: 10/22/2017
 * Time: 3:29 PM
 */
namespace App\important;
use \Illuminate\Support\Facades\Auth;


class checkAuth
{
    public function checkGML()
    {
        $result =$this->checkScreens(1);
        return (object)$result;
    }

    public function checkWorkZone()
    {
        $result =$this->checkScreens(2);
        return (object)$result;
    }

    public function checkSCL(){
        $result =$this->checkScreens(3);
        return (object)$result;
    }

    public function checkBOQ()
    {
        $result =$this->checkScreens(4);
        return (object)$result;
    }

    public function checkMTInquiry(){
        $result =$this->checkScreens(5);
        return (object)$result;
    }

    public function checkSCRequest(){
        $result =$this->checkScreens(6);
        return (object)$result;
    }

    public function checkSupplier(){
        $result =$this->checkScreens(7);
        return (object)$result;
    }
    public function checkSubcontractor(){
        $result =$this->checkScreens(8);
        return (object)$result;
    }

    public function checkMTRequisition(){
        $result =$this->checkScreens(9);
        return (object)$result;
    }
    public function checkMTRequisition2(){
        $result =$this->checkScreens(10);
        return (object)$result;
    }
    public function checkMTRequisition3(){
        $result =$this->checkScreens(11);
        return (object)$result;
    }

    public function checkUsers(){
        $result =$this->checkScreens(12);
        return (object)$result;
    }
    public function checkRules(){
        $result =$this->checkScreens(13);
        return (object)$result;
    }
    public function checkPositions(){
        $result =$this->checkScreens(14);
        return (object)$result;
    }

    private function checkScreens($screenId){
        $found  =   0;
        $array=[];

        foreach (Auth::user()->rules as $k =>$val)
        {
            if($val->screen_id == $screenId){
                $found  =   1;
                $array['can_show']       =   $val->can_show;
                $array['can_edit']       =   $val->can_edit;
                $array['can_approve']    =   $val->can_approve;
                $array['can_approve2']   =   $val->can_approve2;
                $array['can_approve3']   =   $val->can_approve3;
            }
        }

        if($found   ==  0)
        {
            $array['can_show']      =   0;
            $array['can_edit']      =   0;
            $array['can_approve']   =   0;
            $array['can_approve2']   =   0;
            $array['can_approve3']   =   0;
        }

        return $array;
    }
}