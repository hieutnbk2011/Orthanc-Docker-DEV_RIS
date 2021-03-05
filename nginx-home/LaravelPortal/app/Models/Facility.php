<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $name
 * @property string     $address_1
 * @property string     $address_2
 * @property string     $city
 * @property string     $state
 * @property string     $country
 * @property string     $country_code_3
 * @property string     $postal_code
 * @property string     $phone_ctry
 * @property string     $phone
 * @property string     $fax_country
 * @property string     $fax
 * @property string     $website
 * @property string     $email
 * @property string     $facilitylogopath
 * @property string     $google_maps_url
 * @property string     $federal_ein
 * @property boolean    $service_location
 * @property boolean    $billing_location
 * @property string     $facility_currency
 * @property boolean    $accepts_assignment
 * @property int        $pos_code
 * @property string     $x12_sender_id
 * @property string     $attn
 * @property string     $domain_identifier
 * @property string     $facility_npi
 * @property string     $facility_taxonomy
 * @property string     $tax_id_type
 * @property string     $color
 * @property int        $primary_business_entity
 * @property string     $facility_code
 * @property boolean    $extra_validation
 * @property string     $mail_street
 * @property string     $mail_street2
 * @property string     $mail_city
 * @property string     $mail_state
 * @property string     $mail_country
 * @property string     $mail_zip
 * @property string     $oid
 * @property int        $orthanc_host
 */
class Facility extends Model
{

    protected $connection= 'mysql2';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facility';

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
        'name', 'address_1', 'address_2', 'city', 'state', 'country', 'country_code_3', 'postal_code', 'phone_ctry', 'phone', 'fax_country', 'fax', 'website', 'email', 'facilitylogopath', 'google_maps_url', 'federal_ein', 'service_location', 'billing_location', 'facility_currency', 'billing_interest-rate', 'accepts_assignment', 'pos_code', 'x12_sender_id', 'attn', 'domain_identifier', 'facility_npi', 'facility_taxonomy', 'tax_id_type', 'color', 'primary_business_entity', 'facility_code', 'extra_validation', 'mail_street', 'mail_street2', 'mail_city', 'mail_state', 'mail_country', 'mail_zip', 'oid', 'orthanc_host'
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
        'name' => 'string', 'address_1' => 'string', 'address_2' => 'string', 'city' => 'string', 'state' => 'string', 'country' => 'string', 'country_code_3' => 'string', 'postal_code' => 'string', 'phone_ctry' => 'string', 'phone' => 'string', 'fax_country' => 'string', 'fax' => 'string', 'website' => 'string', 'email' => 'string', 'facilitylogopath' => 'string', 'google_maps_url' => 'string', 'federal_ein' => 'string', 'service_location' => 'boolean', 'billing_location' => 'boolean', 'facility_currency' => 'string', 'accepts_assignment' => 'boolean', 'pos_code' => 'int', 'x12_sender_id' => 'string', 'attn' => 'string', 'domain_identifier' => 'string', 'facility_npi' => 'string', 'facility_taxonomy' => 'string', 'tax_id_type' => 'string', 'color' => 'string', 'primary_business_entity' => 'int', 'facility_code' => 'string', 'extra_validation' => 'boolean', 'mail_street' => 'string', 'mail_street2' => 'string', 'mail_city' => 'string', 'mail_state' => 'string', 'mail_country' => 'string', 'mail_zip' => 'string', 'oid' => 'string', 'orthanc_host' => 'int'
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

    // Relations ...
}
