<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Actions\Orthanc\OrthancAPI;  // could change this for other PACS Interface or add others and capture that below
use App\Actions\Orthanc\PACSUploadStudies;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MyControllers\HL7Controller;
use App\Http\Controllers\MyControllers\ReportsController;
use App\Http\Controllers\MyControllers\PatientsController;
use App\Http\Controllers\MyControllers\OrdersController;


use App\Models\Referrers\ReferringPhysician;

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

// LANDING PAGE FOR USERS NOT LOGGED IN
Route::get('/', function () {
    return view('welcome');
});

// DEFAULT PAGE AFTER USER LOGGED IN
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// LIST PATIENTS LANDING PAGE, GET
Route::middleware(['auth:sanctum', 'verified'])->get('/patients/patients', [PatientsController::class, 'patient_list'])->name('patient_list');

// LIST PATIENTS VIA QUERY, POST
Route::middleware(['auth:sanctum', 'verified'])->post('/patients/search', [PatientsController::class, 'patient_search'])->name('patient_search');

// DISPLAY / GET THE PATIENT HISTORY FORM
Route::middleware(['auth:sanctum', 'verified'])->post('/patients/history', [PatientsController::class, 'patient_history'])->name('patient_history');

// GET THE ORDER FORM,  VIA GET (NEW), OR POST(EXISTING)
Route::middleware(['auth:sanctum', 'verified'])->match(['get', 'post'],'/orders/orderform', [OrdersController::class, 'orderform'])->name('orderform');




// SORT OF A CONTROLLER, BUT HANDLED SENDING A WEBFORM, PROTOTYPE

Route::middleware(['auth:sanctum', 'verified'])->post('/sendmail', function (Request $request) {
// https://laravel.com/docs/8.x/mail
    $data = [
        "postdata" => $request->input()
    ];
    $subject = $request->input('subject');
    try {
    Mail::send('emails.webform', $data, function ($message) use ($data)  {
    $message->from('sscotti@sscotti.org', 'Laravel');
    $message->to('sscotti@sscotti.org')->cc('sscotti@sscotti.org');
    $message->subject($data['postdata']['subject']);
    (Mail::failures())?$status = json_encode(Mail::failures()):$status = "Mail Sent";
    echo '{"message":"' .  $status . '"}';
    });
    }
    catch(\Swift_TransportException $transportExp){
        $status = $transportExp->getMessage();
         echo '{"message":"' .  $status . '"}';
    }

})->name('sendmail');



// HL7 Controller Routes

Route::middleware(['auth:sanctum', 'verified'])->post('HL7/submit_report', [HL7Controller::class, 'submit_report'])->name('submit_report');


// OHIF VIEWE ROUTES, VIEWS ARE IN ohif/studylist and ohif/studyview in resources->views

Route::middleware(['auth:sanctum', 'verified'])->get('ohifstudylist', function() {

    $user = Auth::user();
    return view('ohif.studylist');

})->name('ohif_studylist');


// PATIENT PORTAL PAGE

Route::middleware(['auth:sanctum', 'verified'])->get('/patients', function () {
    $user = Auth::user();
    return view('patients');
})->name('patients');

// REFERRERS PORTAL PAGE

Route::middleware(['auth:sanctum', 'verified'])->get('/referrer', function () {

    $user = Auth::user();
    Debugbar::error($user);
    Debugbar::error($user->patientid);
    return view('patients');
})->name('referrers');

// READERS PORTAL PAGE GET
Route::middleware(['auth:sanctum', 'verified'])->get('/readers', function () {
    $user = Auth::user();
    Debugbar::error($user);
    Debugbar::error($user->patientid);
    return view('readers');
})->name('readers');

// READERS PORTAL PAGE POST

Route::middleware(['auth:sanctum', 'verified'])->post('/readers', function (Request $request) {

    if (!empty($request->input('orthanc_host'))) {
        OrthancAPI::setHost($request->input('orthanc_host'));
    }
    $user = Auth::user();
    Debugbar::error($user);
    Debugbar::error($user->patientid);
    return view('readers');
})->name('readers');

