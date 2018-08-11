<?php

namespace App\Models;
use App\Models\Lesson;
use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function lessons()
	{
		return $this->morphByMany(Lesson::class,'tagable');
	}

	public function forums()
	{
		return $this->morphByMany(Forum::class,'tagable');
	}
}