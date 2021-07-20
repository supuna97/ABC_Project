<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperationManager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'operationmanagers';

    protected $primaryKey = 'om_id';

    protected $fillable = [
        'om_name','om_email','om_password','remember_token'
    ];
}
