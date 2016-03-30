<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Story extends Model
{

    use SoftDeletes;

    protected $table = 'stories';
    // protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guarded = [];
	protected $fillable = [
        'title',
        'story'
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
