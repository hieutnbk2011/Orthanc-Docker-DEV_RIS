<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha512-rO2SXEKBSICa/AfyhEK5ZqWFCOok1rcgPYfGOqtX35OyiraBg6Xa4NnBJwXgpIRoXeWjcAmcQniMhp22htDc6g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/dark-hive/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="/bower/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower/jquery-validation/dist/additional-methods.min.js"></script>
<link rel="stylesheet" href="/bower/jquery-timepicker-jt/jquery.timepicker.min.css" />
<script src="/bower/jquery-timepicker-jt/jquery.timepicker.min.js"></script>
<script src="/bower/moment/min/moment.min.js"></script>
<script src="/bower/moment-timezone/builds/moment-timezone-with-data-1970-2030.min.js"></script>

<!-- For the Viewer and upload pic overlay -->

<div id="myNav" class="vieweroverlay"><a href="" class="closebtn"><i class="fas fa-window-close"></i></a><div id="dynamiciframe"></div></div>
<div id = "teleRadDivOverlayWrapper">
<button type="button" class="btn btn-primary btn-xs closeresults">Clear Viewer <span class = "spanclosex">x</span></button>
<button id="teleradClose" type="button" class="btn-primary btn-xs">Report Viewer - Editor <span class = "spanclosex">x</span></button>
<div id="APImonitor">
<div id="viewertools">
<button data-filename = "RadiologyReport.pdf" data-css = "report" data-content = "#reportnoheader" type="button" class="btn-primary btn-sm wkdownload" value="Download">Download</button>
<button data-filename = "RadiologyReport.pdf" data-css = "report" data-content = "#reportnoheader" type="button" class="btn-primary btn-sm wknewtab" value="Print">Print</button>

<!-- <input id = "viewerprint" type="submit" class="btn-primary btn-sm" value="Print" /> -->
<input id = "viewersend" type="submit" class="btn-primary btn-sm" value="Send via e-mail (If configured):  "  /><?php if (isset($_SESSION['user_email'])) echo $_SESSION['user_email'] ?>
<form id="emailform" style="display:inline-block;">
<label for="altemail" class="btn-primary btn-sm" style="margin-left:20px;margin-right:20px;">Alternate email: </label>
<input id="altemail" name="altemail" type="email" class="btn-primary btn-sm" style="width:200px;">
<input type="submit" class="btn-primary btn-sm" value="Send Report">
</form>
</div>
<div id="apiresults"></div>
</div>
<div id="teleRadDivOverlay"></div>

<div class="col-sm-12 reportdiv">
	<div id="toolbar" style="width:100%;background:#000;color:black;display:inline-block;">
	<div id="reporttemplatelist" style="color:black;float:left;display:inline-block;"><form name="templatechooser" id="templatechooser" class="reportapi"><select form="templatechooser" name="templateid" id="templateid" style="display:inline;"></select></form></div>
	<span id="tools" data-pacs = "ORTHANC" style="float:left;"><input id = "undoreport" type="submit" class="btn-danger btn-sm" value="Undo Preview" disabled="disabled" /><input id="previewreport" type="submit" class="btn-danger btn-sm" value="Preview" disabled="disabled"><input id = "prelimreport" type="submit" class="btn-danger btn-sm" value="PRELIM" disabled="disabled" /><input id = "finalreport" type="submit" class="btn-danger btn-sm" value="FINAL" disabled="disabled" /><input id = "addendumreport" type="submit" class="btn-danger btn-sm" value="ADDENDUM" disabled="disabled" /></span>
	</div>
<div class = "row">
<div class="reportheader col-sm-6">
<div><span>Name:</span><span class="headername"></span></div>
<div><span>Age:</span><span class="headerage"></span></div>
<div><span>DOB:</span><span class="headerdob"></span></div>
<div><span>Sex:</span><span class="headersex"></span></div>
<div><span>MRN:</span><span class="headermrn"></span></div>
<div><span>Accession:</span><span class="headeracc"></span></div>
<div><span>Description:</span><span class="headerdesc"></span></div>
<div><span>Modality:</span><span class="headermod"></span></div>
<div><span>Exam Date:</span><span class="headerexamdate"></span></div>
<div><span>Referring Provider:</span><span class="headerprovider"></span></div>
<div><span>Indication:</span><span class="headerindication"></span></div>
</div>
<div class="reportheader col-sm-6">
<ol style ="margin: 0px 0px 0px -40px;">
<li>Choose a report template, or load an old report into the editor.</li>
<li>If a template, fill out the fields and selects, and then click "Preview" to review before submitting.</li>
<li>If from a prior, you can load the old report, and then edit the old report inline using the mouse and keyboard.</li>
<li>From "Preview", click on "PRELIM", "FINAL", or "ADDENDUM" to submit.  Only allowed options will be blue.</li>
<li>If there are old reports you can view those using the select list at the upper left.  (Right Click) to view the current selection.</li>
</ol>
</div>
</div>
<form name="markupform" id="markupform"></form>

</div>
</div>

<?php
use App\MyModels\Widgets;
use App\Actions\Orthanc\OrthancAPI;
$pacs = new OrthancAPI();


$load = 1;
$selectlist = "";


/*
$orthanc_hosts = $data['orthanc_hosts'];
$telerad_contract = $data['telerad_contract'];

$selectlistoptions = [];

$selectlist = '<form id="orthancPACS" name="orthancPACS" action="/OrthancDev/orthanc_index" method="POST">

<select id="orthanc_host" name="orthanc_host">';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (count($orthanc_hosts) > 1  && !isset($_SESSION["orthanc_host"])) {
		$selectlist.= '<option value="" selected="selected">SELECT AN ORTHANC SERVER</option>';
	}
	else if (count($orthanc_hosts) == 0) {
		$selectlist.= '<option value="" selected="selected">You Do not have a Server Configured.</option>';
	}
}


foreach ($orthanc_hosts as $orthanc_host) {

	$optionselected = "";

	$_SESSION["telerad_contract"] = $telerad_contract;

	if ( (isset($_SESSION["orthanc_host"]) && ($_SESSION["orthanc_host"] == $orthanc_host->id)) || count($orthanc_hosts) == 1) {

		$optionselected = ' selected = "selected"';
		$load = 1;
	}

$selectlist.='<option value="' . $orthanc_host->id  . '"' .  $optionselected . '>' . $orthanc_host->server_name . '</option>';
}
$selectlist .= '</select>
<input type="hidden"  name="csrf_token" value="' . Csrf::makeToken() . '" />
</form>';

*/
?>
<div style = "margin:auto;text-align:center;width:max-content;font-size:12px;">
<?php  echo $pacs->serverStatusWidget(); ?>
<?php  echo Widgets::PACSSelectorTool("readers"); ?>
</div>
<div id="delegator" class = "myuitabs">

<ul class="centertabs">
	<li><a href="#studylist">STUDY LIST</a></li>
	<li><a href="#toolstab">TOOLS</a></li>
	<li><a href="#contactinfo">CONTACT SUPPORT</a></li>
</ul>

<div id="studylist">

          <div class="row studylistheader">
          <div class="col">
          	<?php echo $selectlist; ?>
          </div>
          </div>

          <?php

          if ($load == 1) {
		?>


        <?php echo Widgets::studiesSearchForm() ?>
        <?php echo Widgets::dateRadioSelectorstudies("searchform", "#studieswrapper", "searchorthanc") ?>
		<?php echo Widgets::serverStatus() ?>
		<?php echo Widgets::studyRowSelector() ?>
		<?php echo Widgets::studiesLengend() ?>
		<?php echo Widgets::studiesContainer() ?>
<?php
}
?>

        </div> <!-- end of studies -->
<div id="toolstab"></div> <!-- end of tools -->
<div id="contactinfo">
	<?php // $this->renderWithoutHeaderAndFooter("contactinfo/contactinfo");?>
</div> <!-- end of contactinfo -->

</div>
<!-- end of delegator / wrapper -->
<!-- The Modal -->
<div class="modal fade hide" id="myModal" data-keyboard="true" data-backdrop="true" tabindex='-1'>

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
        <button type="button" class="uibuttonsmallred" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script nonce = "<?php // echo $_SESSION['nonce'] ?>">

