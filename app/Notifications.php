<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notifications extends Model
{
    protected function addnotificationSubGml($users,$data){
        $id =   DB::table('notifications')->insertGetId(
            [
                'title'           =>  $data['title'],
                'description'     =>  $data['description'],
                'link'            =>  $data['link']
            ]
        );

        $emails =   array();
        foreach ($users as $k => $val)
        {
            DB::table('notification_users')->insert(
                [
                    'notification_id'   =>  $id,
                    'user_id'           =>  $val->id,
                    'is_read'           =>  0
                ]
            );
            $emails[]   = $val->email;
        }
        return $emails;
    }
    //edited by roja to retrieve data descending order
    public function getNotification($user_id){
        $q  =   DB::table('notification_users');
        $q->join('notifications','notifications.id', 'notification_users.notification_id');
        $q->select('notifications.*','notification_users.is_read','notification_users.id as not_id','notifications.created_at');
        $q->where('notification_users.user_id','=',$user_id);
        $q->orderBy('notifications.created_at','desc');
        $q->take(10);
        $data   =   $q->get();

        return $data;
    }
    //added by roja - update status of read message
    public function updateStatus($not_id){
        $q = DB::table('notification_users');
        $q->where('notification_users.id','=',$not_id);
        $q->update(['is_read'=>'1']);
    }

    //update status of read message in view all notifications page
    public function updateStatus2($not_id=""){
        $q = DB::table('notification_users');
        $q->where('notification_users.user_id','=',auth()->user()->id);

        if($not_id != "")
            $q->where('notification_users.notification_id','=',$not_id);

        $q->update(['is_read'=>'1']);
    }
    //added by roja - get count of unread messages
    public function unreadCount($user_id){
        $q = DB::table('notification_users');
        $q->where([['notification_users.user_id','=',$user_id],['notification_users.is_read','=','0']]);
        $data = $q->count();

        return $data;
    }
    //added by roja - get count of all messages
    public function allNotifications($user_id){
        $q  =   DB::table('notification_users');
        $q->join('notifications','notifications.id', 'notification_users.notification_id');
        $q->select('notifications.*','notification_users.is_read','notifications.created_at','notification_users.id as not_id');
        $q->where('notification_users.user_id','=',$user_id);
        $q->orderBy('notifications.created_at','desc');
        $data   =   $q->paginate(10);

        return $data;
    }
    
}
