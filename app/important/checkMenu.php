<?php
/**
 * Created by PhpStorm.
 * User: Miqdad
 * Date: 10/22/2017
 * Time: 3:29 PM
 */
namespace App\important;
use \Illuminate\Support\Facades\Auth;
use App\important\checkAuth;


class checkMenu
{
    public function Menu($mainMenu , $subMenu ,$subMenu2=''){
        $menuArray     =    array();
        if(Auth::user()->user_type == 1){
            $generalMenu    =   $this->getGeneralMenu($mainMenu , $subMenu,$subMenu2);
            return $generalMenu;
        }elseif (Auth::user()->user_type == 2){
            $supplierMenu    =   $this->getSupplierMenu($mainMenu , $subMenu);
            return $supplierMenu;
        }elseif (Auth::user()->user_type == 3)
        {
            $supcontractorMenu    =   $this->getSupcontractorMenu($mainMenu , $subMenu);
            return $supcontractorMenu;
        }
    }

    private function getGeneralMenu($mainMenu , $subMenu,$subMenu2)
    {
        $menuArray = array();
        $checkAuth = new checkAuth();
        $gml = $checkAuth->checkGML();
        $scl = $checkAuth->checkSCL();
        $workzone = $checkAuth->checkWorkZone();
        $mtInquiry = $checkAuth->checkMTInquiry();
        $supplier = $checkAuth->checkSupplier();
        $subcontractor = $checkAuth->checkSubcontractor();
        $settings = $checkAuth->checkUsers();
        $subconReq = $checkAuth->checkSCRequest();
        $mtRequisition = $checkAuth->checkMTRequisition();
        $mtRequisition2 = $checkAuth->checkMTRequisition2();
        $mtRequisition3 = $checkAuth->checkMTRequisition3();

        $GmlMenu = array(
            'mainmenu' => 'gml',
            'text' => 'Materials List',
            'title' => 'General Material List',
            'icon' => 'fa fa-sitemap',
            'details' => array()
        );

        $GmlMenu = $this->checkSubMenu(
            $GmlMenu,
            array(
                'type' => '0',
                'submenu' => 'showGml',
                'text' => 'View All',
                'icon' => 'fa fa-list-ul',
                'link' => asset('gml/show')
            ),
            $gml,
            $subMenu
        );
        $GmlMenu = $this->checkSubMenu(
            $GmlMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingGml',
                'text' => 'PendingGml',
                'icon' => 'fa fa-clock-o',
                'link' => asset('gml/pendingGml')
            ),
            $gml,
            $subMenu
        );
        $GmlMenu = $this->checkSubMenu(
            $GmlMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingSub',
                'text' => 'Pending Sub',
                'icon' => 'fa fa-clock-o',
                'link' => asset('gml/pendingSub')
            ),
            $gml,
            $subMenu
        );


        if (count($GmlMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($gml, $GmlMenu, $mainMenu, $subMenu));

        $SclMenu = array(
            'mainmenu' => 'scl',
            'text' => 'Subcontractor Category List',
            'title' => 'Subcontractor Category List',
            'icon' => 'fa fa-sitemap',
            'details' => array()
        );

        $SclMenu = $this->checkSubMenu(
            $SclMenu,
            array(
                'type' => '0',
                'submenu' => 'showScl',
                'text' => 'View All',
                'icon' => 'fa fa-list-ul',
                'link' => asset('scl/show')
            ),
            $scl,
            $subMenu
        );

        $SclMenu = $this->checkSubMenu(
            $SclMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingScl',
                'text' => 'Pending Scl',
                'icon' => 'fa fa-clock-o',
                'link' => asset('scl/pendingScl')
            ),
            $scl,
            $subMenu
        );
        $SclMenu = $this->checkSubMenu(
            $SclMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingSub',
                'text' => 'Pending sub',
                'icon' => 'fa fa-clock-o',
                'link' => asset('scl/pendingSub')
            ),
            $scl,
            $subMenu
        );


        if (count($SclMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($scl, $SclMenu, $mainMenu, $subMenu));

        $WorkZoneMenu = array(
            'mainmenu' => 'workzone',
            'text' => 'Work Zone',
            'title' => 'Work Zone',
            'icon' => 'fa fa-files-o',
            'details' => array()
        );


        $WorkZoneMenu = $this->checkSubMenu(
            $WorkZoneMenu,
            array(
                'type' => '0',
                'submenu' => 'showWz',
                'text' => 'View All',
                'icon' => 'fa fa-list-ul',
                'link' => asset('workzone/show')
            ),
            $workzone,
            $subMenu
        );

        $mtInqMenu = array(
            'mainmenu' => 'materialInq',
            'text' => 'Material Inquiry',
            'title' => 'Material Inquiry',
            'icon' => 'fa fa-list-ul',
            'details' => array()
        );

        $mtInqMenu = $this->checkSubMenu(
            $mtInqMenu,
            array(
                'type' => '1',
                'submenu' => 'pendingMtinq',
                'text' => 'Pending Inquiry',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialinquiry/pending')
            ),
            $mtInquiry,
            $subMenu
        );

        $mtInqMenu = $this->checkSubMenu(
            $mtInqMenu,
            array(
                'type' => '0',
                'submenu' => 'showMtinq',
                'text' => 'Inquiry Under Pricing',
                'icon' => 'fa fa-list-ul',
                'link' => asset('materialinquiry/show')
            ),
            $mtInquiry,
              $subMenu
        );
        $mtInqMenu = $this->checkSubMenu(
            $mtInqMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingcloseMtinq',
                'text' => 'Pending to Close',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialinquiry/pendingtoclose')
            ),
            $mtInquiry,
            $subMenu
        );
        $mtInqMenu = $this->checkSubMenu(
            $mtInqMenu,
            array(
                'type' => '0',
                'submenu' => 'closeMtinq',
                'text' => 'Closed Inquiry',
                'icon' => 'glyphicon glyphicon-inbox',
                'link' => asset('materialinquiry/closed')
            ),
            $mtInquiry,
            $subMenu
        );


        $mtReqMenu = array(
            'mainmenu' => 'materialReq',
            'text' => 'Material Requisition',
            'title' => 'Material Requisition',
            'icon' => 'fa fa-clock-o',
            'details' => array()
        );
