<?php

use App\MyModels\Widgets;
use App\Actions\Orthanc\OrthancAPI;
$pacs = new OrthancAPI();
?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/bower/font-awesome/css/all.min.css" type="text/css">
<style>
body * {
font-family:courier !important;

}
.btn {
    color:white !important;

}
#tagcodes {
    width:100%;
}
#attachpdf label {
    display:inline-block !important;
    width:100px !important;
}

#delegator {
white-space:inherit !important;
}
.col-md-2 label {
height:30px;
}

.controllerButtonRow {

}

.controllerButtonRow > div {

    text-align:left;

}

.controllerButtonRow button {

    border:1px solid black;
    border-radius:3px;
    color:white !important;
    width: 150px;
    text-align: center;


}
input, select, textarea {

    border:1px solid black !important;
}

textarea {
width:100%;
}

pre {
outline: 1px solid #ccc;
padding: 5px;
margin: 5px;
font-size:12px;
}
#devModal .string { color: green; }
#devModal .number { color: darkorange; }
#devModal .boolean { color: blue; }
#devModal .null { color: magenta; }
#devModal .key { color: #0158ff; }
#devModal {white-space: break-spaces;}
select option:disabled {
    color: #999;
    font-weight: bold;
}
.formatheight label {
height:30px;
}

	.tempresult {
		font-size:14px !important;
	}
	.mylinks {
	color:red !important;
	}
	body * {

	font-weight:bold;
	color:black;
	}

	#command {
		height:40px;
	}
	#qbootstrap-footer {
	display:none;
	}

	#radreport {
		width:100%;
		min-height:200px;
	}
	body {
	background:white !important;
	}


	#apiselection label {

		text-align: center;
		font-weight: bold;
		font-size: .7em;
		margin: 0;
		padding: 0;

	}

	#apiselection .row {

		margin-right: 0px;
		margin-left: -0px;
		border: 1px solid black;
		text-align: center;
		margin: auto;
	}

	.unittests a {
	display:block;
	color:blue;
	}
	.unittests * {

	font-weight:bold;
	font-size:10px;

	}

	.unittests > div >div {

	margin-bottom:20px;

	}

	label {
		display:block;
	}
	#delegator {

	border: 1px solid black;
	top: 80px;
	right: 20px;
	left: 20px;
	background: white;
	display: none;
	width:100%;
	height:max-content;
	text-align:left !important;
	white-space:pre;
	min-height:unset;
	color:black;
	font-size:12px;


	}
	#selectwrapper {

		left: 20px;
		right: 20px;
		background: white;
	}
	.modal-dialog {
		width:max-content;
		max-width: unset;
	}
	.modal-header {
		margin: unset !important;
	}
	html, body {

	visibility: visible;
	display:unset;
	width:100%;
	margin:0;
	padding:0;
	height:unset;
	}
	#spinner {
		display:none;
	}
	#weblinks a {
		white-space:nowrap;
	}
	label {
	display:inline !important
	}

</style>
<!-- For the Viewer and upload pic overlay -->

