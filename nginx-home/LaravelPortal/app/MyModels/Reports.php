<?php
namespace App\MyModels;
use Illuminate\Database\Eloquent\Model;
use \DB;
use \Debugbar;
use Illuminate\Http\Request;
use App\MyModels\DatabaseFactory;
use Illuminate\Support\Facades\Log;
// use App\Actions\Orthanc\UtilityFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Exception;
// use ReallySimpleJWT\Token;
// use App\MyModels\DatabaseFactory;
//session_start();  // need to replace that with the session handler.

class Reports extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * @var array
     */
    protected $fillable = ['HL7_message', 'orthanc_uuid', 'mrn', 'accession_number', 'telerad_contract', 'reader_id', 'newstatus', 'oldstatus', 'datetime', 'htmlreport', 'request'];


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
    private $request;

    public function __construct(Request $request) {

        $this->request = $request;

  	}

	private static function renderComponent($path) {
		// setup mostly for getting css, etc. from <includes.reportheader.blade.php
		return view($path);
	}

  	public static function parseHL7($message) {

        Log::info(" parseHL7");
        Log::info($message);
        $parsemessage = [];
        $segments = explode("\r", $message);  // may have to adjust EDITOS

        foreach ($segments as $segment) {

            $fields = explode("|", $segment);
            $segmentname = $fields[0];
            if ($segmentname == "MSH") $offset = -1;
            else $offset = 0;

            foreach ($fields as $fieldindex => $field) {
                if ($segmentname != "MSH" || $fieldindex != 1) {
                $components = explode("^", $field);
                }
                else {
                $components = [$field];
                }

                foreach ($components as $componentindex => $component) {
                    $parsemessage[$segmentname][$fieldindex + $offset][$componentindex] = $component;
                }
            }
        }
        return $parsemessage;

	}

    public function templateslist()  {

            Debugbar::error($this->request);

           if ($this->request->input('option') == 'getlist') {

            // array of array of reports
            // $templatearray['id'] = $row['id'];
            // $templatearray['description'] = $row['description'];
            // $templatearray['body_part'] = $row['body_part'];
            // $templatearray['subspecialty'] = $row['subspecialty'];
            // $templatearray['modality'] = $row['modality'];

            $responsearray["user"] = Auth::user()->reader_id;
            $templates = $this::getModalityReportTemplates($this->request->input('modality'));
            //   print_r($templates);
            $html = '<option value="">Select a Template</option>';

            foreach ($templates as $template) {

            $html .= '<option value="' . $template['radreport_id'] . '"  data-type= "' . $template['type'] .'" >' . $template['subspecialty'] . " - " . $template['modality'] . " - " . $template['description'] . '</option>';
            }
            $responsearray["selectlist"] =  $html;
            echo json_encode($responsearray);
            }
    }

    public static function choose_template($studyuuid, $templateid) {

        //$conn = DatabaseFactory::getFactory()->getConnection();

        $query = "SELECT uuid, user from study_locks WHERE uuid = ? LIMIT 1";
        $params = [$studyuuid];
        $row = DB::connection('mysql2')->select($query,$params);

        if (count($row) > 0) {

             $user = $row[0]->user;
             $responsearray["user"] = $user;

        }

        $markup = self::getReportById($templateid);
        $responsearray["report"] = $markup;
        //$query="INSERT INTO  study_locks (uuid, user) VALUES (?, ?) ON DUPLICATE KEY UPDATE uuid = uuid";  // adds to table if it doesn't exist.
        //$parameters = [$_POST["uuid"], Session::get('user_id')];
        //$query = "SELECT uuid, user from study_locks WHERE uuid = ? AND user = ? LIMIT 1";
        //$params = [$studyuuid, Auth::user()->reader_id];
        //$row = DB::connection('mysql2')->select($query,$params);
        if (!isset($responsearray["user"])) {

            DB::connection('mysql2')->table('study_locks')->insert([
                'uuid' => $studyuuid,
                'user' => Auth::user()->reader_id
            ]);
            $responsearray["user"] = Auth::user()->reader_id;
        }
        echo json_encode($responsearray);

    }
