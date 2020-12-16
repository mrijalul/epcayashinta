@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Edit Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Edit Kas Kecil</h4>
					
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

					<form action="{{route('editkaskecil', [$data->id])}}" method="post">
						@csrf
                        <div class="mb-3">
							<label for="matpel">Nama Kas Kecil</label>
							<input type="text" class="form-control" id="nama" placeholder="" name="nama"  value="{{$data->nama}}">
						</div>
						<div class="mb-3">
							<label for="matpel">Nama PT</label>
							<input type="text" class="form-control" id="namaperusahaan" placeholder="" name="namaperusahaan" value="{{$data->namaperusahaan}}" >
						</div>
						<div class="mb-3">
							<label for="matpel">Periode</label>
							<input type="text" class="form-control" id="periode" placeholder="" name="periode" value="{{$data->periode}}" >
						</div>

						
						<button type="submit" class="btn btn-primary mb-3">Simpan</button>
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

