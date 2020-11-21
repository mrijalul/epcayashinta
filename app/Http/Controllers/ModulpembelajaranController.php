<?php

namespace App\Http\Controllers;

use App\Modulpembelajaran as ModulPembelajaranDB;
use App\Matapelajaran as MataPelajaranDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulpembelajaranController extends Controller
{
	public function index()
	{
		$data 	= ModulPembelajaranDB::orderBy('id', 'desc')->get();
		$mapel 	= MataPelajaranDB::orderBy('id', 'desc')->get();
		return view('modul_pembelajaran.index', compact('data','mapel'));
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		$request->validate([
			'nama_modul' 	=> 'required|unique:modulpembelajarans',
			'file_modul'	=> 'required|mimes:pdf,docs,docx,doc|max:2048',
		]);

		// file upload
		$file_modul 	= $request->file('file_modul');
		$rename_file 	= 'modul_' . uniqid() . '_' . str_slug($file_modul->getClientOriginalName()) . '.' .$file_modul->getClientOriginalExtension();
		$file_modul->move(public_path('modul'), $rename_file);
		
		$form_data = array(
            'matapelajaran_id' 	=> $request->matapelajaran_id,
			'nama_modul' 		=> $request->nama_modul,
			'file_modul' 		=> $rename_file,
		);
		ModulPembelajaranDB::create($form_data);

		return redirect()->back()->with('success','Modul Pembelajaran '.$request->nama_modul.' Berhasil Diinputkan.');
	}

	public function downloadmodul(Request $request,$id)
	{
		$data 	= ModulPembelajaranDB::find($id);
		// dd($data);
		$files 	= asset('modul').'/'.$data->file_modul;
		// dd($files);
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
