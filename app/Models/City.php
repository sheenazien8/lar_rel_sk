<?php

namespace App\Models;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	// mengakses forum berdasarkan city id yang dipunyai user
	public function forums()
	{
		/*
		Params1 => Yang mau diakses
		Params2 => Perantara
		*/
		return $this->hasManyThrough(Forum::class,User::class);
	}
}