$.ajaxSetup({

	headers: {
	'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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

$("#togglelegend").on("click", function(e) {
	$('#studieslegend').toggle();
});

function attachtoolstip(e) { // takes a wrapper or a $ object with data-toggle = "tooltip" and data-placement = "top" set

    if (e instanceof jQuery) {

        $(this).tooltip({
        content: function () {
            return this.getAttribute("title");
        },
        });

    }
    else {

    $(e +' [data-toggle = "tooltip"]').each(function(i) {
        $(this).tooltip({
        content: function () {
            return this.getAttribute("title");
        },
        });
    });
    }

}

attachtoolstip('#orderswrapper, .worklistheader, #studieswrapper, #patientswrapper, #worklistwrapper');

$('[data-toggle="popover"]').popover({
  trigger: "hover",
  container: "body",
  delay: { "show": 300, "hide": 100 }

});

var datachangeflag;

function confirmSave(element) {
    if (datachangeflag !== true) {
    datachangeflag = false;
    $("#confirmtextwrapper").remove();
    element.after('<div id = "confirmtextwrapper"><div id = "confirmtext">Confirm ?</div></div>');
    $("#confirmtext").on("click", function(e) {
         datachangeflag = true;
         $("#confirmtextwrapper").remove();
         element.trigger("click");
    });
    $("#exittext").on("click", function(e) {
         $("#confirmtextwrapper").remove();
    });
    }

}

function colorrows (e) {

  e.filter(function(index) {return $(this).css('display') == 'flex' || $(this).css('display') == 'table'}).filter(':even').css({"background-color" : "#DDD"});
  e.filter(function(index) {return $(this).css('display') == 'flex' || $(this).css('display') == 'table'}).filter(':odd').css({"background-color" : "#AAA"});

}

function attachDateTimePicker()  {

//             year = new Date().getFullYear();
            $('.datepicker:not(.hasdatepicker)').datepicker({

            orientation: "top",
            autoclose: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            showWeek: true,
            firstDay: 1,
            yearRange: '1920:2030' ,
            constrainInput: false,
            beforeShow: function(element, ui){
                //console.log(ui.dpDiv);
                ui.dpDiv.css('font-size', 12),
                ui.dpDiv.css('z-index', 100000);
            },
            onSelect: function(d,i){
            if(d !== i.lastVal){
                 $(this).change();
                 $(this).valid();
            }
            }
            });

            $('.timepicker:not(.ui-timepicker-input)').timepicker({
              timeFormat: 'H:i',
              step: "15",
              dynamic:true,
              maxHour: 24
            });
}

function isValidDate(date) {
	var date  = moment(date, 'YYYY-MM-DD', true);
	var isValid = date.isValid();
	return isValid;
}


$( ".myuitabs").tabs();  // for uitabs, since the bootstrap ones do not seem to work that well.

$("[data-dbsearch]").on("click", function(e) {

let form = $(this).closest("form");
e.preventDefault();

if ($(this).data("dbsearch") == "searchorthanc") {

getSearchParams();
searchOrthanc();
}
else if ($(this).data("dbsearch") == "search_shared") {
searchShared($('[name=searchform]').serialize());
}

else {

var wrapper = form.parent().find(".listwrapper");

    $.ajax({

        type: "POST",
        url: form.data('action'),
        dataType: "json",
        data: $(this).closest("form").serialize(),
        context: $(this),
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },

    })
    .done(function(data, textStatus, jqXHR) {

    	if (data.status) {
			showMessage("","No Matches");
		}
		else {
		wrapper.html(data.html);
		colorrows(wrapper.find(".worklist"));
		form.find(".RISpaginator").html(data.RISpaginator);

		if ($(this).attr("data-dbsearch") == "search_patients")   {

		    getStudyCount($("#patientswrapper .patient"));
            getOrderCount($("#patientswrapper .patient"));
		}
		}
    });
}
});

$(".clearsearchform").on('click', function(e) {

		e.preventDefault();
		let list = $(this).closest("form").parent().find(".listwrapper .worklist");
		list.css("display", "flex", "important");
		$(".searchparam").val("");
		colorrows(list);

	});

function isJsonString(str) {  // checks to see if a string is JSON for those instances when AJAX response could be HTML or JSON string, kind of weird, but a way to pass error codes back.
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return isNaN(str);
}

function showmodal (title, body) {

    $("#myModal .modal-body").html(body);
    $("#myModal .modal-header").html(title);
    $('#myModal').modal('show');

}

function parseMessages(messages, display) {  // Accepts an Array of objects, or a String of an array of objects, returns false if not an array.
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
                    console.log(message);
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

function logViewStudy(study, event) {


    $.ajax({
    	async: false,
        type: "POST",
        url: '/PACS/logViewStudy',
        dataType: "json",
        data: {StudyInstanceUID: study.data('studyinstanceuid'), uuid: study.data('uuid'), mrn: study.data('mrn'), accession: study.data('accession'), description: study.data('description')},

    })
    .done(function(data, textStatus, jqXHR) {

		response = parseMessages(data,true);
		if (response.link == "DOWN") {
			showMessage("", "No Connectivity with Image Server");
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

}

$(document).on("click, contextmenu", '.viewstudy', function(event) {

    event.preventDefault();
    event.stopImmediatePropagation();
    logViewStudy($(this).closest(".worklist"), event);
});

	$(document).ready(function() {

		$("#ccpa-wrapper").fadeIn( 1000, function() {
    // Animation complete
    });

    $("body").on("click", ".login", function (e) {  // loads the login form

        e.preventDefault();
        e.stopPropagation();

    $.ajax({
        url: '/Login/index',
        type: 'post',
        dataType: 'html',
        data: {},
        complete: function(xhr, textStatus) {

        },
        success: function(data, textStatus, xhr) {

        	data = parseMessages(data,true);
            $("#logregforms").html(data);
            $("#submitlogin").validate({});
        }
    });

    });

    $("body").on("click", ".register", function (e) {

        e.preventDefault();
        e.stopPropagation();

    $.ajax({
        url: '/Register/index',
        type: 'post',
        dataType: 'html',
        data: {},
        complete: function(xhr, textStatus) {

        },
        success: function(data, textStatus, xhr) {
        	data = parseMessages(data,true);
            $("#logregforms").html(data);
            $("#registration_form").validate({});
        }
    });
    });

    $("#logregforms").on("submit", ".resetpassword",  function (e) {

        e.preventDefault();

		$.ajax({

			url: '/Login/requestPasswordReset_action',
			type: 'post',
			dataType: 'html',
			data: $(this).serialize(),
			beforeSend: function(e1) {
			$("#spinner").css("display", "block");
			},
			success: function(data, textStatus, xhr) {
				$("#logregforms").html(data);
			}
		});

    });

    $(".logregforms, .loginform").on("click", ".logregformsclose", function () {
      $(".logregforms").html("");
      $(".loginform").hide("");

    });


    (function($){
    var $newTag = null;
    $.fn.tagName = function(newTag){
        this.each(function(i, el){
            var $el = $(el);
            $newTag = $("<" + newTag + ">");

            // attributes
            $.each(el.attributes, function(i, attribute){
				//console.log(attribute);
                $newTag.attr(attribute.nodeName, attribute.nodeValue);
            });
            // content
            $newTag.html($el.val().replace(/\r?\n/g, '<br />'));

            $el.replaceWith($newTag);
        });
        return $newTag;
    };
    })(jQuery);


	// Preview, stores the current report fields into arrays, changes the tags, basically working

    $(document).contents().on("click", "#previewreport", function(){  // seems to be working for the most part.
            undoHTML = $(".reportdiv .htmlmarkup").clone(true,true);  //deep clone.
            var selects = $(".reportdiv .htmlmarkup").find("select");
            $(selects).each(function(i) {
                var select = this;
                $(undoHTML).find("select").eq(i).val($(select).val());
            });
            setButtons(buttonstatus.preview);

            $.each($(".reportdiv .htmlmarkup input"), function (index,value) {
                $(this).replaceWith("<span>" + $(this).val() + "</span>");

            });
            // need to check if this breaks ABMRA, style tags on the spans, can fix that with p > span
            $.each($(".reportdiv .htmlmarkup textarea"), function (index,value) {
                $(this).replaceWith("<span style='display:inline-block'>" + $(this).val() + "</span>");
            });

            $.each($(".reportdiv .htmlmarkup select"), function (index,value) {
                $(this).replaceWith("<span style='display:inline-block'>" + $(this).find(":selected").text() + "</span>");
            });
            $.each($(".reportdiv .htmlmarkup > section > section"), function (index,value) {
                $(this).replaceWith("<section>" + $(this).html() + "</section>");
            });

            $.each($(".reportdiv .htmlmarkup > section"), function (index,value) {
                $(this).replaceWith("<section>" + $(this).html() + "</section>");
            });
            $.each($(".reportdiv .htmlmarkup header"), function (index,value) {
                $(this).replaceWith("<header>" + $(this).html() + "</header>");
            });
            $.each($(".reportdiv .htmlmarkup label"), function (index,value) {
                $(this).replaceWith("<label>" + $(this).html() + "</label>");
            });

            $(".reportdiv .htmlmarkup header").each(function(){ $(this).html($(this).html().toUpperCase());});
    });

	// end Preview


	// Undo feature, restores the previously stored version.  undoHTML is a deep clone of the saved markup.

    $(document).contents().on( 'click', '#undoreport',  function() {

        $(".reportdiv .htmlmarkup").replaceWith(undoHTML);
        setButtons(buttonstatus.loaded);

    });


    $( "#teleradClose" ).on( "click", function(e) {
    	e.preventDefault();
    	$("#teleRadDivOverlay").html("");
    	$("#apiresults").html("");
    	$("#APImonitor").css("display","none");
  		$("#teleRadDivOverlayWrapper").css("display", "none");
  		$("#delegator").css("display", "block");  // show the content below the overlay again
	});

	function cyclicObject (obj) {

		var seen = [];

	JSON.stringify(obj, function(key, val) {
	   if (val != null && typeof val == "object") {
			if (seen.indexOf(val) >= 0) {
				return;
			}
			seen.push(val);
		}
		return val;
	});


		}

	// load the chosen report from the select list

    $(document).off().on("change", "#templateid", function(e) {

      e.preventDefault(e);
      loadtemplate(null);

    });

    function loadtemplate() {

     // loads a report, either from an existing one (with callbackfunction) or from the chooser (no callbackfunction), this should be the trigger to set the lockout status to In Use on AMBRA and/or In Use / locked out by uuid on our server, or both.  Callback is defined when loading a report from the old report viewer.

            var formdata = $("#templateid").serialize();
            formdata += "&modality=" + activestudytags["modality"] + "&description=" + activestudytags["description"] + "&option=loadreport" + "&uuid=" + activestudytags["uuid"];

            $.ajax({
                url: '/Reports/choose_template',
                type: 'POST',
                data: formdata,
                dataType: "json",
                complete: function(xhr, textStatus) {

                },
                success: function(data, textStatus, xhr) {

                    response = parseMessages(data, true);
                    if(!response.error) {
                    if (data.user == "none" ) {  // not locked

                    data = data.report;

					$('#markupform').html('<div class="htmlmarkup" name="htmlmarkup">' +  data + '</div>');
					$(".reportdiv input").off();
					$(".reportdiv input").keyup(function(event) {
						if ($(".input1").is(":focus") && event.key == "Enter") {
							event.preventDefault();
							event.stopPropagation();
						}
					});
					$(".reportdiv input").on("mouseleave", function() {$(this).parent().find("label").css({"background-color" : "transparent"})});
					$(".reportdiv input").on("mouseenter",function() {$(this).parent().find("label").css({"background-color" : "#555"})});

                    $('textarea').each( function() {  // set the text area to grow to content on load, applies to both.
                        $(this).outerHeight( 'auto' ).outerHeight( this.scrollHeight );
                    });

                    setButtons(buttonstatus.loaded);
                    $("#clinical_information").val($(".headerindication").html());

                    }

                    else {
                        var userid = data.user;
                        showMessage("Study Locked", "Study Locked by User:  " + userid);
                        }
                        }
                        else {
                        setTimeout(function () {location.href = "/"}, 2000); // redirect home
                        }
                }
            });
    }

    // function to e-mail a report (the markup) and a generated PDF to a particular e-mail address

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
      return regex.test(email);
    }


    $("#viewersend").on("click", function() {
        var markup = $("#reportnoheader").html();
        var email = $("#viewersend")[0].nextSibling.nodeValue;
        emailreport(markup,email);

    });

    $("#emailform").on("submit", function(e) {

        e.preventDefault();
        var altemail = $("#altemail").val();
        if (isEmail(altemail)) {
        	var markup = $("#reportnoheader").html();
        	emailreport(markup,altemail);
        }
        else {
        showMessage("Invalid e-mail", "Enter a valid e-mail address");
        }

    });

    function emailreport(markup,email) {
        if ($("#report_name").length & $("#report_mrn").length) {
        data = {"markup": markup, "email": email, "name": $("#report_name").html(),"mrn":$("#report_mrn").html()};
        }
        else {
        data = {"markup": markup, "email": email};
        }
        $.ajax({
            url: '/Email/emailreport',
            type: 'post',
            dataType: 'json',
            data: data,
            complete: function(xhr, textStatus) {

            },
            success: function(data, textStatus, xhr) {
                if (data.status == "true") {
                    alert("report sent");
                }
                else if (data.status == "false") {
                    alert("There was an error sending the report");
                }
            }
        });
    }

    function printreport(markup) {

    var printWindow = window.open('', '', 'height=800, width=640, toolbars=no, status=no, titebar=no, location=no, top=0, left=0, menubar=no, scrollbars=yes');
    printWindow.document.write(markup);
    printWindow.document.close();
    printWindow.print();

}

	// handler to print a report from the viewer

	$(document).on("click", "#viewerprint", function () {

				var report = $("#apiresults")[0].outerHTML;
				printreport(report);

	});



	// function to save a report, any type, prelim, final or addendum

    $(document).on("click", "#prelimreport, #finalreport,#addendumreport", function () {  // preview occurs first

          	var template_id = $("#templateid option:selected").val();  // the template id used for the report, could add the radreports id as well
			var status = $(this).val();  // from this page, prelim, etc., from the button
			var oldstatus = workingelement.data( "reportstatus" );
			var type ="HL7";

            if ($("#textmarkup").length != 0) {
            content = $("#textmarkup").val();
            }
            else { //
            content = $(".reportdiv .htmlmarkup").html();
            }
			let PACS = $(this).closest("#tools").data("pacs");
			$.ajax({
          		url: '/HL7/submit_report',
          		type: 'post',
          		dataType: 'json',
          		data: {"uuid":activestudytags["uuid"], "oldstatus":oldstatus, "newstatus":status, "report":content, "template_id":template_id},
          		complete: function(xhr, textStatus) {

          		},
          		success: function(data, textStatus, xhr) {
          		 response = parseMessages(data, true);
//           		 alert(response.HL7Message);
//                 data=response.reports;

                    $("[data-uuid='" + activestudytags["uuid"] + "'].worklist").data( "reportstatus", status );  // set data status for all studies with that uuid
                    $("[data-uuid='" + activestudytags["uuid"] + "'].worklist").find(".reportstatus").html(status);  // set status for all studies with that uuid
                    setButtons (buttonstatus.preview);  // update the button status, should always be in preview mode after saving a report
                    createreportlist();  // update the reports list

          		}
          	});
    });

$.validator.addMethod("jqvalidmyemail",function(value, element) {


		 if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ))
			{
				 return true;
			}
			else if (value == "") {
			    return true;
			}
			else
			{
				return false;
			}
},"Please enter a valid Email.");


$.validator.addMethod("jqvalidmydates",function (dateString) {
var regEx = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/;
return ((dateString == "") || regEx.test(dateString));
},"Please enter a valid date format like yyyy-mm-dd."
)

$.validator.addMethod(
    "jqvalidcurrency",  // name to reference in rules

    function isValidCurrency(currency) {

      var regEx = /^[-]?([1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|\.[0-9]{1,2})$/;
      return regEx.test(currency);  // Invalid format
    },"Please enter a valid currency without commas"

);

$.validator.addMethod(
  "jqvalidmynames",
      function isValidName(name) {
        if (name != "") {
        return true;
        }
    },"Please enter a name."
);

$.validator.addMethod(
  "jqrequired",
      function isPresent(item) {
        if (item != "") {
        return true;
        }
    },'<span style = "color:red">This is required.</span>'
);

$.validator.addMethod(

  "passwordmatch",
      function isValidMatch() {

        if ($(".passwordmatch")[0].value == $(".passwordmatch")[1].value)  {
        $("#" + $(".passwordmatch").attr("id") + "-error").remove();
        $(".passwordmatch").removeClass("error");
        return true;
        }

    },"Passwords must match."
);

$.validator.addMethod(

  "jqvalidpercentage",

      function isValidPercentage(entry) {

       var regEx = /^((100)|(\d{1,2}(.\d*)?))$/;
      return regEx.test(entry);  // Invalid format

    },"enter as 0 to 100 +- 2 digit decimal"
);

$.validator.addMethod(

  "jqvalidphone",

      function isValidPercentage(entry) {
	  if (entry != "") {
      var regEx = /^[\d-]+$/;  // up to 20 digits only
      return regEx.test(entry);  // Invalid format
      }
      else return true;

    },"Enter Only Digits & Dashes"
);

jQuery.validator.addClassRules("jqvalidphone", {  // classes to add method to.
  jqvalidphone: true
});

jQuery.validator.addClassRules("jqvalidpercentage", {  // classes to add method to.
  required:true,
  jqvalidpercentage: true
});

jQuery.validator.addClassRules("jqrequired", {  // classes to add method to.
  required:true
});

jQuery.validator.addClassRules("jqvalidcurrency", {  // classes to add method to.
  required:true,
  jqvalidcurrency: true
});

jQuery.validator.addClassRules("passwordmatch", {  // classes to add method to.
  required:true,
  passwordmatch: true
});

jQuery.validator.addClassRules("jqvalidmydates", {  // classes to add method to.
  jqvalidmydates: true
});

jQuery.validator.addClassRules("jqvalidmyemail", {  // classes to add method to.
  required: false,
  jqvalidmyemail: true
});

jQuery.validator.addClassRules("jqvalidmynames", {  // classes to add method to.
  jqvalidmynames: true
});

jQuery.validator.addClassRules("validate_password", {  // classes to add method to.
  validate_password: true
});

$("#userform").validate();

$("#new_password_form").validate();

// thing to automatically validate the whole form once an field is changed.

$("form[novalidate='novalidate'] input:not(.search-txt), form[novalidate='novalidate'] select, form[novalidate='novalidate'] textarea ").on("change", function(e) {
$(this).closest("form").valid();
});


// PlaceOrder Handler, Dynamically attached, should do that for all with enclosing div


$('#delegator').on('click', '.placeorder, .modifyorder', function(e) {

	e.preventDefault();
    e.stopImmediatePropagation();
	PlaceModifyOrder($(this));

});

var orderlistheader = '<div class="row divtable widemedia worklistheader"><div class="col-sm-3 nopadding"><div class="col-sm-6" data-sort-param="data-name" data-sort-order="up"><span>Name</span></div><div class="col-sm-6" data-sort-param="data-age" data-sort-order="up"><span class="narrowmedia">Age:  </span><span>Age</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-2" data-sort-param="data-sex" data-sort-order="up"><span>Sex</span></div><div class="col-sm-5" data-sort-param="data-mrn" data-sort-order="up"><span>MRN</span></div><div class="col-sm-5" data-sort-param="data-description" data-sort-order="up"><span>Descripiton</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-2" data-sort-param="data-modality" data-sort-order="up"><span>Modality</span></div><div class="col-sm-5" data-sort-param="data-referring_physician" data-sort-order="up"><span>Referring Physician</span></div><div class="col-sm-5" data-sort-param="data-date" data-sort-order="up"><span>Date</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-2" data-sort-param="data-time" data-sort-order="up"><span>Time</span></div><div class="col-sm-6" data-sort-param="data-accession" data-sort-order="up"><span>Accession</span></div><div class="col-sm-4" data-sort-param="data-status" data-sort-order="up"><span>Status</span></div></div></div>';

$("#delegator").on ("click", ".showorders", function(e) {

    var activepatient = $(this).closest('.worklist');
    let element = activepatient.next();
    if (element.attr("id") != "patientdiv") {
    e.preventDefault(e);
    $.ajax({
    	url: '/Orders/order_list',
    	type: 'POST',
    	dataType: 'json',
    	data: {"id" : activepatient.data('id'), "mrn" : activepatient.data('mrn'), "data-mrn" : activepatient.data('mrn')}, // for later maybe, one will be set for existing patient.
    	beforeSend: function(e) {
        $("#spinner").css("display", "block");
        },
    	success: function(data, textStatus, xhr) {
			data = parseMessages(data, true);
			if (data.status) showMessage(data.status,"");
			else {
            $("#patientdiv").remove();  // remove it since it might already be there.
    	    $(activepatient).after('<div id="patientdiv" class = "listwrapper">' + orderlistheader + '<div class="RISpaginator" data-target="#showorderswrapper" data-url="/Orders/order_list">' + data.RISpaginator + '</div><div id ="showorderswrapper">' + data.html + '</div></div>');
            colorrows($("#patientdiv .worklist"));

            }
    	}
    });
    }
    else element.remove();

});


//  GETS THE MARKUP FOR THE ORDER WORKLIST ROWS AND REPLACES THE OLD ONE BY ACCESSION, FOR THE PATIENTS, ORDERS AND ADMIN BILLING PAGES.

window.replaceOrderRow = function (accession) {

    $.ajax({
    	url: '/Orders/order_row_getByAccession',
    	type: 'POST',
    	dataType: 'json',
    	data: {"data-accession":  accession}, // for later maybe, one will be set for existing patient.
    	complete: function(xhr, textStatus) {

    	},
    	success: function(data, textStatus, xhr) {
    	    $("[data-accession=" + accession + "][data-rowtype='order'].worklist").replaceWith(data.markup);
    	    colorrows ($('#patientdiv .worklist, #orderswrapper .worklist'));
    	}
    });
}


$('body').on('click', '#newpatient, #view_update_selected', function(e) {

    e.preventDefault(e);
    if (($(this).attr('id') == "view_update_selected" && $('.selectPatient').length > 0) || $(this).attr('id') == "newpatient") {
    if ($(this).attr('id') == "newpatient") {
    $('.selectPatient').removeClass('selectPatient');
    var mrn = '';
    }
    else {
        mrn = $('.selectPatient').data('mrn');
    }
    if ($(this).get(0).hasAttribute('data-processme')) {
    	loadPatient(mrn, datafornewpatient);
    }
    else {
    	loadPatient(mrn);
    }

    }
    else {
        alert ("Select a Patient");
    }
});

$('#patientswrapper').on('click', '.patient', function() {  // simple code for highlight and current patient.

    $('#patientswrapper .worklist').removeClass('selectPatient');
    $(this).addClass('selectPatient');

});

$('.datepicker input[type=date]').prop("type", "text");  // something to do with Chrome


$(".closeresults").on('click', function(e) {
        $('#apiresults').html("");
        $("#APImonitor").css("display","none");

});


//  Defaults on loading the page, working list and studies

var studytable = $('#studieswrapper');
var studies = $('#studieswrapper .worklist');
// colorrows(studies);
// colorrows($(".colorrows"));  // f
colorrows($(".worklist"));
$("body").css("display", "block");

$("#studieswrapper").css("display", "block");



//  Generic thing to allow editing single fields in a form, submits the name/value pair, the action, the csrf when the selected element is changed.

//  generic function, like below, for loading html via ajax, data-target is the url, puts the response in ajaxdata.  can pass in ?x=y as a get.

    $(document).on("click", ".ajaxload", function(e) {
//     alert($(this).data("scroll"));

    e.preventDefault();
    e.stopPropagation();

     $(".ajaxdata").load($(this).data("target"), function(responseTxt, statusTxt, xhr) {

     });  //general form for load

    });

//  enctype="multipart/form-data", generic format for sending a form with the class .ajaxpostform and data-target the url, gets back html, can be used with files and images also.

    $(document).on("submit", ".ajaxpostform", function(e) {

    e.preventDefault();
    e.stopPropagation();
    var formData = new FormData(this);

    $.ajax({
    	url: $(this).data("target"),
    	type: 'POST',
    	dataType: 'html',
    	data: formData,
    	cache:false,
    	contentType: false,
    	processData:false,

    	complete: function(xhr, textStatus) {

    	},
    	success: function(data, textStatus, xhr) {
    	$(".ajaxdata").html(data);

    	}
    });

    });

    $(document).on("submit", ".register_action", function (e) {

        e.preventDefault();
        e.stopPropagation();  // event was firing twice for some reason.
        $.ajax({
            url: '/Register/register_action',
            type: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            complete: function(xhr, textStatus) {

            },
            success: function(data, textStatus, xhr) {
                $("#logregforms").html(data);
            }
        });
    });


    $("body").css("visibility", "visible");
    $("body").css("height", "100%");
    $("body").css("width", "100%");
    $("#spinner").css("display", "none");


   attachDateTimePicker();
   $('input[type=date]').prop("type", "text");

   	$(document).on("click", '.loadcontent', function(event) {

	 event.preventDefault();
	 $("#spinner").css("display", "block");
	 $("#dynamiciframe").append($('<iframe style="width:100%;border:none;margin:0px;overflow:scroll;background-color:transparent;height: 100vh;" class="vieweroverlay-content" id="viewerframe" src="' + this.href +  '"></iframe>'));
	 $("#viewerframe").on("load", function(e) {
	 $("#spinner").css("display", "none");
	 document.getElementById("myNav").style.width = "100%";
	 $("body").css("overflow", "hidden");
	 });
	});

	$(document).on("click", '.viewstudy', function(event) {

	event.preventDefault();
	event.stopImmediatePropagation();
	 logViewStudy($(this).closest(".worklist"), event);
	});

	$(document).on("contextmenu", '.viewstudy', function(event) {

    event.preventDefault();
    event.stopImmediatePropagation();
	logViewStudy($(this).closest(".worklist"),event);

  });

	$(document).on("click", '.closebtn', function(event) {
	event.preventDefault();
	$("#dynamiciframe").children().remove();
	document.getElementById("myNav").style.width = "0px";
	$("body").css("overflow", "visible");
	});

//  Kind of a long function to retrieve the sharelist, either from the SESSION (current set), vs. making an API call everytime.
//  Submits the uuid, the doctor identifier and the sharenote.  The sharing doctor is stored in the SESSION as doctor_id.  The receiver is the identifier.

    $("#delegator").on("click", ".share", function(e) {
	e.preventDefault();
    e.stopImmediatePropagation();

        var studyrow = $(this).closest(".worklist");
        if (studyrow.next().hasClass("shareform")) {
             studyrow.next().remove();
        }
        else {
        let uuid = studyrow.data("uuid");
        let accession_number = studyrow.data("accession");
        $.ajax({
        type: "POST",
        url: "/Utilities/sharelist",
        dataType: "html",
        data: {},
        beforeSend: function(e) {
            $("#spinner").css("display", "block");
        },
        })
        .done(function(data, textStatus, jqXHR) {

            studyrow.after('<form style = "width:100%;text-align:center;margin:auto;" class = "shareform"><input type="hidden" name="uuid" value="' + uuid + '"><input type="hidden" name="accession_number" value="' + accession_number + '">' + data +  '<textarea style="width:100%;margin:0px 20px 0px 20px;" name = "sharenote"></textarea><br><button class = "uibuttonsmallred" type = "submit">Share</button></form>');
            $("#sharenote").focus();
            var form = studyrow.next();
            form.validate();
            form.on("submit", function(e) {
            if (form.valid()) {
            e.preventDefault();
               $.ajax({
                type: "POST",
                url: "/Referrers/share",
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function(e) {
                    $("#spinner").css("display", "block");
                },
                })
                .done(function(data, textStatus, jqXHR) {
					parseMessages(data, true);
                });
                }
                else {
                    alert("not valid");
                }
            });
        });
        }
});


});  // end of document.ready

</script>

<script>
//var greetES6 = `Hello ${name}`;//using ticks
function template(study) {

	let html = `<!-- BEGIN STUDY -->
	<div class="row divtable worklist" data-uuid="${study.ID}" data-studyinstanceuid="${study.MainDicomTags.StudyInstanceUID}" data-name="${study.PatientMainDicomTags.PatientName}" data-dob="${study.dob}" data-age="${study.age}" data-sex="${study.sex}" data-mrn="${study.PatientMainDicomTags.PatientID}" data-accession="${study.MainDicomTags.AccessionNumber}" data-description="${study.MainDicomTags.StudyDescription}" data-modality="${study.modalities}" data-images="${study.imagecount}" data-studydate="${study.studydate}" data-orthancstatus="${study.stable}" data-reportstatus="${study.reportstatus}" data-indication="${study.indication}" data-referring_physician="${study.MainDicomTags.ReferringPhysicianName}" data-billing_status="${study.billingingstatus}">
	<div class="col-sm-3 nopadding">
	<div class="col-sm-6"><span class="rowcounter">${study.rowno}</span><span class="narrowmedia">View: </span><a class="viewstudy" href="#" target="_blank"><img class="uiicons" src="/images/view_images.png" title="View"></a><span style="max-width: 50px;display: inline-block;text-overflow: ellipsis;overflow: hidden;">${study.MainDicomTags.ReferringPhysicianName}</span> <br><span class="narrowmedia">Name: </span><span data-toggle="tooltip" data-placement="top" title="${study.PatientMainDicomTags.PatientName}, Doctor:  ${study.MainDicomTags.ReferringPhysicianName}">${study.PatientMainDicomTags.PatientName}</span></div>
	<div class="col-sm-6"><span class="narrowmedia">DOB / Age: </span> <a href="#"><img class="createOrthancReport uiiconslarge" src="/images/report.png" title="Reports"></a><span data-toggle="tooltip" data-placement="top" title="DOB / Age">${study.dob} / ${study.age}</span><a href="#"><img class="create-dicom uiiconslarge" src="/js/create_dicom/img/studydoc.png" title="CreateDicom"></a> <div class="reportstatus">${study.reportstatus}</div></div>
	</div>
	<div class="col-sm-3 nopadding">
	<div class="col-sm-2"><span class="narrowmedia">Sex: </span><i class="showselect far fa-paper-plane"></i><select class="route_select"></select><span>&nbsp;${study.sex}</span></div>
	<div class="col-sm-5"><span class="narrowmedia">Download:&nbsp;&nbsp;</span><a href="#"><span class="downloadiso_orthanc uibuttonsmallred">"DCM"</span></a><br><span class="narrowmedia">MRN: </span><span data-toggle="tooltip" data-placement="top" title="${study.PatientMainDicomTags.PatientID}">&nbsp;${study.PatientMainDicomTags.PatientID}</span></div>
	<div class="col-sm-5"><span class="narrowmedia">Download:&nbsp;&nbsp;</span><a href="#"><span class="downloadzip_orthanc uibuttonsmallred">"ZIP"</span></a><br><span class="narrowmedia">Accession: </span><span data-toggle="tooltip" data-placement="top" title="${study.MainDicomTags.AccessionNumber}">&nbsp;${study.MainDicomTags.AccessionNumber}</span></div>
	</div>
	<div class="col-sm-3 nopadding">
	<div class="col-sm-8"><span class="narrowmedia">Show All:</span> <a href="#" data-description="${study.MainDicomTags.StudyDescription}" data-mrn="${study.PatientMainDicomTags.PatientID}"><span class="allstudies_orthanc uibuttonsmallred">"ALL"</span></a><br><span class="narrowmedia">Description:</span><span>${study.MainDicomTags.StudyDescription}</span> <a href="#" data-uuid="${study.ID}" class="share" style="position: absolute;top: 0px;right: 0px;"><span class="uibuttonsmallred">"Share"</span></a></div>
	<div class="col-sm-2"><span class="narrowmedia">Modality: </span><span>${study.modalities}</span></div>
	<div class="col-sm-2"><span class="narrowmedia">Images: </span><span>${study.imagecount}</span></div>
	</div>
	<div class="col-sm-3 nopadding">
	<div class="col-sm-4"><span class="showpatienthistory uibuttonsmallred">Patient History</span> <span class="narrowmedia">History: </span><span data-toggle="tooltip" data-placement="top" title="${study.indication}" style="width: auto;white-space: nowrap;left: 0px;bottom: 0px;text-overflow: ellipsis;overflow: hidden;display: block;">${study.indication}</span> </div>
	<div class="col-sm-8" data-toggle="tooltip" data-placement="top" title="${study.studydate}"><span class="narrowmedia">Study Date: </span><span>${study.studydate}</span><br><span class="narrowmedia">Stable: </span><span>${study.stable}</span> </div>
	</div>
	</div><!-- END STUDY -->`;
return html;

}
</script>

<style>
body {  /* load page before showing */

/*
height:0px;
width:0px;
 */

padding:0 !important;
margin:0 !important;

}
#studycountselect {
    color:black;
}

form {

line-height:1em !important;
}

.listheading {

font-size: 1em;
margin: 10px auto 10px auto;
color:black;
text-align:center;

}

.plupload_wrapper {
min-width:320px !important;
}

.ui-widget.admins {

background: none;
max-width: 100%;
padding:10px;

}
.ui-widget.admins * {
color:black;
}

#orderrequests {
	height:200px;
	overflow:scroll;
}

.create-dicom {
position: absolute;
top: 0;
right: 0;
}

#navbarCollapse {
height:max-content;
}
.modal-open {
	overflow:auto;
}

/*  CSS for the Paginator Widget  */
.pageactive {
color:red !important;
}

.modal-dialog {
width:max-content;
}

.modal-footer {

text-align:center;
margin:auto;
padding:0px;
}

/*
#widget, .paginator {

width:max-content;
margin:auto;

}
 */

#widget, .RISpaginator, .paginator {

    font-size: 10px !important;
    padding: 2px;
    border-radius: 4px;
    width: max-content;
    margin: auto;
    border-radius: 10px;
}