/*
        $mtReqMenu    = array(
            'mainmenu'  =>  'Cart',
            'text'  =>'Cart',
            'title' =>'Cart',
            'icon'=>'fa fa-file-text-o',
            'details'   =>  array()
        );
*/
        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type'=>'1',
                'submenu'=>'pendingStoreKeeper',
                'text'=>'Store Keeper'  ,
                'icon'=>'fa fa-clock-o',
                'link'=>asset('materialrequisition/storekeeperPending')
            ),
            $mtRequisition,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type'=>'0',
                'submenu'=>'pendingManager',
                'text'=>'Project Manager'  ,
                'icon'=>'fa fa-clock-o',
                'link'=>asset('materialrequisition/managerPending')
            ),
            $mtRequisition,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type' => '2',
                'submenu' => 'pendingProcurement',
                'text' => 'Procurement',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialrequisition/procurementPending')
            ),
            $mtRequisition2,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type' => '1',
                'submenu' => 'pendingCommercial',
                'text' => 'Commercial',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialrequisition/commercialPending')
            ),
            $mtRequisition2,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type' => '0',
                'submenu' => 'pendingFinance',
                'text' => 'Finance Manager',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialrequisition/financePending')
            ),
            $mtRequisition2,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type' => '3',
                'submenu' => 'awaitingMtinq',
                'text' => 'Awaiting Materials',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialrequisition/awaiting')
            ),
            $mtRequisition2,
            $subMenu
        );

        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type' => '3',
                'submenu' => 'deliveredMtinq',
                'text' => 'Delivered Materials',
                'icon' => 'fa fa-clock-o',
                'link' => asset('materialrequisition/delivered')
            ),
            $mtRequisition2,
            $subMenu
        );
        $mtReqMenu = $this->checkSubMenu(
            $mtReqMenu,
            array(
                'type'=>'1',
                'submenu'=>'reports',
                'text'=>'Reports'  ,
                'icon'=>'fa fa-list-ul',
                'link'=>asset('materialrequisition/reports')
            ),
            $mtRequisition,
            $subMenu
        );


