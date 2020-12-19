<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matapelajaran as MataPelajaranDB;
use App\Soallatihanpilgan as PilihanGanda;
use App\jawabanpilgan as JawabanPilihanGanda;
use Illuminate\Support\Facades\Auth;

class SoallatihanController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$data 		= MataPelajaranDB::orderBy('id', 'desc')->get();
		return view('soal_latihan.index', compact('data'));
	}
	public function store(Request $request)
	{
		$request->validate([
			'matpel' => 'required|unique:matapelajarans'
		]);
		
		$data = new MataPelajaranDB;
		$data->matpel = $request->matpel;
		$data->slug = str_slug($request->matpel);
		$data->save();

		return redirect()->route('soal-latihan.show',$data->id)->with('success','Soal Latihan untuk Mata Pelajaran '.$request->matpel.' Berhasil Diinputkan.');
	}
	public function show($id)
	{
		$soal_latihan 	= MataPelajaranDB::find($id);
		$pilgan 		= PilihanGanda::where('matapelajaran_id','=',$id)->get();
		return view('soal_latihan.opsi', compact('soal_latihan','pilgan'));
	}
	public function submitsoalpilgan($id,Request $request)
	{
		$request->validate([
			'question'	=> 'required',
			'option1'	=> 'required',
			'option2'	=> 'required',
			'option3'	=> 'required',
			'option4'	=> 'required',
			'option5'	=> 'required',
			'answer'	=> 'required'
		]);
		$data = new PilihanGanda;
		$data->matapelajaran_id = $id;
		$data->question 		= $request->question;
		$data->option1 			= $request->option1;
		$data->option2			= $request->option2;
		$data->option3 			= $request->option3;
		$data->option4 			= $request->option4;
		$data->option5 			= $request->option5;
		$data->answer 			= $request->answer;
		$data->save();
		return redirect()->back();
	}
	public function soalpilihangandasiswa($id)
	{
		$soal_latihan 	= MataPelajaranDB::find($id);
		$pilgan 		= PilihanGanda::where('matapelajaran_id','=',$id)->orderBy('id','asc')->get();
		return view('soal_latihan.soalpilihanganda', compact('soal_latihan','pilgan'));
	}
	public function soalpilihangandasiswasubmit($id, Request $request)
	{
		$no = 0;
		foreach ($request->opsi as $key => $value) {
			if ($request->opsi[$key] == $request->jawaban[$key]) {
				$no = 1;
			}else
			{
				$no = 0;
			}
			// echo $no;
			JawabanPilihanGanda::create([
				'matapelajaran_id' 		=> $id,
				'user_id'				=> Auth::user()->id,
				'soallatihanpilgan_id' 	=> $request->no_soal[$key],
				'user_answer'			=> $request->opsi[$key],
				'question'				=> $request->soal[$key],
				'right_answer'			=> $request->jawaban[$key],
				'nilai'					=> $no
			]);
		}
		return redirect()->route('soal.latihan.siswa.hasil',[$id,Auth::user()->id]);
	}

	public function hasil($id, $user_id, Request $request)
	{
		$user_id 	= Auth::user()->id;
		$data 		= JawabanPilihanGanda::where([
						['matapelajaran_id',$id],
						['user_id',$user_id]
					])->get();
		$total_soal = PilihanGanda::where('matapelajaran_id','=',$id)->count();
		$sum 		= JawabanPilihanGanda::where([
						['matapelajaran_id',$id],
						['user_id',$user_id]
					])->sum('nilai');
		$nilai_saya = 100 / $total_soal * $sum;
		return view('soal_latihan.pilgan.hasil', compact('data','total_soal','nilai_saya'));
	}
}
