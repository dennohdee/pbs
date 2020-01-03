<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    //
    protected $fillable = [
        'points','user_id','admin_id'
    ];
    public function trace()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}