/*
        if (count($mtInqMenu['details']) > 0)
        {
            $WorkZoneMenu = $this->checkSubMenu(
                $WorkZoneMenu,
                $mtInqMenu,
                $workzone,
                $subMenu
            );
        }
*/
        if(count($WorkZoneMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($workzone,$WorkZoneMenu,$mainMenu,$subMenu));

        if(count($mtInqMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($mtInquiry,$mtInqMenu,$mainMenu,$subMenu));

        if(count($mtReqMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($mtRequisition,$mtReqMenu,$mainMenu,$subMenu));




        $suppliersMenu    = array(
            'mainmenu'  =>  'showSupplieras',
            'text'=>'Suppliers',
            'title'=>'Suppliers List',
            'icon'=>'fa fa-user',
            'details'   =>  array()
        );
        $suppliersMenu = $this->checkSubMenu(
            $suppliersMenu,
            array(
                'type'=>'0',
                'submenu'=>'showSupplieras',
                'text'=>'View All'  ,
                'icon'=>'fa fa-list-ul',
                'link'=>asset('users/showSuppliers')
            ),
            $supplier,
            $subMenu
        );
        $suppliersMenu = $this->checkSubMenu(
            $suppliersMenu,
            array(
                'type'=>'0',
                'submenu'=>'pendingSuppliers',
                'text'=>'Pending'  ,
                'icon'=>'fa fa-clock-o',
                'link'=>asset('users/pendingSuppliers')
            ),
            $supplier,
            $subMenu
        );
        if(count($suppliersMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($supplier,$suppliersMenu,$mainMenu,$subMenu));

        $constMenu    = array(
            'mainmenu'  =>  'subcont',
            'text'=>'Subcontractor',
            'title'=>'Subcontractor List',
            'icon'=>'fa fa-sitemap',
            'details'   =>  array()
        );

        $constMenu = $this->checkSubMenu(
            $constMenu,
            array(
                'type'=>'0',
                'submenu'=>'showSubcont',
                'text'=>'View All'  ,
                'icon'=>'fa fa-list-ul',
                'link'=>asset('users/showSubcontractor')
            ),
            $subcontractor,
            $subMenu
        );
        $constMenu = $this->checkSubMenu(
            $constMenu,
            array(
                'type'=>'0',
                'submenu'=>'pendingSubcont',
                'text'=>'Pending'  ,
                'icon'=>'fa fa-clock-o',
                'link'=>asset('users/pendingSubcontractor')
            ),
            $subcontractor,
            $subMenu
        );


        $subRequestMenu    = array(
            'type' => '5',
            'submenu'  =>  'subcontReq',
            'text'  =>'SubContractor Request',
            'title' =>'SubContractor Request',
            'icon'=>'fa fa-file-text-o',
            'details'   =>  array()
        );

        $subRequestMenu = $this->checkSubMenu(
            $subRequestMenu,
            array(
                'type'=>'0',
                'submenu'=>'showSubReq',
                'text'=>'View All'  ,
                'icon'=>'fa fa-list-ul',
                'link'=>asset('subcontractorrequest/show')
            ),
            $subconReq,
            $subMenu2
        );
        $subRequestMenu = $this->checkSubMenu(
            $subRequestMenu,
            array(
                'type'=>'0',
                'submenu'=>'closeSubReq',
                'text'=>'Closed'  ,
                'icon'=>'glyphicon glyphicon-inbox',
                'link'=>asset('subcontractorrequest/closed')
            ),
            $subconReq,
            $subMenu2
        );
        $subRequestMenu = $this->checkSubMenu(
            $subRequestMenu,
            array(
                'type'=>'1',
                'submenu'=>'pendingSubReq',
                'text'=>'Pending'  ,
                'icon'=>'fa fa-clock-o',
                'link'=>asset('subcontractorrequest/pending')
            ),
            $subconReq,
            $subMenu2
        );
        if (count($subRequestMenu['details']) > 0) {
            $constMenu = $this->checkSubMenu(
                $constMenu,
                $subRequestMenu,
                $subcontractor,
                $subMenu
            );
        }
        if(count($constMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($subcontractor,$constMenu,$mainMenu,$subMenu));


        $settingsMenu    = array(
            'mainmenu'  =>  'settings',
            'text'  =>'Settings',
            'title' =>'Settings',
            'icon'=>'fa fa-gear',
            'details'   =>  array()
        );

        $settingsMenu = $this->checkSubMenu(
            $settingsMenu,
            array(
                'type'=>'0',
                'submenu'=>'showUsers',
                'text'=>'Users'  ,
                'icon'=>'fa fa-users',
                'link'=>asset('users/showUsers')
            ),
            $settings,
            $subMenu
        );

        $settingsMenu = $this->checkSubMenu(
            $settingsMenu,
            array(
                'type'=>'0',
                'submenu'=>'showPositions',
                'text'=>'Positions'  ,
                'icon'=>'fa fa-sitemap',
                'link'=>asset('users/showPositions')
            ),
            $settings,
            $subMenu
        );

        if(count($settingsMenu['details']) > 0)
            array_push($menuArray, $this->createGenaralMenu($settings,$settingsMenu,$mainMenu,$subMenu));



        return $menuArray;
    }

    private function getSupplierMenu($mainMenu , $subMenu)
    {
        $menuArray  =   array();

        $mainMenu == 'MTinquiry'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'Material Inquiry',
            'title'=>'Material Inquiry List',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'pendingInq'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Pending Inquiries','fa fa-clock-o',asset('supplier/pendinginquiry'),$subActive);
        array_push($Array['details'], $detailsMenu);
        $subMenu == 'sentProposals'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Sent Proposals','fa fa-sitemap',asset('supplier/sentProposals'),$subActive);
        array_push($Array['details'], $detailsMenu);
        array_push($menuArray, $Array);


        $mainMenu == 'agreement'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'Agreements',
            'title'=>'',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'pendingAgreement'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Pending Agreement','fa fa-clock-o',asset('supplier/pendingAgreement'),$subActive);
        array_push($Array['details'], $detailsMenu);
        array_push($menuArray, $Array);


        $mainMenu == 'mi'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'Material Requisitions',
            'title'=>'',
            'icon'=>'fa fa-shopping-cart',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'showMr'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('LOP','fa fa-list-ul',asset('supplier/lop'),$subActive);
        array_push($Array['details'], $detailsMenu);
        array_push($menuArray, $Array);


        $mainMenu == 'mymaterial'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'My Materials',
            'title'=>'',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'showMi'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('View All','fa fa-list-ul',asset('supplier/materials'),$subActive);
        array_push($Array['details'], $detailsMenu);

        $subMenu == 'addMi'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Add','fa fa-pencil',asset('supplier/addmaterial'),$subActive);
        array_push($Array['details'], $detailsMenu);


        array_push($menuArray, $Array);
        return $menuArray;
    }

    private function checkSubMenu($mainMenu,$subMenu,$auth ,$activeMenu){
        $activeMenu == $subMenu['submenu'] ? $subActive = 'active': $subActive='';


        if($subMenu['type'] == 0 && $auth->can_show){
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],$subMenu['link'],$subActive);
            array_push($mainMenu['details'], $detailsMenu);
        }
        if($subMenu['type'] == 1 && $auth->can_approve){
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],$subMenu['link'],$subActive);
            array_push($mainMenu['details'], $detailsMenu);
        }
        if($subMenu['type'] == 2 && $auth->can_edit){
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],$subMenu['link'],$subActive);
            array_push($mainMenu['details'], $detailsMenu);
        }
        if($subMenu['type'] == 3 && $auth->can_approve2){
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],$subMenu['link'],$subActive);
            array_push($mainMenu['details'], $detailsMenu);
        }
        if($subMenu['type'] == 4 && $auth->can_approve3){
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],$subMenu['link'],$subActive);
            array_push($mainMenu['details'], $detailsMenu);
        }
        if($subMenu['type'] == 5){
            $subActive  =   $subActive.' xn-openable';
            $detailsMenu    =  $this->createSubMenu($subMenu['text'],$subMenu['icon'],'#',$subActive , $subMenu['details']);
            array_push($mainMenu['details'], $detailsMenu);
        }
        return $mainMenu;
    }

    private function getSupcontractorMenu($mainMenu , $subMenu)
    {
        $menuArray  =   array();

        $mainMenu == 'subRequest'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'Subcontractor Request',
            'title'=>'Subcontractor Request List',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'pendingRequest'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Pending Request','fa fa-clock-o',asset('subcontractor/pendingRequest'),$subActive);
        array_push($Array['details'], $detailsMenu);
        array_push($menuArray, $Array);


        $mainMenu == 'subAgreement'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'Agreements',
            'title'=>'',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'pendingAgreement'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Pending Agreement','fa fa-clock-o',asset('subcontractor/pendingAgreement'),$subActive);
        array_push($Array['details'], $detailsMenu);
        array_push($menuArray, $Array);



        $mainMenu == 'mycategory'? $mainActive = 'active': $mainActive='';

        $Array= array(
            'text'=>'My Category',
            'title'=>'',
            'icon'=>'fa fa-file-text-o',
            'Active'=>$mainActive,
            'details'=>array()
        );
        $subMenu == 'showCat'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('View All','fa fa-list-ul',asset('subcontractor/category'),$subActive);
        array_push($Array['details'], $detailsMenu);

        $subMenu == 'addCat'? $subActive = 'active': $subActive='';
        $detailsMenu    =  $this->createSubMenu('Add','fa fa-pencil',asset('subcontractor/addcategory'),$subActive);
        array_push($Array['details'], $detailsMenu);


        array_push($menuArray, $Array);
        return $menuArray;

    }

    private function createSubMenu($text,$icon,$link,$active,$details = array()){
        $array= array(
            'text' => $text,
            'icon' => $icon,
            'link' => $link,
            'Active'=>$active,
            'details'=>$details
        );
        return $array;
    }



    private function createGenaralMenu($auth,$menu,$mainMenu,$subMenu){
        $mainMenu == $menu['mainmenu']? $mainActive = 'active': $mainActive='';
        $Array  =   array();

            $Array= array(
                'text'=>$menu['text'],
                'title'=>$menu['title'],
                'icon'=>$menu['icon'],
                'Active'=>$mainActive,
                'link'=>'#',
                'details'=>array()
            );

            if(count($menu['details']) > 0){
                foreach ($menu['details'] as $k => $val)
                {
                    array_push($Array['details'], $val);
                }
            }

        return $Array;
    }





































}