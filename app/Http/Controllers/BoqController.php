<?php

namespace App\Http\Controllers;

use App\Boq;
use App\gml;
use App\important\checkAuth;
use App\important\checkMenu;
use App\MaterialInquiry;
use App\Notifications\GetNotification;
use App\Supplier;
use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BoqController extends Controller
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
        $menuData   =   $this->menu->Menu('workzone','');
        $authBOQ        =   $this->checkAuth->checkBOQ();
        if($authBOQ->can_show)
        {
            $search['id']       =   $request->id;
            $search['type']     =   $request->type;
            $search['value']    =   $request->value;

            $Boq    =   new Boq();
            $data   =   $Boq->fetchAll($search);
            $sub_zone   =   $Boq->getsubZone($request->id);

            return view('BOQ.show')->with('menu',$menuData)->with('data',$data)->with('sub_zone',$sub_zone)->with('auth',$authBOQ);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function add(Request $request){
        $authBOQ        =   $this->checkAuth->checkBOQ();
        $menuData   =   $this->menu->Menu('workzone','');
        if($authBOQ->can_edit) {
            $gml        =   new gml();
            $gmldata    =   $gml->allMaterials();

            $Boq = new Boq();
            $sub_zone   =   $Boq->getsubZone($request->workzoneId);

            if (isset($request->id) && $request->id > 0) {

                $data = $Boq->getRecord($request->id);
                return view('BOQ.add')->with('menu', $menuData)->with('theRecord', $data)->with('gml',$gmldata)->with('zone',$sub_zone);;
            } else {
                return view('BOQ.add')->with('menu', $menuData)->with('gml',$gmldata)->with('sub_zone',$sub_zone);
            }
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function addboq(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $this->validate($request, [
            'sub_gml' => 'required|not_in:0',
        ]);

        $authBOQ        =   $this->checkAuth->checkBOQ();
        if($authBOQ->can_edit) {
            $data   =   array();
            $data['sub_work_zone']  =   intval($request->sub_work_zone_id);
            $data['work_zone']      =   intval($request->work_zone_id);
            $data['sub_gml_id']     =   intval($request->sub_gml);

            $Boq    =   new Boq();
            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $Boq->updateRecord($data);
            }else{
                $Boq->addRecord($data);
            }
            return redirect('boq/show/'.$request->sub_work_zone_id)->with('menu', $menuData);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function getsubgmlitems(Request $request)
    {
        $gml_id =   intval($request->gml_id);
        if($gml_id > 0){
            $gml    =   new gml();
            $data   =   $gml->getSubGml($gml_id);
            die(json_encode($data));

        }else{
            die(0);
        }
    }

    public function showsubboq(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $authBOQ        =   $this->checkAuth->checkBOQ();
        $authInq        =   $this->checkAuth->checkMTInquiry();
        $auth['boq']    =   $authBOQ;
        $auth['inq']    =   $authInq;

        $Boq    =   new Boq();
        $main_Boq   =   $Boq->getBoq($request->id);
        if($authBOQ->can_show)
        {
            $data   =   $Boq->showsubboq($request->id,$request->value);
            return view('BOQ.showsub')
                ->with('menu', $menuData)
                ->with('data',$data)
                ->with('id',$request->id)
                ->with('boq',$main_Boq)
                ->with('auth',$auth);
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }

    public function addboqsub(Request $request){
        $menuData   =   $this->menu->Menu('workzone','materialInq');
        $authBOQ        =   $this->checkAuth->checkBOQ();

        $Boq = new Boq();
        $main_boq    =   $Boq->getBoq($request->boq_id);
        //if($authBOQ->can_edit) {
            if (isset($request->id) && $request->id > 0) {

                $data = $Boq->getSubBoqRecord($request->id);
                return view('BOQ.addboqsub')
                    ->with('menu', $menuData)
                    ->with('mainMenu', 'workzone')
                    ->with('theRecord', $data)
                    ->with('main_boq',$main_boq);
            } else {
                return view('BOQ.addboqsub')
                    ->with('menu', $menuData)
                    ->with('main_boq',$main_boq);
            }
        //}
       // else{
        //    return redirect()->action('HomeController@index');
      //  }

    }

    public function addboqsubmaterilas(Request $request){
        $menuData   =   $this->menu->Menu('workzone','materialInq');
        $this->validate($request, [
            'quantity'  => 'required|not_in:0',
            'budgetory' => 'required|not_in:0',
            'description' => 'required'
        ]);

        $authBOQ        =   $this->checkAuth->checkBOQ();
       // if($authBOQ->can_edit) {
            $data   =   array();

            $data['boq_id']                 =   $request->boq_id;
            $data['quantity']               =   $request->quantity;
            $data['quantity_unit']          =   $request->quantity_unit;
            $data['budgetory_price']        =   $request->budgetory;
            $data['size']                   =   $request->size;
            $data['size_unit']              =   $request->size_unit;
            $data['description']            =   $request->description;


            $Boq    =   new Boq();
            if(isset($request->id )&& $request->id > 0) {
                $data['id']   =   $request->id;
                $id =   $Boq->updateSubRecord($data);
            }else{
                $id =   $Boq->addsubRecord($data);
            }

            $files = $request->file('attachments');

            if(!empty($files)):
                foreach($files as $k => $file):
                    $extension  =   $file->getClientOriginalExtension();

                    $path   =   base_path() . '/public/attachments';
                    if(!is_dir ( $path))
                        $path   =   base_path() . '/attachments';

                    $path   =   $path.'/material_specs/'.$id;
                    if(!is_dir ( $path))
                        mkdir($path);

                    $file->move(
                        $path.'/',rand(10,1000).'.'.$extension
                    );
                endforeach;
            endif;

            return redirect('boq/showsubboq/'.$request->boq_id)->with('menu', $menuData);
       // }
       // else{
            return redirect()->action('HomeController@index');
      //  }
    }


    public function removeSubBoq(Request $request){
        $authBOQ        =   $this->checkAuth->checkBOQ();
        if ($authBOQ->can_edit) {
            $Boq = new Boq();
            $Boq->removeSubBoq($request->id);
        }
        die();
    }
    public function redayToInqire(Request $request)
    {
        $id     =   $request->id;
        $boq    =   new Boq();
        $boq->readyToInquire($id);

        $notification['title']       =   'New Inquiry ready';
        $notification['description'] =   'there is a new Inquiry Ready to Inquire';
        $notification['link']        =   asset('/boq/showsubboq'.$id);

        $notfy  =   new GetNotification();
        $notfy->creatyNewInquiry($notification);
        return Redirect::back();

    }

    public function removeBoq(Request $request){
        $authBOQ        =   $this->checkAuth->checkBOQ();
        if ($authBOQ->can_edit) {
            $Boq = new Boq();
            $Boq->removeBoq($request->id);
            //$check   = $Boq->checkInqIsCreated($request->id);
           // if(intval($check) == 1)
           // {
           //     die('This BOQ Under Procurement , You Cant Remove it');
          //  }else{
          //      $Boq->removeBoq($request->id);
          //  }
        }
        die();
    }

    public function removeSpecs(Request $request){
        $specsId    = $request->id;
        $fileName   =   $request->file_name;

        $path   =   base_path() . '/public/attachments';
        if(!is_dir ( $path))
            $path   =   base_path() . '/attachments';

        $path   =   $path.'/material_specs/'.$specsId.'/'.$fileName;
        unlink($path);
        die();
    }

    public function addAgreement(Request $request){

        $Boq        =   new Boq();
        $main_Boq   =   $Boq->getBoq($request->id);

        $menuData   =   $this->menu->Menu('workzone','');
        $authBOQ        =   $this->checkAuth->checkBOQ();
        $supplier  =   new User();
        $search['user'] =   2;
        $suppliers  =   $supplier->getAllSuppliers();

        if ($authBOQ->can_edit) {
            return view('BOQ.addAgreement')->with('menu', $menuData)->with('suppliers',$suppliers)->with('data',$main_Boq);
            die('xx');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function agreementsDitals(Request $request){
        $this->validate($request, [
            'date'  => 'required',
            'close_date' => 'required',
            'total_price'      => 'required',
            'deliveryPeriod' => 'required',
            'quotation_ref' => 'required',
            'payment_terms' => 'required',
        ]);
        $data                           =   array();
        $data2                          =   array();
        $data['date']                   =   $request->date;
        $data['close_date']             =   $request->close_date;
        $data['total_price']            =   $request->total_price;
        $data['compliance']             =   $request->compliance;
        $data['compliance']             =   $request->compliance;
        $data['deliveryPeriod']         =   $request->deliveryPeriod;
        $data['supplier_name']          =   $request->supplier_name;
        $data['supplier_email']         =   $request->email;
        $data['boq']                    =   $request->boq;
        $data['id']                     =   $request->supplier_id;

        $data2['quotation_ref']         =   $request->quotation_ref;
        $data2['payment_terms']         =   $request->payment_terms;
        $data2['supplier_code']         =   $request->supplier_code;

        $data2['submital_requisted']    =   $request->submital_requisted;
        $data2['copies_number']         =   $request->copies_number;
        $data2['sub_gml_id']            =   $request->sub_gml_id;
        $data2['supplier_id']           =   $request->supplier_id;
        $data2['all_materials']         =   isset($request->allMaterial)?'All Materials':'Some Materials';



        $inquiry    =   new MaterialInquiry();
        $data['material_inquiry']       =   $inquiry->addCloseInquiry($data);

      
        $supplier       =   new Supplier();
        $mtinquiry      =   new MaterialInquiry();
        $proposal_id    =   $supplier->addProposalByemail($data , $accepted = 1);

        $boq        =   new Boq();
        $boq->updaateBoqStatus($data['boq'] ,3);

        $data2['proposal_id']        =   $proposal_id;
        $proposal_id    =   $mtinquiry->addAgreement($data2 , $supplier_accepted = 1);



        $quotation = $request->file('quotation');
        $datasheet = $request->file('datasheet');

        if(!empty($quotation)):
            $extension  =   $quotation->getClientOriginalExtension();
            $path   =   base_path() . '/public/quotations';
            if(!is_dir ( $path))
                $path   =   base_path() . '/quotations';

            if(!is_dir ( $path))
                mkdir($path);

            $quotation->move(
                $path.'/',$proposal_id.'.'.$extension
            );

        endif;

        if(!empty($datasheet)):
            $extension  =   $datasheet->getClientOriginalExtension();

            $path   =   base_path() . '/public/datasheets';
            if(!is_dir ( $path))
                $path   =   base_path() . '/datasheets';

            if(!is_dir ( $path))
                mkdir($path);

            $datasheet->move(
                $path.'/',$proposal_id.'.'.$extension
            );
        endif;
        return redirect()->action('HomeController@index');
    }

    public function accessories(Request $request){

        $boq        =   new Boq();
        $data       =   $boq->getSubBoqRecord($request->id);
        $accessories=   $boq->getAccessories($request->id);



        $menuData   =   $this->menu->Menu('workzone','');
        $authBOQ        =   $this->checkAuth->checkBOQ();
        if($authBOQ->can_show) {
            return view('BOQ.accessories')
                ->with('menu', $menuData)
                ->with('data', $data)
                ->with('accessories', $accessories)
                ->with('auth',$authBOQ);;
        }
        die('xx');
    }

    public function addAccessories(Request $request){
        $data       =   array();
        $subBoqId   =   $request->subBoqId;
        $boqId      =   $request->boq_id;
        if(count($request->description) > 0)
        {
            foreach ($request->description as $k => $val)
            {
                if(trim($val) != '') {
                    $data[$k]['sub_boq_id']     = $subBoqId;
                    $data[$k]['description']    = $val;
                    $data[$k]['quantity']       = intval($request->quantity[$k] == 0 ? 1 : $request->quantity[$k]);
                    $data[$k]['model']          = $request->model[$k];
                }
            }

            $boq    =   new Boq();
            $boq->addAccessories($data);
        }

        return redirect()->action('BoqController@showsubboq',['id'=>$boqId]);

        die();
    }

    public function removeAccessorie(Request $request){
        $boq    =   new Boq();
        $boq->removeAccessorie($request->id);
        die();
    }
    public function modelsAndRate(Request $request){
        $menuData   =   $this->menu->Menu('workzone','');
        $authBOQ        =   $this->checkAuth->checkBOQ();
        if($authBOQ->can_edit) {
            $boq        =   new Boq();
            $data       =   $boq->getFullBoq($request->id);
            return view('BOQ.modelsandrates')
                ->with('menu', $menuData)
                ->with('data', $data);
            die('xx');
        }

        die('xx');
    }


    public function addmodelsandRates(Request $request){
        $boq    =   new Boq();
        $materials  =   array();
        if(isset($request->id))
        {
            foreach ($request->id as $k => $val)
            {
                $materials[$k]['id']    =   $val;
                $materials[$k]['model']    =   $request->model[$k];
                $materials[$k]['rate']    =   floatval($request->rate[$k]);
            }
            $boq->addmodelAndRateForMaterials($materials);

        }

        $accssesries  =   array();
        if(isset($request->id2))
        {
            foreach ($request->id2 as $k => $val)
            {
                $accssesries[$k]['id']    =   $val;
                $accssesries[$k]['model']    =   $request->model2[$k];
                $accssesries[$k]['rate']    =   $request->rate2[$k];
            }
            $boq->addmodelAndRateForAcc($accssesries);
        }

        return redirect()->action('BoqController@showsubboq',['id'=>$request->boq_id]);

    }
}
