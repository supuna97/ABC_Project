<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admins';

    protected $primaryKey = 'a_id';

    protected $fillable = [
        'a_name','a_email','a_password','remember_token'
    ];
}
