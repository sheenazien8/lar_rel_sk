<?php

namespace App\Models;
use App\Models\Passport;
use App\Models\Forum;
use App\Models\Lesson;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  public function passport()
  {
		return $this->hasOne(Passport::class);
	}

	public function forums()
	{
		return $this->hasMany(Forum::class);
	}

	public function lessons()
	{
		return $this->belongsToMany(Lesson::class);
	}
}