//     try {
//   $results = \DB::connection("example")
//     ->select(\DB::raw("SELECT * FROM unknown_table"))
//     ->first();
//     // Closures include ->first(), ->get(), ->pluck(), etc.
// } catch(\Illuminate\Database\QueryException $ex){
//   dd($ex->getMessage());
//   // Note any method of class PDOException can be called on $ex.
// }


    public static function getReportById ($id) {

      // html for the report, may have to encode with htmlentities, strips the \n's from the markup in the database, fetches the single row and column
      //$conn = DatabaseFactory::getFactory()->getConnection();
      $query = "SELECT markup_html from report_templates WHERE radreport_id = ?";
      $params = [$id];
      //$stmt = $conn->prepare($query);
      //$stmt->execute($params);
      //$result = $stmt->fetch(PDO::FETCH_ASSOC);
      $result = DB::connection('mysql2')->select($query,$params);
      Debugbar::error($result);
      $result = $result[0]->markup_html;
      return str_replace("\n", '', $result);

    }

    public function getModalityReportTemplates ($modality) {

        // $conn = DatabaseFactory::getFactory()->getConnection();
        // array of array of reports matching the $modality
        $array = array();
        $query = "SELECT * from report_templates WHERE modality = ? OR modality = 'ALL' AND active = 1  ORDER BY subspecialty, description";
        $params = [$modality];
//         $stmt = $conn->prepare($query);
//         $stmt->execute($parameters);
//         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $result = DB::connection('mysql2')->select($query,$params);
        foreach ($result as $row) {
        $templatearray = [];
        $row = (array)$row;
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

    public static function getAllReportsByAccession($accession_number)  {

  		$query = "SELECT * FROM reports WHERE accession_number = ? ORDER BY datetime DESC";
  		$params = [$accession_number];
  		// Log::info("getAllReportsByAccession");
  		$result = DB::connection('mysql2')->select($query,$params);
  		return $result;
  	}

  	 public static function getLastReportStatusByAccession($accession_number)  {

  		$query = "SELECT newstatus FROM reports r1 WHERE datetime = (SELECT MAX(datetime) FROM reports r2 WHERE r1.accession_number = r2.accession_number) AND r1.accession_number = ?";
  		$params = [$accession_number];
  		// $result = DatabaseFactory::selectByQuery($query, $params)->fetchAll(PDO::FETCH_OBJ);
		$result = DB::connection('mysql2')->select($query,$params);
  		if (count($result) == 1) return $result[0];
  		if (count($result) == 0 ) return false;
  		if (count($result) > 1 ) return "error";

  	}
  	// Gets the last report by time, key accession number.

  	public static function getallhl7_reports($accession_number, $lastreport = null)  {


		$reports = self::getAllReportsByAccession($accession_number);
		// Log::info(json_encode($reports));
		$hl7 = [];
		$json = array("user_email" => Auth::user()->email);
		foreach ($reports as $report) {
			$hl7[] = self::parseHL7($report->HL7_message);
		}
		// Log::info(json_encode($hl7));
		$json['hl7'] = $hl7;
		//DatabaseFactory::logVariable($hl7);
		foreach ($hl7 as $key => $value) {

			$segments = $value;
			//$segments['study_date'] = $order->scheduled_procedure_step_start_date;
			//$segments['study_time'] = $order->scheduled_procedure_step_start_time;
			//$segments['study_description'] = $order->description;
			//$segments['modality'] = $order->modality;
			//$segments['indication'] =$order->indication;
			$headerfooter = self::getHeaderFooterFromHL7($segments);
			$json['hl7'][$key]['header'] = $headerfooter['header'];
			$json['hl7'][$key]['footer'] = $headerfooter['footer'];
			$json['hl7'][$key]['body'] = $headerfooter['body'];

		}
		if ($lastreport == null) {
		$_SESSION["jsonmessages"]["HL7"][] = '{"reports":"getallhl7_reports call"}';
			return '{"reports":' .json_encode($json) . '}';
		}
		else return $json["hl7"];

	}

	public static function getHeaderFooterFromHL7($segments) {

		// OBX11 has the observation status.
		$translatestatus = array("P" => "PRELIM", "F" => "FINAL", "C" => "ADDENDUM");
		$MSH = $segments['MSH'];
		$PID = $segments['PID'];
		$OBR = $segments['OBR'];
		// $ORC = $segments['ORC'];
		$OBX = $segments['OBX'];

		$referringphysician = $OBR[16][1] . (!empty($OBR[16][2])?" " . $OBR[16][2]:"") . " " . substr($OBR[16][0], strpos($OBR[16][0], ":") + 1) . " " . $OBR[16][4];
		$referringphysicianid = $OBR[16][0]; // better method to get referrer.
		// put below into config
		$dob = \DateTime::createFromFormat('Ymd', $PID[7][0]);
		(!$dob)?$dob = "Not available":$dob = $dob->format('M-d-Y');

		// $studydate = \DateTime::createFromFormat('YmdHis', $OBR[36][0]);
		if (strlen($OBR[36][0]) == 8) {
		    $studydate = \DateTime::createFromFormat('Ymd', $OBR[36][0]);
		    (!$studydate)?$studydate = "Not available":$studydate = $studydate->format('M-d-Y');
		}
		else if (strlen($OBR[36][0]) == 14) {
		    $studydate = \DateTime::createFromFormat('YmdHis', $OBR[36][0]);
		    (!$studydate)?$studydate = "Not available":$studydate = $studydate->format('M-d-Y H:i:s');
		}
// 		$studydate = \DateTime::createFromFormat('YmdHis', $OBR[36][0]);
// 		(!$studydate)?$studydate = "Not available":$studydate = $studydate->format('M-d-Y H:i:s');

		$reportdate = \DateTime::createFromFormat('YmdHis', $OBX[14][0]);
		(!$reportdate)?$reportdate = "Not available":$reportdate = $reportdate->format('M-d-Y H:i:s');
		$reportheadercss = self::renderComponent("includes.reportheader"); // Config::get("REPORT_CSS")
		$facility = ""; // FacilityModel::letterHeader(Config::get("DEFAULT_FACILITY_ID"), true);

		Log::info("getHeaderFooterFromHL7");
		Log::info($referringphysician);
		Log::info($referringphysicianid);
		Log::info($dob);
		Log::info($studydate);
		Log::info($reportdate);
		Log::info($reportheadercss);
		Log::info("OBR");
		Log::info(json_encode($OBR, JSON_PRETTY_PRINT));
		$patientname = (!empty($PID[5][0] )?$PID[5][0] :"") . ', ' . (!empty($PID[5][1] )?$PID[5][1] :"");

		$header = $reportheadercss . $facility .  '<div id = "reportnoheader"><table id = "header_info">
		<tr>
			<td id="report_name"> Patient Name: ' . $patientname . '</td>
			<td id="report_mrn"> Med Rec Number:  ' . $PID[3][0] . '</td>
			<td rowspan = "6" style="vertical-align:text-top;white-space:break-spaces;width:200px">Indication:  ' . $OBR[13][0]  . '</td>
		</tr>
		<tr>
			<td> DOB: ' . $dob .  '</td>
			<td> Sex: ' . $PID[8][0] .  '</td>
		</tr>
	<tr>
	<td> Accession Number:  '  . $OBR[2][0] .  '</td>
	<td> Date of Exam:  '  . $studydate .  '</td>
	</tr>
	<td> Referring Physician:  '  . $referringphysician .  '</td>
	<td> Referring Physician ID:  '  . $referringphysicianid .  '</td>
	</tr>
	<tr>
	<td> Interpreting Radiologist:  '  . $OBX[16][2] . (!empty($OBX[16][3])?" " . $OBX[16][3]:"") . " " . $OBX[16][1] . " " . $OBX[16][5] .  '<br>Interpreting Radiologist Profile ID:' . $OBX[16][0] . '</td>
	<td> Report Generated:  '  .  $reportdate .  '</td>
	</tr>

	<tr>
	<td colspan= "2"> Read Status:  '  . $translatestatus[$OBX[11][0]] .  '</td>
	</tr>
	</table>';
		$date = \DateTime::createFromFormat('YmdHis', $OBX[14][0]);
		$datetime = $date->format('Y-m-d H:i:s');
		$footer = '<div id = "sigblock">' . $translatestatus[$OBX[11][0]] .
	'<br>Electronically signed:<br><br>Reader Profile:  '  . $OBX[16][0] .  '<br>'  . $OBX[16][2] . (!empty($OBX[16][3])?" " . $OBX[16][3]:"") . " " . $OBX[16][1] . " " . $OBX[16][5] . '<br>'  . $datetime . '</div>';
		$markup['header'] = $header;
		$markup['footer'] = $footer;
		$markup['footer'] .= '<div id = "disclaimer">' . self::renderComponent("includes.reportdisclaimer") . '</div></div>';
		$markup['body'] = '<div class = "htmlmarkup" name="htmlmarkup">' . str_replace("\\.br\\", "<br>", $OBX[5][0]) . '</div>';
		$markup['readername'] = $OBX[16][2] . (!empty($OBX[16][3])?" " . $OBX[16][3]:"") . " " . $OBX[16][1] . " " . $OBX[16][5];
		$markup['readerid'] = $OBX[15][0];


		return $markup;
	}

}  // end of class