// DEVTOOL PORTAL PAGE
//  Route::match(['get', 'post']
Route::middleware(['auth:sanctum', 'verified'])->get('/devtool', function (Request $request) {

    $user = Auth::user();
    Debugbar::error($user);
    $request->session()->flash('flash.banner', 'Yay it works!');
$request->session()->flash('flash.bannerStyle', 'success');
    return view('devtool');

})->name('devtool');

// DEVTOOL PORTAL PAGE, POST TO Switch Server
Route::middleware(['auth:sanctum', 'verified'])->post('/devtool', function (Request $request) {
    if (!empty($request->input('orthanc_host'))) {
        OrthancAPI::setHost($request->input('orthanc_host'));
    }
    $user = Auth::user();
    Debugbar::error($user);
    return view('devtool');

})->name('devtool');


//  THING TO GET LIST OF MODALITIES LIST / JSON FO ROUTING
Route::middleware(['auth:sanctum', 'verified'])->post('get_modalities', function (Request $request) {

    if (RouteServiceProvider::$PACS) {
    	$orthanc = new OrthancAPI();
    	echo $orthanc->DICOMdestinations();
    }

})->name('get_modalities');


// THING to FETCH STUDIES from PACS SERVER BASED ON POST DATA, ORTHANC for NOW

Route::middleware(['auth:sanctum', 'verified'])->post('studies/page', function (Request $request) {

    if (RouteServiceProvider::$PACS) {

    $user = Auth::user();
    Debugbar::error($user);
    $data = json_encode(array("patientid" => $user->patientid, "doctor_id" => $user->doctor_id));
    setcookie("PACStoken", $data, [
			'expires' => 0,
			'path' => '/',
			'domain' => '.sias.dev',
			'secure' => true,
			'httponly' => true,
			'samesite' => 'lax'
			]);
    // arrangement here is user is just one of patient, referrer, or reader or some sort of staff
    // patient can see only themselves
    // referrer can see all of their studies
    // reader can see all for now, not staff menus unless has those privileges as roles as well.
    // staff can see all for now
    // roles:  1:  patient, 2:  referrer, 3:  reader, 4,5,6,7,8 are some sort of staff.

    $query = json_decode($request->getContent());
    $referer = request()->headers->get('referer');
    Debugbar::error($referer);
    if (empty($user->patientid) && empty($user->doctor_id) &&  empty($user->reader_id)  && count(array_intersect(json_decode($user->user_roles), [4,5,6,7,8])) == 0) {
        die('{"error":"You have no privileges to view studies"}');
    }
    if (!empty($user->patientid) && empty($user->doctor_id) &&  empty($user->reader_id)) $query->Query->PatientID = $user->patientid;
    if (!empty($user->doctor_id) && empty($user->reader_id)) $query->Query->ReferringPhysicianName = '*'  . $user->doctor_id .'*';
    $user = Auth::user();
    $orthanc = new OrthancAPI();
    return $orthanc->getStudiesArray ($query);

    }

})->name('studies/page');

// OrthancDev/load_all_studies - THING TO FETCH ALL OF THE STUDIES BELONGING TO A PARTICULAR, constructs the query

Route::middleware(['auth:sanctum', 'verified'])->post('OrthancDev/load_all_studies', function (Request $request) {

    if (RouteServiceProvider::$PACS) {

        if (!isset($_POST['data-mrn']) || $_POST['data-mrn'] == "" ) {

        echo '[{"error":"MRN required, use Search Tool"}]';

        }
        else {

            $query = new stdClass();
            $query->Level = "Study";
            $query->Expand = true;
            $query->pagenumber = $_POST["page"];
            $query->itemsperpage = config('myconfigs.DEFAULT_OLD_STUDIES');
            $query->sortparam = "StudyDate";
            $query->reverse = 1;
            $query->widget = 1;
            $query->MetaData = new stdClass();
            $query->Local = new stdClass();
            $query->Tags = new stdClass();
            $query->Query = new stdClass();
            $query->Query->PatientID = $_POST['data-mrn'];


            if (empty($_POST['page'])) {
            $query->pagenumber = 1;
            }

        }

        Debugbar::error($query);
        $orthanc = new OrthancAPI();
        $user = Auth::user();
        return $orthanc->getStudiesArray ($query,$user);

    }

})->name('load_all_studies');