#widget a, .RISpaginator a, .paginator a {

	margin: 2px 5px 2px 0px;
	background: white;
	display: inline-block;
	width: 20px;
	font-size: 12px;
	color: black;
	border: 1px solid black;
	text-align: center;
	border-radius: 5px;
	line-height:16px;
}


/*  For the Flags Add-In */
.SumoSelect > .optWrapper > .options li label {
	margin-left: 10px;
	display:inline-block !important;
}
.SumoSelect li.opt img {

height:14px;
}

.claimstatus, .billingstatus {
display:block;
}

#EditingForm > span:first-child {
text-align: center;
display: inline-block;
width: 100%;
}
/*
FOR THE FILE BROWSER
 */
#filelist {
background: white;
color: black;
text-align: left;
margin: 10px;
padding: 10px;
border-radius: 10px;
}

#filelist .row {
	margin:0px;
	padding:3px;
	border:1px solid black;
	border-collapse: collapse;
}

#filelist > row:first-child div {}

.billingfunctionbutton {
display:inline-block;
}


#studieswrapper * {
	font-size:10px !important;
}

.captchaimage {
height:60px;
width:auto;
text-align:center;
margin:auto;

}
/* Timepicker font-size */
.ui-timepicker-am, .ui-timepicker-pm {
	font-size:16px !important;

}
/* BOOTSTRAP MODAL (SEE BOTTOM OF FOOTER), modal-content and modal-footer also. */

