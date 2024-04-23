<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sms_billing extends Model
{
    use HasFactory;
    public $table = 'sms_billing';
    public $timestamps = false;
}
