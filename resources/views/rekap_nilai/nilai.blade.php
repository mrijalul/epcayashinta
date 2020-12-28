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
</div>
@endsection