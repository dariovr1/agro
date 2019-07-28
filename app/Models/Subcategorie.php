<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
   public $timestamps = false;
   protected $fillable = ['name',"categories_id"];
}
