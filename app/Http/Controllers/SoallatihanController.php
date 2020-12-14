<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matapelajaran as MataPelajaranDB;

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
		$soal_latihan = MataPelajaranDB::find($id);
		return view('soal_latihan.opsi', compact('soal_latihan'));
	}
}
