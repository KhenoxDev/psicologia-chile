<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $table = 'author';

	public function news()
	{
		return $this->hasMany('App\News', 'author_id');
	}
}
