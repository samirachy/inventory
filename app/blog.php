<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table ='blogs';
    public function category()
    {
        return $this->belongsTo('App\category','categoryID');
    }
}
