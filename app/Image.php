<?php

namespace App;

use App\User;
use App\Album;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $guarded = ['id'];
    
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function album()
	{
		return $this->belongsTo(User::class);
	}
}
