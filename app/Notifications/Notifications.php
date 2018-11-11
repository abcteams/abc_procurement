<?php

namespace App\Notifications;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Notifications extends \App\Notifications {
    private $users      =   '123';
    private $data;
    private $emails     =   array();

    public function set($data){
        $this->users    =   $data['users'];
        $this->data     =   $data['data'];
    }

    public function toDatabase(){
       $notify        =   new \App\Notifications();
       $this->emails  =   $notify->addnotificationSubGml($this->users,$this->data);
    }

    public function byOneEmail(){
        if(count($this->emails) < 1){
            foreach ($this->users as $k => $val)
            {
                $this->emails[] =   $val->email;
            }
        }

        $emails     =   $this->emails;
        $subject    =   $this->data['title'];
        $desc       =   $this->data['description'];
        $link       =   $this->data['link'];
        $data       =   array('title'=>$subject,'body'=>$desc,'link'=>$link);

        Mail::send('emails.notificationbody',$data,function($message) use ($emails,$subject){
         //   $message->cc($ccEmails);
            $message->to($emails)->subject($subject);
            $message->from('procurement@abc-gcc.com' , 'ABC-PROCUREMENT');
        });
    }

    public function printUsers(){
        echo '<pre>';
        print_r($this->users);die();
    }


    public function getCart($user_id){
        $q = DB::table('cart_items');
        $q->join('boq_sub_materials', 'cart_items.item_id', '=', 'boq_sub_materials.id');
        $q->where([['cart_items.item_type', '=', 1],['cart_items.req_id', '=', 0]]);
        $q->where('cart_items.user_id', '=', $user_id);
        $q->select('cart_items.id','boq_sub_materials.description','boq_sub_materials.size','boq_sub_materials.size_unit');
        $q->orderBy('cart_items.id', 'desc');
        $data['materials']   =   $q->get();

        $q = DB::table('cart_items');
        $q->join('boq_accessories', 'cart_items.item_id', '=', 'boq_accessories.id');
        $q->where([['cart_items.item_type', '=', 2],['cart_items.req_id', '=', 0]]);
        $q->where('cart_items.user_id', '=', $user_id);
        $q->select('cart_items.id','boq_accessories.description');
        $q->orderBy('cart_items.id', 'desc');
        $data['accessories']   =   $q->get();
        return $data;
    }
}