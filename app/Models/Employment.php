<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $table ='employments';

    protected $primaryKey ='employment_id';

    protected $fillable = [
        'user_id',
        'is_employed',
        'organization',
        'designation',
        'year_from',
        'year_to',
         'current_job', 
         'employment_type', 
         'occupation_type', 
         'is_first_job',
        'work_category', 
        'take_job', 
        'monthly_range', 
        'leaving_job', 
        'find_job', 
        'satisfy_job', 
        'growth',
        'degree_earned'
    ];


    public function user(){
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }

}