.modal {
z-index:5000;
color:black;

}
.modal-header {
text-align:center;
margin:auto;
}


/* BEGIN CROPPER CSS for WebCam and Image Upload */


video {

  width:320px;
  float:left;
}

#croppercontrols {

	color: black;
	font-size: 16px;
	line-height: 24px;
	display:none;
	color:black;
	margin-left:20px;

}


#title {

	font-size: 18px;
	font-weight: bold;
/* 	padding-left: 30px; */
}

#capture {

    display:block;
    clear:both;
    }



#webcamwrapper {

	margin-bottom:20px;
	text-align:left;
	display:inline-block;


}

#webcamwrapper span, #results span {
	color:black;
	display: block;
	/* 	text-align: center; */
	font-weight: bold;
	clear:both;

}


.cropper-container {

  margin: 0px 0px;
  max-width: 320px;
  clear:both;
display:inline-block;
}

.cropper-container img {
  max-width: 100%;

}

#result {
	vertical-align:top;
/*         margin-left:20px; */
	max-width:320px;

}

#results  {

	display:none;
	vertical-align:top;
	color:white;
	position:relative;

}


.cropper-view-box, .cropper-face {
	border-radius:50%;
}
.cropper-bg {
	background-image:none !important;
}
.cropper-modal {
	background:none !important;
}

.square {
	 border-radius:0% !important;
}

#uploadavatar, #webcamupload, #deleteavatars, #profileavatar, #userform {

border: 3px solid #2d6ba0;
border-radius: 10px;
padding: 20px;
margin: 20px;
clear:both;

}

#profileavatar {

max-width: 300px;
text-align: center;
cursor:pointer;
}

#profileavatar img {

 height:128px;
}

/* END CROPPER CSS for WebCam and Image Upload */

.formselectorbuttons {
	background: white;
	max-width: 800;
	text-align: center;
	margin: 0 20px 0 20px;
	border: 2px solid black;
	border-radius: 10px;
}

.feedback {
position: fixed;
background: #7d0101;
color: white;
padding: 0 20px 0 20px;
border-radius: 20px;
font-size: 10px;
z-index: 2000;
margin: 55px auto 0px auto;
width: max-content;
right: 0;
left: 0;
}

.user_avatar {
	width: 100%;
	margin: auto;
	text-align: center;
}

.user_avatar img {
	max-height: 75px;
	max-width: 75px;
}

.orderstatusicons * {
color:white !important;
}

.billingbutton {

color: white !important;
font-size: 10px !important;
background-color: #8e0022 !important;
border-radius: 2px;
border:none;
padding: 2px;
font-weight:300;
margin: 2px 2px 2px 2px;
cursor:pointer;
float:right;

}
.contact-form * {
    font-family:"Trebuchet MS", Helvetica, sans-serif;

}

.contact-form input:not([type=submit]), .contact-form textarea  {
    background-color:white !important;
    color:black !important;
    border:1px solid black !important;
}

.contact-form textarea {
    height:200px;
}

.form-group {
margin-bottom:0px;
}

.form-group input {
height:auto;
padding:1px !important;
}

.form-group .control-label {

font-size:14px;
color:black;
}

#disclaimer {

white-space: normal;
margin-top: 20px;
text-align: justify;
font-size: 8px;

}
/*For the iframe loaded info pages */

#nav-tabContent * {

font-weight: bold;
font-size: 16px;
margin: 10px;
text-align: justify;
}

#nav-tabContent img {
margin:0px;
width:100%;
}

