<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['advert_lot_id', 'lot_description', 'advert_id', 'advert_introduction', 'advert_name',  'amount', 'user_id', 'user_name', 'mda_id', 'mda_name', 'transaction_id', 'payment_status', 'payment_date',];

}