// THING TO LOAD THE UI FOR UPLOADING AN IMAGE OR PDF TO A STUDY

Route::middleware(['auth:sanctum', 'verified'])->post('/PACS/create_dicom', function (Request $request) {

    $user = Auth::user();
    Debugbar::error($user);
    return view('components/create_dicom');

})->name('create_dicom');

// THING TO ACTUALLY SEND THE IMAGE OR PDF TO THE ORTHANC SERVER.

Route::middleware(['auth:sanctum', 'verified'])->post('/PACS/attachMIMEToStudy', function(Request $request) {
    if (RouteServiceProvider::$PACS ==  "Orthanc") {
    $orthanc = new OrthancAPI();
    $orthanc->attachMIMEToStudy($request);
    }
})->name('attachMIMEToStudy');

// THING TO LOG THE REQUEST TO VIEW A STUDY AND RETURN THE URL

Route::middleware(['auth:sanctum', 'verified'])->post('/PACS/logViewStudy', function (Request $request) {

    if (RouteServiceProvider::$PACS==  "Orthanc") {
        $orthanc = new OrthancAPI();
        return $orthanc->logViewStudy($request);
     }
});

Route::middleware(['auth:sanctum', 'verified'])->post('downloadStudyUUID', function(Request $request) {
    if (RouteServiceProvider::$PACS ==  "Orthanc") {
    $orthanc = new OrthancAPI();
    $orthanc->downloadStudyUUID($request);
    }
})->name('attachMIMEToStudy');

Route::middleware(['auth:sanctum', 'verified'])->post('loadallstudies', function(Request $request) {
    if (RouteServiceProvider::$PACS ==  "Orthanc") {
    $orthanc = new OrthancAPI();
    $orthanc->loadallstudies($request);
    }
})->name('loadallstudies');

// DEV TOOL & ORTHANC API Routes, mostly a group calling methods in OrthancAPI();

