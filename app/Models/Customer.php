<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country_id',
        'first_name',
        'surname',
        'gender',
        'email',
        'phone',
        'company',
        'street',
        'city',
        'postcode',
        'state',
        'country',
    ];

    public function countries () {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function scopeAnalytics ($query) {
        return $query->whereBetween('created_at', [now()->subMonth(1), now()])->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
    }

    public function scopeSearch ($query, $input) {
        return $query->where('phone', 'LIKE', '%' .$input. '%')
        ->orWhere('email', 'LIKE', '%'.$input.'%');
    }

    public function scopeFindDuplicateCustomer ($query, $input) {
        return $query->where('email', $input->email)
        ->orWhere('phone', 'RLIKE', '[[:<:]]'.$input->phone);
    }
}
