<?php

namespace App\Http\Controllers;

use App\Videopembelajaran as VideoPembelajaranDB;
use App\Matapelajaran as MataPelajaranDB;
use Illuminate\Http\Request;

class VideopembelajaranController extends Controller
{
	public function index()
	{
		$data 	= VideoPembelajaranDB::orderBy('id', 'desc')->get();
		$mapel 	= MataPelajaranDB::orderBy('id', 'desc')->get();
		return view('video_pembelajaran.index', compact('data','mapel'));
	}

	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		$request->validate([
			'nama_video' 	=> 'required|unique:videopembelajarans',
			'file_video'	=> 'required|mimes:mp4,m4a,mkv|max:2048',
		]);

		// file upload
		$file_video 	= $request->file('file_video');
		$rename_file 	= 'modul_' . uniqid() . '_' . str_slug($file_video->getClientOriginalName()) . '.' .$file_video->getClientOriginalExtension();
		$file_video->move(public_path('video'), $rename_file);
		
		$form_data = array(
            'matapelajaran_id' 	=> $request->matapelajaran_id,
			'nama_video' 		=> $request->nama_video,
			'file_video' 		=> $rename_file,
		);
		VideoPembelajaranDB::create($form_data);

		return redirect()->back()->with('success','Video Pembelajaran '.$request->nama_video.' Berhasil Diinputkan.');
	}

	public function show(Videopembelajaran $videopembelajaran)
	{
		//
	}

	public function edit(Videopembelajaran $videopembelajaran)
	{
		//
	}

	public function update(Request $request, Videopembelajaran $videopembelajaran)
	{
		//
	}

	public function destroy(Videopembelajaran $videopembelajaran)
	{
		//
	}
}
