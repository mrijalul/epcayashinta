<?php

namespace App\Http\Controllers;

use App\Modulpembelajaran as ModulPembelajaranDB;
use App\Matapelajaran as MataPelajaranDB;
use Illuminate\Http\Request;

class ModulpembelajaranController extends Controller
{
	public function index()
	{
		$data 	= ModulPembelajaranDB::orderBy('id', 'desc')->get();
		return view('modul_pembelajaran.index', compact('data'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'nama_modul' 	=> 'required|unique:modulpembelajarans',
			'file_modul'	=> 'required|mimes:pdf,docs,docx,doc|max:2048',
		]);

		// file upload
		$file_modul 	= $request->file('file_modul');
		$rename_file 	= 'materi_' . uniqid() . '_' . str_slug(str_replace($file_modul->getClientOriginalExtension(),'',$file_modul->getClientOriginalName())) . '.' .$file_modul->getClientOriginalExtension();
		$file_modul->move(public_path('modul'), $rename_file);
		
		$form_data = array(
			'nama_modul' 		=> $request->nama_modul,
			'file_modul' 		=> $rename_file,
		);
		ModulPembelajaranDB::create($form_data);

		return redirect()->back()->with('success','Materi Pembelajaran '.$request->nama_modul.' Berhasil Diinputkan.');
	}

	public function downloadmodul(Request $request,$id)
	{
		$data 	= ModulPembelajaranDB::find($id);
		$files 	= asset('modul').'/'.$data->file_modul;
		return redirect($files);
	}

	public function edit(Modulpembelajaran $modulpembelajaran)
	{
		//
	}

	public function update(Request $request, Modulpembelajaran $modulpembelajaran)
	{
		//
	}

	public function destroy(Modulpembelajaran $modulpembelajaran)
	{
		//
	}
}
