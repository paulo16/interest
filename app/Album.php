<?php

namespace App;

use App\Image;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $guarded = ['id'];

	public function images()
	{
		return $this->hasMany(Image::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}



}
