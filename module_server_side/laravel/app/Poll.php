<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded = [];

    protected $with = ['choices'];

    protected $hidden = ['user', 'updated_at'];

    protected $appends = ['creator'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCreatorAttribute()
    {
        return $this->user->username;
    }
}
