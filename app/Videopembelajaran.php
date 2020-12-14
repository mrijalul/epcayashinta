<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videopembelajaran extends Model
{
    protected $table    = 'videopembelajarans';
    protected $fillable = ['nama_video','file_video','link_ytb'];
}
