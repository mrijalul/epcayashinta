@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Rekap Simulasi Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body">
					<table id="matpelid" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Jurnal</th>
                                <th>Buku</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($datakaskecil as $kaskecil)
							<tr>
								<td>{{ $kaskecil->name }}</td>
								<td>
                                @if($kaskecil->jurnalkaskecil=='Y')
								<a href="{{route('jurnalkaskecilguru', [$kaskecil->id])}}">[Lihat]</a>
                                @endif
                                </td>
                                <td>
                                @if($kaskecil->bukukaskecil=='Y')
                                <a href="{{route('bukukaskecilguru', [$kaskecil->id])}}">[Lihat]</a>
                                @endif
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
