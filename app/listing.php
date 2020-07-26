<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    protected $guarded =[];
    public $timestamps = false;

    protected $hidden = [
        'user_id'
    ];

    public function path()
    {
        return url("/listings/".$this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
