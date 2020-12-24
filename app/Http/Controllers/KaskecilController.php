<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kaskecil as Kaskecildb;
use App\Pengajuankaskecil as Pengajuankaskecildb;
use App\Akunbukukaskecil as Akunbukukaskecildb;
use App\Listbukukaskecil as Listbukukaskecildb;
use Illuminate\Support\Facades\Auth;

class KaskecilController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        $iduser = $user->id;
        $datakaskecil = Kaskecildb::where('userid',$iduser)->where('hapus',0)->get();
        return view("kaskecil.index", ["datakaskecil" => $datakaskecil]);
    }

    public function tambah(Request $request) {
        
        $user = Auth::user();
        $messages = [
            'nama.required' => 'Nama kas kecil wajib diisi !!!',
            'namaperusahaan.required' => 'Nama Perusahaan wajib diisi !!!',
            'periode.required' => 'Periode kecil wajib diisi !!!'
        ];
        $this->validate($request,[
            'nama' => 'required',
            'namaperusahaan' => 'required',
            'periode' => 'required'
        ],$messages);
        $kaskecilbaru = new Kaskecildb;
        $kaskecilbaru->nama = $request->get('nama');
        $kaskecilbaru->namaperusahaan = $request->get('namaperusahaan');
        $kaskecilbaru->periode = $request->get('periode');
        $kaskecilbaru->userid = $user->id;
        $kaskecilbaru->saldo = 0;
        $kaskecilbaru->hapus = 0;
        $kaskecilbaru->save();


        return redirect()->route('kaskecil')->with('status', 'Kas Kecil Berhasil Dibuat');
    }

    public function editkaskecil($id) {
        $editdata = Kaskecildb::findOrFail($id);
        return view("kaskecil.editkaskecil", ["data" => $editdata,"menukaskecil"=>$id]);
    }

    public function konfirmasieditkaskecil($id,Request $request) {
        $messages = [
            'nama.required' => 'Nama kas kecil wajib diisi !!!',
            'namaperusahaan.required' => 'Nama Perusahaan wajib diisi !!!',
            'periode.required' => 'Periode kecil wajib diisi !!!'
        ];
        $this->validate($request,[
            'nama' => 'required',
            'namaperusahaan' => 'required',
            'periode' => 'required'
        ],$messages);
        $editdata = Kaskecildb::findOrFail($id);
        $editdata->nama = $request->get('nama');
        $editdata->namaperusahaan = $request->get('namaperusahaan');
        $editdata->periode = $request->get('periode');
        $editdata->save();
        return redirect()->route('kaskecil')->with('status', 'Kas Kecil Berhasil diedit');
    }

    public function hapus($id) {
        $editdata = Kaskecildb::findOrFail($id);
        $editdata->hapus = 1;
        $editdata->save();
        return redirect()->route('kaskecil')->with('status', 'Kas Kecil berhasil dihapus');
    }

    public function pembentukandana($id) {
        $viewdata = Kaskecildb::findOrFail($id);
        if($viewdata->tanggal!="") {
            $explodetanggal  = explode("-",$viewdata->tanggal);
            $viewdata->tanggal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        }
        return view("kaskecil.pembentukandana", ["data" => $viewdata,"menukaskecil"=>$id]);
    }

    public function simpanpembentukandana($id,Request $request) {
        $user = Auth::user();
        $messages = [
            'tanggal.required' => 'Tanggal wajib diisi !!!',
            'saldo.required' => 'saldo wajib diisi !!!',
            'saldo.numeric' => 'saldo wajib berupa angka !!!',
        ];
        $this->validate($request,[
            'tanggal' => 'required',
            'saldo' => 'required|numeric'
        ],$messages);
        $tanggal = $request->get('tanggal');
        $explodetanggal  = explode("-",$tanggal);
        $tanggalfinal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        $saldo = $request->get('saldo');
        $editdata = Kaskecildb::findOrFail($id);
        $editdata->tanggal = $tanggalfinal;
        $editdata->saldo = $saldo ;
        $editdata->save();
        return redirect()->route('pembentukandana',[$id])->with('status', 'Saldo awal berhasil disimpan');

    }

    public function pengajuankaskecil($id) {
        return view("kaskecil.pengajuankaskecil", ["menukaskecil"=>$id]);
    }

    public function simpanpengajuankaskecil($id,Request $request) {
        $user = Auth::user();
        $messages = [
            'tanggal.required' => 'Tanggal wajib diisi !!!',
            'namakun.required' => 'Nama akun wajib diisi !!!',
            'jumlah.required' => 'jumlah wajib diisi !!!',
            'jumlah.numeric' => 'jumlah wajib berupa angka !!!',
        ];
        $this->validate($request,[
            'tanggal' => 'required',
            'namakun' => 'required',
            'jumlah' => 'required|numeric'
        ],$messages);
        $tanggal = $request->get('tanggal');
        $explodetanggal  = explode("-",$tanggal);
        $tanggalfinal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        $Pengajuankaskecilbaru = new Pengajuankaskecildb;
        $Pengajuankaskecilbaru->kaskecil = $id;
        $Pengajuankaskecilbaru->namakun = $request->get('namakun');
        $Pengajuankaskecilbaru->keterangan = $request->get('keterangan');
        $Pengajuankaskecilbaru->jumlah = $request->get('jumlah');
        $Pengajuankaskecilbaru->tanggal = $tanggalfinal;
        $Pengajuankaskecilbaru->save();
        return redirect()->route('pengajuankaskecil',[$id])->with('status', 'Pengajuan berhasil ditambahkan');
    }

    public function listpengajuankaskecil($id) {
        $datakaskecil = Pengajuankaskecildb::where('kaskecil',$id)->get();
        return view("kaskecil.listpengajuankaskecil", ["menukaskecil"=>$id,"listpengajuan" => $datakaskecil]);
    }
    public function hapuspengajuankaskecil($id,$idhapus) {
        Pengajuankaskecildb::where('id', $idhapus)->where('kaskecil', $id)->delete();
        return redirect()->route('listpengajuankaskecil',[$id])->with('status', 'Pengajuan berhasil dihapus');
    }
    public function editpengajuankaskecil($id,$idedit) {
        $viewdata = Pengajuankaskecildb::findOrFail($idedit);
        if($viewdata->tanggal!="") {
            $explodetanggal  = explode("-",$viewdata->tanggal);
            $viewdata->tanggal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        }
        return view("kaskecil.editpengajuankaskecil", ["data" => $viewdata,"menukaskecil"=>$id]);
    }
    public function simpaneditpengajuankaskecil($id,$idedit, Request $request) {
        $messages = [
            'tanggal.required' => 'Tanggal wajib diisi !!!',
            'namakun.required' => 'Nama akun wajib diisi !!!',
            'jumlah.required' => 'jumlah wajib diisi !!!',
            'jumlah.numeric' => 'jumlah wajib berupa angka !!!',
        ];
        $this->validate($request,[
            'tanggal' => 'required',
            'namakun' => 'required',
            'jumlah' => 'required|numeric'
        ],$messages);
        $tanggal = $request->get('tanggal');
        $explodetanggal  = explode("-",$tanggal);
        $tanggalfinal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        $Pengajuankaskecilbaru = Pengajuankaskecildb::findOrFail($idedit);
        $Pengajuankaskecilbaru->namakun = $request->get('namakun');
        $Pengajuankaskecilbaru->keterangan = $request->get('keterangan');
        $Pengajuankaskecilbaru->jumlah = $request->get('jumlah');
        $Pengajuankaskecilbaru->tanggal = $tanggalfinal;
        $Pengajuankaskecilbaru->save();
        return redirect()->route('listpengajuankaskecil',[$id])->with('status', 'Pengajuan berhasil diedit');
    }
    public function hapussemuapengajuankaskecil($id) {
        Pengajuankaskecildb::where('kaskecil', $id)->delete();
        return redirect()->route('listpengajuankaskecil',[$id])->with('status', 'Semua pengajuan berhasil dihapus');
    }
    public function pingisiankembali($id) {
        $viewdata = Kaskecildb::findOrFail($id);
        if($viewdata->tanggalpengembalian!="") {
            $explodetanggal  = explode("-",$viewdata->tanggalpengembalian);
            $viewdata->tanggalpengembalian = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        }
        return view("kaskecil.pingisiankembali", ["data" => $viewdata,"menukaskecil"=>$id]);
    }
    public function simpanpingisiankembali($id,Request $request) {
        $user = Auth::user();
        $messages = [
            'tanggalpengembalian.required' => 'Tanggal wajib diisi !!!',
            'pengembalianjumlah.required' => 'Jumlah wajib diisi !!!',
            'pengembalianjumlah.numeric' => 'Jumlah wajib berupa angka !!!',
        ];
        $this->validate($request,[
            'tanggalpengembalian' => 'required',
            'pengembalianjumlah' => 'required|numeric'
        ],$messages);
        $tanggalpengembalian = $request->get('tanggalpengembalian');
        $explodetanggal  = explode("-",$tanggalpengembalian);
        $tanggalfinal = $explodetanggal[2]."-".$explodetanggal[1]."-".$explodetanggal[0];
        $saldo = $request->get('saldo');
        $editdata = Kaskecildb::findOrFail($id);
        $editdata->tanggalpengembalian = $tanggalfinal;
        $editdata->pengembalianjumlah = $request->get('pengembalianjumlah'); ;
        $editdata->keteranganpengembalian = $request->get('keteranganpengembalian'); ;
        $editdata->save();
        return redirect()->route('pingisiankembali',[$id])->with('status', 'Pengisian Kembali Kas Kecil berhasil disimpan');

    }

    protected function namabulan($idbulan) {
        if($idbulan=="1") {
            return "Jan";
        }
        elseif($idbulan=="2") {
            return "Feb";
        }
        elseif($idbulan=="3") {
            return "Mar";
        }
        elseif($idbulan=="4") {
            return "Apr";
        }
        elseif($idbulan=="5") {
            return "Mei";
        }
        elseif($idbulan=="6") {
            return "Jun";
        }
        elseif($idbulan=="7") {
            return "Jul";
        }
        elseif($idbulan=="8") {
            return "Agu";
        }
        elseif($idbulan=="9") {
            return "Sep";
        }
        elseif($idbulan=="10") {
            return "Okt";
        }
        elseif($idbulan=="11") {
            return "Nov";
        }
        elseif($idbulan=="12") {
            return "Des";
        }
    }

    public function jurnalkaskecil($id) {
        $kaskecil = Kaskecildb::findOrFail($id);
        $total = 0;
        $arraydata = [];
        if($kaskecil->saldo>0) {
            $replacedate = str_replace("-","",$kaskecil->tanggal);
            $explodedate = explode("-",$kaskecil->tanggal);
            $tanggalreal = $explodedate[2]." ".$this->namabulan($explodedate[1]);
            $arraydata[] = array("orderdate"=>$replacedate, "date"=>$tanggalreal,"textdebit"=>"Dana Kas Kecil","textkredit"=>"Kas<br>(Pengisian Kembali)","jumlah"=>$kaskecil->saldo);
            $total = $total + $kaskecil->saldo;
        }
        $datakaskecil = Pengajuankaskecildb::where('kaskecil',$id)->get();
        foreach($datakaskecil as $listpengajuan) {
            $replacedate = str_replace("-","",$listpengajuan->tanggal);
            $explodedate = explode("-",$listpengajuan->tanggal);
            $tanggalreal = $explodedate[2]." ".$this->namabulan($explodedate[1]);
            $arraydata[] = array("orderdate"=>$replacedate, "date"=>$tanggalreal,"textdebit"=>$listpengajuan->namakun,"textkredit"=>"Kas Kecil<br>(".$listpengajuan->keterangan.")","jumlah"=>$listpengajuan->jumlah);
            $total = $total + $listpengajuan->jumlah;
        }
        if($kaskecil->pengembalianjumlah>0) {
            $replacedate = str_replace("-","",$kaskecil->tanggalpengembalian);
            $explodedate = explode("-",$kaskecil->tanggalpengembalian);
            $tanggalreal = $explodedate[2]." ".$this->namabulan($explodedate[1]);
            $arraydata[] = array("orderdate"=>$replacedate, "date"=>$tanggalreal,"textdebit"=>"Dana Kas Kecil","textkredit"=>"Kas<br>(Pengisian Kembali)","jumlah"=>$kaskecil->pengembalianjumlah);
            $total = $total + $kaskecil->saldo;
        }


        $newarraydata = [];

        if(is_array($arraydata)) {
            usort($arraydata, function($a, $b) {
                return $a['orderdate'] <=> $b['orderdate'];
            });
            $olddate = "";
            foreach($arraydata as $listdata) {
                if(trim($listdata["orderdate"])==trim($olddate)) {
                    $olddate = $listdata["orderdate"];
                    $listdata["date"] = "";
                }
                else {
                    $olddate = $listdata["orderdate"];
                }
                
                $newarraydata[] = $listdata;
            }
 
        }
        return view("kaskecil.jurnalkaskecil", ["arraydata" => $newarraydata,"menukaskecil"=>$id,"total"=>$total,"kaskecil"=>$kaskecil]);
        
    }

    public function simpanbukukaskecil($id,Request $request) {
        $akunbukukaskecil = Akunbukukaskecildb::where("kaskecil",$id)->first();
        if(is_object($akunbukukaskecil)) {
            $kaskeciledit = Akunbukukaskecildb::findOrFail($akunbukukaskecil->id);
            $kaskeciledit->namaakun1 = $request->get('namaakun1');
            $kaskeciledit->kodeakun1 = $request->get('kodeakun1');
            $kaskeciledit->namaakun2 = $request->get('namaakun2');
            $kaskeciledit->kodeakun2 = $request->get('kodeakun2');
            $kaskeciledit->namaakun3 = $request->get('namaakun3');
            $kaskeciledit->kodeakun3 = $request->get('kodeakun3');
            $kaskeciledit->namaakun4 = $request->get('namaakun4');
            $kaskeciledit->kodeakun4 = $request->get('kodeakun4');
            $kaskeciledit->namaakun5 = $request->get('namaakun5');
            $kaskeciledit->kodeakun5 = $request->get('kodeakun5');
            $kaskeciledit->namaakun6 = $request->get('namaakun6');
            $kaskeciledit->kodeakun6 = $request->get('kodeakun6');
            $kaskeciledit->save();
        }

        $arraybukukaskecil = Listbukukaskecildb::where("kaskecil",$id)->get();

        foreach($arraybukukaskecil as $listbukukaskecil) {

            $bukukaskeciledit = Listbukukaskecildb::findOrFail($listbukukaskecil->id);
            $bukukaskeciledit->tanggal = $request->get('tanggal'.$listbukukaskecil->id);
            $bukukaskeciledit->bulan = $request->get('bulan'.$listbukukaskecil->id);
            $bukukaskeciledit->nobukti = $request->get('nobukti'.$listbukukaskecil->id);
            $bukukaskeciledit->keterangan = $request->get('keterangan'.$listbukukaskecil->id);
            $bukukaskeciledit->penerimaan = $request->get('penerimaan'.$listbukukaskecil->id);
            $bukukaskeciledit->pengeluaran = $request->get('pengeluaran'.$listbukukaskecil->id);
            if(!is_numeric($request->get('akun1'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun1 = $request->get('akun1'.$listbukukaskecil->id);
            }
            if(!is_numeric($request->get('akun2'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun2 = $request->get('akun2'.$listbukukaskecil->id);
            }
            if(!is_numeric($request->get('akun3'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun3 = $request->get('akun3'.$listbukukaskecil->id);
            }
            if(!is_numeric($request->get('akun4'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun4 = $request->get('akun4'.$listbukukaskecil->id);
            }
            if(!is_numeric($request->get('akun5'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun5 = $request->get('akun5'.$listbukukaskecil->id);
            }
            if(!is_numeric($request->get('akun6'.$listbukukaskecil->id))) {
                //echo "no numeric";
            }
            else {
                $bukukaskeciledit->akun6 = $request->get('akun6'.$listbukukaskecil->id);
            }
            
            $bukukaskeciledit->save();
        }

        if($request->get('button')=="tambah") {
            $listbukukaskecilbaru1 = new Listbukukaskecildb;
            $listbukukaskecilbaru1->kaskecil = $id;
            $listbukukaskecilbaru1->save();
        }

       

        return redirect()->route('bukukaskecil',[$id])->with('status', 'Buku Kas Kecil berhasil disimpan');
    }

    public function bukukaskecil($id) {

        $kaskecil = Kaskecildb::findOrFail($id);
        $akunbukukaskecil = Akunbukukaskecildb::where("kaskecil",$id)->first();
        
        if(!is_object($akunbukukaskecil)) {
            $akunbukukaskecilbaru = new Akunbukukaskecildb;
            $akunbukukaskecilbaru->kaskecil = $id;
            $akunbukukaskecilbaru->namaakun1 = "Konsumsi";
            $akunbukukaskecilbaru->kodeakun1 = "011";
            $akunbukukaskecilbaru->namaakun2 = "Transportasi";
            $akunbukukaskecilbaru->kodeakun2 = "012";
            $akunbukukaskecilbaru->namaakun3 = "ATK";
            $akunbukukaskecilbaru->kodeakun3 = "013";
            $akunbukukaskecilbaru->namaakun4 = "Konsumsi";
            $akunbukukaskecilbaru->kodeakun4 = "014";
            $akunbukukaskecilbaru->namaakun5 = "Transportasi";
            $akunbukukaskecilbaru->kodeakun5 = "015";
            $akunbukukaskecilbaru->namaakun6 = "ATK";
            $akunbukukaskecilbaru->kodeakun6 = "016";
            $akunbukukaskecilbaru->save();

            $listbukukaskecilbaru1 = new Listbukukaskecildb;
            $listbukukaskecilbaru1->kaskecil = $id;
            $listbukukaskecilbaru1->save();

            $listbukukaskecilbaru2 = new Listbukukaskecildb;
            $listbukukaskecilbaru2->kaskecil = $id;
            $listbukukaskecilbaru2->save();

            $listbukukaskecilbaru3 = new Listbukukaskecildb;
            $listbukukaskecilbaru3->kaskecil = $id;
            $listbukukaskecilbaru3->save();

            $listbukukaskecilbaru4 = new Listbukukaskecildb;
            $listbukukaskecilbaru4->kaskecil = $id;
            $listbukukaskecilbaru4->save();

        }
        $akunbukukaskecil = Akunbukukaskecildb::where("kaskecil",$id)->first();
        $listbukukaskecil = Listbukukaskecildb::where("kaskecil",$id)->get();

        return view("kaskecil.bukukaskecil", ["menukaskecil"=>$id,"kaskecil"=>$kaskecil,"akunbukukaskecil"=>$akunbukukaskecil,"listbukukaskecil"=>$listbukukaskecil]);
        

    }
}
