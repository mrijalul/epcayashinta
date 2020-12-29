@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Rekap Nilai</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card">
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">penjawab</th>
							<th scope="col">Mata Pelajaran yang diujikan</th>
							<th scope="col">Nilai Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $d)
						<tr>
							<td>{{ $d->nama_penjawab }}</td>
							<td>{{ $d->matpel }}</td>
							<td>{{ $d->sums*10 }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	@include('layouts.mainmenu')

	<div class="col-md-8 blog-main">
		<div class="card">
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">penjawab</th>
							<th scope="col">Mata Pelajaran yang diujikan</th>
							<th scope="col">Soal</th>
							<th scope="col">Jawaban</th>
							<th scope="col">Nilai</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						{{-- {{ dd($jawabanuraian) }} --}}
						@foreach($jawabanuraian as $uraian)
						<tr>
							<td>{{ $uraian->useranswer->name }}</td>
							<td>{{ $uraian->matpeljrn->matpel }}</td>
							<td><a href="{{ route('soal.latihan.siswa.essay.download',$uraian->soallatihanessay_id) }}" target="_blank">lihat Soal</a></td>
							<td><a href="{{ route('download.jawaban.siswa',$uraian->id) }}" target="_blank">Lihat Jawaban Siswa</a></td>
							<td>
								@if($uraian->nilai == NULL)
								belum di nilai oleh guru
								@else
								{{ $uraian->nilai }}
								@endif
							</td>
							<td>
								@include('rekap_nilai.modal_edit_nilai')
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection