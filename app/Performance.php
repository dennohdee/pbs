<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    //
    protected $fillable = [
        'staff_id','points'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }
}
