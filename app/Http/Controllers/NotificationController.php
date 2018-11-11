<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
use App\important\checkMenu;
use App\important\checkAuth;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller //Added by Roja
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

    public function statusUpdate(Request $request){
        $data               = $request->all();
        $notification       = new Notifications();
        $notification->updateStatus($data['not_id']);

        return redirect($data['link']);
    }

    public function readStatus(Request $request){
        $data['not_id']    = $request->data;
        $notification      = new Notifications();
        $notification->updateStatus2($data['not_id']);
        die('xx');
    }

    public function markRead(Request $request){
        $data               = $request->all();
        $notification       = new Notifications();
        $notification->updateStatus2();

        return redirect('notification/viewall');
    }

    public function viewAll(){
        $menuData           = $this->menu->Menu('','');
        $notification       = new Notifications();
        $data = $notification->allNotifications(Auth::user()->id);

        return view('Notification.viewall')->with('menu', $menuData)->with('data', $data);
    }
}
