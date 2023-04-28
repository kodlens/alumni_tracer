<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table ='educations';

    protected $primaryKey ='education_id';

    protected $fillable = [
        'user_id',
        'level',
        'school_name',
        'remark',
        'unit',
        'year_graduated',
    
    ];
}
