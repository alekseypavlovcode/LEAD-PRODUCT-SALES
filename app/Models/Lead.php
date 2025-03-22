<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected $primaryKey = 'lead_id';

    protected $fillable = [
        'date',
        'sale_id',
        'product_id',
        'phone',
        'lead_name',
        'city'
    ];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
