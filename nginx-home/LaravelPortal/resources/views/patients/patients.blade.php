<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient List') }}
        </h2>
    </x-slot>

<!-- This is supplemental component for CSS and JS for the RIS migration pages -->
<x-ris_css_js/>

<div id="patientlist">


<form class="searchform" data-action = "/patients/search">

				<div class="row divtableheader widemedia">
					<div class="col-sm-2">
						Last Name
					</div>
					<div class="col-sm-1">
						First Name
					</div>
					<div class="col-sm-1">
						DOB
					</div>
					<div class="col-sm-1">
						Sex
					</div>
					<div class="col-sm-2">
						MRN
					</div>
					<div class="col-sm-1">
						Phone 1
					</div>
					<div class="col-sm-1">
						Phone 2
					</div>
					<div class="col-sm-2">
						e-mail 1
					</div>
					<div class="col-sm-1">
						e-mail 2
					</div>

				</div>
				<div class="divtable row">
					<div class="col-sm-2 nopadding">
						<span class="narrowmedia">Last Name: </span>
						<input name="data-lname" id="data-lname" class="searchparam" type="text">
					</div>
					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">First Name: </span>
						<input name="data-fname" id="data-fname" class="searchparam" type="text">
					</div>

					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">DOB: </span>
						<input name="data-birth_date" id="data-birth_date" class="searchparam datepicker" type="text">
					</div>
					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">Sex: </span>
						<input name="data-sex" id="data-sex" class="searchparam" type="text">
					</div>
					<div class="col-sm-2 nopadding">
						<span class="narrowmedia">MRN: </span>
						<input name="data-mrn" id="data-mrn" class="searchparam" type="text">
					</div>
					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">Phone 1: </span>
						<input name="data-mobile_phone" id="data-mobile_phone" class="searchparam" type="text">
					</div>
					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">Phone 2: </span>
						<input name="data-alt_mobile_phone" id="data-alt_mobile_phonen" class="searchparam" type="text">
					</div>
					<div class="col-sm-2 nopadding">
						<span class="narrowmedia">e-mail 1: </span>
						<input name="data-email" id="data-email" class="searchparam" type="text">
					</div>
					<div class="col-sm-1 nopadding">
						<span class="narrowmedia">e-mail 2: </span>
						<input name="data-alt_email" id="data-alt_email" class="searchparam" type="text">
					</div>
				</div>

				<div class="row justify-content-center nopadding">
				<button type="button"  class="uibuttonsmallred" data-dbsearch = "search_patients">Search Database</button>
				&nbsp;&nbsp;
				<input type="button" value="Clear" title="Clear" class="clearsearchform uibuttonsmallred" data-target = "#patientswrapper">
				</div>


		<div class = "rowcount">

		    <select id = "patient_query_limit" name = "patient_query_limit">
		    <?php

// 		    foreach (Config::get("STUDY_COUNT_ARRAY") as $option) {
//
// 		    	$selected = ($_SESSION['PATIENT_QUERY_LIMIT'] == $option)?"selected":"";
// 		    	echo '<option value = "' . $option . '" ' . $selected . '>' . $option . '</option>';
// 		    }
			?>
            </select>
        </div>
        <div class = "RISpaginator">
		<?php
// 		$count = PatientModel::getTotalPatients();
// 		echo WidgetsModel::pagination ($_SESSION['PATIENT_QUERY_LIMIT'], 1, $count);
		?>
		</div>
        </form>
<!-- End searchformwrapper -->
<?php
// Legend for icons
// echo WidgetsModel::studiesLengend();
?>


<div class="row">
    <div id="patient_actions">
        <button type="button" id="newpatient" class="uibuttonsmallred">NEW PATIENT</button>
        <button type="button" id="view_update_selected" class="uibuttonsmallred">VIEW / EDIT Selected</button>
        <button id="uploadstudybutton" class="uibuttonsmallred uploadstudy" value="uploadstudy">Upload Study</button>
        <button type="button" id="uploaddocumentbutton" class="uibuttonsmallred uploaddocument" value="uploaddocument">Documents</button>
    </div>
</div>
<div id = "statusbar"></div>

<div class="row divtable widemedia worklistheader" data-sorttarget = "#patientswrapper">
    <div class="col-sm-3 nopadding">
        <div class="col-sm-6 padding" data-sort-param="data-name" data-sort-order="up">
            <span>Name</span>
        </div>
        <div class="col-sm-6 padding" data-sort-param="data-birth_date" data-sort-order="up">
            <span>Age / DOB</span>
        </div>
    </div>
    <div class="col-sm-3 nopadding">
        <div class="col-sm-2 padding" data-sort-param="data-sex" data-sort-order="up">
            <span>Sex</span>
        </div>
        <div class="col-sm-5 padding" data-sort-param="data-mrn" data-sort-order="up">
            <span>MRN</span>
        </div>
        <div class="col-sm-5 padding" data-sort-param="data-mobile_phone" data-sort-order="up">
            <span>Phone 1</span>
        </div>
    </div>
    <div class="col-sm-3 nopadding">
        <div class="col-sm-5 padding" data-sort-param="data-alt_mobile_phone" data-sort-order="up">
            <span>Phone 2</span>
        </div>
        <div class="col-sm-4 padding" data-sort-param="data-email" data-sort-order="up">
            <span>e-mail 1</span>
        </div>
        <div class="col-sm-3 padding" data-sort-param="data-alt_email" data-sort-order="up">
            <span>e-mail 2</span>
        </div>
    </div>
    <div class="col-sm-3 nopadding">
        <div class="col-sm-4 padding" data-sort-param="data-unused" data-sort-order="up">
            <span>Show Studies</span>
        </div>
        <div class="col-sm-4 padding" data-sort-param="data-unused2" data-sort-order="down">
            <span>Show Orders</span>
        </div>
        <div class="col-sm-4 padding" data-sort-param="data-unused3" data-sort-order="up">
            <span>Place Order</span>
        </div>
    </div>
