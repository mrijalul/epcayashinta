<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jawabanpilgan as jawabanPilihanGanda;
use App\Soallatihanessayjawaban as JawabanEssay;
use Illuminate\Support\Facades\DB;

class RekapnilaiController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	public function nilai()
	{
		$data = DB::table('jawabanpilgans')
            ->join('matapelajarans', 'jawabanpilgans.matapelajaran_id', '=', 'matapelajarans.id')
            ->join('users', 'jawabanpilgans.user_id', '=', 'users.id')
            ->select('users.name as nama_penjawab','matapelajarans.matpel',DB::raw('sum(nilai) as sums'))
			->groupBy(['matapelajaran_id','user_id'])
			->get();

		return view('rekap_nilai.nilai', compact('data'));
	}
}
