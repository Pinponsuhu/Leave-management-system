<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $fillable = ['picture','admin_level','username','fullname','phone_number','email','password','date_of_birth'];

    protected $hidden = ['password'];
}
