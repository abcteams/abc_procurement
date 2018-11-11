<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //echo '<pre>';
    //$users =     \App\User::all();
    //$user->notify(new \App\Notifications\InvoicePaid());
    //  die('mkedad');
    if(auth()->check())
    {
        return redirect()->action('HomeController@index');
    }
    return view('auth/login');
});

Route::get('/xx', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    if(auth()->check())
    {
        return redirect()->action('HomeController@index');
    }
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*********************** GML *************************/
Route::get('gml/show', 'GmlController@show');
Route::get('gml/add/{id?}', 'GmlController@add');
Route::post('gml/addGml', 'GmlController@addGml');
Route::get('gml/gmlSearch', 'GmlController@gmlSearch');
Route::get('gml/removegml', 'GmlController@removegml');


/*********************** Sub Gml *************************/
Route::get('gml/showsub/{id}', 'GmlController@showsub');
Route::get('gml/addsub/{gmlId}/{id?}', 'GmlController@addsub');
Route::post('gml/addsubgml', 'GmlController@addsubgml');
Route::get('gml/subGmlSearch', 'GmlController@subGmlSearch');
Route::get('gml/removesubgml', 'GmlController@removesubgml');

/*********************** pending *************************/
Route::get('gml/pendingSub/{id?}', 'GmlController@pendingSub');
Route::get('gml/pendingGml/{id?}', 'GmlController@pendingGml'); //Editted By iqbal(view) --> Addition of popup and change Actions button to Reject
Route::post('gml/rejectPendingGml/{id}', 'GmlController@RejectPendingGml');// Created By Iqbal (Function in Controller) --> to reject pending GML with reason
Route::post('gml/rejectPendingSubGml/{id}', 'GmlController@RejectPendingSubGml');// Created By Iqbal (Function in controller) --> to reject pending Sub GML with reason
Route::get('gml/approvePending/{id}', 'GmlController@approvePending');
Route::get('gml/approve2Pending/{id}', 'GmlController@approve2Pending');
Route::get('gml/approve3Pending/{id}', 'GmlController@approve3Pending');
Route::get('gml/approveGmlPending/{id}', 'GmlController@approveGmlPending');
Route::get('gml/approve2GmlPending/{id}', 'GmlController@approve2GmlPending');
Route::get('gml/approve3GmlPending/{id}', 'GmlController@approve3GmlPending');





/*********************** Scl *************************/
Route::get('scl/show', 'SclController@show');
Route::get('scl/add/{id?}','SclController@add');
Route::post('scl/addScl','SclController@addScl');
Route::get('scl/sclSearch', 'SclController@sclSearch');
Route::get('scl/removescl', 'SclController@removescl');

/*********************** Sub Scl *************************/
Route::get('scl/showsub/{id}', 'SclController@showsub');
Route::get('scl/addsub/{sclId}/{id?}', 'SclController@addsub');
Route::post('scl/addsubscl', 'SclController@addsubscl');
Route::get('scl/subSclSearch', 'SclController@subSclSearch');
Route::get('scl/removesubscl', 'SclController@removesubscl');

/*********************** pending *************************/
Route::get('scl/pendingSub/{id?}', 'SclController@pendingSub');
Route::get('scl/pendingScl/{id?}', 'SclController@pendingScl');  /*added by roshan*/
Route::get('scl/approveSclPending/{id}', 'SclController@approveSclPending');/*edited by Roshan*/
Route::get('scl/approve2SclPending/{id}', 'SclController@approve2SclPending');/*added by Roshan*/
Route::get('scl/approve3SclPending/{id}', 'SclController@approve3SclPending');/*added by Roshan*/
Route::get('scl/approveSubPending/{id}', 'SclController@approveSubPending');/*added by Roshan*/
Route::get('scl/approve2SubPending/{id}', 'SclController@approve2SubPending');/*added by Roshan*/
Route::get('scl/approve3SubPending/{id}', 'SclController@approve3SubPending');/*added by Roshan*/


/*********************** Work Zone *************************/
Route::get('workzone/show', 'WorkzoneController@show');
Route::get('workzone/add/{id?}', 'WorkzoneController@add');
Route::post('workzone/addWorkzone', 'WorkzoneController@addWorkzone');
Route::get('workzone/workzoneSearch', 'WorkzoneController@workzoneSearch');

/*********************** Sub Gml *************************/
Route::get('workzone/showsub/{id}', 'WorkzoneController@showsub');
Route::get('workzone/addsub/{workzoneId}/{id?}', 'WorkzoneController@addsub');
Route::post('workzone/addsubworkzone', 'WorkzoneController@addsubworkzone');
Route::get('workzone/serachSubZone', 'WorkzoneController@serachSubZone');
Route::get('workzone/removeWorkZone', 'WorkzoneController@removeWorkZone');
Route::get('workzone/removeSubWorkZone', 'WorkzoneController@removeSubWorkZone');
Route::get('workzone/removeBoundary', 'WorkzoneController@removeBoundary');






/*********************** BOQ  *************************/
Route::get('boq/show/{id}', 'BoqController@show');
Route::get('boq/add/{workzoneId}/{id?}', 'BoqController@add');
Route::get('boq/getsubgmlitems', 'BoqController@getsubgmlitems');
Route::post('boq/addboq', 'BoqController@addboq');

/*********************** SUB BOQ  *************************/
Route::get('boq/showsubboq/{id}', 'BoqController@showsubboq');
Route::get('boq/addboqsub/{boq_id}/{id?}', 'BoqController@addboqsub');
Route::post('boq/addboqsubmaterilas', 'BoqController@addboqsubmaterilas');
Route::get('boq/removeSubBoq', 'BoqController@removeSubBoq');
Route::get('boq/removeBoq', 'BoqController@removeBoq');
Route::get('boq/removeSpecs', 'BoqController@removeSpecs');
Route::get('boq/oldBoq/{id}', 'BoqController@oldBoq');
Route::get('boq/addAgreement/{id}', 'BoqController@addAgreement');
Route::post('boq/agreementsDitals', 'BoqController@agreementsDitals');
Route::get('boq/accessories/{id}', 'BoqController@accessories');
Route::post('boq/addAccessories', 'BoqController@addAccessories');
Route::get('boq/removeAccessorie', 'BoqController@removeAccessorie');
Route::get('boq/modelsAndRate/{id}', 'BoqController@modelsAndRate');
Route::get('boq/redayToInqire/{id}', 'BoqController@redayToInqire');
Route::post('boq/addmodelsandRates', 'BoqController@addmodelsandRates');

/********************* Material Inquiry **********************/
Route::get('materialinquiry/show', 'MaterialinquiryController@show');
Route::get('materialinquiry/closed', 'MaterialinquiryController@closed');

Route::get('materialinquiry/add/{work_zone_id}/{id}', 'MaterialinquiryController@add');
Route::post('materialinquiry/addMTInquiry', 'MaterialinquiryController@addmtinquiry');

Route::get('materialinquiry/pending', 'MaterialinquiryController@pending');
Route::get('materialinquiry/approve/{id}', 'MaterialinquiryController@approve');
Route::get('materialinquiry/subcontractorProposal/{id}', 'MaterialinquiryController@subcontractorProposal');
Route::get('materialinquiry/considerItem/{id}', 'MaterialinquiryController@considerItem');
Route::get('materialinquiry/proposalDetails/{id}', 'MaterialinquiryController@proposalDetails');
Route::get('materialinquiry/consideredItems/{id}', 'MaterialinquiryController@consideredItems');
Route::get('materialinquiry/approveProposal/{id}', 'MaterialinquiryController@approveProposal');
Route::get('materialinquiry/approve2Proposal/{id}', 'MaterialinquiryController@approveProposal2');
Route::get('materialinquiry/approve3Proposal/{id}', 'MaterialinquiryController@approveProposal3');
Route::get('materialinquiry/showAccepted/{id}', 'MaterialinquiryController@showAccepted');
Route::get('materialinquiry/createAgreement/{id}', 'MaterialinquiryController@createAgreement');
Route::get('materialinquiry/approveAgreement/{id}', 'MaterialinquiryController@approveAgreement');
Route::post('materialinquiry/addAgreement', 'MaterialinquiryController@addAgreement');
Route::post('materialinquiry/addAgreement', 'MaterialinquiryController@addAgreement');
Route::get('materialinquiry/showAgreement/{id}', 'MaterialinquiryController@showAgreement');
Route::get('materialinquiry/suplierProposal/{id}', 'MaterialinquiryController@suplierProposal');
Route::get('materialinquiry/decline/{id}', 'MaterialinquiryController@decline');
Route::get('materialinquiry/getSubzones', 'MaterialinquiryController@getSubzones');
Route::get('materialinquiry/declinereplay/{id}', 'MaterialinquiryController@declinereplay');
Route::post('materialinquiry/addDeclineReplay', 'MaterialinquiryController@addDeclineReplay');
Route::get('materialinquiry/addSupplierProposal/{id}', 'MaterialinquiryController@addSupplierProposal');
Route::get('materialinquiry/chooseMaterial/{id}', 'MaterialinquiryController@chooseMaterial');
Route::get('materialinquiry/chooseSubContractorMaterialToInquiry/{id}', 'MaterialinquiryController@chooseSubContractorMaterialToInquiry');
Route::get('materialinquiry/readytoinquirylist/{work_zone_id}/{id}', 'MaterialinquiryController@readytoinquirylist');
Route::get('materialinquiry/margeboqs/{work_zone_id}/{id}', 'MaterialinquiryController@margeboqs');
Route::get('materialinquiry/margeItemsScreen/{work_zone_id}/{id}', 'MaterialinquiryController@margeItemsScreen');
Route::get('materialinquiry/margeMaterialswithkey', 'MaterialinquiryController@margeMaterialswithkey');
Route::get('materialinquiry/showInquirydetails/{work_zone_id}/{sub_gml_id}/{id}', 'MaterialinquiryController@showInquirydetails');
Route::post('materialinquiry/removeinquiry', 'MaterialinquiryController@removeinquiry');
Route::get('materialinquiry/addSupplierProposal/{id}', 'MaterialinquiryController@addSupplierProposal');
Route::get('materialinquiry/proposalReply/{id}', 'MaterialinquiryController@proposalReply');
Route::post('materialinquiry/addProposalReply', 'MaterialinquiryController@addProposalReply');
Route::post('materialinquiry/submitSuplierProposal', 'MaterialinquiryController@submitSuplierProposal');
Route::get('materialinquiry/pendingtoclose', 'MaterialinquiryController@pendingtoclose');
Route::post('materialinquiry/extendupdate','MaterialinquiryController@updateExtend');
Route::get('/materialinquiry/extend/{id}','MaterialinquiryController@showExtend');

/********************* Suppliers **********************/
Route::get('supplier/materials', 'SupplierController@materials');
Route::get('supplier/addmaterial/{id?}', 'SupplierController@addmaterial');
Route::get('supplier/getsubgmlitems', 'SupplierController@getsubgmlitems');
Route::post('supplier/addmaterialrec', 'SupplierController@addmaterialrec');

Route::get('supplier/removeMaterial', 'SupplierController@removeMaterial');
Route::get('supplier/pendinginquiry', 'SupplierController@pendinginquiry');
Route::get('supplier/proposal/{id}', 'SupplierController@proposal');
Route::get('supplier/decline/{id}', 'SupplierController@decline');
Route::post('supplier/addDecline', 'SupplierController@addDecline');

Route::post('supplier/addProposal', 'SupplierController@addProposal');
Route::get('supplier/pendingAgreement', 'SupplierController@pendingAgreement');
Route::get('supplier/accepetAgreement/{id}', 'SupplierController@accepetAgreement');
Route::get('supplier/sentProposals', 'SupplierController@sentProposals');
Route::get('supplier/myProposalDetails/{id}', 'SupplierController@myProposalDetails');
Route::get('supplier/lop', 'SupplierController@lop');
Route::get('supplier/supplierMaterialList', 'SupplierController@supplierMaterialList');
Route::get('supplier/showDecline/{id}', 'SupplierController@showDecline');

Route::get('supplier/declinereplay/{id}', 'SupplierController@declinereplay');


/*********************** SCR  *************************/
Route::get('scr/show/{id}', 'ScrController@show');
Route::get('scr/add/{workzoneId}/{id?}', 'ScrController@add');
Route::get('scr/getsubsclitems', 'ScrController@getsubsclitems');
Route::post('scr/addscr', 'ScrController@addscr');
Route::get('scr/removescr', 'ScrController@removescr');
Route::get('scr/removesubscr', 'ScrController@removesubscr');

/*********************** SUB SCR *************************/
Route::get('scr/showsubscr/{id}', 'ScrController@showsubscr');
Route::get('scr/addscrsub/{scr_id}/{id?}', 'ScrController@addscrsub');
Route::post('scr/addscrsubcategory', 'ScrController@addscrsubcategory');






/********************* Subcontractor Request **********************/
Route::get('subcontractorrequest/show'                  , 'SubcontractorrequestController@show');
Route::get('subcontractorrequest/closed'                , 'SubcontractorrequestController@closed');

Route::get('subcontractorrequest/add/{id}'              , 'SubcontractorrequestController@add');
Route::post('subcontractorrequest/addSCrequest'         , 'SubcontractorrequestController@addSCrequest');

Route::get('subcontractorrequest/pending'               , 'SubcontractorrequestController@pending');
Route::get('subcontractorrequest/approve/{id}'          , 'SubcontractorrequestController@approve');
Route::get('subcontractorrequest/subcontractorProposal/{id}'  , 'SubcontractorrequestController@subcontractorProposal');
Route::get('subcontractorrequest/considerItem/{id}'     , 'SubcontractorrequestController@considerItem');
Route::get('subcontractorrequest/proposalDetails/{id}'  , 'SubcontractorrequestController@proposalDetails');
Route::get('subcontractorrequest/consideredItems/{id}'  , 'SubcontractorrequestController@consideredItems');
Route::get('subcontractorrequest/approveProposal/{id}'  , 'SubcontractorrequestController@approveProposal');
Route::get('subcontractorrequest/showAccepted/{id}'     , 'SubcontractorrequestController@showAccepted');
Route::get('subcontractorrequest/createAgreement/{id}'  , 'SubcontractorrequestController@createAgreement');
Route::get('subcontractorrequest/approveAgreement/{id}' , 'SubcontractorrequestController@approveAgreement');
Route::post('subcontractorrequest/addAgreement'         , 'SubcontractorrequestController@addAgreement');
Route::get('subcontractorrequest/showAgreement/{id}'    , 'SubcontractorrequestController@showAgreement');
Route::get('subcontractorrequest/decline/{id}'          , 'SubcontractorrequestController@decline');




/********************* Subcontractor **********************/
Route::get('subcontractor/category', 'SubcontractorController@category');
Route::get('subcontractor/addcategory', 'SubcontractorController@addcategory');
Route::get('subcontractor/getsubsclitemsForUser', 'SubcontractorController@getsubsclitemsForUser');/*Added by Roshan*/
Route::get('subcontractor/getsubsclitems', 'SubcontractorController@getsubsclitems');
Route::post('subcontractor/addcategoryrec', 'SubcontractorController@addcategoryrec');
Route::get('subcontractor/addmaterial/{id?}', 'SubcontractorController@addmaterial');/*Added by Roshan*/
Route::post('subcontractor/addmaterialrec', 'SubcontractorController@addmaterialrec');/*Added by Roshan*/


Route::get('subcontractor/removeCategory', 'SubcontractorController@removeCategory');
Route::get('subcontractor/pendingRequest', 'SubcontractorController@pendingRequest');
Route::get('subcontractor/proposal/{id}', 'SubcontractorController@proposal');
Route::get('subcontractor/decline/{id}', 'SubcontractorController@decline');
Route::post('subcontractor/addDecline', 'SubcontractorController@addDecline');

Route::post('subcontractor/addProposal', 'SubcontractorController@addProposal');
Route::get('subcontractor/pendingAgreement', 'SubcontractorController@pendingAgreement');
Route::get('subcontractor/accepetAgreement/{id}', 'SubcontractorController@accepetAgreement');
Route::get('subcontractor/subcontractorMaterialList', 'SubcontractorController@subcontractorMaterialList');/*Added by Roshan*/


/************************ Users *************************/

Route::get('users/showUsers', 'UsersController@showUsers');
Route::get('users/showSuppliers', 'UsersController@showSuppliers');
Route::get('users/showSubcontractor', 'UsersController@showSubcontractor');
Route::get('users/pendingSuppliers', 'UsersController@pendingSuppliers');
Route::get('users/pendingSubcontractor', 'UsersController@pendingSubcontractor');
Route::get('users/approveSupplier/{id}', 'UsersController@approveSupplier');
Route::get('users/approve2Supplier/{id}', 'UsersController@approve2Supplier');
Route::get('users/approveSubcontractor/{id}', 'UsersController@approveSubcontractor');/*Added by Roshan*/
Route::get('users/approve2Subcontractor/{id}', 'UsersController@approve2Subcontractor');/*Added by Roshan*/
Route::get('users/rejectUser', 'UsersController@rejectUser');/*Added by Roshan*/
Route::get('users/deleteSubcontractor/{id}', 'UsersController@deleteSubcontractor');/*Added by Roshan*/
Route::get('users/deleteSupplier/{id}','UsersController@deleteSupplier'); //Created By iqbal--->     to delete supplier     -----edited by Roshan
Route::get('users/deleteUser/{id}','UsersController@deleteUser'); //creted by iqbal --->delete user
Route::get('users/resetPassword/{id}','UsersController@resetPassword'); //created by iqbal -->reset password for a user

Route::get('users/add/{id?}', 'UsersController@add');
Route::get('users/edit/{id}', 'UsersController@edit');
Route::get('users/editMyInfo', 'UsersController@editMyInfo');
Route::post('users/addUser', 'UsersController@addUser');
Route::get('users/showuserprofiel/{id}', 'UsersController@showuserprofiel');
Route::get('users/usersrules/{id}', 'UsersController@usersrules');
Route::post('users/setTheRules', 'UsersController@setTheRules');
Route::post('users/setWorkzoneRules', 'UsersController@setWorkzoneRules');

Route::get('users/showPositions', 'UsersController@showPositions');
Route::get('users/addPosition/{id?}', 'UsersController@addPosition');
Route::post('users/setThePositions', 'UsersController@setThePositions');
Route::get('users/positionUsers/{id}', 'UsersController@positionUsers');
Route::get('users/showSupplierInfo/{id}', 'UsersController@showSupplierInfo');
Route::get('users/showSubcontractorInfo/{id}', 'UsersController@showSubcontractorInfo');
Route::get('users/myProfile/{id}', 'UsersController@myProfile');
Route::post('users/updateMyInfo', 'UsersController@updateMyInfo');
Route::get('users/updateMyPassword', 'UsersController@updateMyPassword');
Route::post('users/changeThePassword', 'UsersController@changeThePassword');
Route::post('users/addccemails', 'UsersController@addccemails');
Route::get('users/ccEmails/{id}', 'UsersController@ccEmails');

Route::get('users/usersWorkzones/{id}', 'UsersController@usersWorkzones');
Route::get('users/addsupplier/{id?}', 'UsersController@addsupplier');
Route::get('users/addsubcontractor/{id?}', 'UsersController@addsubcontractor');/*added by Roshan*/
Route::post('users/addSupplierInfo', 'UsersController@addSupplierInfo');
Route::post('users/addSubcontractorInfo', 'UsersController@addSubcontractorInfo');/*added by Roshan*/

/************************ Material Requisition *************************/
Route::get('materialrequisition/add/{id}', 'MaterialrequisitionController@add');
Route::get('materialrequisition/show', 'MaterialrequisitionController@show');
Route::get('materialrequisition/pending', 'MaterialrequisitionController@pending');
Route::get('materialrequisition/sendToSupplier/{boq_id}/{id}', 'MaterialrequisitionController@sendToSupplier');
Route::get('materialrequisition/approvePending/{boq_id}/{id}', 'MaterialrequisitionController@approvePending');
Route::get('materialrequisition/approveReqPending/{id}', 'MaterialrequisitionController@approveReqPending');
Route::get('materialrequisition/approveLpoPending/{id}', 'MaterialrequisitionController@approveLpoPending');
Route::get('materialrequisition/markasDelivered/{id}', 'MaterialrequisitionController@markasDelivered');
Route::get('materialrequisition/markaspaid/{id}', 'MaterialrequisitionController@markaspaid');
Route::get('materialrequisition/reqPending', 'MaterialrequisitionController@reqPending');
Route::get('materialrequisition/lpoPending', 'MaterialrequisitionController@lpoPending');
Route::get('materialrequisition/awaiting', 'MaterialrequisitionController@awaiting');
Route::get('materialrequisition/awaitingDetails/{id}', 'MaterialrequisitionController@awaitingDetails');
Route::get('materialrequisition/delivered', 'MaterialrequisitionController@delivered');
Route::get('materialrequisition/deliveredDetails/{id}', 'MaterialrequisitionController@deliveredDetails');
Route::get('materialrequisition/checkout/{id}', 'MaterialrequisitionController@checkout');
Route::get('materialrequisition/requisitionDetails/{id}', 'MaterialrequisitionController@requisitionDetails');
Route::get('materialrequisition/requisitionReports/{id}', 'MaterialrequisitionController@requisitionReports');
Route::get('materialrequisition/removeRequisition', 'MaterialrequisitionController@removeRequisition');
Route::get('materialrequisition/requisitionMoreInfo/{id}', 'MaterialrequisitionController@requisitionMoreInfo');
Route::post('materialrequisition/addrequisition', 'MaterialrequisitionController@addrequisition');
Route::post('materialrequisition/addrequisitionMoreDetails', 'MaterialrequisitionController@addrequisitionMoreDetails');
Route::get('materialrequisition/reports', 'MaterialrequisitionController@reports');
Route::get('materialrequisition/addToCart', 'MaterialrequisitionController@addToCart');
Route::get('materialrequisition/updateCart', 'MaterialrequisitionController@updateCart');
Route::get('materialrequisition/removeItems/{id}', 'MaterialrequisitionController@removeItems');
Route::get('materialrequisition/removeItemFromCart', 'MaterialrequisitionController@removeItemFromCart');
Route::get('materialrequisition/showCart', 'MaterialrequisitionController@showCart');
Route::get('materialrequisition/myOrders', 'MaterialrequisitionController@myOrders');
Route::get('materialrequisition/orderDetails/{id}', 'MaterialrequisitionController@orderDetails');
Route::get('materialrequisition/storekeeperPending', 'MaterialrequisitionController@storekeeperPending');
Route::get('materialrequisition/managerPending', 'MaterialrequisitionController@managerPending');
Route::get('materialrequisition/procurementPending', 'MaterialrequisitionController@procurementPending');
Route::get('materialrequisition/commercialPending', 'MaterialrequisitionController@commercialPending');
Route::get('materialrequisition/financePending', 'MaterialrequisitionController@financePending');
Route::get('materialrequisition/storeKeeperDetails/{id}', 'MaterialrequisitionController@storekeeperDetails');
Route::get('materialrequisition/managerDetails/{id}', 'MaterialrequisitionController@managerDetails');
Route::get('materialrequisition/procurementDetails/{id}', 'MaterialrequisitionController@procurementDetails');
Route::get('materialrequisition/commercialDetails/{id}', 'MaterialrequisitionController@commercialDetails');
Route::get('materialrequisition/financeDetails/{id}', 'MaterialrequisitionController@financeDetails');
Route::get('materialrequisition/managerApprove/{id}', 'MaterialrequisitionController@managerApprove');
Route::post('materialrequisition/managerReject', 'MaterialrequisitionController@managerReject');
Route::post('materialrequisition/procurementApprove', 'MaterialrequisitionController@procurementApprove');
Route::post('materialrequisition/procurementReject', 'MaterialrequisitionController@procurementReject');
Route::get('materialrequisition/commercialApprove/{id}', 'MaterialrequisitionController@commercialApprove');
Route::post('materialrequisition/commercialReject', 'MaterialrequisitionController@commercialReject');
Route::get('materialrequisition/financeApprove/{id}', 'MaterialrequisitionController@financeApprove');
Route::post('materialrequisition/financeReject', 'MaterialrequisitionController@financeReject');
Route::post('materialrequisition/storeQuantity', 'MaterialrequisitionController@storeQuantity');



/************************ Forms *************************/
Route::get('forms/supplierProposal/{id}', 'FormsController@supplierProposal');
Route::get('forms/supplierForm/{id}/{supplier_id}', 'FormsController@supplierForm');
Route::post('forms/supplierAccepted', 'FormsController@supplierAccepted');
Route::post('forms/supplierDecline', 'FormsController@supplierDecline');
Route::get('forms/supplierAgreement/{id}', 'FormsController@supplierAgreement');
Route::get('forms/acceptAgreement/{id}/{work_zone_id}/{sub_gml_id}', 'FormsController@acceptAgreement');
Route::post('forms/agreementDecline', 'FormsController@agreementDecline');
Route::get('forms/requisition/{id}/{supplier_id}', 'FormsController@requisition');
Route::get('forms/acceptRequisition/{id}', 'FormsController@acceptRequisition');

/************************ Pdf *************************/
Route::get('pdf/pdfInquiry/{id}/{supplier_id}', 'PDFController@pdfInquiry');
Route::get('pdf/pdfLpo/{id}/{supplier_id}', 'PDFController@pdfLpo');

/************************ Notifications *************************/
Route::post('notification/update', 'NotificationController@statusUpdate');
Route::post('notification/readStatus', 'NotificationController@readStatus');
Route::post('notification/markAllAsRead', 'NotificationController@markRead');
Route::get('notification/viewall','NotificationController@viewAll');

