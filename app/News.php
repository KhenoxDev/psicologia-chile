<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';

	public function author()
	{
		return $this->belongsTo('App\Author', 'author_id', 'id');
	}
}
