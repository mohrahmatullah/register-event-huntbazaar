<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class settingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
	        ['param' => 'date_expired', 'param_value' => '2021-05-08 23:59:59']
	    ];

	    Setting::insert($setting);
    }
}