// GET PHPINFO PAGE AT NGINX ROOT
Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/PHPINFO', function() {
    $orthanc = new OrthancAPI();
    echo $orthanc->PHPINFO();
})->name('PHPINFO');
// getOrthancModalities, list of modalities to which studies can be routed, configured in orthanc.json
Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getOrthancModalities', function() {
    $orthanc = new OrthancAPI();
    echo $orthanc->getOrthancModalities();
})->name('getOrthancModalities');


Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/ServerStatus', function() {
    $orthanc = new OrthancAPI();
    echo $orthanc->ServerStatus();
})->name('ServerStatus');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/StopServer', function() {
    $orthanc = new OrthancAPI();
    echo $orthanc->StopServer();
})->name('StopServer');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/StartServer', function() {
    $orthanc = new OrthancAPI();
    echo $orthanc->StartServer();
})->name('StartServer');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getViewerLink', function(Request $request) {
    $orthanc = new OrthancAPI();
    $link =  $orthanc->getViewerLink($request);
    echo '[{"success":"true", "link":"' . $link . '"}]';
})->name('getViewerLink');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getOrthancConfigs', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getOrthancConfigs($request->input('key'));
})->name('getOrthancConfigs');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getPatients', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getPatients($request->input('uuid'));
})->name('getPatients');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getStudies', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getStudies($request->input('uuid'));
})->name('getStudies');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getSeries', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getSeries($request->input('uuid'));
})->name('getSeries');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getInstances', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getInstances($request->input('uuid'), $request->input('withtags'));
})->name('getInstances');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getDICOMTagListforUUID', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getDICOMTagListforUUID($request->input('uuid'));
})->name('getDICOMTagListforUUID');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getDICOMTagValueforUUID', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getDICOMTagValueforUUID($request->input('uuid'), $request->input('tagcodes'));
})->name('getDICOMTagValueforUUID');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getInstanceDICOM', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->pydicom($request->input('uuid'));
})->name('getInstanceDICOM');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getInstancePNGPreview', function(Request $request) {
    $orthanc = new OrthancAPI();
    $raw = $orthanc->getInstancePNGPreview($request->input('uuid'), $request->input('pngjpg'));
    $image_data_base64 =  base64_encode ($raw);  // also image/jpeg
    echo '<img src="data:image/png;base64,' . $image_data_base64 . '" alt="img"/ >';
})->name('getInstancePNGPreview');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getInstanceJPGPreview', function(Request $request) {
    $orthanc = new OrthancAPI();
    $raw = $orthanc->getInstancePNGPreview($request->input('uuid'), $request->input('pngjpg'));
    $image_data_base64 =  base64_encode ($raw);  // also image/jpeg
    echo '<img src="data:image/jpg;base64,' . $image_data_base64 . '" alt="img"/ >';
})->name('getInstanceJPGPreview');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/downloadZipStudyUUID', function(Request $request) {
    $orthanc = new OrthancAPI();
    header('Content-type: application/zip');
    echo $orthanc->downloadZipStudyUUID($request->input('uuid'));
})->name('downloadZipStudyUUID');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/downloadDCMStudyUUID', function(Request $request) {
    $orthanc = new OrthancAPI();
    header('Content-type: application/zip');
    echo $orthanc->downloadDCMStudyUUID($request->input('uuid'));
})->name('downloadDCMStudyUUID');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/pydicom', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->pydicom($request->input('uuid'));
})->name('pydicom');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/studyCountByPatientId', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo json_encode($orthanc->studyCountByPatientId($_POST['PatientID']));
})->name('studyCountByPatientId');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/getStudyArrayOfUUIDs', function(Request $request) {
    $orthanc = new OrthancAPI();
    echo $orthanc->getStudyArrayOfUUIDs($_POST['getStudyArrayOfUUIDs']);
})->name('getStudyArrayOfUUIDs');


// SUBGROUP REGARDING DOWNLOADING ISO'S AND ZIPS, ROUTING TO MODALITIES
// fetch_study
Route::middleware(['auth:sanctum', 'verified'])->post('/Studies/fetch_study', function (Request $request) {
    $orthanc = new OrthancAPI();
    $orthanc->fetch_study($request->input('id'), $request->input('uuid'));
})->name('fetch_study');

// OrthancDev/downloadStudyUUID

Route::middleware(['auth:sanctum', 'verified'])->post('OrthancDev/downloadStudyUUID', function (Request $request) {

    if (RouteServiceProvider::$PACS) {

    $user = Auth::user();
    Debugbar::error($user);
    $_POST = json_decode(file_get_contents('php://input'), true);
    	if (!isset($_POST["uuid"]) || empty($_POST["uuid"]) || !isset($_POST["command"]) || ($_POST["command"] != "iso" && $_POST["command"] != "zip")) {
    		echo '{"error":"Bad UUID or Bad Type"}';
    	}

    	else {
    	Debugbar::error($_POST["uuid"]);
    	Debugbar::error($_POST["command"]);
    	$orthanc = new OrthancAPI();
    	if($_POST["command"] == "iso") $result =  $orthanc->executeCURL("studies/" . $_POST["uuid"]. '/media');
    	if($_POST["command"]== "zip")  $result =  $orthanc->executeCURL("studies/" . $_POST["uuid"] . '/archive');
    	}
    	echo $result;


    }

})->name('downloadStudyUUID');

