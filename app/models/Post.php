<?php

class Post extends Eloquent
{
	public function candidates()
	{
      return $this->hasMany('Candidate');
	}
}