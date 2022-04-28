<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table="department";

    protected $fillable = [
        'department_id',
    ];
     //public $timestamps=false;
    protected $primaryKey='department_id';
    
}
