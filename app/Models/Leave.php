<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';

    protected $primaryKey = 'id';

    protected $fillable = ['leave_type','marital','school','date_app','designation','level','date_designation','date_last','date_due','date_commence','date_end','details','approved_by','status','user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Attachment(){
        return $this->hasMany(LeaveAttachments::class);
    }
}
