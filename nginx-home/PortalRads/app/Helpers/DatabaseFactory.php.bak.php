<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use \DB;

class DatabaseFactory

{

    public static function getReferrersBy_ID_Email_SortBy($identifier = null, $email = null, $sort = "lname") {

        if ($identifier == null  && $email == null) {  // both null, get all
         $parameters = [$sort];
         $query = "SELECT * from referring_physician ORDER BY ?";
        }
        else if ($identifier == null  && $email != null) {  // just an email, return false or the identifer
            $parameters = [$email, $sort];
            $query = "SELECT * from referring_physician WHERE email = ? ORDER BY ?";
        }
        else {  // just an identifier or both set, just check for the identifier.

         $query = "SELECT * from referring_physician WHERE identifier = ? ORDER BY ?";
         $parameters = [$identifier, $sort];
        }
        $referrers = DB::connection('mysql2')->select($query,$parameters);
        Log::info($referrers);
		return $referrers;

    }

    public static function deletetablerowbyKeyValue($table, $key, $value) {

        $query = 'DELETE FROM ' . $table . ' WHERE ' . $key . ' = ?';
        $parameters = [$value];
        $stmt = self::checkErrors($query, $parameters);
        return $stmt->rowCount();
    }

    public static function insertarray($table, $array, $omitarray = null){  // passing in the object or array, table and items to omit,  adding new patient / row in database
		if (gettype($array) != "array") $array = (array)$array;
        $parameters = [];
        foreach($array as $k => $v){
        if  ($omitarray == null || !in_array($k, $omitarray)) {
          $col[] = $k;
          $parameters[] = $v;
          $val[] ="?";
          }
        }
        $query = ('INSERT INTO '. $table.' ('.implode(', ', $col).') VALUES ('.implode(', ', $val).')' );
        $stmt = self::checkErrors($query, $parameters);
        return self::$conn->lastInsertId();  // returns the last auto_increment value

    }

    public static function update ($table, $array, $omitarray = null, $WHERE, $WHEREparams)  {

        if (gettype ($array) == "object" ) $array = (array)$array;

        $parameters = [];
        foreach($array as $k => $v){  //iterates through the object name values, skip the MRN so it is never overwritten
        if  ($omitarray == null || !in_array($k, $omitarray)) {
          $parameters [] = $v;
          $fields[] = "" . $k . " = " . "?";
          }
        }
        foreach ($WHEREparams as $param) {
        	$parameters[] = $param;
        }
        $query = 'UPDATE '. $table .' SET '.implode(', ', $fields) . ' ' . $WHERE;
        return self::checkErrors($query, $parameters)->rowCount();

    }

    public static function selectByQuery($query, $parameters) {

        $stmt = self::checkErrors($query, $parameters);
        return $stmt;  // full result as associative array.
    }

    public static function getCarrierById($id) {

        $query = 'SELECT * from insurance_carriers  WHERE id = ?';
        $parameters = [$id];
        $stmt = self::checkErrors($query, $parameters);
        return $stmt;  // full result as associative array.
    }

    public static function getPhoneCountries($selected = null, $option = true, $codetonumber = false) {

        // selected is the one selected, $options is to generate the select list, $codetonumber is to return the number for an ISO code

        if ($option == true) {

        $query = "SELECT * from country_dialing_codes ORDER BY display_order";
        $parameters = [];
		$stmt = self::checkErrors($query, $parameters);
        $dialingcodes = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $result = '<option disabled selected value="">
					Select Country
		</option>';
		foreach ($dialingcodes as $row) {

				$result.= '<option value="' . $row['iso'] . '"';
            if ($selected == $row['iso']) {
                $result.= ' selected';
            }
                $result.= '>' . $row['nicename'] . ' - ' . $row['phonecode'] . ' - ' . $row['iso'] . '</option>';
        }
        return $result;
        }
        // get just one
        else {
        $query = "SELECT phonecode from country_dialing_codes ORDER WHERE iso = ?";
        $stmt = self::checkErrors($query, [$codetonumber]);
        $prefix = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $prefix;
        }

    }

    public static function getProviderType($selected = null) {

    	$query = "SELECT * from provider_types ORDER BY description";
		$stmt = self::checkErrors($query, []);
        $fetch = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $types = '<option disabled selected value="">
					Select option
		</option>';
        foreach ($fetch as $row) {
            $types .= '<option value="' . $row['id'] . '"';
            if ($selected == $row['id']) {
                $types.= ' selected';
            }
            	$suffix = "";
            	if (!empty($row['degree'])) $suffix = ', ' . $row['degree'];
                $types.= '>' . $row['description'] . $suffix .  '</option>';
        }
        return $types;

    }

    public static function getOrderPriorities ($selected = null) {

    	$query = "SELECT * from order_priorities ORDER BY id";
		$stmt = self::checkErrors($query, []);
        $fetch = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $priority = '<option disabled selected value="">
					Select option
		</option>';
        foreach ($fetch as $row) {
            $priority .= '<option value="' . $row['hl7_code'] . '"';
            if ($selected == $row['hl7_code']) {
                $priority.= ' selected';
            }
            $priority.= '>' . $row['text'] . '</option>';
        }
        return $priority;

    }

    public static function getClaimTypes($selected = null) {

    	$query = "SELECT * from claim_types ORDER BY display_order";
		$stmt = self::checkErrors($query, []);
        $fetch = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $types = '<option disabled selected value="">
					Select option
		</option>';
        foreach ($fetch as $row) {
            $types .= '<option value="' . $row['short_code'] . '"';
            if ($selected == $row['short_code']) {
                $types.= ' selected';
            }
                $types.= '>' . $row['description'] .  '</option>';
        }
        return $types;

    }

