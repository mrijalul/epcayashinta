<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matapelajaran as MataPelajaranDB;
use App\Soallatihanessay as SoalEssayDB;
use App\Soallatihanessayjawaban as EssayJawabanDB;
use Illuminate\Support\Facades\Auth;

class SoallatihanessayController extends Controller
{
	public function index($id)
	{
		$data 	= MataPelajaranDB::find($id);
		// dd($data);
		$jawab 	= EssayJawabanDB::with('soalEssay')->where('user_id','=',Auth::user()->id)->where('matapelajaran_id','=',$data->id)->get();
		if ($jawab->count() == 0) {
			$essays = SoalEssayDB::where('matapelajaran_id','=',$data->id)->get();
			return view('soal_latihan.essay.index',compact('data','essays'));
		}else{
			$essays = SoalEssayDB::where('matapelajaran_id','=',$data->id)->with('jawabanEssay')->get();
			return view('soal_latihan.essay.jawaban', compact('essays','data'));
		}
	}

	public function submitsoalessay($id, Request $request)
	{
		// dd($id);
		foreach ($request->pertanyaan as $key => $value) {
			SoalEssayDB::create([
				'pertanyaan' 		=> $request->pertanyaan[$key],
				'matapelajaran_id' 	=> $id
			]);
		}
		return redirect()->route('soal.latihan.essay.index',$id);
	}

	public function submitjawabanessay($id, Request $request)
	{
		foreach ($request->aidi as $key => $value) {
			EssayJawabanDB::create([
				'user_id' 				=> Auth::user()->id,
				'soallatihanessay_id'	=> $request->aidi[$key],
				'matapelajaran_id'		=> $id,
				'jawaban_essay'			=> $request->jawaban_essay[$key],
			]);
		}
		return redirect()->route('soal.latihan.index');
	}
}
