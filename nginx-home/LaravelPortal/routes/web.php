<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Actions\Orthanc\OrthancAPI;  // could change this for other PACS Interface or add others and capture that below
use App\MyModels\Reports;
use App\Providers\RouteServiceProvider;

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


// PATIENT PORTAL PAGE

Route::middleware(['auth:sanctum', 'verified'])->get('/patients', function () {

    $user = Auth::user();
    Debugbar::error($user);
    Debugbar::error($user->patientid);
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

Route::middleware(['auth:sanctum', 'verified'])->post('/readers', function () {

    if (isset($_POST['orthanc_host'])) OrthancAPI::setHost($_POST['orthanc_host']);
    $user = Auth::user();
    Debugbar::error($user);
    Debugbar::error($user->patientid);
    return view('readers');
})->name('readers');

// DEVTOOL PORTAL PAGE
//  Route::match(['get', 'post']
Route::middleware(['auth:sanctum', 'verified'])->get('/devtool', function () {

    $user = Auth::user();
    Debugbar::error($user);
    return view('devtool');

})->name('devtool');

// DEVTOOL PORTAL PAGE, POST TO Switch Server
Route::middleware(['auth:sanctum', 'verified'])->post('/devtool', function () {

    $user = Auth::user();
    Debugbar::error($user);
    return view('devtool');

})->name('devtool');

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

// RADIOLOGY REPORTING ROUTES, REORGANIZE LATER

Route::middleware(['auth:sanctum', 'verified'])->post('/Reports/radreport_templates_list', function(Request $request) {
    $list = (new Reports($request))->templateslist();
    echo $list;
})->name('radreport_templates_list');

Route::middleware(['auth:sanctum', 'verified'])->post('/HL7/getallhl7_reports', function(Request $request) {
   $list = (new Reports($request))->templateslist();
    echo $list;
})->name('getallhl7_reports');


