@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Jurnal Kas Kecil</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">{{$kaskecil->namaperusahaan}} <br> Jurnal Kas Kecil <br> {{$kaskecil->periode}}</h4>
					
					

				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body">
					<table id="matpelid" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>Keterangan</th>
                                <th>Debit</th>
								<th>Kredit</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($arraydata as $data)
							<tr>
								<td>{{$data['date']}}</td>
								<td class="text-left" >{!!$data['textdebit']!!}</td>
                                <td>{{$data['jumlah']}}</td>
                                <td></td>
							</tr>
                            <tr>
								<td></td>
								<td class="text-left" style="padding-left:50px;">{!!$data['textkredit']!!}</td>
                                <td></td>
                                <td>{{$data['jumlah']}}</td>
							</tr>
							@endforeach
						</tbody>
                        <tfooter>
                            <tr>
								<td><strong>Total</strong></td>
								<td></td>
                                <td><strong>{{$total}}</strong></td>
                                <td><strong>{{$total}}</strong></td>
							</tr>
                        </tfooter>
					</table>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.mainmenu')

  </div>
@endsection


