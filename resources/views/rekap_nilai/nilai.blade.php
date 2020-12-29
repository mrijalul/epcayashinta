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
							<th>{{ $d->nama_penjawab }}</th>
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
						@foreach($jawabanuraian as $d)
						<tr>
							<td>{{ $d->useranswer->name }}</td>
							<td>{{ $d->matpeljrn->matpel }}</td>
							<td>{{ $d->soallatihanessay_id }}</td>
							<td>{{ $d->jawaban_essay }}</td>
							<td>
								@if($d->nilai == NULL)
								belum di nilai oleh guru
								@else
								{{ $d->nilai }}
								@endif
							</td>
							<td>Edit</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection