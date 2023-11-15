<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
    use HasFactory;
    public function getData()
    {
        return $this->belongsTo(category::class, 'category_type', 'id');
    }
    protected $fillable = [
        'category_type',
        'date',
        'price',
        'description',
    ];
}
