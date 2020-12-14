@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Tambah Pengajuan</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Edit Pengajuan</h4>
					
					@if(session('status'))
						<div class="alert alert-primary" role="alert">
                        {{session('status')}}
						</div>
					@endif

					@if($errors->any())
					<div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif

					<form action="{{route('editpengajuankaskecil', [$menukaskecil,$data->id])}}" method="post">
						@csrf
						<div class="mb-3">
							<label for="matpel">Tanggal</label>
							<input type="text" class="form-control datepicker" id="tanggal" placeholder="" name="tanggal" value="{{ $data->tanggal }}" >
						</div>
                        <div class="mb-3">
							<label for="matpel">Nama Akun</label>
							<input type="text" class="form-control" id="namakun" placeholder="" name="namakun" value="{{ $data->namakun }}" >
						</div>
                        <div class="mb-3">
							<label for="matpel">Keterangan</label>
							<input type="text" class="form-control" id="keterangan" placeholder="" name="keterangan" value="{{ $data->keterangan }}" >
						</div>
                        <div class="mb-3">
							<label for="matpel">Jumlah</label>
							<input type="text" class="form-control" id="jumlah" placeholder="" name="jumlah" value="{{ $data->jumlah }}" >
						</div>
						<button type="submit" class="btn btn-primary mb-3">Edit</button>
					</form>

				</div>
			</div>
		</div>
		
	</div>

	@include('layouts.mainmenu')

  </div>
@endsection

@push('scripts')
<script>
	$( document ).ready(function() {
		$('.datepicker').datepicker( { dateFormat: 'dd-mm-yy' });
	} );
</script>
@endpush

