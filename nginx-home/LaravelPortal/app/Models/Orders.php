<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $priority
 * @property string     $accession_number
 * @property string     $patientid
 * @property string     $ourstatus
 * @property string     $requested_procedure_id
 * @property string     $coded_exam
 * @property string     $coding_scheme
 * @property string     $StudyInstanceUID
 * @property string     $message
 * @property string     $patient_fname
 * @property string     $patient_lname
 * @property string     $patient_mname
 * @property string     $patient_name
 * @property Date       $patient_birth_date
 * @property string     $patient_sex
 * @property string     $referring_physician
 * @property string     $referring_physician_id
 * @property string     $sending_facility
 * @property string     $modality
 * @property string     $description
 * @property string     $scheduled_station_aetitle
 * @property int        $calendar_id
 * @property Date       $scheduled_procedure_step_start_date
 * @property string     $indication
 * @property int        $exam_length
 * @property DateTime   $timestamp
 * @property int        $orderedbyuser_id
 * @property string     $orderbyuser_name
 * @property string     $related_employment
 * @property string     $related_auto
 * @property string     $related_otheraccident
 * @property string     $related_emergency
 * @property string     $related_drugs
 * @property Date       $related_pregnancy
 * @property string     $employed
 * @property string     $employed_student
 * @property string     $employed_other
 * @property Date       $illness_date
 * @property string     $apptid
 */
class Orders extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'priority', 'accession_number', 'patientid', 'ourstatus', 'requested_procedure_id', 'coded_exam', 'coding_scheme', 'StudyInstanceUID', 'message', 'patient_fname', 'patient_lname', 'patient_mname', 'patient_name', 'patient_birth_date', 'patient_sex', 'referring_physician', 'referring_physician_id', 'sending_facility', 'modality', 'description', 'scheduled_station_aetitle', 'calendar_id', 'scheduled_procedure_step_start_date', 'scheduled_procedure_step_start_time', 'indication', 'exam_length', 'timestamp', 'orderedbyuser_id', 'orderbyuser_name', 'related_employment', 'related_auto', 'related_otheraccident', 'related_emergency', 'related_drugs', 'related_pregnancy', 'employed', 'employed_student', 'employed_other', 'illness_date', 'apptid', 'priorauth'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'priority' => 'string', 'accession_number' => 'string', 'patientid' => 'string', 'ourstatus' => 'string', 'requested_procedure_id' => 'string', 'coded_exam' => 'string', 'coding_scheme' => 'string', 'StudyInstanceUID' => 'string', 'message' => 'string', 'patient_fname' => 'string', 'patient_lname' => 'string', 'patient_mname' => 'string', 'patient_name' => 'string', 'patient_birth_date' => 'date', 'patient_sex' => 'string', 'referring_physician' => 'string', 'referring_physician_id' => 'string', 'sending_facility' => 'string', 'modality' => 'string', 'description' => 'string', 'scheduled_station_aetitle' => 'string', 'calendar_id' => 'int', 'scheduled_procedure_step_start_date' => 'date', 'indication' => 'string', 'exam_length' => 'int', 'timestamp' => 'datetime', 'orderedbyuser_id' => 'int', 'orderbyuser_name' => 'string', 'related_employment' => 'string', 'related_auto' => 'string', 'related_otheraccident' => 'string', 'related_emergency' => 'string', 'related_drugs' => 'string', 'related_pregnancy' => 'date', 'employed' => 'string', 'employed_student' => 'string', 'employed_other' => 'string', 'illness_date' => 'date', 'apptid' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'patient_birth_date', 'scheduled_procedure_step_start_date', 'timestamp', 'related_pregnancy', 'illness_date'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
