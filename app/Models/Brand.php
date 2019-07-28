<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\commonModelFunctions;

class Brand extends Model
{

	use commonModelFunctions;

	public $timestamps = false;

	protected $fillable = ['name'];

    public function types(){

		return $this->belongsToMany(Type::class);

	}

}
