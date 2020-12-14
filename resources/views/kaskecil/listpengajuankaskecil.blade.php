@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">List Pengeluaran Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body">
                <h4 class="mb-3 text-center">List Pengeluaran Kas Kecil</h4>
                @if(session('status'))
						<div class="alert alert-primary" role="alert">
                        {{session('status')}}
						</div>
					@endif
					<div class="col-md-12 text-right">
					<a href="javascript:if(confirm('Anda yakin akan menghapus pengajuan  ini?')) window.location.href
= '{{route('hapussemuapengajuankaskecil', [$menukaskecil])}}'">Hapus Semua</a>
					</div>
					<table id="matpelid" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
                                <th>Tanggal</th>
								<th>Nama Akun</th>
								<th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($listpengajuan as $pengajuan)
							<tr>
								<td>{{ $pengajuan->tanggal }}</td>
                                <td>{{ $pengajuan->namakun }}</td>
                                <td>{{ $pengajuan->keterangan }}</td>
                                <td>{{ $pengajuan->jumlah }}</td>
								<td>
                                <a href="javascript:if(confirm('Anda yakin akan menghapus pengajuan  ini?')) window.location.href
= '{{route('hapuspengajuankaskecil', [$menukaskecil,$pengajuan->id])}}'">[Hapus]</a>
                                <a href="{{route('editpengajuankaskecil', [$menukaskecil,$pengajuan->id])}}">[Edit]</a>
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
