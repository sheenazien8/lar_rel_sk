<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function tags()
	{
		return $this->morphToMany(Tag::class,'tagable');
	}
}