</div>
<div class = "laravel_pagination">
{{ $patients->onEachSide(3)->links('pagination::tailwind') }}
</div>
<div id="patientswrapper" class = "listwrapper">
<?php

foreach($patients as $patient) {

$from = date_create_from_format("Y-m-d", $patient->get("birth_date")->getTimestamp());
$patient->set("age",intval((time() - $from) / (60 * 60 * 24 * 365)));  // depends on milliseconds or not


// row wrapper

echo '<div class="row divtable worklist patient" data-alt_email="'.$patient->get("alt_email").'" data-age="'.$patient->get("age") . '" data-alt_mobile_phone="'. $patient->get("alt_mobile_phone").'" data-birth_date="'. $patient->get("birth_date") .'" data-email="'.$patient->get("email") .'" data-first="'.$patient->get("first").'" data-last ="'.$patient->get("last").'"  data-mname ="'.$patient->get("mname"). '" data-mobile_phone="'.$patient->get("mobile_phone").'" data-mrn="'.$patient->get("mrn").'" data-name="'.$patient->get("last") . '^' . $patient->get("first") . '^' . $patient->get("mname") .  '" data-sex="'.$patient->get("sex").'" data-uuid="'.$patient->get("uuid")  .'" data-unused2 ="'.'' .'" data-data-unused3="'.''.'">';

echo '<div class="col-sm-3 nopadding">';
// Name
echo '<div class="col-sm-6" data-toggle="tooltip" data-placement="top" title="' .$patient->get("last") . ', ' . $patient->get("first") . '"><span class="narrowmedia">Name:  </span><span>&nbsp;'. $patient->get("last") . ', ' . $patient->get("first") . ', ' . $patient->get("mname")  .  '</span></div>';
// Age, DOB
echo '<div class="col-sm-6" data-toggle="tooltip" data-placement="top" title="'.$patient->get("birth_date").'"><span class="narrowmedia">Age:  </span><span>&nbsp;'.$patient->get("age"). ' - ' .$patient->get("birth_date").'</span></div>';
//
echo '</div>';
echo '<div class="col-sm-3 nopadding">';

// Sex
echo '<div class="col-sm-2"><span class="narrowmedia">Sex:  </span><span>&nbsp;'.$patient->get("sex").'</span></div>';

// MRN

echo '<div class="col-sm-5" data-toggle="tooltip" data-placement="top" title="'.$patient->get("mrn").'" data-mrn="' . $patient->get("mrn") . '" data-uuid="' . $patient->get("uuid"). '"><span class="narrowmedia">MRN:  </span><span>&nbsp;'.$patient->get("mrn").'</span></div>';

// Phones 1
echo '<div class="col-sm-5" data-toggle="tooltip" data-placement="top" data-mobile_phone="' . $patient->get("mobile_phone")  . '" data-uuid="' . $patient->get("uuid") . '" title="'.$patient->get("mobile_phone").'"><span class="narrowmedia">Phone:  </span><span>&nbsp;'. $patient->get("mobile_phone_country") . '-' . $patient->get("mobile_phone") .'</span></div>';

echo '</div>';
// alt phone and emails
echo '<div class="col-sm-3 nopadding">
<div class="col-sm-5" data-toggle="tooltip" data-placement="top" title="'. $patient->get("alt_mobile_phone").'"><span class="narrowmedia">Phone:  </span><span>'. $patient->get("alt_mobile_phone_country") . '-' . $patient->get("alt_mobile_phone").'</span></div>
<div class="col-sm-4" data-toggle="tooltip" data-placement="top" title="'. $patient->get("email").'"><span class="narrowmedia">e-mail:  </span><span>'.$patient->get("email").'</span></div>
<div class="col-sm-3" data-toggle="tooltip" data-placement="top" title="'. $patient->get("alt_email").'"><span class="narrowmedia">Alt e-mail:  </span><span>'.$patient->get("alt_email").'</span></div>
</div>';

// show studies, show orders, place orders

echo '<div class="col-sm-3 nopadding">

<div class="allstudies_orthanc col-sm-4" data-uuid="' . $patient->get("uuid") . '">
<span class="narrowmedia"></span>
<span class ="uibuttonsmallred">Show Studies</span>
<span class ="studycount"></span>
</div>
<div  class="showorders col-sm-4" data-uuid="' . $patient->get("uuid") . '">
<span class="narrowmedia"></span>
<span class ="uibuttonsmallred">Show Orders</span>
<span class ="ordercount"></span>
</div>';
echo '<div class="placeorder col-sm-4" data-ordertype = "NW" data-uuid="' . $patient->get("uuid") . '">
<span class="narrowmedia"></span>
<span class="patient_status"></span>
<span class ="uibuttonsmallred">Place Order</span>
</div>
</div>';
// END of ROW
echo '</div>';
}
?>
</div>
</x-app-layout>
