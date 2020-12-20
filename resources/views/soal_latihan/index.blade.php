@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Soal Latihan</h1>
</div>
<div class="row">

	<div class="col-md-8 blog-main">
		@if(auth()->user()->role == 1)
			<div class="card-deck mb-3">
				<div class="card">
					<div class="card-body">
						<h4 class="mb-3 text-center">Materi Soal Latihan</h4>
						
						@if($message = Session::get('success'))
							<div class="alert alert-primary" role="alert">
								{{ $message }}
							</div>
						@endif

						@if($errors->any())
						<div class="alert alert-danger" role="alert">
							@foreach ($errors->all() as $error)
								<p>{{ $error }}</p>
							@endforeach
						</div>
						@endif

						<form action="{{ route('soal-latihan.store') }}" method="post">
							@csrf
							<div class="mb-3">
								<label for="matpel">Materi Soal Latihan</label>
								<input type="text" class="form-control" id="matpel" placeholder="Materi untuk Latihan Soal" name="matpel" required>
							</div>
							<button type="submit" class="btn btn-primary mb-3">Lanjut Membuat Soal</button>
						</form>

					</div>
				</div>
			</div>
			<div class="card-deck mb-3 text-center">
				<div class="card">
					<div class="card-body">
						<table id="matpelid" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Materi Soal Latihan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@php
								$no = 1;
								@endphp
								@foreach ($data as $matpel)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $matpel->matpel }}</td>
									<td><a href="{{ route('soal-latihan.show',$matpel->id) }}">Detail</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@elseif(auth()->user()->role == 2)
			@php
			$nmr = 1;
			@endphp
			@foreach ($data as $matpelsiswa)
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">{{ $nmr++ }}. {{ $matpelsiswa->matpel }}</h5>
					<a href="{{ route('soal.latihan.siswa.pilgan',$matpelsiswa->id) }}" class="card-link">Pilihan Ganda</a>
					<a href="{{ route('soal.latihan.siswa.essay',$matpelsiswa->id) }}" class="card-link">Essay</a>
				</div>
			</div>
			@endforeach
		@endif
	</div>

	@include('layouts.mainmenu')	

</div>
@endsection

@push('scripts')
<script>
	$( document ).ready(function() {
		$('#matpelid').DataTable();
	} );
</script>
@endpush
