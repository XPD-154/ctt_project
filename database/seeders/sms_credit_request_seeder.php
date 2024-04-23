<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class sms_credit_request_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sms_credit_requests')
        ->insert([
            'account'=>Str::random(10),
            'credit_amount'=>100000,
            'requesting_staff'=>Str::random(10),
            'authorizing_staff'=>Str::random(10)
        ]);
    }
}
