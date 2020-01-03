<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable = [
        'message','type','admin_id','user_id','status'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }
}
