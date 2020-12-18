<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matapelajaran as MataPelajaranDB;
use App\Soallatihanpilgan as PilihanGanda;

class SoallatihanController extends Controller
{
	public function index()
	{
		$data = MataPelajaranDB::orderBy('id', 'desc')->get();
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

		return redirect()->route('soal-latihan.show',$data->id)->with('success','Mata Pelajaran '.$request->matpel.' Berhasil Diinputkan.');
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
}
