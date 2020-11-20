<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $table    = 'matapelajarans';
    protected $fillable = ['matpel','slug'];
}
