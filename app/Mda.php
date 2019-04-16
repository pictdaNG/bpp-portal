<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mda extends Model
{
    protected $fillable = ['name', 'profile_pic', 'mda_code', 'mda_shortcode', 'subsector', 'address',
    'email', 'password', 'mandate', 'bank_name', 'bank_account', 'split_percentage'];
}
