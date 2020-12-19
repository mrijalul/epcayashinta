@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Soal Pilihan Ganda</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="alert alert-light" role="alert">
			Total Soal : {{ $total_soal }} Soal<br>
		</div>
		@foreach($data as $d)
		<div class="alert alert-light" role="alert">
			<h4 class="alert-heading">{{ $d->question }}</h4>
			<p>
				Jawaban Anda : 
				@if($d->user_answer == 1)
				A
				@elseif($d->user_answer == 2)
				B
				@elseif($d->user_answer == 3)
				C
				@elseif($d->user_answer == 4)
				D
				@elseif($d->user_answer == 5)
				E
				@else
				@endif
			</p>
			<p>
				Jawaban yang benar : 
				@if($d->right_answer == 1)
				A
				@elseif($d->right_answer == 2)
				B
				@elseif($d->right_answer == 3)
				C
				@elseif($d->right_answer == 4)
				D
				@elseif($d->right_answer == 5)
				E
				@else
				@endif
			</p>
			<hr>
			<p class="mb-0">Nilai : </p>
		</div>
		@endforeach

	</div>
	@include('layouts.mainmenu')
</div>
@endsection