<div id="myNav" class="vieweroverlay"><a href="" class="closebtn"><i class="fas fa-window-close"></i></a><div id="dynamiciframe"></div></div>
<!-- The Modal -->
<div class="modal fade hide" id="devModal" data-keyboard="true" data-backdrop="true" tabindex='-1'>

  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div id = "studybrowser">

	<ul class="centertabs">
			<li>
			<a href="#basic_tools">Basic Tools</a>
			 </li>
			<li>
			<a href="#study_browser">Study Browser</a>
			</li>
			<li>
			<a href="#trim_report">Trim Report</a>
			</li>
	</ul>

	<div id = "basic_tools">
        <div style = "margin:auto;text-align:center;width:max-content;font-size:12px;">
        <?php echo $pacs->serverStatusWidget(); ?>
        <?php echo Widgets::PACSSelectorTool("devtool"); ?>
        </div>

	<!-- Service Section Start-->
		<div class="row">
	<!-- Responsive Section Start -->
		<div class="text-center" id="selectwrapper">
						<h4 class="border-primary" style="margin-top:50px;">
							<span class="heading_border">
								ORTHANC REST API & Web App Database Tools
							</span>
						</h4>
						 <img id="img" width=100%>
						<div id = "weblinks">
						<a href = "https://dicom.innolitics.com/" target = "_blank" class = "btn btn-info btn-sm">Dicom Tag Browser</a>
						<a href = "https://book.orthanc-server.com/users/rest.html#id12" target = "_blank" class = "btn btn-info btn-sm">Orthanc REST API Reference</a>
						<a href = "https://book.orthanc-server.com/index.html" target = "_blank" type="button" class = "btn btn-info btn-sm">Orthanc Book</a>
						<a href = "https://book.orthanc-server.com/plugins/python.html?highlight=python" type="button" target = "_blank" class = "btn btn-info btn-sm">Orthanc Python Scripts</a>
						<a href = "https://book.orthanc-server.com/users/rest-cheatsheet.html" type="button" target = "_blank" class = "btn btn-info btn-sm">REST CALL Cheat Sheet</a>
						<a href = "https://packages.debian.org/unstable/orthanc-dev" type="button" target = "_blank" class = "btn btn-info btn-sm">Debian Dev Package</a>
						<a href = "https://hg.orthanc-server.com/" type="button" target = "_blank" class = "btn btn-info btn-sm">Orthanc Mercurial Server</a>
						<a href = "https://hg.orthanc-server.com/orthanc-tests/file/Orthanc-1.7.2/Tests/Tests.py#l1473" type="button" target = "_blank" class = "btn btn-info btn-sm">Orthanc Mercurial Unit Tests</a>
						https://hg.orthanc-server.com/orthanc-tests/file/Orthanc-1.7.2/Tests/Tests.py#l1473
						</div>
						<div>

						<button data-action = "get-configs" type="button" class = "btn btn-primary btn-sm">Get Configs</button>
						<select id="get-configs" name="get-configs"></select>
						<button data-action = "uploadstudy" type="button" class = "btn btn-primary btn-sm">Upload DICOM Study</button><input id = "uploadmrn" type = "text" name="mrn" value ="mrn" placeholder = "mrn">
						<button data-action = "pydicominstance" type="button" class = "btn btn-primary btn-sm">dump2dcm-instance</button><input id = "pydicominstance" type = "text" name="ID" value ="ID" placeholder = "ID">
						</div>

						<div>
						<button data-devcontroller = "ServerStatus" type="button" class = "btn btn-primary btn-sm">ServerStatus</button>
						<button data-devcontroller = "StartServer" type="button" class = "btn btn-primary btn-sm">StartServer</button>
						<button data-devcontroller = "StopServer" type="button" class = "btn btn-primary btn-sm">StopServer</button>
						<button data-devcontroller = "PHPINFO" type="button" class = "btn btn-primary btn-sm">PHP INFO</button>
						<button data-devcontroller = "getOrthancModalities" type="button" class = "btn btn-primary btn-sm">getOrthancModalities</button>
						</div>


						<div class  = "row controllerButtonRow">
						<div class = "col-sm-6">

						<form>
						<button data-devcontroller = "getPatients" type="button" class = "btn btn-danger btn-sm">getPatients</button>
						<label for="patient_uuid"></label>
						<input id="patient_uuid" name = "uuid" type="text" value="" placeholder = "uuid"/>
						</form>

						<form>
						<button data-devcontroller = "getStudies" type="button" class = "btn btn-danger btn-sm">getStudies</button>
						<label for="study_uuid"></label>
						<input id = "study_uuid" name="uuid" type="text" value="" placeholder = "uuid"/><br>
						<button style = "visibility:hidden;"></button><button data-devcontroller = "downloadZipStudyUUID" type="button" class = "btn btn-primary btn-sm">downloadZipStudyUUID</button><br>
						<button style = "visibility:hidden;"></button><button data-devcontroller = "downloadDCMStudyUUID" type="button" class = "btn btn-primary btn-sm">downloadDCMStudyUUID</button>
						</form>

						<form>
						<button data-devcontroller = "getSeries" type="button" class = "btn btn-danger btn-sm">getSeries</button>
						<label for="series_uuid"></label>
						<input id="series_uuid" name="uuid" type="text" value="" placeholder = "uuid"/>
						</form>

						<form>
						<button data-devcontroller = "getInstances" type="button" class = "btn btn-danger btn-sm">getInstances</button>
						<label for="instance_uuid"></label>
						<input id="instance_uuid"  name = "uuid" type="text" value="" placeholder = "uuid"/><br>
                        <label for="withtags"></label>
                        <select name = "withtags" id="withtags">
                        <option data-controllerselect = "getInstances" value = "" selected>getInstances</option>
                        <option data-controllerselect = "getInstances" value = "simplified-tags" selected>getInstances - simplified-tags</option>
                        <option data-controllerselect = "getInstances" value = "tags">getInstances - tags</option>
                        <option data-controllerselect = "getDICOMTagListforUUID" value = "tags">getDICOMTagListforUUID</option>
                        <option data-controllerselect = "getDICOMTagValueforUUID" value = "tags">getDICOMTagValueforUUID</option>
                        <option data-controllerselect = "getInstanceDICOM" value = "tags">getInstanceDICOM</option>
                        <option data-controllerselect = "getInstancePNGPreview" value = "tags">getInstancePNGPreview</option>
                        </select><br>
                        <label for="tagcodes"></label>
						<input id="tagcodes" type="text" name="tagcodes" value="" placeholder = "e.g. 0008,0012 is date, 0010,0020 ID, single or recursive"/>
						</form>
						</div>

						<div class = "col-sm-6">

						<form id = "attachpdf">

                            <button data-devcontroller = "addPDF" type="button" class = "btn btn-danger btn-sm">Attach HTML as PDF to Study UUID</button><br>
                            <div class = "viewerequestwrapper">
                                <label for="studyuuid">Study UUID</label>
                                <input id="studyuuid" name = "studyuuid" type="text" value="" placeholder = "studyuuid"/><br>
                                <button class="openinviwer btn btn-danger btn-sm" href="#" target="_blank" data-viewer = "osimis">Open in Osimis</button><br>
                                <button class="openinviwer btn btn-danger btn-sm" href="#" target="_blank" data-viewer = "stone">Open in Stone</button>
                            </div>

                            <label for="reportmethod">html or base64</label>
                            <input id="reportmethod" name = "method" type="text" value="html" placeholder = "html"/><br>

                            <label for="reporthtml">raw html is method html</label>
                            <textarea id="reporthtml" name = "html" type="text" value="<div>This is a test.</div>" placeholder = "raw html"><div>This is a test.</div></textarea><br>

                            <label for="reportbase64">base64 if base64 method</label>
                            <input id="reportbase64" name = "base64" type="text" value="" placeholder = "base64"/><br>

                            <label for="reportauthor">Author</label>
                            <input id="reportauthor" name = "author" type="text" value="Author" placeholder = "Author"/><br>

                            <label for="reporttitle">Title</label>
                            <input id="reporttitle" name = "title" type="text" value="Title" placeholder = "Title"/><br>

                            <label for="reportreturn">1 or 0, returns the PDF</label>
                            <input id="reportreturn" name = "return" type="text" value="0" placeholder = "return"/><br>

                            <label for="reportattach">1 or 0 to attach</label>
                            <input id="reportattach" name = "attach" type="text" value="1" placeholder = "attach"/><br>

                            <label for="reportreaderid">Reader ID</label>
                            <input id="reportreaderid" name = "id" type="text" value="0001" placeholder = "id"/><br>
                        </form>
                        </div>
                        </div>


						<form class="row" method="POST" accept-charset="UTF-8" id="apiselection" name="apiselection">
							<div class="col-md-12">
								<label for="command">
									Select List for Basic Orthanc REST calls <span style="font-size:14px;font-weight:bold;">(hit ESC to clear results)</span>
								</label>

								<select class="form-control" id="command" name="command">

									<option value="tools/find" data-query = "generic" data-param = "#toolsfindquery" data-method = "postquery">
										Query Orthanc - /tools/find
									</option>
									<option value="studies/page" data-query = "studiespage" data-param = "#studiespagequery" data-method = "postquery">
										Query Orthanc - /studies/page
									</option>
									<option value="/studies/arrayIDs" data-query = "studiesIDarray" data-param = "#studiesIDarray" data-method = "postquery">
										Query Orthanc - /studies/arrayIDs
									</option>
									<option value="studies" data-append = "true" data-param = "#uuid" data-method = "get" data-query = "metadataget">
										Get MetaData Val for Study
									</option>
									<option value="studies" data-append = "true" data-param = "#uuid" data-method = "put" data-query = "metadataset">
										Set MetaData Val for Study
									</option>
									<option value="parseHL7" data-param = "#parseHL7">
										parseHL7
									</option>
								</select>
							</div>
						</form>

                        <div class = "row">
                        <div>Scratch Pad</div>
						<textarea style = "width:100%;height:100px;text-align:left;border: 1px solid black;"></textarea>
						<div style="position: static;" class="form-group pd-right ui-draggable-handle col-md-12">
								<button type="submit" class="btn btn-info btn-sm">
									Submit
								</button>
							</div>
							</div>
                        <div class = "row">

                            <div class = "col-md-3">
                            <label for="data-mrn">
                                patientid for studycounts (converted to array in Controller)
                            </label>
                            <input id="data-mrn" type="text" name="data-mrn" value="DEV0000001" />

                        </div>


							<div class = "col-md-3">
								<label for="tagcodes">
								getDICOMTagValueforUUID
								Tag Codes, single  recursive:  e.g. 0008,0012 is date, 0010,0020 ID
								</label>
								<input id="tagcodes" type="text" name="tagcodes[]" value="0010,0020" />
							</div>
							</div>

						<div class = "row formatheight" style = "width:100%;">
							<div class = "col-md-3">
								<input id="metadatavalue" type="text" name="metadatavalue" placeholder = "For Set Value" />
								<label for="metadatachoice">
									MetaData Choices
								</label>
								<select id="metadatachoice" name="metadatachoice">
								<option value = "1024">OutsideStudy/1024</option>
								<option value = "1025">InternalMRN/1025</option>
								<option value = "1026">InternalAccession/1026</option>
								<option value = "1027">LatestReportStatus/1027</option>
								<option value = "1028">RequestHistory/1028</option>
								</select>
							</div>
							<div class = "col-md-3">
								<label for="pngjpg">
									pngjpg Png or Jpg, image/png or image/jpg fo thumbnail, for getInstancePNGPreview
								</label>
								<select id="pngjpg" name="pngjpg">
								<option value = "image/png">image/png</option>
								<option value = "image/jpg">image/jpg</option>
								</select>
							</div>
							<div class = "col-md-3">
								<label for="display">
									Display vs. Execute
								</label>
								<input id="display" type="text" name="display" value="display" /><br>
							</div>
	<!--
							<div class = "col-md-3">
								<label for="queryLevel">
									Query Level
								</label>
								<select id="queryLevel" name="queryLevel">
									<option value="Study" selected>Study</option>
									<option value="Series">Series</option>
									<option value="Instance">Instance</option>
									<option value="Patient">Patient</option>
								</select>
							</div>
	 -->
							</div>


							<div class = "row" style = "width:100%;">
							<div class = "col-md-12">
								<label for="toolsfindquery">
									Query for /studies/arrayIDs
								</label>
								<input style = "width:100%;font-size:14px;" id="studiesIDarray" type="text" name="studiesIDarray" value='{"6c65289b-db2fcb71-7eaf73f4-8e12470c-a4d6d7cf":"74f3713f-6b8c0332-e467fc99-6daadc28-cabfa5d2"}' />
							</div>
							</div>

							<div class = "row" style = "width:100%;">
							<div class = "col-md-9">
								<label for="toolsfindquery">
									Query for /tools/find  queries
								</label>
								<input style = "width:100%;font-size:14px;" id="toolsfindquery" type="text" name="toolsfindquery" value='{"PatientID":"*000*","StudyDate":"20141111-20200503"}' />
							</div>
							<div class = "col-md-3">
								<label for="queryLevel">
									Query Level
								</label>
								<select id="queryLevel" name="queryLevel">
									<option value="Study" selected>Study</option>
									<option value="Series">Series</option>
									<option value="Instance">Instance</option>
									<option value="Patient">Patient</option>
								</select>
							</div>
							<div class = "col-md-12">
								<label for="toolsfindquery">
									Query for/studies/page queries
								</label>
								<input style = "width:100%;font-size:14px;" id="studiespagequery" type="text" name="studiespagequery" value='{"PatientName":"**","PatientBirthDate":"","PatientSex":"","PatientID":"","AccessionNumber":"","StudyDescription":"**","ReferringPhysicianName":"**","StudyDate":""}' />
							</div>
							<div class = "col-md-12">
								<label for="toolsfindquery">
									MetaData for/studies/page queries<br>
									"OutsideStudy" : 1024,<br>
									"InternalMRN" : 1025,<br>
									"InternalAccession" : 1026,<br>
									"LatestReportStatus": 1027,<br>
									"RequestHistory": 1028<br>
								</label>
								<input style = "width:100%;font-size:14px;" id="studiespagequerymeta" type="text" name="studiespagequerymeta" value='' />
							</div>
							</div>
							<div class = "row">
							<div class = "col-md-2">
								<label for="pagenumber">
									Page Number for /studies/page
								</label>
								<input id="pagenumber" type="text" name="pagenumber" value="1" />
							</div>
							<div class = "col-md-2">
								<label for="">
									Items per page for /studies/page
								</label>
								<input type="text" name="itemsperpage" value="2" />
							</div>
							<div class = "col-md-2">
								<label for="">
									Reverse (0 is forward, 1 is reverse
								</label>
								<input type="text" name="reverse" value="0" />
							</div>
							<div class = "col-md-2">
								<label for="widget">
									Widget, just some number
								</label>
								<input  type="text" name="widget" value="1" />
							</div>
								<div class = "col-md-4">
								<label for="sortbytagname">
									Sort by TagName
								</label>
								<select id = "sortbytagname" name = "sortbytagname" style= "max-width:120px;">
								<option value = "PatientName">PatientName</option>
								<option value = "PatientID">PatientID</option>
								<option value = "AccessionNumber" >AccessionNumber</option>
								<option value = "StudyDescription" >StudyDescription</option>
								<option value = "StudyDate"  selected>StudyDate</option>
								<option value = "ReferringPhysicianName" >ReferringPhysicianName</option>
								</select>

							</div>
							</div>

	<button id = "createPDF" name = "createPDF" class = "btn btn-info btn-sm" data-target = "#MWLform">createPDF</button>
	<button id="pdfattach" name="pdfattach" class="btn btn-info btn-sm">Attach To Study</button>
	<button id="pdfopeninviewer" name="pdfopeninviewer" class="btn btn-info btn-sm">Open After Created</button>
	<div style = "width: 350px;text-align: center;margin: auto;">
	<input id="pdfmodality" name="pdfmodality" value="OT" type="text" class="form-control">
	<input id="pdfdescription" name="pdfdescription" value="TEST PDF" type="text" class="form-control">
	<input id="pdfstudyuuid" name="pdfstudyuuid" value="6c65289b-db2fcb71-7eaf73f4-8e12470c-a4d6d7cf" type="text" class="form-control">
	</div>

	<form id="MWLform" name = "MWLform">

	  <button id = "createMWL" name = "createMWL" class = "btn btn-info btn-sm">Create MWL File</button>
	  <div>Creates a .text file named AccessionNumber.txt and converts it to a .wl file</div>
	  <div>Returns JSON, See Docs</div>
	  <div class="form-group row">
		<label for="MediaStorageSOPClassUID" class="col-4 col-form-label">MediaStorageSOPClassUID</label>
		<div class="col-8">
		  <input id="MediaStorageSOPClassUID" name="MediaStorageSOPClassUID" value="MediaStorageSOPClassUID" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="SpecificCharacterSet" class="col-4 col-form-label">SpecificCharacterSet</label>
		<div class="col-8">
		  <input id="SpecificCharacterSet" name="SpecificCharacterSet" value="SpecificCharacterSet" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="AccessionNumber" class="col-4 col-form-label">AccessionNumber</label>
		<div class="col-8">
		  <input id="AccessionNumber" name="AccessionNumber" value="AccessionNumber" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="Modality" class="col-4 col-form-label">Modality</label>
		<div class="col-8">
		  <input id="Modality" name="Modality" value="Modality" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="Modality" class="col-4 col-form-label">InstitutionName</label>
		<div class="col-8">
		  <input id="InstitutionName" name="InstitutionName" value="InstitutionName" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="PatientName" class="col-4 col-form-label">PatientName</label>
		<div class="col-8">
		  <input id="PatientName" name="PatientName" value="PatientName" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="PatientID" class="col-4 col-form-label">PatientID</label>
		<div class="col-8">
		  <input id="PatientID" name="PatientID" value="PatientID" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="PatientBirthDate" class="col-4 col-form-label">PatientBirthDate</label>
		<div class="col-8">
		  <input id="PatientBirthDate" name="PatientBirthDate" value="PatientBirthDate" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="PatientSex" class="col-4 col-form-label">PatientSex</label>
		<div class="col-8">
		  <input id="PatientSex" name="PatientSex" value="PatientSex" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="MedicalAlerts" class="col-4 col-form-label">MedicalAlerts</label>
		<div class="col-8">
		  <input id="MedicalAlerts" name="MedicalAlerts" value="MedicalAlerts" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="Allergies" class="col-4 col-form-label">Allergies</label>
		<div class="col-8">
		  <input id="Allergies" name="Allergies" value="Allergies" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="AdditionalPatientHistory" class="col-4 col-form-label">AdditionalPatientHistory</label>
		<div class="col-8">
		  <input id="AdditionalPatientHistory" name="AdditionalPatientHistory" value="AdditionalPatientHistory" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="StudyInstanceUID" class="col-4 col-form-label">StudyInstanceUID</label>
		<div class="col-8">
		  <input id="StudyInstanceUID" name="StudyInstanceUID" value="StudyInstanceUID" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="RequestingPhysician" class="col-4 col-form-label">RequestingPhysician</label>
		<div class="col-8">
		  <input id="RequestingPhysician" name="RequestingPhysician" value="RequestingPhysician" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="RequestedProcedureDescription" class="col-4 col-form-label">RequestedProcedureDescription</label>
		<div class="col-8">
		  <input id="RequestedProcedureDescription" name="RequestedProcedureDescription" value="RequestedProcedureDescription" type="text" required="required" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="ScheduleStationAETitle" class="col-4 col-form-label">ScheduleStationAETitle</label>
		<div class="col-8">
		  <input id="ScheduleStationAETitle" name="ScheduleStationAETitle" value="ScheduleStationAETitle" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="ScheduledProcedureStepStartDate" class="col-4 col-form-label">ScheduledProcedureStepStartDate</label>
		<div class="col-8">
		  <input id="ScheduledProcedureStepStartDate" name="ScheduledProcedureStepStartDate" value="ScheduledProcedureStepStartDate" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="ScheduledProcedureStepStartTime" class="col-4 col-form-label">ScheduledProcedureStepStartTime</label>
		<div class="col-8">
		  <input id="ScheduledProcedureStepStartTime" name="ScheduledProcedureStepStartTime" value="ScheduledProcedureStepStartTime" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="RequestedProcedureID" class="col-4 col-form-label">RequestedProcedureID</label>
		<div class="col-8">
		  <input id="RequestedProcedureID" name="RequestedProcedureID" value="RequestedProcedureID" type="text" class="form-control">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="RequestedProcedurePriority" class="col-4 col-form-label">RequestedProcedurePriority</label>
		<div class="col-8">
		  <input id="RequestedProcedurePriority" name="RequestedProcedurePriority" value="RequestedProcedurePriority" type="text" class="form-control">
		</div>
	  </div>
	</form>


				<div class = "row" style = "width:100%;">
				<div class = "col-md-12">
					<label for="parseHL7">
						Parse HL7
					</label>
					<textarea style = "width:100%;" id="parseHL7" type="text" name="parseHL7" value='' /></textarea>
					<button id = "submitHL7" class = "btn btn-info btn-sm">Decode</button>
				</div>
				</div>

				<input id="session_id" type="hidden" name="session_id" value="<?php echo session_id() ?>" />

					</div>
		</div>
	</div>

	<div id = "study_browser">
	<?php
	// $this->renderWithoutHeaderAndFooter("/apitool/orthanc_index");
	?>
	</div>
	<div id = "trim_report">



			<hr style="border:2px solid black;">
			<h5>Reports Editor, Trim Reports from <a href = "https://radreport.org/" target="_blank" class = "btn btn-info btn-sm">https://radreport.org</a></h5>
			<div class="row unittests">
				<div class="col-sm-12">
				<button id = "radreportTrim" class = "trim">Trim Report</button>
				<textarea id = "radreport"></textarea>
				</div>
			</div>
	</div>

</div>
<?php
$APIURL = $pacs->getAPIURL();
?>
<script nonce = "">

	function setUpConfigsSelect() {

	    result = '<?php  echo str_replace("\n", "", $pacs->getOrthancConfigs("ALL")); ?>';
	    // The response from Orthanc has line breaks, pretty printed.
	    result = JSON.parse(result);
	    selectlist = '<option value = "ALL">ALL</option>';
	    console.log(result);
        $.each(result, function( index, value ) {
            selectlist+= '<option value = "' + index+ '">' +index + '</option>';
        });
        $("#get-configs").html(selectlist);
	}

    setUpConfigsSelect();

    $("#studybrowser").tabs();

    function parseMessages(messages, display) {

	// Accepts an Array of objects, or a String of an array of objects, returns false if not an array.
	// displays status notices, error messages and redirects for CSFR token issues or not authorized.
	// Also returns other values that might be in the returns data.
	// Does not take an object or a JSON string.

		error = false;
		var returned = {};
		var displayedtitle = "";
		var displayedtext = "";

		try {
			if (typeof messages == "string") { // might be a string or not JSON
			messages = JSON.parse(messages);
			}
		}
		catch {
			return messages;
		}
		if (!Array.isArray(messages)) messages = [messages];

		$.each(messages, function( index, value ) {

			if(isJsonString(value)) message = JSON.parse(value);
			else message = value;
			// console.log(message);
		  if (message.status != undefined) {  // if message is set then display.
		  displayedtext  += message.status + "<br>";
		  }
		// if bad token or AJAXRedirect then redirect home, but be logged out with token.

		  if (message.token != undefined  || message.AJAXRedirect != undefined) {
			setTimeout(function () {location.href = "/"}, 2000);
			showmodal("Error", message.error);
			return false;
		  }
		  if (message.error != undefined) {  // if error is set then display that and set error to true
		  displayedtext  += message.error + "<br>";
		  error = true;
		  error = message.error;
		  }
		  else 	if (message.curl_error != undefined) {  // if error is set then display that and set error to true
		  displayedtext  += message.curl_error + "<br>";
		  error = true;
		  error = message.curl_error;
		  }
		  else {
			for (var k in message) {
				returned[k] = message[k];
		  }
		  }

		});

		if (displayedtext != "" && display) showMessage("", displayedtext);
		returned.error = error;
		return returned;
	}

    $(".openinviwer").on("click", function(event) {

        event.preventDefault();
        uuid = $(this).closest(".viewerequestwrapper").find("#studyuuid").val();
        viewer = $(this).data("viewer");

        $.ajax({

            type: "POST",
            url: '/OrthancDev/getViewerLink',
            dataType: "json",
            data: {uuid: uuid,viewer: viewer}
        })
        .done(function(data, textStatus, jqXHR) {

            response = parseMessages(data);
            console.log(response);
            if (response.link.includes("error:")) {
                showMessage("", "No Connectivity with Image Server:  " + response.link );
            }
            else if (event.type == "click") {

                $("#dynamiciframe").append($('<iframe style="width:100%;border:none;margin:0px;overflow:scroll;background-color:transparent;height: 100vh;" class="vieweroverlay-content" id="viewerframe" name ="viewerframe" src="' + response.link + '"></iframe>'));
                //postToViewer(response.link,JWT,"viewerframe");
                document.getElementById("myNav").style.width = "100%";
                $("body").css("overflow", "hidden");

            }
            else if (response.success == "true" && event.type == "contextmenu") {
                //postToViewer(response.link,JWT,"_blank");
                window.open(response.link);

            }
            else {
                showMessage("", "Unknown Error");
            }

        });
    });




    function OrthancDevControllerCallResults(method,data = {}, callback) {

		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	            'nonce': ''
	        },
			type: "POST",
			url: '/OrthancDev/' + method,
			dataType: "html",
			data: data,
			beforeSend: function(e) {
				$("#spinner").css("display", "block");
			},
		})
		.done(function(data, textStatus, jqXHR) {
			callback(data);
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
		});
	}

	function OrthancDevControllerCallDisplay(method,data,title = "") {

		$.ajax({
			headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	            'nonce': ''
	        },
			type: "POST",
			url: '/OrthancDev/' + method,
			dataType: "html",
			data: data,
			beforeSend: function(e) {
				$("#spinner").css("display", "block");
			},
		})
		.done(function(data, textStatus, jqXHR) {

		        if (title == "addPDF") {
		            data = JSON.parse(data);
				    let url = "data:application/pdf;base64," + data.base64;
				    message = '<embed id = "frame" src="' + url+ '" style = "width:100%;height:100%;" type="application/pdf"> </embed><button id="closeresults" style="width:100%;">Close Results</button>';
				    showMessage("PDF Report", message );
				    // openViewerByUUID(data.status.ID);

				}

				else if (isJsonString(data))  {

				    showMessage(title, '<pre>' + syntaxHighlight(data) + '</pre>' );
				}
				else {
				    showMessage(title, data);
				}
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
		});
	}

	$("[name=withtags]").on("change", function(e) {
	    $(this).closest("form").find("button").data("devcontroller", $(this).find(":selected").data("controllerselect"));
	});
	$("[data-devcontroller]").on("click", function(e) {
	// Alternate method with data-name(n) data-param(n) in the button itself
// 	    datakeys = $(this).data();
// 	    postdata = {};
// 	    parent = $(this);
// 	    $.each(datakeys, function( index, value ) {
// 	    console.log(index + ":" + value);
// 	        if (index.includes("name")) {
// 	            paramkey = index.replace("name", "param");
// 	            console.log(paramkey);
// 	            postdata[value] = $("#" + parent.data(paramkey)).val();
// 	        }
//         });
//         console.log(postdata);
        postdata = $(this).closest("form").serialize();
        if ($(this).data("devcontroller") != "downloadZipStudyUUID" && $(this).data("devcontroller") != "downloadDCMStudyUUID") {

	        OrthancDevControllerCallDisplay($(this).data("devcontroller"), postdata, $(this).data("devcontroller"));
	        $("input, select").css({"border":"1px solid black", "outline-style": "unset"});
	        $($(this).data("param")).css({"border":"2px solid green", "outline-style": "dashed"});
	     }

	});
	//  Sets the Headers Automatically for all requests, just need to get the AUTHTOKEN
	//  Query the NGINX Server when a user signs in and return them an Auth Token for a one time use for the session.
