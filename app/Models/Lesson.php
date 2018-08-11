<?php

namespace App\Models;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function tags()
	{
		return $this->morphToMany(Tag::class,'tagable');
	}
}