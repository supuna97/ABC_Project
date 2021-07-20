<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesManager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'salesmanagers';

    protected $primaryKey = 'sm_id';

    protected $fillable = [
        'sm_name','sm_email','sm_password','remember_token'
    ];
}
