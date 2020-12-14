<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soallatihanessay extends Model
{
    protected $fillable = ['matapelajaran_id','pertanyaan'];

    public function jawabanEssay()
    {
        return $this->hasOne('App\Soallatihanessayjawaban','soallatihanessay_id');
    }
}