// Partially Working, loads the uploader view (self-contained with the passed in data)
Route::middleware(['auth:sanctum', 'verified'])->get('/Studies/upload_study', function(Request $request) {
    $orthanc = new OrthancAPI();
    $uploaderdata = array(
        "IPaddress" => gethostbyname($_SERVER['SERVER_NAME']),
        "passfor" => "upload",
        "data" => array (
                "userid" => Auth::user()->id,
                "user_name" => Auth::user()->name,
                "mrn" => $_GET['mrn'],
                "anon_normal" => false
        )
    );
    // echo '{"status","Migrating":' . json_encode($uploaderdata). '}';
    return view('dicomuploader/uploader')->with('data', $uploaderdata);;
})->name('upload_study');

// Partially Working, UploadZipPreProcess
Route::middleware(['auth:sanctum', 'verified'])->post('/PACSUploadStudies/UploadZipPreProcess', function(Request $request) {
    $PACSUpload = new PACSUploadStudies($request,'UploadZipPreProcess');
    echo $PACSUpload->json_response;
})->name('UploadZipPreProcess');

// Partially Working, UploadZipToPACS
Route::middleware(['auth:sanctum', 'verified'])->post('/PACSUploadStudies/UploadZipToPACS', function(Request $request) {
    $PACSUpload = new PACSUploadStudies($request,'UploadZipToPACS');
    echo $PACSUpload->json_response;
})->name('UploadZipToPACS');

// Partially Working, PACSupload

Route::middleware(['auth:sanctum', 'verified'])->post('/PACSUploadStudies/PACSupload', function(Request $request) {

    if ($request->has('FLAG')) {
        $PACSUpload = new PACSUploadStudies($request, "PACSuploadFinish");
    }
    else {
        $PACSUpload = new PACSUploadStudies($request, "PACSupload");
    }
    echo $PACSUpload->get_json_response();

})->name('PACSupload');


// RADIOLOGY REPORTING ROUTES, REORGANIZE LATER

Route::middleware(['auth:sanctum', 'verified'])->post('/Reports/radreport_templates_list', [ReportsController::class, 'radreport_templates_list'])->name('radreport_templates_list');

Route::middleware(['auth:sanctum', 'verified'])->post('/HL7/getallhl7_reports', [ReportsController::class, 'getallhl7_reports'])->name('getallhl7_reports');

Route::middleware(['auth:sanctum', 'verified'])->post('/Reports/choose_template', [ReportsController::class, 'choose_template'])->name('choose_template');

Route::middleware(['auth:sanctum', 'verified'])->post('/OrthancDev/addPDF', function(Request $request) {
    // Kind of had to 'hack' this.
    $orthanc = new OrthancAPI();
    parse_str($request->getContent(), $output);
    Debugbar::error($output);
    echo $orthanc->addPDF($output); //addPDF($method, $html, $base64, $author, $title, $studyuuid, $return, $attach, $id)
    // curl -k http://localhost:8042/pdfkit/htmltopdf -d '{"method":"base64","title":"BASE64 TO PDF","studyuuid":"e6596260-fdf91aa9-0257a3c2-4778ebda-f2d56d1b","base64":"JVBERi . . .","return":1,"attach":1}'
    /*
	Response is generally like this.
	{
   "attachresponse": {
      "status": {
         "ID": "5f2940a9-08c702ac-7f59bf2e-f5c33ae4-f4a66e6b",
         "ParentPatient": "6816cb19-844d5aee-85245eba-28e841e6-2414fae2",
         "ParentSeries": "cd86a7b0-4e41c903-021e3533-815c009f-2b62e502",
         "ParentStudy": "b9c08539-26f93bde-c81ab0d7-bffaf2cb-a4d0bdd0",
         "Path": "/instances/5f2940a9-08c702ac-7f59bf2e-f5c33ae4-f4a66e6b",
         "Status": "Success"
      },
      "error": "false"
   },
   "base64"

*/

})->name('addPDF');

// RIS STUDIES RELEATED, NOT Orthanc

Route::middleware(['auth:sanctum', 'verified'])->post('/Referrers/sharelist', function() {
    ReferringPhysician::sharelist();

})->name('sharelist');

Route::middleware(['auth:sanctum', 'verified'])->post('/Referrers/share', function(Request $request) {
    ReferringPhysician::share($request, Auth::user());

})->name('ShareStudy');
