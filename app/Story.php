<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';
    protected $dateFormat = 'EU';

    public function img()
    {
        return $this->hasMany(img::class);
    }
}
