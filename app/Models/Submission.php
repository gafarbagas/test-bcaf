<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_code',
        'name',
        'identity_number',
        'birthdate',
        'marriage_status',
        'partner_name',
        'partner_identity_number',  
        'dealer',
        'vehicle_brand',
        'vehicle_model',
        'vehicle_type',
        'vehicle_color',
        'vehicle_price',
        'insurance',
        'down_payment',
        'installment_time',
        'installment_amount',
    ];
}
