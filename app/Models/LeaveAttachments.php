<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveAttachments extends Model
{
    use HasFactory;

    protected $table ='leave_attachments';

    protected $primaryKey = 'id';

    protected $fillable = ['attachment','leave_id'];

    public function Leave(){
        return $this->belongsTo(Leave::class);
    }
}
