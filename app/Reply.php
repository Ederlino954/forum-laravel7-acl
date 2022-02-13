<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $fillable = ['reply', 'user_id'];

	public function thread()
	{
		return $this->belongsTo(Thread::class);
	}

	public function user() //{{ $reply->user->name }} na view show em threads
	{
		return $this->belongsTo(User::class);
	}
}
