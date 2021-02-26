<?
use App\MyModels\Widgets;
use App\Actions\Orthanc\OrthancAPI;
?>
<div id="ris">
<pre>
<?php // sample of dcmdump echo system(Config::get('PATH_DCMTK') . "dcmdump /dicomFiles/source.dcm", $result_code);
?>
</pre>
<pre class = "syntaxHighlighted" id = "syntaxHighlightedRIS"></pre>
<pre class = "syntaxHighlighted" id = "syntaxHighlightedLaravel"></pre>
</div>

<div class = "syntaxHighlighted" id="pacs">
<pre id = "syntaxHighlightedPACS"></pre>
</div>

<div id="sns">

<form id = "snsform">
  <div class="form-row">
    <div class="col">
      <input name = "message" type="text" class="form-control" placeholder="Message" value="This is a Test.">
    </div>
    <div class="col">
      <input name = "phone" type="text" class="form-control" placeholder="Phone" value="+16513130209">
    </div>
  </div>
    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </div>
</form>

</div>

<div id="reporting_tools"></div>

</div>
<script nonce = "">
$(".admins").tabs();

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

$('#snsform').on('submit', function(e) {

	e.preventDefault();

    $.ajax({
       type: "POST",
       url: "/AWS/sendMessage",
       dataType: "json",
       data: $(this).serialize(),
       beforeSend: function(e) {
           $("#spinner").css("display", "block");
       }
   })
   .done(function(data, textStatus, jqXHR) {

       alert(data.status);

   });
});
$("#syntaxHighlightedPACS").html(syntaxHighlight(<?php echo (new OrthancAPI())->getOrthancConfigs("ALL"); ?>));
$("#syntaxHighlightedLaravel").html(syntaxHighlight(<?php echo json_encode( Config::all()); ?>));
$("#syntaxHighlightedRIS").html(syntaxHighlight(<?php echo json_encode( Config::get("myconfigs")); ?>));
</script>
<!--
 Config::get('filename.varname');
 -->
