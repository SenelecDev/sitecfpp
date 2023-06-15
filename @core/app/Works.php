<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'works';
    protected $fillable = ['title','lang','categories_id','start_date','end_date','location','clients','description','image','slug','meta_title','meta_tags','meta_description','gallery','status'];

    public function getCategoriesIdAttribute($value){
        return unserialize($value);
    }
}