.uibuttonsmallred, .uibuttonsmallred *   {

color: white !important;
font-size: 10px;
background-color: #8e0022 !important;
border-radius: 4px;
border:none;
padding: 1px;
font-weight:300;
margin: 2px 2px 2px 2px;
cursor:pointer;
width:max-content !important;
max-width:100%;

}

.dropdown-menu {
    background: #0972a5;
    border: 1px solid white;
}
.navbar .dropdown-item {
    color:white;
    font-size:12px;
}
.navbar .dropdown-item:hover {
    color:black;
    font-size:12px;
}

.navbar .nav-item {

    color:white;
    font-size:12px;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

.navbar .nav-item .nav-link:hover {
	color:white;
	text-decoration: underline;
}

.form-group label {
text-align:right;
margin:0;
padding:0;
}

::placeholder {
	color: red !important;
	opacity: .8 !important;
	font-size: 12px;
	font-weight: 200;
	background: white !important;
}


.editableformwrapper {

margin: 0px;
display: block;
position: absolute;
top: 0px;
left:0px;
z-index:2000;
background: white;
width: 100%;
padding: 20px;
border-radius: 10px;
border: 2px solid black;
overflow: visible;

}

.editableformaddbutton, #close_editform, #closeform {

margin: auto;
display: block;

}

#userform {
	display: block;
	position: relative;
	z-index: 0;
	background: black;
	border: 3px solid black;
	padding: 20px;
	background: white;
	border-radius: 10px;
}

#spinner {

position: fixed;
top: 50%;
left: 50%;
width: auto;
height: auto;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
pointer-events:none;
z-index:10002;

}

#spinner img {

height: 100px;
border-radius: 100px;
background: transparent;

}
.errormessage {
padding: 5px;
border: 2px solid black;
color: red !important;
display: block;
width: max-content;
margin: auto;
background: white;
outline: 2px solid whitedashed;
outline-style: dashed;
}

.admins, .users {
padding-top:20px;
padding-bottom:60px;
}


.leftalignblock, .leftalignblock *  {
text-align:left;
color:black;
font-size:.8em;
}

span.edited_green {

	font-size: .8em !important;
	white-space: nowrap;
	position: absolute;
	left: 0px;
	top: 5px;
	border-radius: 3px;
}
span.edited_red  {

font-size:0.8em !important;
display:block;
border:1px solid black;
border-radius: 3px;

}


.profile {  /* wrapper for profile view */

margin:20px;


}

.navbar {

background-color: #8e0022 !important;
box-shadow: 5px 5px 5px black !important;
position:sticky;
position:-webkit-sticky;
padding:0px !important;
}

#new_password_form {

text-align: center;
margin: auto;
width:320px;

}
#new_password_form * {
 width:100%;
}

.box {

padding:0px 10px 10px 10px;

}

.btn-danger {

	font-size: .7em !important;
	padding: 5px !important;
}

.ui-tooltip{

max-width: 800px;

}


.centertabs {

display:table;
margin:auto !important;
background: none;
border: none;
}


.nav-item.active > a {
color:white;
text-decoration:underline;
}

#patient_actions {

 text-align:center;
 margin:auto;
}

#patientdiv, #searchdiv {  /* The AJAX loaded thing with red border */

display:block;
border:2px solid red;
width:100%;
max-height:100%;
margin: 5px 0px 5px 0px;
background:#111;
padding: 0 5px 20px 5px;

}
#searchdiv {
	border:2px solid springgreen;
}


/* The AJAX loaded thing the drops down from above */

#orderform, #patientform, #insuranceform {

/* 	background: white; */
/*
	color: white;
	font-weight: bold;
	border-radius: 20px;
	border: 2px solid white;
 */
	padding: 5px;
	width:100%;
}

h4 {
font-size:16px !important;
}

.SumoSelect > .optWrapper > .options li label {
	background:transparent !important;
}

#modalDiv {

position: fixed;
z-index: 2000;
background: #000;
color: white;
top:0px;
left: 0px;
right:0px;
overflow:scroll;
height:100vh;
display:none;

}

#modalDiv  .form-group {
	text-align: right;
	/* margin: 5px; */
	border-radius: 5px;
	border: 2px solid white;
	margin: 0px 10px 0 10px;
}

#orderform .form-group {
text-align:left !important;
}


.datepicker, .timepicker {
border:2px solid green;

}
.ui-timepicker-list li {
margin: 0;
font-size: 10px;
text-align: center;
padding: 0px;
border: 1px solid black;
}

font-family: courier;

/*  For Styled Forms, could use theme */

.SumoSelect > .CaptionCont {
background-color:unset !important;
}

.shadedform:nth-child(even), .shadedform:nth-child(even) *,  .shadedform:nth-child(even) .CaptionCont  {

background:#DDD;
color:black;
font-weight:bold;
font-size:10px;
}

.shadedform:nth-child(odd), .shadedform:nth-child(odd) *, .shadedform:nth-child(odd) .CaptionCont {
background:#FFF;
color:black;
font-weight:bold;
font-size:10px;
}

.shadedform h5 {
margin:0px;
padding: 2px 0px 4px 0px;
font-weight:bold !important;
font-size:14px !important;
}


#demographics textarea {
background:white;
color:black;
}

/* BEGIN HISTORY FORM CSS */

#historywrapper {

background:#DDD;
color:black;
border-radius:20px;
padding:20px;
display:table;
}
#historywrapper .form-group {
border-radius: 5px;

border: 2px solid white;

margin: 0px 10px 0 10px;
}

#historywrapper * {

	font-size:12px;
}

.searchresults {

display:grid;
overflow:hidden;

}
.searchresults option {

width:360px;

}

.fa-trash-alt {

	font-size: 16px !important;
	color: red;
	margin: 0px 10px 0px 10px;
}
.fas.fa-plus {
		font-size: 16px !important;
}


#rxwrapper, #icdwrapper {
text-align:center;
}

/* END HISTORY FORM CSS */

[readonly] , [disabled], .SumoSelect.disabled, .readonly {
border: 2px solid red !important;
}


.canedit  {
border:2px solid green !important;
}

SumoSelect * {
color:white !important;
}


.ui-tabs-panel.ui-widget-content  {
	border: 2px solid snow;
	margin: 5px;
	border-radius: 10px;
}
.widget {
display:inline-block;
}

#icd10dxcodes, #medicationlist {

font-size:12px;
text-align:left;

}
[for = icd10codes], [for = medicationlist]  {
font-size:14px;
font-weight:bold;
text-align:left;
text-decoration: underline;

}


/* Calendar for Order Form */

#calendardiv{

height:max-content;
overflow:scroll;
display:none;

}

/* The AJAX loaded thing the drops down from above */


.SumoSelect {

	float: left;
    font-size: 12px;
    width: inherit !important;

}

.SumoSelect * {

color:black;
text-align:left !important;
}


.selectPatient, .selectedOrder {
    background-color:rgba(0, 255, 127, 0.5) !important;
    -moz-opacity: .5;
}

.selectPatient *, .selectedOrder * {
	color:white !important;
}

/*
select.form-control {
    -webkit-appearance: menulist;
}
 */

.ui-datepicker-header, .ui-datepicker-calendar {
 color:white;
}


#textmarkup {
    background:#222;
}

#apiresults {

	line-height: normal;
	font-size: 16px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	color: black;
	background: seashell;
	border-radius: 20px;
	padding: 20px 10px 20px 10px;
	border: 2px solid black;
	text-shadow: black 2px;
	box-shadow: -5px -5px 5px 2px #afc2e4;
}

/* centers the tabs */

.nav-tabs > li {

margin-bottom: -1px !important;
float: none !important;
display: inline-block !important;
}

ul.nav-tabs {

text-align:center !important;

}

.rangedates {

background:black;
color:white;

}
#filedetails {
color:white;
font-size:0.75em;
}

.iconinfo {
    color:white;
    font-size:0.75em;
}
.iconinfo  img {
padding-right:5px;
height:2.0em;
display:inline;
}
.iconinfo a {
padding-right:20px;
}

.popover {
	border:2px solid black;
	border-radius:10px;
	padding:5px 5px 5px 5px;
	z-index:100000;
}

.popover-body {
	border:2px solid black;
	border-radius:10px;

}

[data-toggle="popover"]::after {
	content: '?';
	font-size: 16px;
	color: black;
	background: white;
	border-radius: 5px;
	display: inline-block;
	width: 16px;
	line-height: 16px;
	margin-left: 5px;
}


/*
.viewicon > img, .fetchicon > img, .isoicon > img, .zipicon > img, .oldstudyicon > img {
height:1.2em;
}
 */

.uiicons img, .uiicons {

height:1.4em;

}

.uiiconslarge img, .uiiconslarge {

height:2.0em;

}



.uiiconsorder img {

height:2.5em;
text-align:center;


}

.closeresults {
 position:absolute;
}

#APImonitor {

	display:none;
	padding:10px;
	color:white;
	background: black;
}
.medpicslogo {
  background:transparent;color: #FF0008;font-family: arial;font-style: normal;font-size: 16px;font-variant: small-caps;text-shadow: 1px 1px 1px #FFF;margin:10px 0px 10px 0px;

}
.medpicslogo img {height:30px;margin-bottom:15px;}


/* css for report editor */

.reportdiv {

background:black !important;
padding-bottom:30px;
}

.reportheader {

background:black !important;
color:white !important;
font-size:10px;
border:1px solid white;
border-radius:5px;
}

.reportheader div span:first-child {
  padding:0px 5px 0px 0px;
}

.reportdiv .htmlmarkup textarea
{
	background-color: #555;
	border: none;
	color:white;
	display: block;
	height: 40px;
	line-height: normal;
	resize: both;
	width: 90%;
	margin-top:10px;
	margin-bottom:10px;
}

.reportdiv .htmlmarkup input[type="text"]
{
	background-color: #555;
	border: none;
	width: 50em;
	color:white;
}
.reportdiv .htmlmarkup input[type="number"]
{
	background-color: #555;
	border: none;
	color:white;
	width: 6em;
}

.reportdiv .htmlmarkup select

{
	color: black;
	display: block;
	max-width: 55em;
}

/* Below is for the HL7 report */

.reportdiv .htmlmarkup, .reportdiv #reportswrapper > div  {

	padding:10px;
	margin:0px;
	background: white;
	border-top: 1px solid black;
	color: #000;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight:bold;
}

.reportdiv #markupform .htmlmarkup {
    background:black !important;
    color:white;
}

.reportdiv .htmlmarkup div, .reportdiv #reportswrapper > div div {

  display:block;
  padding:0px;
  line-height: initial;
  margin:5px 0px 5px 0px;
}


.reportdiv .htmlmarkup label, .reportdiv #reportswrapper > div label
{
	font-size: 12px;
	color:#07b71c;
	width:200px;
}


.reportdiv .htmlmarkup section > header, .reportdiv #reportswrapper > div section > header
{
	color: #2e78b9;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
}
.reportdiv .htmlmarkup section > section > header, .reportdiv #reportswrapper > div section > section > header
{
	color: #e62a00;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
	text-align: left;
}

.reportdiv .htmlmarkup section > section > section > header, .reportdiv #reportswrapper > div section > section > section > header
{
	color: green;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
	text-align: left;
}

.reportdiv .htmlmarkup > section
{
}
.reportdiv .htmlmarkup section > section, .reportdiv #reportswrapper > div  section > section
{
	padding-left: 0.8cm;
}
.reportdiv .htmlmarkup p, .reportdiv #reportswrapper > div p
{
	margin-bottom: 0.0cm;
	margin-top: 0.0cm;
	padding-left: 0.8cm;
}

/* end of report editor css */


#contract_id {
color:black;
}

.btn-sm, .btn-xs {
border:none !important;
padding:2px !important;
}
#myNav {
z-index:10000;

}



#delegator {

text-align: center !important;
/* min-height: 2048px; */
height: 100%;
min-height:100vh;
}

.spanclosex {

font-size:12px;
background:red;
color:white;

}

