@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Soal Essay : {{ $soal_latihan->matpel }}</h1>
</div>
<div class="row">
	<div class="col-md-12 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					@include('soal_latihan.essay.soalsiswaessay')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection