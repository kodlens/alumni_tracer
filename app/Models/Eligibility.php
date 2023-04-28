<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;
    protected $table ='eligibilities';

    protected $primaryKey ='eligibility_id';

    protected $fillable = [
        

        'user_id',
        'eligible',
        'date_acquired',
        'rating',
        'license_id',
        
    
    ];
}
