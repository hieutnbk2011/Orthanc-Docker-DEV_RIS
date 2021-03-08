<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use \DB;

class DatabaseFactory

{

    public static function getOrderPriorities ($selected = null) {

    	$query = "SELECT * from order_priorities ORDER BY id";
        $fetch = DB::connection('mysql2')->select($query,[]);
        $priority = '<option disabled selected value="">Select option</option>';
        foreach ($fetch as $row) {
            $priority .= '<option value="' . $row->hl7_code . '"';
            if ($selected == $row->hl7_code) {
                $priority.= ' selected';
            }
            $priority.= '>' . $row->text . '</option>';
        }
        Log::info($priority);
        return $priority;

    }
    public static function getReferrersSelectList($identifier) {

        $query = "SELECT * from referring_physician ORDER BY lname";
        $referrers = DB::connection('mysql2')->select($query,[]);
    	Log::info($referrers);
    	$html ="";
        foreach ($referrers as $row) {

            $html .= '<option value="' . $row->identifier . '"';
            if ($identifier == $row->identifier) $html .= "selected";
            $html .= '>'. $row->identifier . '-' . $row->lname . '^' . $row->fname . '</option>';

        }
        return $html;
    }

    public static function getAppointentsByAccessionNumber($accession_number) {

        $query = 'SELECT id from appointments WHERE accession_number = ?';
        $params = [$accession_number];
        $result = DB::connection('mysql2')->select($query,$params);
        return $result;

    }

    public static function getDeviceList () {

		$query = 'SELECT id, device_id, device_name, modality, scheduled_station_aetitle from calendars WHERE device = 1 AND active = 1';
		$result = DB::connection('mysql2')->select($query,[]);
        return $result;
    }

    public static function getExamList() {

		$query = "SELECT * from exams ORDER BY 'cpt'";
		$result = DB::connection('mysql2')->select($query,[]);
        return $result;

    }

}
?>

