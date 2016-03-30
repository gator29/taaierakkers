<?php

namespace App;

use App\Story;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    public $table = "img";
    // protected $dateFormat = 'EU';
    protected $guarded = [];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
