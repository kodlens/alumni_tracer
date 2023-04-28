<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table ='addresses';

    protected $primaryKey ='address_id';

    protected $fillable = [
        'user_id',
        'country_boarding',
        'province_boarding',
        'city_boarding',
        'district_boarding',
        'brgy_boarding',
        'zipcode_boarding',
        //work
        'country_work',
        'province_work',
        'city_work',
        'district_work',
        'brgy_work',
        'zipcode_work',
        //perm
        'country_perm',
        'province_perm',
        'city_perm',
        'district_perm',
        'brgy_perm',
        'zipcode_perm',
    
    ];
}
