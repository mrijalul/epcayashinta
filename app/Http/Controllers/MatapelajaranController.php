<?php

namespace App\Http\Controllers;

use App\Matapelajaran as MataPelajaranDB;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
	public function index()
	{
		$data = MataPelajaranDB::orderBy('id', 'desc')->get();
		return view('matpel.index', compact('data'));
	}

	public function create()
	{
		//
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

	public function show(Matapelajaran $matapelajaran)
	{
		//
	}

	public function edit(Matapelajaran $matapelajaran)
	{
		//
	}

	public function update(Request $request, Matapelajaran $matapelajaran)
	{
		//
	}

	public function destroy(Matapelajaran $matapelajaran)
	{
		//
	}
}
