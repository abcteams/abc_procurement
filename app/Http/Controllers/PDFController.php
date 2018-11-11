<?php

namespace App\Http\Controllers;

use App\Materialrequisuition;
use App\Supplier;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Hashids\Hashids;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function pdfInquiry(Request $request){
        $supplier       =   new Supplier();

        $supplier_info  =   User::find($request->supplier_id);
        $data           =   $supplier->getInquiryDetails($boq_id = 0,$request->id);
        //return view('Pdf.inquiry')->with('data', $data)->with('supplier',$supplier_info);
        $pdf    =   PDF::loadView('Pdf.inquiry',['data'=>$data,'supplier'=>$supplier_info]);
        return  $pdf->download('inquiry.pdf');
    }

    public function pdfLpo(Request $request){
        $hashids    =   new Hashids();
        $requisition_id     =   $hashids->decode($request->id)[0];
        $supplier_id        =   $hashids->decode($request->supplier_id)[0];
        $user               =   new User();
        $userInfo           =   $user->getSupplierOrSubContractorInfo($supplier_id);

        $requisition    =   new Materialrequisuition();
        $data           =   $requisition->getRequsuitionDetails($requisition_id);
        $subject        =   $data['main'][0]->job_no.'-'.$data['main'][0]->id.'-'.$data['main'][0]->sub_gml.'-'.$userInfo[0]->company_name;

        return view('Pdf.lpo')->with('data', $data)->with('userinfo',$userInfo);
        //$pdf    =   PDF::loadView('Pdf.lpo',['data'=>$data , 'userinfo'=>$userInfo]);

        $notification['title']       =   'Supplier Downloaded LPO';
        $notification['description'] =   'A supplier downloaded the LPO';
        $notification['link']        =   asset('');

        $notfy  =   new GetNotification();
        $notfy->agreementAccept($notification);

        return  $pdf->download($subject.'.pdf');
    }
}
