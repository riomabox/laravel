<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koki extends Model
{
    //
    protected $table = "koki";
    protected $fillable = ['nama','kode'];
    
    protected function getRelationshipFromMethod($method)
    {
        $models = parent::getRelationshipFromMethod($method);

        !is_null($models) ?: $models = $this->$method()->newQuery()->getModel();

        return $this->relations[$method] = $models;
    }
    
    public function resep(){
        return $this->hasMany('App\Models\Resep', 'koki_id', 'id'); #return $this->hasMany('App\Models\Resep')
    }

}
