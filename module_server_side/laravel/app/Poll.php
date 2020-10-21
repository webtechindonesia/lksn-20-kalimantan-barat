<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded = [];

    protected $with = ['choices'];

    protected $hidden = ['creator', 'updated_at'];

    protected $appends = ['creator'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
