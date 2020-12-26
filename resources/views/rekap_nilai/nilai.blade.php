@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Rekap Nilai</h1>
</div>
<div class="row">
	@foreach($data as $d)
	a : {{ $d->nama_penjawab }}<br>
	a : {{ $d->matpel }}<br>
	a : {{ $d->sums }}<br>
	
	@endforeach
</div>
@endsection