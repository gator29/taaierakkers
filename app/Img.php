<?php

namespace App;

use App\Story;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    public $table = "img";

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
