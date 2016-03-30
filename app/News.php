<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
	use SoftDeletes;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guarded = [];
    protected $fillable = [
        'title',
        'report'
    ];

    // public function img()
    // {
    //     return $this->hasMany(img::class);
    // }

    public function scopeID($query){
        return $query->where('id', '>', '0');
    }

    public function scopeDeleted($query){
        return $query->where('deleted_at', '>', 'NULL');
    }
}
