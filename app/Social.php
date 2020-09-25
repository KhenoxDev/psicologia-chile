<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $table = 'social';

	public function type()
	{
		return $this->hasOne('App\SocialType', 'id', 'type_id');
	}
}
