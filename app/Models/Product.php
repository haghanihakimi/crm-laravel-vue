<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'brand_id',
        'name',
        'sku', 
        'description',
        'price',
        'sale_price',
    ];

    public function invoices () {
        return $this->belongsTo(InvoiceOrder::class, 'product_id');
    }

    public function brands () {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function scopeSearch ($query, $input) {
        return $query->where('name', 'LIKE', '%' .$input. '%')
        ->orWhere('sku','LIKE', '%'.$input.'%');
    }
}
