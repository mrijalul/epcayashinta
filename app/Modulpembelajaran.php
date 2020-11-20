<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulpembelajaran extends Model
{
    protected $table    = 'modulpembelajarans';
    protected $fillable = ['matapelajaran_id','nama_modul','file_modul'];
}
