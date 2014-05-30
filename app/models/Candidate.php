<?php

class Candidate extends Eloquent
{   

   use Codesleeve\Stapler\Stapler;

   public function __construct(array $attributes = array()) {
      $this->hasAttachedFile('avatar', [
          'styles' => [
            'medium' => '300x300',
            'thumb' => '100x100'
          ]
      ]);

      parent::__construct($attributes);
  }
	public function post()
	{
		return $this->belongsTo('Post');
	}
}