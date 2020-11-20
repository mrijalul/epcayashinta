<?php

namespace App\Http\Controllers;

use App\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Matapelajaran::orderBy('id', 'desc')->get();
        return view('matpel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matpel' => 'required|unique:matapelajarans'
		]);
		
		$data = new Matapelajaran;
		$data->matpel = $request->matpel;
		$data->slug = str_slug($request->matpel);
		$data->save();

		return redirect()->back()->with('success','Mata Pelajaran '.$request->matpel.' Berhasil Diinputkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matapelajaran  $matapelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Matapelajaran $matapelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matapelajaran  $matapelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Matapelajaran $matapelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matapelajaran  $matapelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matapelajaran $matapelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matapelajaran  $matapelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matapelajaran $matapelajaran)
    {
        //
    }
}
