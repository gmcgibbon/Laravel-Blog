<?php

use Carbon\Carbon;

/**
 * Post Eloquent Model
 * 
 * Post table object mapping
 */
class Post extends Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * Define accessible fileds
	 *
	 */
	protected $fillable = array('title', 'content');

	/**
	 * Get created at attribute date formatted
	 * 
	 * @param attr attribute value to format
	 * 
	 * @return formatted created at date string
	 */
	public function getCreatedAtAttribute($attr)
	{

		return Carbon::parse($attr)->format(DATE_FORMAT);
	}

	/**
	 * Get updated at attribute date formatted
	 * 
	 * @param attr attribute value to format
	 * 
	 * @return formatted updated at date string
	 */
	public function getUpdatedAtAttribute($attr)
	{

		return Carbon::parse($attr)->format(DATE_FORMAT);
	}

}
