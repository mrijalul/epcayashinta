<?php

namespace App\Http\Controllers;

use App\Matapelajaran as MataPelajaranDB;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		$data = MataPelajaranDB::orderBy('id', 'desc')->get();
		return view('matpel.index', compact('data'));
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

		return redirect()->back()->with('success','Mata Pelajaran '.$request->matpel.' Berhasil Diinputkan.');
	}
}
