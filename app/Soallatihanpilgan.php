<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soallatihanpilgan extends Model
{
	protected $table 	= 'soallatihanpilgans';
	protected $fillable = ['matapelajaran_id','question','option1','option2','option3','option4','option5','answer'];
}
