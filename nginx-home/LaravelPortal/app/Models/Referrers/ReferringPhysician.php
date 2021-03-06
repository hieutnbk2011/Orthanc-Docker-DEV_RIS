<?php

namespace App\Models\Referrers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use \DB;
use Illuminate\Http\Request;

/**
 * @property string     $identifier
 * @property string     $fname
 * @property string     $lname
 * @property string     $mname
 * @property string     $mobile_phone_country
 * @property string     $mobile_phone
 * @property string     $alt_mobile_phone_country
 * @property string     $alt_mobile_phone
 * @property string     $email
 * @property string     $specialty
 * @property string     $referrer_npi
 * @property string     $address1
 * @property string     $address2
 * @property string     $city
 * @property string     $state
 * @property string     $postal
 * @property string     $country
 * @property string     $main_office_name
 * @property string     $provider_type
 * @property string     $provider_suffix
 * @property string     $taxonomy
 * @property string     $dea_number
 * @property string     $tax_id
 * @property string     $notes
 * @property boolean    $reports_notification
 * @property boolean    $send_reports
 */
class ReferringPhysician extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql2';

/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'referring_physician';

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
        'identifier', 'fname', 'lname', 'mname', 'mobile_phone_country', 'mobile_phone', 'alt_mobile_phone_country', 'alt_mobile_phone', 'email', 'specialty', 'referrer_npi', 'address1', 'address2', 'city', 'state', 'postal', 'country', 'main_office_name', 'provider_type', 'provider_suffix', 'taxonomy', 'dea_number', 'tax_id', 'notes', 'reports_notification', 'send_reports'
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
        'identifier' => 'string', 'fname' => 'string', 'lname' => 'string', 'mname' => 'string', 'mobile_phone_country' => 'string', 'mobile_phone' => 'string', 'alt_mobile_phone_country' => 'string', 'alt_mobile_phone' => 'string', 'email' => 'string', 'specialty' => 'string', 'referrer_npi' => 'string', 'address1' => 'string', 'address2' => 'string', 'city' => 'string', 'state' => 'string', 'postal' => 'string', 'country' => 'string', 'main_office_name' => 'string', 'provider_type' => 'string', 'provider_suffix' => 'string', 'taxonomy' => 'string', 'dea_number' => 'string', 'tax_id' => 'string', 'notes' => 'string', 'reports_notification' => 'boolean', 'send_reports' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    public static function sharelist()

    {       Log::info("sharelist");
        	$query = "SELECT a.*, b.description, b.degree from referring_physician a INNER JOIN provider_types b WHERE a.provider_type = b.id";  // degree
			$params = [];
            $doctors = DB::connection('mysql2')->select($query,$params);
            $selectlist = '<select class = "sharelist" name = "identifier" required style="display:block;margin:auto";><option disabled selected>Choose Doctor</option>';
            foreach ($doctors as $doctor) {
                $selectlist .= '<option value = "' . $doctor->identifier . '">' . $doctor->fname . ' ' . $doctor->lname . ' ' . $doctor->degree . ' ' . $doctor->description . ' ' . $doctor->mobile_phone_country . ' ' . $doctor->mobile_phone . ' ' . $doctor->email . '</option>';

            }
            $selectlist .= '</select>';
            echo $selectlist;
    }

    public static function share(Request $request, $user) {
         Log::info($user);
        // DoctorsModel::shareStudy ($user->doctor_id, $request->input('identifier'), $request->input('uuid'), $request->input('sharenote'));
        echo '{"error":"Not Yet Fully Implemented"}';
    }


    // Relations ...
}
