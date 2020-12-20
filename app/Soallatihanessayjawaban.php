<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soallatihanessayjawaban extends Model
{
    protected $fillable = ['user_id','soallatihanessay_id','matapelajaran_id','pertanyaan','jawaban_essay','nilai'];
}
