<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // nadpisanie domyslnych wartosci 
    // zeby ten model urzyl tej tabeli z bazy danych 
    protected $table = 'categories';

    //
    public function posts()
        {
            return $this->hasMany('App\Post');
        }
    
}
