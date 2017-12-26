<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class States extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "states";


    public static function get_licenses()
    {
        try {
            $data = null;

            $license_obj = self::select(DB::raw("licenses.id AS license_id, states.id AS state_id, states.name, licenses.license_number, licenses.expiration_date, licenses.license_status"))
                            ->leftJoin('licenses', 'licenses.state_id', '=', 'states.id')
                            ->orderBy('states.name');

            if ($license_obj->count()) {
                $data = $license_obj;
            }

        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }
}
