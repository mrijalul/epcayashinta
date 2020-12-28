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
					<div class="col-md-12" style='text-align:left'>
					<a href="{{route('kaskecilguru')}}" class="btn btn-primary mb-3">Kembali</a>
					</div>
					
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
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun1}}</td>
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun2}}</td>
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun3}}</td>
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun4}}</td>
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun5}}</td>
							<td style='width:200px;'>{{$akunbukukaskecil->namaakun6}}</td>
						</tr>
						<tr>
							<td colspan="2">{{$kaskecil->periode}}</td>
							<td>{{$akunbukukaskecil->kodeakun1}}</td>
							<td>{{$akunbukukaskecil->kodeakun2}}</td>
							<td>{{$akunbukukaskecil->kodeakun3}}</td>
							<td>{{$akunbukukaskecil->kodeakun4}}</td>
							<td>{{$akunbukukaskecil->kodeakun5}}</td>
							<td>{{$akunbukukaskecil->kodeakun6}}</td>
						</tr>
						@foreach($listbukukaskecil as $listbukukaskeciltampil) 
						<tr>
							<td>{{$listbukukaskeciltampil->tanggal}}</td>
							<td>{{$listbukukaskeciltampil->bulan}}</td>
							<td>{{$listbukukaskeciltampil->nobukti}}</td>
							<td>{{$listbukukaskeciltampil->keterangan}}</td>
							<td>{{$listbukukaskeciltampil->penerimaan}}</td>
							<td>{{$listbukukaskeciltampil->pengeluaran}}</td>
							<td>{{$listbukukaskeciltampil->akun1}}</td>
							<td>{{$listbukukaskeciltampil->akun2}}</td>
							<td>{{$listbukukaskeciltampil->akun3}}</td>
							<td>{{$listbukukaskeciltampil->akun4}}</td>
							<td>{{$listbukukaskeciltampil->akun5}}</td>
							<td>{{$listbukukaskeciltampil->akun6}}</td>
						</tr>
						@endforeach
						
					</table>

				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

  </div>
@endsection