/*
	For addPDF

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

	$.ajaxSetup({

    headers: {

	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    'nonce': ''

	},
	complete: function(xhr, textStatus) {

		$("#spinner").css("display", "none");
		console.log(xhr.hasOwnProperty('responseJSON'));
		if (xhr.hasOwnProperty('responseJSON') && xhr.responseJSON.hasOwnProperty('AJAXRedirect')) {
			showMessage("",xhr.responseJSON.error);
			location.href = "/";
		}
	},
	error: function(xhr, textStatus, errorThrown) {
	console.log(xhr);
	console.log(textStatus);
	console.log(errorThrown);
	if (xhr.status != 0 ) {
	alert( "error: See Console");
	}
	}
	});


	var apiurl;
	var pdfdataurl;


	$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
	};

	$("#createMWL").on("click", function(e) {

		e.preventDefault();
		data = $(this).closest("form").serializeObject();
		console.log(data);
		$.ajax({
		contentType: 'application/json; charset=utf-8',  // post JSON
        type: "POST",
        url: apiurl + "mwl/file/make",
        dataType: "json",
        data: JSON.stringify(data),
        context: $(this),
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },
		})
		.done(function(data, textStatus, jqXHR) {

		   showResults("MWL File", data.message);
		   //return data.length;
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
			alert("error");
		})
		.always(function(jqXHR, textStatus) {
			$("#spinner").css("display", "none");
		});
	});

	$("#createPDF").on("click", function(e) {

		e.preventDefault();
		//html = $($(this).data("target")).html();
		html = $("html")[0].outerHTML;
		html = '<style>.htmlmarkup, #reportswrapper > div {padding:10px;margin:0px;background: white;color: #000;font-family: "Trebuchet MS", Helvetica, sans-serif;font-size: 12px;font-weight:bold;}#markupform .htmlmarkup {background:black !important;color:white;}.htmlmarkup div, #reportswrapper > div div {display:block;padding:0px;line-height: initial;margin:5px 0px 5px 0px;}.htmlmarkup label, #reportswrapper > div label{font-size: 14px;color:#000;font-weight:bold;padding-right:10px;}.htmlmarkup section > header, #reportswrapper > div section > header{color: #000;font-family: "Trebuchet MS", Helvetica, sans-serif;font-size: 16px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;}.htmlmarkup section > section > header, #reportswrapper > div section > section > header{color: #000;font-family: "Trebuchet MS", Helvetica, sans-serif;font-size: 12px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;text-align: left;}.htmlmarkup section > section > section > header, #reportswrapper > div section > section > section > header{color: #000;font-family: "Trebuchet MS", Helvetica, sans-serif;font-size: 12px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;text-align: left;}.htmlmarkup > section{}.htmlmarkup section > section, #reportswrapper > div section > section{padding-left: 0.8cm;}.htmlmarkup p, #reportswrapper > div p{margin-bottom: 0.0cm;margin-top: 0.0cm;padding-left: 0.8cm;}reportswrapper {width:100%;}#header_info {margin: 20px auto 10px auto;width:100%;;}#header_info, #header_info td {border: 1px solid black;border-collapse: collapse;background:#DDD;font-size: 12px;font-weight: bold;padding: 2px 5px 2px 5px;}#header_info tr:nth-child(even) td {background:#FFF !important;}#disclaimer {margin:20px 10px 0px 10px;text-align: justify;font-size: 8px;}#header_info > tbody > tr > td:first-child {width:350px;}#header_info > tbody > tr > td:nth-child(2){width:250px;}#header_info > tbody > tr > td:nth-child(3){width:190px;}.htmlmarkup, #reportswrapper {width:800px}#reportbody{font-size:12px;width: 90%;word-wrap: break-word;}#sigblock{margin-top:10px;}#apiresults {line-height: normal;font-size: 16px;font-family: PoppinsRegular;color: black;background: #FFF;border-radius: 20px;padding: 20px 10px 20px 10px;border: 2px solid black;width:816px;}</style><style>#reportheader{position:relative;width:800px;padding: 5px 5px 20px 5px;margin: 0px 0px 10px 0px;text-align:center;overflow:auto;margin:auto;}#reportheader #logo {height:60px;border:none;position:absolute;left:0;right:0;margin:auto;}#reportheader #floatleft{width:350px;display:inline-block;text-align:left;float: left;}#reportheader #floatright{width:max-content;text-align:left;float: right;padding-right:10px;}.letterheadlabel {display:inline-block;width:60px;text-align:right;margin-right:5px;}</style><div id="reportheader"><div><img id="logo" src="https://sias.dev:8000/browsestudies/images/reportslogo.png" alt="sitelogo"><div id="floatleft"> Ltd.<br>71 Eastern Ave<br>P.O. Box 32322<br>George Town, Cayman Islands KY1-1209 </div><div id="floatright"><span class="letterheadlabel">Phone:  </span>KY 000-000-0000<br><span class="letterheadlabel">Fax:  </span>KY 000-000-0000<br><span class="letterheadlabel">Email:  </span>roland@talanow.info<br><span class="letterheadlabel">Website:  </span>medpics.com<br></div></div></div><div id="reportnoheader"><table id="header_info"><tbody><tr><td id="report_name"> Patient Name: Talanow, Roland</td><td id="report_mrn"> Med Rec Number:  DEV0000002</td><td style="vertical-align:text-top;white-space:break-spaces;width:200px" rowspan="5">Indication:  No Order</td></tr><tr><td> DOB: Not available</td><td> Sex: -</td></tr><tr><td> Accession Number:  OutsideStudy</td><td> Date of Exam:  Apr-23-2020 15:26:10</td></tr><tr><td> Referring Physician:  Not Set</td><td> Referring Physician ID:  Not Set</td></tr><tr><td> Interpreting Radiologist:  Stephen Douglas Scotti M.D.<br>Interpreting Radiologist Profile ID:1</td><td> Report Generated:  Aug-19-2020 20:56:32</td></tr><tr><td colspan="2"> Read Status:  FINAL</td></tr></tbody></table><div class="htmlmarkup" name="htmlmarkup"><section><header>MR BRAIN WITH CONTRAST</header><p><label>Technique:</label><span style="display:inline-block">Sagittal and axial T1-weighted images, axial FLAIR images, axial diffusion weighted sequences, axial T2-weighted images and coronal gradient echo sequences of the brain were obtained.</span></p><p><label>IV Contrast:</label><span></span></p></section><section><header>CLINICAL INFORMATION</header><p><span style="display:inline-block">No Order</span></p></section><section><header>COMPARISON</header><p><span style="display:inline-block">None. </span></p></section><section><header>FINDINGS</header><p><label>Extra-axial spaces:</label><span>Normal in size and morphology for the patient\'s age.</span></p><p><label>Intracranial hemorrhage: </label><span>None</span></p><p><label>Ventricular system:</label><span>Normal in size and morphology for the patient\'s age.</span></p><p><label>Basal cisterns:</label><span>Normal. </span></p><p><label>Cerebral parenchyma:</label><span>Normal. </span></p><p><label>Midline shift:</label><span>None.</span></p><p><label>Cerebellum:</label><span>Normal. </span></p><p><label>Brainstem:</label><span>Normal. </span></p><p><label>Calvarium:</label><span>Normal. </span></p><p><label>Vascular system:</label><span>Normal flow voids, without atheroma, occlusion, or dissection.</span></p><p><label>Paranasal sinuses and mastoid air cells:</label><span>Clear.</span></p><p><label>Visualized orbits:</label><span>Normal. </span></p><p><label>Visualized upper cervical spine:</label><span>Normal. </span></p><p><label>Sella:</label><span>Normal. </span></p><p><label>Skull base:</label><span>Normal. </span></p><p><label>Marrow:</label><span>Normal. </span></p></section><section><header>IMPRESSION</header><p><span style="display:inline-block">1.  </span></p></section></div><div id="sigblock">Electronically signed:<br><br>Reader Profile:  1<br>Stephen Douglas Scotti M.D.<br>2020-08-19 20:56:32</div><div id="disclaimer">PRIVILEGED AND CONFIDENTIAL: The information contained in this report and communicaition contains privileged and confidential information, including patient information protected by federal and state privacy laws. It is intended only for the use of the person(s) with authorized access. If you are not the intended recipient or are not authorized access, you are hereby notified that any review, dissemination, distribution, or duplication of this communication is strictly prohibited. If you are not an intended and authoorized recipient, please contact the sender by reply email (if received via email) or otherwise contact them and destroy all copies of the original message.</div></div>';
		data = {method:"html", html:html,method:"html",title:"TEST",studyuuid:"none","return":1,attach:0};
		$.ajax({
		contentType: 'application/json; charset=utf-8',  // post JSON
        type: "POST",
        url: apiurl + "pdfkit/htmltopdf",
        dataType: "json",
        data: JSON.stringify(data),
        context: $(this),
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },
		})
		.done(function(data, textStatus, jqXHR) {
	   			pdfdataurl = "data:application/pdf;base64," + data.base64;
				showMessage("PDF", '<embed id = "frame" src="" style = "width:480px;height:640px;" type="application/pdf"> </embed>');
				$("#frame").attr("src", pdfdataurl);
				$('html, body').animate({ scrollTop: 0 }, 'slow', function () {
    			});


		})
		.fail(function( jqXHR, textStatus, errorThrown) {
			alert("error");
		})
		.always(function(jqXHR, textStatus) {
			$("#spinner").css("display", "none");
		});
	});

	$("#pdfattach").on("click", function(e) {

		attachToStudy($("#pdfmodality").val(), $("#pdfdescription").val(), $("#pdfstudyuuid").val(),pdfdataurl);
		pdfdataurl = "";

	});

	$("#pdfopeninviewer").on("click", function(e) {

		openViewerByUUID($("#pdfstudyuuid").val());

	});

	function attachToStudy(modality, description, studyuuid, dataurl) {

		json = {"Tags":{"ImageIndex": "1", "Modality":modality,"SeriesDescription":description}, "Content":dataurl, "Parent":studyuuid};

		$.ajax({
			contentType: 'application/json; charset=utf-8',  // post JSON
			type: "POST",
			url: apiurl + "tools/create-dicom",
			dataType: "json",
			data: JSON.stringify(json),
			context: $(this),
			beforeSend: function(e) {
				$("#spinner").css("display", "block");
			},
			})
			.done(function(data, textStatus, jqXHR) {

			   showResults(apiurl + "tools/create-dicom",data);
			   return data.length;
			})
			.fail(function( jqXHR, textStatus, errorThrown) {
				alert("error");
			})
			.always(function(jqXHR, textStatus) {
				$("#spinner").css("display", "none");
			});

	}

	function apiGet(url, callback = false)  {

		url = apiurl + url;

		$.ajax({

		//"crossDomain": true,
        type: "GET",
        url: url,
        dataType: "html",
        context: $(this),
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },
		})
		.done(function(data, textStatus, jqXHR) {

		   try {
		    	data = JSON.parse(data);
		   }
		   catch {
		   		data = '{"result":"' + data +  '"}"';
		   }
		   if (callback === false) {
		        showResults(url, data);
		   }
		   else callback(data);
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
			showMessage(url, '<div>' + jqXHR.status +'</div>' + jqXHR.statusText);
			console.log(jqXHR);

		})
		.always(function(jqXHR, textStatus) {
			$("#spinner").css("display", "none");
		});
	}

	function apiArchive (uuid, type)  {

		url = apiurl + "studies/" + uuid + '/' + type;
		$("#spinner").css("display", "block");

    	jQuery.ajax({

		url:url,
		cache:false,
		xhrFields:{
			responseType: 'blob'
		},
		beforeSend: function(e) {
		$("#spinner").css("display", "block");
		},
		})
		.done(function(data, textStatus, jqXHR) {

			var link = document.createElement('a');
			document.body.appendChild(link);
			link.href = window.URL.createObjectURL(data);
			link.download = type;
			link.click();
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
		showMessage(url, jqXHR.responseText);
		console.log(jqXHR);

		})
		.always(function(jqXHR, textStatus) {
		$("#spinner").css("display", "none");
		});
	}

	function DCMPNG( url)  {  // not work to display DCM.

	url = apiurl + url;
    jQuery.ajax({
            url:url,
            cache:false,
            xhrFields:{
                responseType: 'blob'
            },
            success: function(data){
            	if (!url.includes("file")) {
            	var img = $('<img id="dynamic" style = "height: 400px;margin: auto;display: block;">'); //Equivalent: $(document.createElement('img'))
            	var bloburl = window.URL || window.webkitURL;
				img.attr('src', bloburl.createObjectURL(data));
            	showMessage(url, img);
//                 var img = document.getElementById('img');
//                 var url = window.URL || window.webkitURL;
//                 img.src = url.createObjectURL(data);
				}
				else {
					showMessage(url, 'rawdicom');
				}
            },
            error:function(){

            }
        });
	}

	function postJSON(url,json) {

		$.ajax({
		contentType: 'application/json; charset=utf-8',  // post JSON
		type: "POST",
		url: apiurl + url,
		dataType: "json",
		data: JSON.stringify(json),
		context: $(this),
		beforeSend: function(e) {
		$("#spinner").css("display", "block");
		},
		})
		.done(function(data, textStatus, jqXHR) {

		showResults(apiurl + url, data);
		return data.length;
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
		alert("error");
		})
		.always(function(jqXHR, textStatus) {
		$("#spinner").css("display", "none");
		});

	}

	function performQuery(level,query,expand) {

		Query = {};
		Query.Expand = expand;
		Query.Level = level;
		Query.Query = JSON.parse(query);
		console.log(Query);
		postJSON("tools/find",Query);
	}

	function perforrmStudiesPage (level,query,expand) {

		Query = {};
		Query.Expand = expand;
		Query.Level = level;
		Query.Query = JSON.parse(query);
		Query.pagenumber = parseInt($("#pagenumber").val());
		Query.itemsperpage = parseInt($("#itemsperpage").val());
		Query.sortparam = $("#sortbytagname").val();
		Query.reverse = parseInt($("#reverse").val());
		Query.widget = parseInt($("#widget").val());
		if ($("#studiespagequerymeta").val()!="") {
		Query.MetaData = $("#studiespagequerymeta").val();
		}
		console.log(Query);
		postJSON("studies/page",Query);
	}

	function Put (path,data) {

	$.ajax({

		contentType: 'application/x-www-form-urlencoded',  // post JSON
        type: "PUT",
        url: apiurl + path,
        dataType: "text",
        data: data,
        context: $(this),
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },
		})
		.always(function(jqXHR, textStatus) {
		console.log(jqXHR);
		console.log(textStatus);
			if (textStatus == "success") textStatus+=":  Set to:" + data;
			showMessage("",textStatus);
			$("#spinner").css("display", "none");
		});
	}

	function showMessage(title, message) {

	showmodal(title, message);

	}

	function showmodal (title, body) {

		$("#devModal .modal-body").html(body);
		$("#devModal .modal-title").html(title);
		$('#devModal').modal('show');

	}

	function showResults(title, json) {

	json = syntaxHighlight(json);
	showMessage(title, '<pre>' + json + '</pre>');

// 	$("#delegator").html(json + '<div id="closeresults" style="width: 60px;text-align: center;margin: auto;outline-style: groove;padding: 5px;">Close Results</div>');
// 	$("#delegator").show();
// 	$('html, body').animate({ scrollTop: 0 }, 'slow', function () {
// 	});
	}

function syntaxHighlight(json) {

    if (typeof json != 'string') {
         json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

	function dynamicPostForm (path, params, target) {

    var form = document.createElement("form");
    form.setAttribute("action", path);
    form.setAttribute("method", "POST");
    if (target) {
    	form.setAttribute("target", "_blank");
    }
	$.each( params, function( key, value ) {
	let hiddenField = document.createElement("input");
	hiddenField.setAttribute("type", "hidden");
	hiddenField.setAttribute("name", value.getAttribute("name"));
	hiddenField.setAttribute("value", value.getAttribute("value"));
	form.appendChild(hiddenField);
	});
    document.body.appendChild(form);
    form.submit();
    $(form).remove();
}




	$("#command").on("change", function(e) {
		//$("#uuid").val("");  // clear out the uuid when changing
	});
	$( "#apiselection" ).on("change", function( event ) {

		let selected = $("#command option:selected");
		$("input, select").css({"border":"1px solid black", "outline-style": "unset"});
		$(selected.data("param")).css({"border":"2px solid green", "outline-style": "dashed"});
	});

	$( "#apiselection" ).submit(function( event ) {

	event.preventDefault();
	let selected = $("#command option:selected");
	let method = selected.data("method");
	let url = selected.val();
	if (selected.data("append") == true && $(selected.data("param")).val != "" ) {
		url = url + '/' + $(selected.data("param")).val()
	}
	if (method == "admin") {
		OrthancDevControllerCallDisplay(url);
	}

	else if (method == "get") {

		if (selected.data("query") == "tags") {
			apiGet(url + '/' + $("#withtags").val());
		}
		else if (selected.data("query") == "tagvalues") {
			apiGet(url + '/' + 'content');
		}
		else if (selected.data("query") == "tagvalue") {
			apiGet(url + '/content/' + $("#tagcodes").val());
		}
		else if (selected.data("query") == "dcmfile") {
			DCMPNG(url + '/file/');
		}
		else if (selected.data("query") == "pngimage") {
			DCMPNG(url + '/preview/');
		}
		else if (selected.data("query") == "metadataget") {
			apiGet(url + '/metadata/' + $("#metadatachoice").val());
		}
		else {
		apiGet(url);
		}
	}
	else if (method == "postquery") {

		if (selected.data("query") == "studiesbypatientid") {
			let patientid = $("#data-mrn").val();
			if (!patientid) alert("No MRN");
			let query = '{"PatientID":"' + patientid + '"}';
			performQuery("Study", query, true);

		}
		if (selected.data("query") == "studycountbypatientid") {
			let patientid = $("#data-mrn").val();
			if (!patientid) alert("No MRN");
			let query = '{"PatientID":"' + patientid + '"}';
			performQuery("Study", query, false);
		}

		if (selected.data("query") == "generic") {
			let query = $("#toolsfindquery").val();
			performQuery($("#queryLevel").val(), query, true);
		}

		if (selected.data("query") == "studiespage") {
			let query = $("#studiespagequery").val();
			perforrmStudiesPage("Study", query, true);
		}

		if (selected.data("query") == "studiesIDarray") {
			let query = $("#studiesIDarray").val();
			postJSON(url, query);
		}

	}
	else if (method == "downloadzip") {

		apiArchive ($("#uuid").val(), "archive");
		//url = apiurl + url;
		//url += "archive";
		//params = $('<input name = "uuid" value = "' + $("#uuid").val() + '">');
		//dynamicPostForm(url, params, false);
	}
	else if (method == "downloaddcm") {
		apiArchive ($("#uuid").val(), "media");
		//url = apiurl + url;
		//url += "media";
		//params = $('<input name = "uuid" value = "' + $("#uuid").val() + '">');
		//dynamicPostForm(url, params, false);

	}
	else if (method == "orthancviewer") {

		openViewerByUUID($("#uuid").val());
	}
	else if (method == "put") {
		if (selected.data("query") == "metadataset") {
		Put(url + '/metadata/' + $("#metadatachoice").val() ,$("#metadatavalue").val());
		}
	}
});

function openViewerByUUID(uuid) {

		var link = document.createElement('a');
		link.href = apiurl + "osimis-viewer/app/index.html?study=" + uuid;
		link.target = "_blank";
		document.body.appendChild(link);
		link.click();
		link.remove();

}


	$( ".unittest" ).on('click', function( event ) {
	event.preventDefault();
	if (checkifServer() == "true") {
	if (event.target == this) {
	command = $(this).data("command");
	context  = $(this);
	controllerfunction = $(this).data("controller") + "/" + $(this).data("command");
	var params = $(this).closest("div").find("input").serialize();
	params = params;
		if (command == "downloadStudyUUID") {
		dynamicPostForm(controllerfunction, $(this).closest("div").find("input"), true);
		}
		else {

		$.post("/" + controllerfunction, params, function(result){
			//alert(isJsonString(result));
			if (command == "getClaim") {
				let url = "data:application/pdf;base64," + result;
				$("#delegator").html('<embed id = "frame" src="" style = "width:100%;height:100%;" type="application/pdf"> </embed><button id="closeresults" style="width:100%;">Close Results</button>');
				$("#delegator").show();
				$("#frame").attr("src", url);
				$('html, body').animate({ scrollTop: 0 }, 'slow', function () {
    			});
			}

			else if (isJsonString(result)) {
				decoded = parseMessages(result, true);
				if (decoded.url) {
				window.location.href = decoded.url;
				}
				else {
				context.before('<pre class = "tempresult">' + JSON.stringify(result) + '</pre>');
// 				$("#delegator").html('<pre>' + JSON.stringify(result) + '<button id="closeresults" style="width:100%;">Close Results</button>' +'</pre>');
// 				$("#delegator").show();
				}
			}
			else {
			console.log(result);
				context.before('<pre class = "tempresult">' + result + '</pre>');

// 			$("#delegator").html('<pre>' + result + '<button id="closeresults" style="width:100%;">Close Results</button>' +'</pre>');
// 			$("#delegator").show();
			}

		});
		}
	}
	}
	else {
		alert("No Server Selected");
	}
});

	$("#radreportTrim").on("click", function(e) {

		radreportTrim();
	});

	function radreportTrim() {
			//

			report = $($("#radreport").val());
			console.log(report);
			$.each(report.find("input"), function (index,value) {
				$(this).replaceWith('<input name ="' + $(this).attr("name") + '" value="' + $(this).val() +  '">');

			});
			$.each(report.find("textarea"), function (index,value) {
				$(this).replaceWith('<textarea name ="' + $(this).attr("name") + '">' + $(this).val() +  '</textarea>');
			});

			$.each(report.find("select"), function (index,value) {
				$(this).replaceWith('<select name ="' + $(this).attr("name") + '">' + $(this).html() + "</select>");
			});

			$.each(report.find("header"), function (index,value) {
				$(this).replaceWith("<header>" + $(this).html().toUpperCase() + "</header>");
			});
			$.each(report.find("label"), function (index,value) {
				$(this).replaceWith("<label>" + $(this).html() + "</label>");
			});
			$.each(report.find("option"), function (index,value) {
				$(this).attr("id", "");
			});
			newreport = '';
			 $.each(report, function (index,value) {
				if (!value.outerHTML) {
				newreport += "\n";
				}
				else {
				newreport += value.outerHTML;
				}
			});
			console.log(newreport);
			$("#radreport").val(newreport);
	}

	$( 'body' ).on('click', "#closeresults", function( event ) {
	$("#delegator").html('');
	$("#delegator").hide();
	});

	$("body").keyup(function(e) {
	if (e.keyCode === 27) {
	$("#delegator").hide();
	$(".tempresult").remove();
	$("#img").attr("src", "");
	$(".modal-body").html("");
	$(".modal-title").html("");
	}       // escape key to clear the results
	});

	$("[data-action='get-configs']").on("click", function(e) {
	    OrthancDevControllerCallDisplay("getOrthancConfigs", {"key":"ALL"},"ALl Configs");
	});
	$("#get-configs").on("change", function(e) {
	    OrthancDevControllerCallDisplay("getOrthancConfigs", {"key":$("#get-configs").val()}, $("#get-configs").val());
	});
	$("[data-action='pydicominstance']").on("click", function(e) {
	    OrthancDevControllerCallDisplay("pydicom",{uuid:$("#pydicominstance").val()},"Pydicom")
	});
	$("[data-action='uploadstudy']").on("click", function(e) {

			$("#dynamiciframe").append($('<iframe style="width:100%;border:none;margin:0px;overflow:scroll;background-color:transparent;height: 100vh;color:white !important;" class="vieweroverlay-content" id="viewerframe" src="/Studies/upload_study?mrn=' + $("#uploadmrn").val() + '"></iframe>'));
			document.getElementById("myNav").style.width = "100%";
			$("body").css("overflow", "hidden");
	});

	$(document).on("click", '.closebtn', function(event) {
	event.preventDefault();
	$("#dynamiciframe").children().remove();
	document.getElementById("myNav").style.width = "0px";
	$("body").css("overflow", "visible");
	});

	$("#submitHL7").on("click", function(e) {

	e.preventDefault();
		$.ajax({
			headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	            'nonce': ''
	        },
			type: "POST",
			url: '/OrthancDev/parseHL7',
			dataType: "json",
			data: {session_id: "test", parseHL7: $("#parseHL7").val()},
			context: $(this),
			beforeSend: function(e) {
				$("#spinner").css("display", "block");
			},
		})
		.done(function(data, textStatus, jqXHR) {
			if(data.success) {
				showMessage("", data.html);
			}
			else alert("error");
		})
		.fail(function( jqXHR, textStatus, errorThrown) {
		});

	});

	function isJsonString(str) {  // checks to see if a string is JSON for those instances when AJAX response could be HTML or JSON string, kind of weird, but a way to pass error codes back.
		try {
			JSON.parse(str);
		} catch (e) {
			return false;
		}
		return isNaN(str);
	}
	let samplereport = '<style>#reportnoheader * {font-family: Tahoma, Geneva, sans-serif;}.htmlmarkup, #reportswrapper > div {padding:10px;margin:0px;background: white;color: #000;;font-size: 12px;font-weight:bold;}#markupform .htmlmarkup {background:black !important;color:white;}.htmlmarkup div, #reportswrapper > div div {display:block;padding:0px;line-height: initial;margin:5px 0px 5px 0px;}.htmlmarkup label, #reportswrapper > div label{font-size: 14px;color:#000;font-weight:bold;padding-right:10px;}.htmlmarkup section > header, #reportswrapper > div section > header{color: #000;font-size: 16px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;}.htmlmarkup section > section > header, #reportswrapper > div section > section > header{color: #000;font-size: 12px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;text-align: left;}.htmlmarkup section > section > section > header, #reportswrapper > div section > section > section > header{color: #000;font-size: 12px;font-weight: bold;margin-bottom: 0.0cm;margin-top: 0.3cm;text-align: left;}.htmlmarkup > section{}.htmlmarkup section > section, #reportswrapper > div section > section{padding-left: 0.8cm;}.htmlmarkup p, #reportswrapper > div p{margin-bottom: 0.0cm;margin-top: 0.0cm;padding-left: 0.8cm;}reportswrapper {width:100%;}#header_info {margin: 20px auto 10px auto;width:100%;;}#header_info, #header_info td {border: 1px solid black;border-collapse: collapse;background:#DDD;font-size: 12px;font-weight: bold;padding: 2px 5px 2px 5px;}#header_info tr:nth-child(even) td {background:#FFF !important;}#disclaimer {margin:20px 10px 0px 10px;text-align: justify;font-size: 8px;}#header_info > tbody > tr > td:first-child {width:350px;}#header_info > tbody > tr > td:nth-child(2){width:250px;}#header_info > tbody > tr > td:nth-child(3){width:190px;}.htmlmarkup, #reportswrapper {width:800px}#reportbody{font-size:12px;width: 90%;word-wrap: break-word;}#sigblock{margin-top:10px;}#apiresults {line-height: normal;font-size: 16px;color: black;background: #FFF;border-radius: 20px;padding: 20px 10px 20px 10px;border: 2px solid black;width:816px;}<\/style><style>#reportheader{position:relative;width:800px;padding: 5px 5px 20px 5px;margin: 0px 0px 10px 0px;text-align:center;overflow:auto;margin:auto;}#reportheader #logo {height:60px;border:none;position:absolute;left:0;right:0;margin:auto;}#reportheader #floatleft{width:350px;display:inline-block;text-align:left;float: left;}#reportheader #floatright{width:max-content;text-align:left;float: right;padding-right:10px;}.letterheadlabel {display:inline-block;width:60px;text-align:right;margin-right:5px;}<\/style><div id = \"reportheader\"><div><div id = \"floatleft\">Cayman Medical Ltd.<br>71 Eastern Ave<br>P.O. Box 32322<br>George Town, Cayman Islands KY1-1209 <\/div><div id = \"floatright\"><span class = \"letterheadlabel\">Phone:  <\/span>KY 000-000-0000<br><span class = \"letterheadlabel\">Fax:  <\/span>KY 000-000-0000<br><span class = \"letterheadlabel\">Email:  <\/span>info@medical.ky<br><span class = \"letterheadlabel\">Website:  <\/span>https:\/\/www.medical.ky<br><\/div><\/div><\/div><div id = \"reportnoheader\"><table id = \"header_info\"><tr><td id=\"report_name\"> Patient Name: Annular Pancreas, <\/td><td id=\"report_mrn\"> Med Rec Number:  DEV0000004<\/td><td rowspan = \"6\" style=\"vertical-align:text-top;white-space:break-spaces;width:200px\">Indication:  No Order<\/td><\/tr><tr><td> DOB: Jan-01-1901<\/td><td> Sex: <\/td><\/tr><tr><td> Accession Number:  DEVACC00000010<\/td><td> Date of Exam:  Not available<\/td><\/tr><td> Referring Physician:  STEPHEN D SCOTTI M.D<\/td><td> Referring Physician ID:  0002:SCOTTI<\/td><\/tr><tr><td> Interpreting Radiologist:  Stephen Douglas Scotti M.D.<br>Interpreting Radiologist Profile ID:1<\/td><td> Report Generated:  Jan-26-2021 14:55:15<\/td><\/tr><tr><td colspan= \"2\"> Read Status:  PRELIM<\/td><\/tr><\/table><div class = \"htmlmarkup\" name=\"htmlmarkup\"><section><header>MR <span style=\"DISPLAY:INLINE-BLOCK\">RIGHT<\/span> ANKLE<\/header><p><span style=\"display:inline-block\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/span><\/p><\/section><section><header>CLINICAL INFORMATION<\/header><p><span style=\"display:inline-block\">No Order<\/span><\/p><\/section><section><header>COMPARISON<\/header><p><span style=\"display:inline-block\">None. <\/span><\/p><\/section><section><header>FINDINGS<\/header><p><label>Alignment:<\/label><span>Normal. <\/span><\/p><section><header>MEDIAL COMPARTMENT<\/header><p><label>Medial malleolus:<\/label><span>Normal. <\/span><\/p><p><label>Posterior tibial tendon:<\/label><span>Normal. <\/span><\/p><p><label>Flexor digitorum longus tendon:<\/label><span>Normal. <\/span><\/p><p><label>Deltoid ligament complex (superficial):<\/label><span>Normal. <\/span><\/p><p><label>Deltoid ligament complex (deep):<\/label><span>Normal. <\/span><\/p><p><label>Spring ligament:<\/label><span>Normal. <\/span><\/p><\/section><section><header>LATERAL COMPARTMENT<\/header><p><label>Lateral malleolus:<\/label><span>Normal. <\/span><\/p><p><label>Retromalleolar groove:<\/label><span style=\"display:inline-block\">Flat<\/span><\/p><p><label>Peroneus longus tendon:<\/label><span>Normal. <\/span><\/p><p><label>Peroneus brevis tendon:<\/label><span>Normal. <\/span><\/p><p><label>Peroneal retinaculum:<\/label><span>Normal. <\/span><\/p><p><label>Peroneus quartus:<\/label><span>Absent. <\/span><\/p><p><label>Anterior inferior tibiofibular ligament:<\/label><span>Normal. <\/span><\/p><p><label>Posterior inferior tibiofibular ligament:<\/label><span>Normal. <\/span><\/p><p><label>Anterior talofibular ligament:<\/label><span>Normal. <\/span><\/p><p><label>Calcaneofibular ligament:<\/label><span>Normal. <\/span><\/p><p><label>Posterior talofibular ligament<\/label><span>Normal. <\/span><\/p><\/section><section><header>POSTERIOR COMPARTMENT<\/header><p><label>Posterior talus:<\/label><span>Normal. <\/span><\/p><p><label>Flexor hallucis longus:<\/label><span>Normal. <\/span><\/p><p><label>Intermalleolar ligament:<\/label><span>Normal. <\/span><\/p><p><label>Achilles tendon:<\/label><span>Normal. <\/span><\/p><p><label>Plantar fascia:<\/label><span>Normal. <\/span><\/p><\/section><section><header>ARTICULATIONS<\/header><p><label>Tibiotalar joint:<\/label><span>Normal. <\/span><\/p><p><label>Subtalar joint:<\/label><span>Normal. <\/span><\/p><p><label>Tarsal joints:<\/label><span>Normal. <\/span><\/p><\/section><section><header>ANTERIOR COMPARTMENT<\/header><p><label>Anterior tibial tendon:<\/label><span>Normal. <\/span><\/p><p><label>Extensor hallucis longus:<\/label><span>Normal. <\/span><\/p><p><label>Extensor digitorum longus:<\/label><span>Normal. <\/span><\/p><p><label>Peroneus tertius:<\/label><span>Absent. <\/span><\/p><\/section><section><header>GENERAL FINDINGS<\/header><p><label>Bones:<\/label><span>Normal. <\/span><\/p><p><label>Muscles:<\/label><span>Normal. <\/span><\/p><p><label>Tarsal tunnel:<\/label><span>Normal. <\/span><\/p><p><label>Sinus tarsi:<\/label><span>Normal. <\/span><\/p><\/section><section><header>IMPRESSION<\/header><p><span style=\"display:inline-block\">1.  <\/span><\/p><\/section><\/section><\/div><div id = \"sigblock\">PRELIM<br>Electronically signed:<br><br>Reader Profile:  1<br>Stephen Douglas Scotti M.D.<br>2021-01-26 14:55:15<\/div><div id = \"disclaimer\">PRIVILEGED AND CONFIDENTIAL: The information contained in this report and communicaition contains privileged and confidential information, including patient information protected by federal and state privacy laws. It is intended only for the use of the person(s) with authorized access. If you are not the intended recipient or are not authorized access, you are hereby notified that any review, dissemination, distribution, or duplication of this communication is strictly prohibited. If you are not an intended and authoorized recipient, please contact the sender by reply email (if received via email) or otherwise contact them and destroy all copies of the original message.<\/div><\/div>';
$("#reporthtml").val(samplereport);
$("#reporthtml").html(samplereport);

</script>
