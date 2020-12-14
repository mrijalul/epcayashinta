@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4" style="color: #fff">Soal Latihan : {{ $data->matpel }}</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-12">
						<div class="media">
							<div class="media-body">
								@foreach($essays as $es)
								<h5 class="mt-0">Soal : {{ $es->pertanyaan }}</h5>
								{!! $es->jawabanEssay->jawaban_essay !!}
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.mainmenu')
</div>
@endsection