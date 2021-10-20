<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use SoftDeletes;
    protected $table = "agencies";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * [getLogoAttribute description]
     * @param [type] $value [description]
     */
    public function getLogoAttribute($value)
    {
        if (!empty($value) && file_exists("storage/agency_logo/$value")) {
            return asset("storage/agency_logo/$value");
        } else {
            return asset("storage/logo.png");
        }
    }
}
