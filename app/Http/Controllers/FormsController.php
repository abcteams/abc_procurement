<?php

namespace App\Http\Controllers;

use App\MaterialInquiry;
use App\Materialrequisuition;
use App\Supplier;
use App\User;
use App\Notifications\GetNotification;
use Hashids\Hashids;
use Illuminate\Http\Request;


class FormsController extends Controller
{
    public function supplierProposal(Request $request)
    {

        $id         =   $request->id;
        $supplier   =   new Supplier();
        $data       =   $supplier->getInquiryDetails($id);
        if(count($data) > 0)
        {
            $subgml_id  =   $data[0]->subgml;
            $suppliers  =   $supplier->getSuppliersByMaterial($subgml_id);
            if(count($suppliers) > 0)
            {
                foreach ($suppliers as $supplier)
                {
                    $hashids    =   new Hashids();
                    print_r(asset('forms/supplierForm/'.$hashids->encode($id).'/'.$hashids->encode($supplier->supplier_id)));
                    echo '<br/>';
                }
            }
        }

    }

    
    public function supplierForm(Request $request){
        $hashids        =   new Hashids();

        $inquiry_id     =   $hashids->decode($request->id)[0];
        $supplier_id    =   $hashids->decode($request->supplier_id)[0];

        $supplier       =   new Supplier();
        $checkSupplier  =   $supplier->isProposaled($supplier_id,$inquiry_id);

        $material       =    new MaterialInquiry();

        if($checkSupplier == null){
            $supplier_info  =   User::find($supplier_id);
            $data           =   $supplier->getInquiryDetails($boq_id = 0,$inquiry_id);

            return view('Forms.supplierProposal')->with('data', $data)->with('supplier',$supplier_info);
        }else{
            return view('Forms.thankspage')->with('msg','thanks , we will contact with you soon');
        }

    }

    public function requisition(Request $request){
        $hashids    =   new Hashids();

        $requisition_id     =   $hashids->decode($request->id)[0];
        $supplier_id        =   $hashids->decode($request->supplier_id)[0];
        $user   =   new User();
        $userInfo   =   $user->getSupplierOrSubContractorInfo($supplier_id);

        $requisition    =   new Materialrequisuition();
        $data   =   $requisition->getRequsuitionDetails($requisition_id);

        return view('Forms.supplierRequisition')->with('data', $data)->with('userinfo',$userInfo);

    }

    public function acceptRequisition(Request $request){
        $requisition    =   new Materialrequisuition();
        $requisition->supplier_approved($request->id);
        return view('Forms.thankspage')->with('msg','Thanks For Acknowledging The purchase order , Please Send us the Proforma Invoice in order To Make Payment ready ');
    }

    public function supplierAgreement(Request $request){
        $hashids    =   new Hashids();
        $id         =   $hashids->decode($request->id)[0];
        $mtInq      =   new MaterialInquiry();
        $data       =   $mtInq->supplierFormAgreement($id);

        if(isset($data) && $data->is_supplier_accepted == 0) {
            return view('Forms.supplierAgreement')->with('data', $data);
        }else{
            return view('Forms.thankspage')->with('msg','thanks , we will contact with you soon');
        }
    }

    public function acceptAgreement(Request $request){
        $mtInq      =   new MaterialInquiry();
        $mtInq->acceptAgreement($request->id);
        $mtInq->changeInqStatus($request->work_zone_id,$request->sub_gml_id , 4,$request->id);

        $notification['title']       =   'Supplier Accepted Agreement';
        $notification['description'] =   'A supplier accepted the agreement';
        $notification['link']        =   asset('/materialinquiry/showAccepted/'.$request->material_inquiry);

        $notfy  =   new GetNotification();
        $notfy->agreementAccept($notification);

        return view('Forms.thankspage')->with('msg','thanks for accepting the agreement , we will contact with you soon');
    }

    public function supplierAccepted(Request $request){
        $this->validate($request, [
            'total_price' => 'required|min:1',
            'deliveryPeriod' => 'required',
            'datasheet' =>  'required|max:5000',
            'quotation' =>  'required|max:5000',
        ]);

        $data                          =   array();
        $data['total_price']           =   $request->total_price;
        $data['compliance']            =   $request->compliance;
        $data['deliveryPeriod']        =   $request->deliveryPeriod;
        $data['supplier_name']         =   $request->supplier_name;
        $data['supplier_email']        =   $request->email;
        $data['material_inquiry']      =   $request->material_inquiry;
        $data['boq']                   =   '0';
        $data['id']                    =   $request->id;

        $supplier       =   new Supplier();
        $proposal_id    =   $supplier->addProposalByemail($data);

        $quotation = $request->file('quotation');
        $datasheet = $request->file('datasheet');

        if(!empty($quotation)):
            $extension  =   $quotation->getClientOriginalExtension();

            $path   =   base_path() . '/public/quotations';
            if(!is_dir ( $path))
                $path   =   base_path() . '/quotations';

            $path   =   $path.'/'.$proposal_id;
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

            $path   =   $path.'/'.$proposal_id;
            if(!is_dir ( $path))
                mkdir($path);

            $datasheet->move(
                $path.'/',$proposal_id.'.'.$extension
            );
        endif;

        $notification['title']       =   'Supplier Accepted';
        $notification['description'] =   'A supplier accepted the order';
        $notification['link']        =   asset('/materialinquiry/suplierProposal/'.$request->material_inquiry);

        $notfy  =   new GetNotification();
        $notfy->supplierAccept($notification);

        return view('Forms.thankspage')->with('msg','thanks , we will contact with you soon');
    }

    public function agreementDecline(Request $request){
        $data   =   array();
        $data['declineReason']   =   $request->declineReason;
        $data['agreement_id']    =   $request->agreement_id;
        $mtinq  =   new MaterialInquiry();
        $mtinq->declineAgreement($data);

        $notification['title']       =   'Supplier Declined';
        $notification['description'] =   'A supplier declined the agreement';
        $notification['link']        =   asset('/supplier/showDecline/'.$request->agreement_id);

        $notfy  =   new GetNotification();
        $notfy->agreementDecline($notification);

        return view('Forms.thankspage')->with('msg','we have received decline , we will reply you soon');
    }

    public function supplierDecline(Request $request){

        $data                   =   array();
        $data['decline']        =   $request->declineReason;
        $data['id']             =   $request->material_inquiry;
        $data['supplier_id']    =   $request->id;

        $supplier               =   new Supplier();
        $decline                =   $supplier->addDecline($data);

        $notification['title']       =   'Supplier Declined';
        $notification['description'] =   'A supplier declined the order';
        $notification['link']        =   asset('/materialinquiry/decline/'.$request->material_inquiry);

        $notfy  =   new GetNotification();
        $notfy->supplierDecline($notification);

        return view('Forms.thankspage')->with('msg','we have received your comments , we will reply you soon');
        die('xx');
    }



}
