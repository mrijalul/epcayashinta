<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawabanpilgan extends Model
{
    protected $table 	= 'jawabanpilgans'; 
    protected $fillable = ['matapelajaran_id','user_id','soallatihanpilgan_id','user_answer','question','right_answer','nilai'];
    public function matpeljrn()
    {
        return $this->belongsTo(Matapelajaran::class,'matapelajaran_id');
    }
    public useranswer(){
    	return $this->belongsTo(User::class,'user_id');
    }
}
