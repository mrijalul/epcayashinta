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

	public function store(Request $request)
	{
		$request->validate([
			'nama_video' 	=> 'required|unique:videopembelajarans',
			'file_video'	=> 'mimes:mp4,m4a,mkv|max:51200',
		]);
		//jika data file video ada
		if ($request->has('file_video')) {
		
			// file upload
			$file_video 	= $request->file('file_video');
			$rename_file 	= 'video_' . uniqid() . '_' . str_slug(str_replace($file_video->getClientOriginalExtension(),'',$file_video->getClientOriginalName())) . '.' .$file_video->getClientOriginalExtension();
			$file_video->move(public_path('video'), $rename_file);

			//input ke database
			$form_data = array(
				'nama_video' 		=> $request->nama_video,
				'file_video' 		=> $rename_file
			);
		}else {
			//input ke database
			$form_data = array(
				'nama_video' 		=> $request->nama_video,
				'link_ytb'			=> $request->link_ytb
			);
		}
		VideoPembelajaranDB::create($form_data);

		return redirect()->back()->with('success','Video Pembelajaran '.$request->nama_video.' Berhasil Diinputkan.');
	}
}
