<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name',
		'id',
		'tag_id',
		'article_id'
	];

	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}
}