#studycontainer {
  width:100%;
  max-width:100%;
}

.info {
height:100%;
font-size:0.8em;
}
.info img  {
  height:1em;
}

.ui-tabs {

font-size:0.7em;

}

.divtableheader, .worklistheader {

  padding:0px;
  margin:0px 0px 0px -1px;
  background:#2a5881;
  width:100%;
  font-size:14px;
  line-height:16px;
  text-align:center;

}

.divtableheader *, .worklistheader * {
color:white !important;
}

.divtableheader > div {

	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	display: block;
	border-left:1px solid white;
	color:white;

	}

.divtableheader div:first-child {

    border:none;
}

.divtable {


    color: black;
	font-weight: bold;
	font-size:0.9em;
/* 	box-shadow: 0px 0px 0px 2px #1e40eb; */
  	margin:0px;
	padding:5px 0px 5px 0px;
	overflow:hidden;
	width:100%;
	text-align:left;

}

.divtable, .divtable > div {

	display:flex;
}


.divtable >	div , .divtable > div > div	 {

    overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	max-height:60px;
	padding:0px 0px 0px 0px;
	border-right:1px solid white;
	font-size:12px !important;
	font-family:  "Trebuchet MS", Helvetica, sans-serif;
	padding-left:5px;

	}

.divtable span {
color:black;
}


.divtable div:last-child, .divtable > div > div:last-child {

border-right:none;

}

#searchform, .searchform {

  box-shadow: none !important;
  background:none;
  font-size:10px;
  padding:0px;
}

#searchform input, .searchform input, .searchform select, #searchform select {

  background: #BBB;
  color:black;
  width:100%;
  border:none;
  font-size:12px;
  display:block;

}

.rowcount, .rowcount * {

	background:white !important;
	color:black !important;
	width:max-content;
	margin:auto;
}

input[name=begindate], input[name=enddate], input[name=changedate] {

width: 100px;
display: inline;
margin: 5px;
padding: 5px;
height: 1em;
}

input[name=changedate] {
width: 10px;
}

.nopadding {
        padding:0px !important;
		margin:0px;
	}

	.padding {
		padding:2px !important;
		margin:0px;
	}


.narrowmedia {
  display:none;
}

[data-sort-param] {
  cursor:pointer;
}


.latestHL7 {
	float:right;
}
@media only screen and (max-width: 580px) {

  .row.widemedia {
    display:none !important;
  }
  .searchform .narrowmedia, #searchform .narrowmedia {
    display:inline-block;
    width:100%;
    color:white !important;
    background:black !important;
    padding-bottom:5px;

  }
  .divtable div {

  display:table !important;
  border-right:none !important;

  }

  .divtable div span:first-child {
  width:150px;
  }

  #searchform * {
   background:#888;
  }

  #searchform input {
    border:1px solid white;
  }

}


/* primary = blue, danger = red, info = light blue, success = green, danger = red */

	.btn-primary, .btn-danger, .btn-info, .btn-success, btn-warning {

font-size: 12px !important;
padding: 5px !important;
border-radius: 5px;
margin: 5px;
}

/*  READERS & BILLERS & REFERRERS & PATIENTS STUDIES LIST PAGES */

#studies .storagenamespace {

font-size: 16px !important;

}
.facilityinfo {
position:relative;
text-align: left;
}



	#reportsselector {
	color:black;
	margin-left:10px;
	width:500px;
	}
	#reportsselectorform {
	display:inline-block;
	}
	#templateid {
	width:500px;
	}

#teleRadDivOverlayWrapper {

    width:100%;
    height:100%;
    display: none;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 3000;
    background: black;
/*     height: 100vh; */
    overflow-y:scroll;

}

#teleRadDivOverlay {

background:black;

}

#viewertools {
color:white;
}

 .vieweroverlay a {
    padding: 0px;
    font-size: inherit;
}
.vieweroverlay {
background-color:black;
transition:0s;
}

#teleradClose {
display:block;
text-align: center;
margin:auto;
}

#noreports  {
color:#fff;
display: inline-block;
padding: 10px;
}
.btn-hide {
display:none;
}
.btn-show {
display:inline-block;
}
.route_select {
position: absolute;
z-index: 10;
display: none;
color: black;
bottom:0;
left:0;

}
.showselect {

color: #8e0022;
margin-left: 5px;
}


	.shareDiv {
	    margin-right:10px;
	    margin-left:10px;
	}

	.info {
	  color:black;
		font-weight:500;
		font-size:.7em;

		clear:both;
	}
	.info img {
	  height:1.5em;
	}
	.error {
	  background: #fff;
	  text-align: center !important;
	  font-size: 12px;
	  color: red !important;
	  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
	  border-radius: 5px;
	  padding: 0px !important;
	  margin: 0px;
	  width: 100%;
	  max-width:none;
	  display: inline-block;
	}

	.SumoUnder {
	    visibility:hidden;
	}


	blockquote {
		border-color:transparent !important;

	}

/*
::-moz-selection {
  color: red;
  background: white;
}
 */

::selection {
  color: red;
  background: white;
}

