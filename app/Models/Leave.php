<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','status', 'employee_id','leave_type','from','to','approved_by','approved_on','note'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Attachment(){
        return $this->hasMany(LeaveAttachments::class);
    }
}
