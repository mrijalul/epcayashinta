@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Buku Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">{{$kaskecil->namaperusahaan}} <br> Buku Kas Kecil <br> {{$kaskecil->periode}}</h4>
					

				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body" style="overflow-x:scroll">
					@if(session('status'))
						<div class="alert alert-primary" role="alert">
                        {{session('status')}}
						</div>
					@endif
					<form action="{{route('bukukaskecil', [$menukaskecil])}}" method="post">
					@csrf
					<table  class="table table-bordered">
						<tr>
							<td rowspan="2" colspan="2" style='width:100px;'>Tanggal</td>
							<td rowspan="3" style='width:250px;'>No Bukti</td>
							<td rowspan="3" style='width:400px;'>Keterangan</td>
							<td rowspan="3" style='width:150px;'>Penerimaan</td>
							<td rowspan="3" style='width:150px;'>Pengeluaran</td>
							<td colspan="6">Rekening Yang Di debit</td>
						</tr>
						<tr>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun1" class="form-control" value="{{$akunbukukaskecil->namaakun1}}"></td>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun2" class="form-control" value="{{$akunbukukaskecil->namaakun2}}"></td>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun3" class="form-control" value="{{$akunbukukaskecil->namaakun3}}"></td>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun4" class="form-control" value="{{$akunbukukaskecil->namaakun4}}"></td>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun5" class="form-control" value="{{$akunbukukaskecil->namaakun5}}"></td>
							<td style='width:200px;'><input style='width:125px;' type="text" name="namaakun6" class="form-control" value="{{$akunbukukaskecil->namaakun6}}"></td>
						</tr>
						<tr>
							<td colspan="2">{{$kaskecil->periode}}</td>
							<td><input style='width:125px;' type="text" name="kodeakun1" class="form-control" value="{{$akunbukukaskecil->kodeakun1}}"></td>
							<td><input style='width:125px;' type="text" name="kodeakun2" class="form-control" value="{{$akunbukukaskecil->kodeakun2}}"></td>
							<td><input style='width:125px;' type="text" name="kodeakun3" class="form-control" value="{{$akunbukukaskecil->kodeakun3}}"></td>
							<td><input style='width:125px;' type="text" name="kodeakun4" class="form-control" value="{{$akunbukukaskecil->kodeakun4}}"></td>
							<td><input style='width:125px;' type="text" name="kodeakun5" class="form-control" value="{{$akunbukukaskecil->kodeakun5}}"></td>
							<td><input style='width:125px;' type="text" name="kodeakun6" class="form-control" value="{{$akunbukukaskecil->kodeakun6}}"></td>
						</tr>
						@foreach($listbukukaskecil as $listbukukaskeciltampil) 
						<tr>
							<td><input style='width:50px;' type="text" name="tanggal{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->tanggal}}"></td>
							<td><input style='width:100px;' type="text" name="bulan{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->bulan}}"></td>
							<td><input style='width:125px;' type="text" name="nobukti{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->nobukti}}"></td>
							<td><input style='width:200px;' type="text" name="keterangan{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->keterangan}}"></td>
							<td><input style='width:125px;' type="text" name="penerimaan{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->penerimaan}}"></td>
							<td><input style='width:125px;' type="text" name="pengeluaran{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->pengeluaran}}"></td>
							<td><input style='width:125px;' type="text" name="akun1{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun1}}"></td>
							<td><input style='width:125px;' type="text" name="akun2{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun2}}"></td>
							<td><input style='width:125px;' type="text" name="akun3{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun3}}"></td>
							<td><input style='width:125px;' type="text" name="akun4{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun4}}"></td>
							<td><input style='width:125px;' type="text" name="akun5{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun5}}"></td>
							<td><input style='width:125px;' type="text" name="akun6{{$listbukukaskeciltampil->id}}" class="form-control" value="{{$listbukukaskeciltampil->akun6}}"></td>
						</tr>
						@endforeach
						<tr>
							<td colspan="12" style="text-align:left">
							<button type="submit" name="button" class="btn btn-primary mb-3" value="tambah">Tambah 1 Baris</button>
							<button type="submit" class="btn btn-primary mb-3">Simpan</button>
							</td>
						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

  </div>
@endsection


