<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenses extends AppModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "licenses";

    protected $fillable = ['state_id', 'license_number', 'expiration_date', 'license_status'];

    protected $dates = ['created_at', 'modified_at'];


    /**
     * Populate expiring licenses within 30 days of the current date
     * 
     * @param  Object       instance of Eloquent get result
     * @return Array        multidimelsional array results of expiring licenses
     */
    public static function get_expiring_licenses($licenses)
    {
        $expiring_licenses = null;

        // check for expiring licenses
        if ($licenses->count()) {
            $i = 0;

            foreach ($licenses->get() as $license) {
                $difference = strtotime($license->expiration_date) - strtotime(date('Y-m-d'));
                $days = floor($difference / (60*60*24) );

                if ($days >= 0 and $days <= 30) {
                    $expiring_licenses[$i]['name']            = $license->name;
                    $expiring_licenses[$i]['license_number']  = $license->license_number;
                    $expiring_licenses[$i]['expiration_date'] = $license->expiration_date;

                    $i++;
                }
            }
        }

        return $expiring_licenses;
    }
}
