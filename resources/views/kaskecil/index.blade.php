@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Tambah Kas Kecil</h4>
					
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

					<form action="{{ URL::to('kas-kecil')}}" method="post">
						@csrf
						<div class="mb-3">
							<label for="matpel">Nama Kas Kecil</label>
							<input type="text" class="form-control" id="matpel" placeholder="" name="nama" >
						</div>
						<button type="submit" class="btn btn-primary mb-3">Submit</button>
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
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($datakaskecil as $kaskecil)
							<tr>
								<td>{{ $kaskecil->nama }}</td>
								<td>
                                <a href="javascript:if(confirm('Anda yakin akan menghapus buku kas kecil ini?')) window.location.href
= '{{route('hapuskaskecil', [$kaskecil->id])}}'">[Hapus]</a>
                                <a href="{{route('pembentukandana', [$kaskecil->id])}}">[Isi]</a>
                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
		$('#matpelid').DataTable();
	} );
</script>
@endpush
