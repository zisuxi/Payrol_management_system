<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_name',
        'emp_no',
        'emp_email',
        'emp_address',
        'emp_city',
        'emp_state',
        'emp_country',
        'emp_department',
        'emp_join_date',
        'emp_contract_period',
        'emp_sallery',
    ];
}
