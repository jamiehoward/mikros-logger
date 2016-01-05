<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	protected $fillable = ['project_id', 'data'];

    public function project() {
		return $this->hasOne('App\Project');
	}
}
