<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string     $modality
 * @property string     $type
 * @property boolean    $active
 * @property string     $url
 * @property string     $body_part
 * @property string     $subspecialty
 * @property string     $indication
 * @property string     $description
 * @property string     $markup_html
 * @property string     $markup_xml
 * @property string     $markup_xslt
 * @property string     $radlex_designator
 */
class ReportTemplates extends Model
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
    protected $table = 'report_templates';

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
        'modality', 'type', 'active', 'radreport_id', 'url', 'body_part', 'subspecialty', 'indication', 'description', 'markup_html', 'markup_xml', 'markup_xslt', 'radlex_designator'
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
        'modality' => 'string', 'type' => 'string', 'active' => 'boolean', 'url' => 'string', 'body_part' => 'string', 'subspecialty' => 'string', 'indication' => 'string', 'description' => 'string', 'markup_html' => 'string', 'markup_xml' => 'string', 'markup_xslt' => 'string', 'radlex_designator' => 'string'
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
