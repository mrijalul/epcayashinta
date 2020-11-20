<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videopembelajaran extends Model
{
    protected $table    = 'videopembelajarans';
    protected $fillable = ['matapelajaran_id','nama_video','file_video'];
}