    public static function getMaritalStatusTypes ($selected = null) {

    	$query = "SELECT * from marital_types";
		$stmt = self::checkErrors($query, []);
        $fetch = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $types = '<option disabled selected value="">
					Select option
		</option>';
        foreach ($fetch as $row) {
            $types .= '<option value="' . $row['hl7_code'] . '"';
            if ($selected == $row['hl7_code']) {
                $types.= ' selected';
            }
        	$types.= '>' . $row['description'] .  '</option>';
        }
        return $types;

    }

    public static function getCountries($selected = null) {

        $query = "SELECT * from countries ORDER BY display_order";
        $stmt = self::checkErrors($query, []);
        $fetchcountries = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $countries = '<option disabled selected value="">
					Select option
		</option>';
        foreach ($fetchcountries as $row) {
            $countries.= '<option value="' . $row['country_iso'] . '"';
            if ($selected == $row['country_iso']) {
                $countries.= ' selected';
            }
                $countries.= '>' . $row['country_name'] . '</option>';
        }
        return $countries;

    }

    public static function getStates($selected = null) {

        $query = "SELECT * from states ORDER BY name";
		$stmt = self::checkErrors($query, []);
        $fetchstates = $stmt->fetchAll(\PDO::FETCH_ASSOC);
         $states = '<option disabled selected value="">
					Select option
		</option>';
        $states .= '<option value="OS">
					Outside Of USA
		</option>';
        foreach ($fetchstates as $row) {
            $states.= '<option value="' . $row['state'] . '"';
            if ($selected == $row['state']) {
                $states.= ' selected';
            }
                $states.= '>' . $row['name'] . '</option>';
        }
        return $states;
    }

    public static function getlicenseTypes($selected = null) {

        $query = "SELECT * from license_types ORDER BY type";
		$stmt = self::checkErrors($query, []);
        $fetchtypes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $types = '<option selected disabled selected value="">
					Select option
		</option>';
        foreach ($fetchtypes as $row) {
            $types.= '<option value="' . $row['type'] . '"';
            if ($selected == $row['type']) {
                $types.= ' selected';
            }
                $types.= '>' . $row['type'] . '</option>';
        }
        return $types;
    }

//     public static function getInsuranceTypes($selected = null) {
//
//         $query = "SELECT * from insurance_types";
//         $parameters = [];
//         $stmt = self::checkErrors($query, $parameters);
//         $fetchtypes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//         $types= '<option disabled selected value="">
// 					Select option
// 		</option>';
//         foreach ($fetchtypes as $row) {
//             $types.= '<option value="' . $row['id'] . '"';
//             if ($selected == $row['id']) {
//                 $types.= ' selected';
//             }
//                 $types.= '>' . $row['type'] . '</option>';
//         }
//         return $types;
//
//     }

    public static function getSpecialties() {

        $query = "SELECT * from specialties ORDER BY specialty";
		$stmt = self::checkErrors($query, []);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getModalities() {

        $query = "SELECT * from modalities ORDER BY modality";
		$stmt = self::checkErrors($query, []);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getExams() {

        $query = "SELECT * from exams ORDER BY cpt, exam_name, group_name";
		$stmt = self::checkErrors($query, []);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getCPTCodeList() {

        $query = "SELECT * from exams_cptcodes ORDER BY cpt, exam_name";
		$stmt = self::checkErrors($query, []);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getExamGroups() {

        $query = "SELECT * from exam_groups ORDER BY name";
		$stmt = self::checkErrors($query, []);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getReaderByContractID($id = null) {

        if ($id == null){
         $parameters = [];
         $query = "SELECT * from telerad_contracts ORDER BY reader_id";
        }
        else {
         $query = "SELECT * from telerad_contracts WHERE id = ?";
         $parameters = [$id];
        }
		$stmt = self::checkErrors($query, $parameters);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public static function getNameSpaceSelect($selected ) {

//     	$namespaces =  (new AMBRAModel)->getNamespaces();  // returns array of namespaces
//     	//print_r($namespaces);
//     	$list = '<option disabled selected value="">
// 					Select option
// 		</option>';
//     	foreach ($namespaces as $namespace) {
//     		$list .= '<option value ="' . $namespace['uuid'] . '"';
//     		if ($selected == $namespace['uuid']) {
//                 $list.= ' selected';
//             }
//             $list.= '>' . $namespace['name'] . '</option>';
//
//
//     	}
    	return "";

    }

    public static function getTaxonomySelect($selected ) {
    	$parameters = [];
    	$query = "SELECT * from taxonomy ORDER BY Classification, Specialization";
    	$stmt = self::checkErrors($query, $parameters);
        $fetchlist = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    	$list = '<option disabled selected value="">
					Select option
		</option>';
    	foreach ($fetchlist as $row) {
    		$list .= '<option value ="' . $row['Code'] . '"';
    		if ($selected == $row['Code']) {
                $list.= ' selected';
            }
            $list.= '>' . $row['Code'] . ' - ' . $row['Classification'] . ' - ' . $row['Specialization'] . '</option>';


    	}
    	return $list;

    }

    public static function getDeviceList () {

		$query = 'SELECT id, device_id, device_name, modality, scheduled_station_aetitle from calendars WHERE device = 1 AND active = 1';
        $stmt = self::checkErrors($query, []);
        return $stmt;  // full result as associative array.
    }

}
?>