#database { /* database selection form */
color: black;
text-align: center;
}

    /* The Overlay (background) */
    .vieweroverlay {
        /* Height & width depends on how you want to reveal the overlay (see JS below) */
height: 100%;
width: 0;
position: fixed;
 /* Stay in place */
z-index: 10;
 /* Sit on top */
left: 0;
top: 0;
background-color: rgb(0,0,0);
 /* Black fallback color */
background-color: rgba(0,0,0, 0.9);
 /* Black w/opacity */
overflow-x: hidden;
 /* Disable horizontal scroll */
overflow-y: hidden;
transition: 1s;
 /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

    /* Position the content inside the overlay */
.vieweroverlay-content {
position: relative;
top: 0px;
 /* 25% from the top */
width: 100%;
 /* 100% width */
text-align: center;
 /* Centered text/links */
margin-top: 0px;
 /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* Position the close button (top right corner) */

.vieweroverlay a.closebtn {

position: absolute;
z-index: 2;
top: 50px;
right: 0px;
background: transparent;

}

.vieweroverlay .fa-window-close {
    color:red;
    font-size:16px;
}


/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
    @media screen and (max-height: 450px) {
        .vieweroverlay a {font-size: 20px}
        .vieweroverlay .closebtn {
            font-size: 40px;
            top: -25px;
            right: 0px;
        }
    }

    label .fa-asterisk {
	color:red !important;
}
</style>
<script>
// Scripts for New Study Browser
// function template is on the actual page where the template is rendered.
var routelist;
var apiurl;
var query;
var studyheader = '<div class="row divtable widemedia worklistheader"><div class="col-sm-3 nopadding"><div class="col-sm-6 padding" data-sort-param="data-name" data-sort-order="up"><span>Name / View</span></div><div class="col-sm-6 padding" data-sort-param="data-age" data-sort-order="up"><span>Age/DOB/Reports</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-2 padding" data-sort-param="data-sex" data-sort-order="up"><span>Sex</span></div><div class="col-sm-5 padding" data-sort-param="data-mrn" data-sort-order="up"><span>MRN</span></div><div class="col-sm-5 padding" data-sort-param="data-accession" data-sort-order="up"><span>Accession</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-8 padding" data-sort-param="data-description" data-sort-order="up"><span>Description</span></div><div class="col-sm-2 padding" data-sort-param="data-modality" data-sort-order="up"><span>Type</span></div><div class="col-sm-2 padding" data-sort-param="data-images" data-sort-order="up"><span>#</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-4 padding" data-sort-param="data-harvested" data-sort-order="up"><span>History</span></div><div class="col-sm-8 padding" data-sort-param="data-studydate" data-sort-order="down"><span>Study Date</span></div></div></div>';

$("#itemsperpage").val("10");
$("#sortparam").val("StudyDate");
$("#reverse").val("1");

$("#studieswrapper").on("click", ".create-dicom", function(e) {

if ($("#ajaxdiv").length == 0) {
var parent = $(this).closest(".worklist");

    $.ajax({
    headers: {

    },
    url: '/PACS/create_dicom',
    type: 'POST',
    dataType: 'html',
    data: {parent:parent.data("uuid")},
    beforeSend: function(e) {
        $("#spinner").css("display", "block");
    },
    })
    .done(function(data, textStatus, jqXHR) {

        parent.after('<div id ="ajaxdiv">' + data + '</div>');
        initLoader();
    })
    .fail(function( jqXHR, textStatus, errorThrown) {
    });
    }
    else {
        $("#ajaxdiv").remove();

    }
});

function getSearchParams() {

	// For Reference, these are embedded in the search form data-orthanc attribute, others are for RIS.
	var map = {

	"data-name": "PatientName",
	"data-dob": "PatientBirthDate",
	"data-sex": "PatientSex",
	"data-mrn": "PatientID",
	"data-accession": "AccessionNumber",
	"data-description": "StudyDescription",
	"data-modality": "StudyDescription",
	"data-studydate": "StudyDate",
	"data-referringphysician" : "ReferringPhysicianName",
	"data-modality" : "Modality",
	"data-institution" : "InstitutionName",
	"data-otherpatientids": "RETIRED_OtherPatientIDs" //(0010,1000) retired tag

	}


	var subquery = {};
	var tags  = {};
	var localparams = {};

	params = $("[name=searchform]").find(".searchparam");
	$.each(params, function( index, value ) {

		let currentvalue = $(this).val();
		//if (currentvalue == "") currentvalue = "*";
		if ($(this).data('orthanc') == "PatientName" && currentvalue != "") subquery[$(this).data('orthanc')] = "*" + currentvalue + "*";
		else if ($(this).data('orthanc') == "PatientID" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "PatientBirthDate" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue.replace(/-/g,"");
		else if ($(this).data('orthanc') == "PatientSex" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "AccessionNumber" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "StudyDescription" && currentvalue != "") subquery[$(this).data('orthanc')] = "*" + currentvalue + "*";
		else if ($(this).data('orthanc') == "StudyDate" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue.replace(/-/g,"");
		else if ($(this).data('orthanc') == "ReferringPhysicianName" && currentvalue != "") subquery[$(this).data('orthanc')] = "*" + currentvalue + "*";
		else if ($(this).data('orthanc') == "Modality" && currentvalue != "") tags["0008,0060"] = currentvalue;  // tag for Modality
		else if ($(this).data('orthanc') == "InstitutionName" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "0010,1000" && currentvalue != "" ) subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "0010,21b0" && currentvalue != "") subquery[$(this).data('orthanc')] = currentvalue;
		else if ($(this).data('orthanc') == "reportstatus" && currentvalue != "") localparams['reportstatus'] = currentvalue;

	});
	if (!subquery.hasOwnProperty("StudyDate")) {
		subquery.StudyDate = $("[name=begindate]").val().replace(/-/g, "") + "-" +$("[name=enddate]").val().replace(/-/g, "");
	}

	var fullquery = {};
	fullquery.Query = subquery;
	fullquery.Level = "Study"
	fullquery.Expand = true;
	fullquery.Normalize = false;
	fullquery.MetaData = {};
	//fullquery.Tags = {"0008,0005":"ISO_IR 100","0008,1032":{"0008,0100":"IMG131"},"0008,0096":{"0040,1101":{"0008,0100":"0001","0008,0102":"L"}}};
	//fullquery.MetaData.LastUpdate = "*";
	fullquery.pagenumber = 1;
	fullquery.itemsperpage = parseInt($("#itemsperpage").val());
	fullquery.sortparam = $("#sortparam").val();
	fullquery.reverse = parseInt($("#reverse").val());
	fullquery.widget = 1;
	fullquery.Local = localparams;
	fullquery.Tags = tags;
	query = fullquery; // store it for use with the pagination thing.
	return fullquery;
}

function getStudyRow(study, rowno, template) {

//console.log(study);
study.rowno = rowno;
study.sex = (study.PatientMainDicomTags.PatientSex != undefined)?study.PatientMainDicomTags.PatientSex:"?";
study.indication = (study.indication != undefined)?study.indication:"None";
study.stable = (study.IsStable)?"Stable":"Unstable";
study.dob = (study.PatientMainDicomTags.PatientBirthDate != undefined)?study.PatientMainDicomTags.PatientBirthDate.toString().replace(/(\d{4})(\d{2})(\d{2})/g, '$1-$2-$3'):"No DOB";
if (isValidDate(study.dob)) {
study.age = moment().diff(moment(study.dob, "YYYY-MM-DD"), 'years') + ' y';
}
else {
study.age = "NA";
study.dob = "No DOB";
}
study.studydate = (study.MainDicomTags.StudyDate != undefined)?study.MainDicomTags.StudyDate.toString().replace(/(\d{4})(\d{2})(\d{2})/g, '$1-$2-$3'):"No Date";
study.modalities = study.modalities.join(',');
return template(study);

}

// Iterates through the result set and gets the HTML for the whole set and then fills up the wrapper.
function showStudies(studies,offset) {

let html = '';
studies.forEach(function (study, i) {
   html += getStudyRow(study, i+1+offset, template);
});
$("#studieswrapper").html(html);
//$(".route_select").html(LocalVars.routelist);

}

function renderData(data) {

	widget = data[0].widget;  // get the Widget from the response as HTML, 1st element in the returned array.
	offset = data[0].offset;
	data.splice(0, 1);  // delete the first elements that are not part of the study dataset, probably could return fewer params if the widget is returned and the query is saved in JS or LocalStorage
	//console.log(data);
	showStudies(data,offset);
	$("#widget").html(widget); // put the widget in the div above the study table header.

}

function searchOrthanc() {

$.ajax({
url: '/studies/page',
type: 'POST',
dataType: 'json',
contentType: 'application/json; charset=utf-8',  // post JSON
data: JSON.stringify(query),
beforeSend: function(e) {
	$("#spinner").css("display", "block");
},
})
.done(function(data, textStatus, jqXHR) {

    if (data == null) {
    alert("Emtpy Response from Server");
    }
    else if (data.error) {
    alert(data.error);
    }
    else if (data.curl_error) {
    alert(data.curl_error);
    }
    else {

	widget = data[0].widget;  // get the Widget from the response as HTML, 1st element in the returned array.
	offset = data[0].offset;
	data.splice(0, 1);  // delete the first elements that are not part of the study dataset, probably could return fewer params if the widget is returned and the query is saved in JS or LocalStorage
	//console.log(data);
	showStudies(data,offset);
	$("#widget").html(widget); // put the widget in the div above the study table header.
	colorrows($("#studieswrapper .worklist"));  // Color the Rows, pretty, see function below this one.
	/*  Left over from WebApp, probably don't want that, although StudyCount by MRN might be nice.
	if ($("#patientswrapper").length != 0 ){
	getStudyCount($("#patientswrapper .patient"));
	getOrderCount($("#patientswrapper .patient"));
	}
	*/
	}
})
.fail(function( jqXHR, textStatus, errorThrown) {
});
}


$("#studycountselect select").on("change", function(e) {
getSearchParams();
searchOrthanc();
});

$("[name=changestudydate]").on("change", function(e) {

e.preventDefault();

let selected = $(".changestudydate:checked").val();
let end = $(this).closest(".startenddate").find(".enddate");
let begin = $(this).closest(".startenddate").find(".begindate");
if (selected != 0) {
end.val(moment().format('YYYY-MM-DD'));
//endforquery = moment().format('YYYYMMDD');
begin.val(moment().subtract(selected,'d').format('YYYY-MM-DD'));
//beginforquery = moment().subtract(selected,'d').format('YYYYMMDD');
//query.Query.StudyDate = beginforquery + "-";
}
else {
	//query.Query.StudyDate = "";
	begin.val("");
	end.val("");
}
let database = $(this).closest('[data-searchdb]').data("searchdb");

if (database == "searchorthanc") {

getSearchParams();
searchOrthanc();
}
else if (database == "search_shared") {
searchShared($('[name=searchform]').serialize());
}


});

$("body").on("click", ".paginator a", function(e) {

	e.preventDefault();
	let clickedparent = $(this).closest(".paginator");
	//let wrapperselector = clickedparent.data("wrapper");
	query.pagenumber = parseInt($(this).data("page"));
	searchOrthanc();

});

// this one is setup different because the handler can't be attached to the body tag.

$("#studieswrapper, #patientswrapper, #orderswrapper, #requestswrapper").on("click", ".paginator a", function(e) {

	e.stopImmediatePropagation();  // prevent the function above from executing.
	e.preventDefault();
	let parent = $(this).closest("#patientdiv").prev();
	let mrn = parent.data("mrn");
	loadAllPatientDiv(parent,$(this).data("page"));
});

function loadAllPatientDiv(worklist,page) {

	let mrn = worklist.data("mrn");
	$.ajax({

		//let mrn = worklist.data("mrn");
    	url: '/OrthancDev/load_all_studies',
    	type: 'POST',
    	dataType: 'json',
    	data: {"data-mrn" : mrn, "page": page}, // for later maybe, one will be set for existing patient.
    	beforeSend: function(e) {
        $("#spinner").css("display", "block");
        },
    	success: function(data, textStatus, xhr) {

            if (data == null) {
            alert("Emtpy Response from Server");
            }
            else if (data.error) {
            	showMessage("",data.error);
            }
            else if (data.curl_error) {
            alert(data.curl_error);
            }
			else {
            $("#patientdiv").remove();  // remove it if is is already there.
			widget = data[0].widget;  // get the Widget from the response as HTML, 1st element in the returned array.
			offset = data[0].offset;
			data.splice(0, 1);  // delete the first elements that are not part of the study dataset, probably could return fewer params if the widget is returned and the query is saved in JS or LocalStorage
			//console.log(data);
			let html = '';
			data.forEach(function (study, i) {
	   			html += getStudyRow(study, i+1+offset, template_old);
			});
			header = "";
			if ($("#patientlist")) header = studyheader;
    		$(worklist).after('<div id="patientdiv" class = "listwrapper">' + header + widget + html + '</div>');
    		colorrows($("#patientdiv .worklist"));
    //query = '{"Query":{"PatientID":"'+mrn+ '"},"Level":"Study","Expand":true,"Normalize":false,"MetaData":{},"pagenumber":' + page + ',"itemsperpage":10,"sortparam":"StudyDate","reverse":1,"widget":1,"Local":{}}';
    //query = JSON.parse(query);

			}
    	},
    	error: function(xhr, textStatus, errorThrown) {

    	}
    });


}

function fetchstudy(uuid, id) {

    $.ajax({
    url: '/Studies/fetch_study',
    type: 'POST',
    dataType: 'json',
    data: {"uuid":uuid, "id":id},
    complete: function(xhr, textStatus) {

    },
    success: function(data, textStatus, xhr) {
        showMessage("",data.message);

    },
    error: function(xhr, textStatus, errorThrown) {

    }
    });
}

$("body").on("click", ".showselect", function(e) {

    e.preventDefault();
    if (!$(this).next().is(':empty')) {
     $(this).next().empty();
     $(this).next().hide();
    }
    else {
        get_routes_list($(this).next());
    }
});

function get_routes_list(selectlist) {

	$.ajax({
	url: 'get_modalities',
	type: 'POST',
	dataType: 'html',
	data: {},
	beforeSend: function(e) {
		$("#spinner").css("display", "block");
	},
	success: function(data, textStatus, xhr) {

		selectlist.html(data);
		selectlist.show();

	}
	});

	}

$("body").on("change", ".route_select", function(e) {

		e.preventDefault();
		let id = $(this).val();
		if (id != "") {
		let uuid = $(this).closest(".worklist").data("uuid");
		fetchstudy(uuid, id);
		}
});

$("body").on ("click", ".allstudies_orthanc", function(e) {

	e.preventDefault();
    e.stopImmediatePropagation();
    let activepatient = $(this).closest('.worklist');
    let element = activepatient.next();
    if (element.attr("id") != "patientdiv") {
    loadAllPatientDiv(activepatient,null);
    }
    else element.remove();
});


$("#studylist [name='changestudydate'][value='3650']").trigger("click");

// ORTHANC SCRIPTS

function downloadstudy_orthanc(type, clicked)  {

$("#spinner").css("display", "block");

fetch('/OrthancDev/downloadStudyUUID', {

    body: JSON.stringify({command: type, "uuid": clicked.data( "uuid")}),
    method: 'POST',
    headers: {
        'Content-Type': 'application/json; charset=utf-8',
        "_token": "{{ csrf_token() }}",
        'X-CSRF-TOKEN': "{{ csrf_token() }}"

    },
})
.then(response => response.blob())
.then(response => {

    $("#spinner").css("display", "none");
    const blob = new Blob([response], {type: 'application/zip'});
    const downloadUrl = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = downloadUrl;
    a.download = clicked.data("name") + ".zip";
    document.body.appendChild(a);
    a.click();
})

}

$("body").on("click", ".downloadiso_orthanc",  function(e) {

    e.preventDefault();
    downloadstudy_orthanc("iso", $(this).closest(".worklist"));
});

$("body").on("click", ".downloadzip_orthanc", function(e) {
    e.preventDefault();
    downloadstudy_orthanc("zip", $(this).closest(".worklist"));
});

function showMessage(title, message) {

    showmodal(title, message);

}

function template_old(study) {

	let html = '<!-- BEGIN STUDY --><div class="row divtable worklist" data-uuid="'+study.ID+'" data-studyinstanceuid="'+study.MainDicomTags.StudyInstanceUID+'" data-name="'+study.PatientMainDicomTags.PatientName+'" data-dob="'+study.dob+'" data-age="'+study.age+'" data-sex="'+study.sex+'" data-mrn="'+study.PatientMainDicomTags.PatientID+'" data-accession="'+study.MainDicomTags.AccessionNumber +'" data-description="'+study.MainDicomTags.StudyDescription+'" data-modality="'+study.modalities+'" data-images="'+study.imagecount+'" data-studydate="'+study.studydate+'" data-orthancstatus="'+study.stable+'" data-reportstatus="'+study.reportstatus+'" data-indication="'+study.indication + '" data-referring_physician="'+study.MainDicomTags.ReferringPhysicianName+'" data-billing_status="'+study.billingingstatus+'"><div class="col-sm-3 nopadding"><div class="col-sm-6"><span class="rowcounter">' + study.rowno + '</span><span class="narrowmedia">View: </span><a class="viewstudy" href="#" target="_blank"><img class="uiicons" src="/images/view_images.png" title="View"></a><span style="max-width: 50px;display: inline-block;text-overflow: ellipsis;overflow: hidden;">'+study.MainDicomTags.ReferringPhysicianName+'</span> <br><span class="narrowmedia">Name: </span><span data-toggle="tooltip" data-placement="top" title="' +study.PatientMainDicomTags.PatientName+ ', Doctor:  ' +study.MainDicomTags.ReferringPhysicianName+'">'+study.PatientMainDicomTags.PatientName+'</span></div><div class="col-sm-6"><span class="narrowmedia">DOB / Age: </span> <a href="#"><img class="latestHL7 uiiconslarge" src="/images/report.png" title="Reports"></a><span data-toggle="tooltip" data-placement="top" title="DOB / Age">' + study.dob + ' / ' + study.age + '</span> <div class="reportstatus">'+study.reportstatus+'</div></div></div><div class="col-sm-3 nopadding"><div class="col-sm-2"><span class="narrowmedia">Sex: </span><i class="showselect far fa-paper-plane"></i><select class="route_select"></select><span>&nbsp;'+study.sex+'</span> </div><div class="col-sm-5"><span class="narrowmedia">Download:&nbsp;&nbsp;</span><a href="#"><span class="downloadiso_orthanc uibuttonsmallred">"DCM"</span></a><br><span class="narrowmedia">MRN: </span><span data-toggle="tooltip" data-placement="top" title="'+study.PatientMainDicomTags.PatientID+'">&nbsp;'+study.PatientMainDicomTags.PatientID+'</span></div><div class="col-sm-5"><span class="narrowmedia">Download:&nbsp;&nbsp;</span><a href="#"><span class="downloadzip_orthanc uibuttonsmallred">"ZIP"</span></a><br><span class="narrowmedia">Accession: </span><span data-toggle="tooltip" data-placement="top" title="'+study.MainDicomTags.AccessionNumber+ '">&nbsp;'+study.MainDicomTags.AccessionNumber+'</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-8"><span class="narrowmedia">Description:</span><span>'+study.MainDicomTags.StudyDescription+'</span> </div><div class="col-sm-2"><span class="narrowmedia">Modality: </span><span>'+study.modalities+'</span></div><div class="col-sm-2"><span class="narrowmedia">Images: </span><span>'+study.imagecount+'</span></div></div><div class="col-sm-3 nopadding"><div class="col-sm-4"><span class="narrowmedia">History: </span><span data-toggle="tooltip" data-placement="top" title="'+study.indication+'" style="width: auto;white-space: nowrap;left: 0px;bottom: 0px;text-overflow: ellipsis;overflow: hidden;display: block;">'+study.indication+'</span> </div><div class="col-sm-8" data-toggle="tooltip" data-placement="top" title="'+study.studydate+'"><span class="narrowmedia">Study Date: </span><span>'+study.studydate+'</span><br><span class="narrowmedia">Stable: </span><span>'+study.stable+'</span> </div></div></div><!-- END STUDY -->';
return html;

}
</script>


<!-- SCRIPTS FOR READERS -->

<script>

//  set of global js variables for report generation

    var activestudytags;  // from the data- elements for the study that is being worked on
    var dataobject;  // object to attach to the active study for easy access, and attaching the report objects to a study after retrieval.
    var undofieldsarray;
    var undoselectsarray;
    var reportobjects;
    var reportslistoptions
    var parentelement;
    var workingelement;
    var loadedreportmarkup;
    var undoHTML;  // needs to be global aparently.
    var undotextmarkup;
    var Markup;

	// open = handler for form .viewreport, loaded = handler for form templatechooser, preview = handler for #previewreport
    // buttons are #loadreport, #previewreport, #undoreport
    // primary = blue, danger = red, info = light blue, success = green, danger = red

    var buttonstatus = new Object;
    var undoHTML = "";

    buttonstatus.opened = {

    Preview: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Undo: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Prelim: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Final: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Addendum: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    }
    }

    buttonstatus.loaded = {

    Preview: {
    class: "btn-primary btn-sm btn-show",
    disabled:  "false"
    },
    Undo: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Prelim: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Final: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Addendum: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    }
    }

    buttonstatus.preview = {

    Preview: {
    class: "btn-danger btn-sm btn-hide",
    disabled:  "true"
    },
    Undo: {
    class: "btn-primary btn-sm btn-show",
    disabled:  "false"
    },
    Prelim: {
    class: "btn-primary btn-sm btn-show",
    disabled:  "false"
    },
    Final: {
    class: "btn-primary btn-sm btn-show",
    disabled:  "false"
    },
    Addendum: {
    class: "btn-primary btn-sm btn-show",
    disabled:  "false"
    }
    }

    function setButtons (buttonobject) {

    $("#loadreport,#previewreport,#undoreport,#prelimreport,#finalreport,#addendumreport").removeClass();  // revmoves all classes

    // preview by default has undo, prelim, final and addendum enabled
    // need to check the current status
    // if prelim, then allow only another prelim or Final
    // if final, then allow only an addendum
    // if addendum, then allow another Addendum

    if (buttonobject == buttonstatus.preview) {
    	//console.log(workingelement.data( "reportstatus"));
        if (workingelement.data( "reportstatus").toUpperCase() == "PRELIM") {  // disable the addendum, can still issue another Prelim or Final
            buttonobject.Prelim.class = "btn-primary btn-sm btn-show";
            buttonobject.Prelim.disabled = "false";
            buttonobject.Final.class = "btn-primary btn-sm btn-show";
            buttonobject.Final.disabled = "false";
            buttonobject.Addendum.class = "btn-danger btn-sm btn-show";
            buttonobject.Addendum.disabled = "true";

        }
        else if (workingelement.data( "reportstatus").toUpperCase() == "FINAL") { // disable the prelim and final, only can create an addendum
            buttonobject.Prelim.class = "btn-danger btn-sm btn-show";
            buttonobject.Prelim.disabled = "true";
            buttonobject.Final.class = "btn-danger btn-sm btn-show";
            buttonobject.Final.disabled = "true";
            buttonobject.Addendum.class = "btn-primary btn-sm btn-show";
            buttonobject.Addendum.disabled = "false";
        }
        else if (workingelement.data( "reportstatus").toUpperCase() == "ADDENDUM") {  // disable the prelim and final, only can create an addendum
            buttonobject.Prelim.class = "btn-danger btn-sm btn-show";
            buttonobject.Prelim.disabled = "true";
            buttonobject.Final.class = "btn-danger btn-sm btn-show";
            buttonobject.Final.disabled = "true";
            buttonobject.Addendum.class = "btn-primary btn-sm btn-show";
            buttonobject.Addendum.disabled = "false";
        }
        else if (workingelement.data( "reportstatus").toUpperCase() == "NONE") {  // disable the addendum
            buttonobject.Prelim.class = "btn-primary btn-sm btn-show";
            buttonobject.Prelim.disabled = "false";
            buttonobject.Final.class = "btn-primary btn-sm btn-show";
            buttonobject.Final.disabled = "false";
            buttonobject.Addendum.class = "btn-danger btn-sm btn-show";
            buttonobject.Addendum.disabled = "true";
        }
    }

//     $("#loadreport").addClass(buttonobject.Load.class);
//     $("#loadreport").prop("disabled",(buttonobject.Load.disabled === "true"));

    $("#previewreport").addClass(buttonobject.Preview.class);
    $("#previewreport").prop("disabled",(buttonobject.Preview.disabled === "true"));

    $("#undoreport").addClass(buttonobject.Undo.class);
    $("#undoreport").prop("disabled", (buttonobject.Undo.disabled === "true"));

    $("#prelimreport").addClass(buttonobject.Prelim.class);
    $("#prelimreport").prop("disabled", (buttonobject.Prelim.disabled === "true"));

    $("#finalreport").addClass(buttonobject.Final.class);
    $("#finalreport").prop("disabled", (buttonobject.Final.disabled === "true"));

    $("#addendumreport").addClass(buttonobject.Addendum.class);
    $("#addendumreport").prop("disabled", (buttonobject.Addendum.disabled === "true"));

    }

    $("#studieswrapper").on('click', ".createOrthancReport", function(e) {

        e.preventDefault();
        if (false) { //if (!($('#teleRadDivOverlay').is(':empty'))) {
        // Do nothing, they are in the editor, it actually still does toggle the editor div though, need to attach event to the other handler to indicate the report is open for editing when they load a template

        }
        // load the reports window
        else {

        // want to add an API call here to fetch the radreports for this study from AMBRA, which would be an array or JSON.  Need to parse and process that so that we can determine what if any reports already exist, allow prelimns, finals, addendums as appropriate, etc.

          $("#teleRadDivOverlay").html(""); // make sure the overlay is empty
        // add the framework
          parentelement = $(this).closest(".worklist");
          workingelement = parentelement.clone(true,true);  // the row for the study that we want to read
          workingelement.find("#patientdiv").remove();
          workingelement.find(".showselect").remove();  // get rid of the fetch thing
          $("#teleRadDivOverlay").prepend(workingelement);
          workingelement.css("background-color", "#888");
          $("#teleRadDivOverlay").prepend($("#studieswrapper > .worklistheader").clone()); // just the primary header
          $("#teleRadDivOverlay").prepend("<div id='reportselectorwrapper'></div>");
          $("#teleRadDivOverlayWrapper").css("width", "100%");
          $("#teleRadDivOverlayWrapper").css("display", "block");
        //   $("#teleRadDivOverlay").append('');
          $("#delegator").css("display", "none");  // hide the content below
          //$( "#teleRadDivOverlayWrapper .reporticon" ).trigger( "click" ); // opens the report div, probably don't need this


         // set up the buttons in the toolbar for the stage of the report, maybe don't need this anymore
          //setButtons(buttonstatus.opened);

          // var formdata = $(this).parents().eq(2).data("modality");

          // populates js array for later use for the active report, put the data-xxx tag values into an object and we then have NVP's for the data as below, activestudytags[name] is the value
          dataobject = $(this).closest(".worklist").data();
            //  initializes array for data- elements in the rows for every study
           activestudytags = [];
          for (var k in dataobject){
            if (dataobject.hasOwnProperty(k)) {
              activestudytags[k] = dataobject[k];  // create key-value pairs, name, age, dob, sex, mrn,accession,description,modality,images,harvested,studydate,status
            }
          }

          //populate the header

          $(".headername").html(activestudytags["name"]);
          $(".headerage").html(activestudytags["age"]);
          $(".headerdob").html(activestudytags["dob"]);
          $(".headersex").html(activestudytags["sex"]);
          $(".headermrn").html(activestudytags["mrn"]);
          $(".headeracc").html(activestudytags["accession"]);
          $(".headerdesc").html(activestudytags["description"]);
          $(".headermod").html(activestudytags["modality"]);
          $(".headerexamdate").html(activestudytags["studydate"]);
          $(".headerprovider").html(activestudytags["referring_physician"]);
          $(".headerindication").html(activestudytags["indication"]);

          // create the select list if we are editing, loads the template choices from API call, filtered by modality in this case.

          formdata = "modality=" + activestudytags["modality"] + "&description=" + activestudytags["description"] + "&option=getlist";
            $.ajax({
            url: '/Reports/radreport_templates_list',  // calls the Reports controller.
            type: 'POST',
            dataType: 'json',
            data: formdata,  // gets all of the hl7 reports encoded as JSON, api gets all hl7 reports for study
            complete: function(xhr, textStatus) {

            },
            success: function(data, textStatus, xhr) {
                $("#templateid").html(data.selectlist);
            }
          });
            $("[name='htmlmarkup']").html("");
          createreportlist();
        }
        // end of setting up the overlay

    });

    // function to create the select list for reports and to attach the report objects / key, call when opening the editor and after saving a report

    function createreportlist() {

            let uuid = activestudytags["uuid"];
			let accession_number = activestudytags["accession"];

          $.ajax({
            headers: {
	        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest'
	        },
            url: '/HL7/getallhl7_reports',  // calls the AJAX controller.
            type: 'POST',
            dataType: 'json',
            data: {"uuid": uuid,"accession_number": accession_number },  // gets all of the hl7 reports encoded as JSON, api gets all hl7 reports for study
			beforeSend: function(e) {
			$("#spinner").css("display", "block");
			},
            success: function(data, textStatus, xhr) {


                // create the select list for existing reports
                $("#reportselectorwrapper").html('&nbsp;&nbsp;<span style="color:white;">. . . loading reports</span>');
                response = parseMessages(data, true);
                if (!data.error) {
                data=response.reports;
                reportslistoptions = "";
                reportobjects = [];
                email = data.user_email;
                if (data.hl7.length != 0) {

                data.hl7.forEach(function(currentValue,index) {
                	currentValue.OBX.header = currentValue.header;
                	currentValue.OBX.footer = currentValue.footer;
                	currentValue.OBX.body = currentValue.body;
                    addReport(currentValue.OBX);   // proceses the AJAX request, segments has all the OBX data for each report.
                });
                }
                else {
                    email = "";
                }

                finishReportSetup(email);

                }
                else {
                    $("#reportselectorwrapper").html('<span id="noreports">There are no reports for this study</span>');
                }

            }
          });
    }

</script>

