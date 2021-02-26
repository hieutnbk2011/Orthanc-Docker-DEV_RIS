<?php
namespace App\MyModels;
use \DB;
use \Debugbar;
use Illuminate\Http\Request;
// use App\Actions\Orthanc\UtilityFunctions;
// use Illuminate\Support\Facades\Auth;
// use ReallySimpleJWT\Token;
// use App\MyModels\DatabaseFactory;
//session_start();  // need to replace that with the session handler.

class Reports {


    public $id;
    public $HL7_message;
    public $orthanc_uuid;
    public $mrn;
    public $accession_number;
    public $telerad_contract;
    public $reader_id;
    public $newstatus;
    public $oldstatus;
    public $datetime;
    public $htmlreport;

    public function __construct() {

  	}

    public function templateslist(Request $request)  {

            return true;

            Debugbar::error($request);
            return var_dump($request);
           if (Request::post('option') == 'getlist') {

            // array of array of reports
            // $templatearray['id'] = $row['id'];
            // $templatearray['description'] = $row['description'];
            // $templatearray['body_part'] = $row['body_part'];
            // $templatearray['subspecialty'] = $row['subspecialty'];
            // $templatearray['modality'] = $row['modality'];

            $responsearray["user"] = "none";
            $templates = $this::getModalityReportTemplates(Request::post('modality'));
            //   print_r($templates);
            $html = '<option value="">Select a Template</option>';

            foreach ($templates as $template) {

            $html .= '<option value="' . $template['radreport_id'] . '"  data-type= "' . $template['type'] .'" >' . $template['subspecialty'] . " - " . $template['modality'] . " - " . $template['description'] . '</option>';
            }
            $responsearray["selectlist"] =  $html;
            echo json_encode($responsearray);
            }
    }

    public function getModalityReportTemplates ($modality) {
        return true;
        $conn = DatabaseFactory::getFactory()->getConnection();
        // array of array of reports matching the $modality
        $array = array();
        $query = "SELECT * from report_templates WHERE modality = ? OR modality = 'ALL' AND active = 1  ORDER BY subspecialty, description";
        $parameters = [$modality];
        $stmt = $conn->prepare($query);
        $stmt->execute($parameters);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        $templatearray = [];
        $templatearray['radreport_id'] = $row['radreport_id'];
        $templatearray['type'] = $row['type'];
        $templatearray['description'] = $row['description'];
        $templatearray['body_part'] = $row['body_part'];
        $templatearray['subspecialty'] = $row['subspecialty'];
        $templatearray['modality'] = $row['modality'];
        $array[] = $templatearray;
        }
        return $array;
    }
  	// Gets the last report by time, key accession number.



}  // end of class
