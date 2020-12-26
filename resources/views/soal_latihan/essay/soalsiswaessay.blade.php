@php
$nmr = 1;
@endphp
@foreach($essay as $key => $p)
	<h4 class="mb-3">Silahkan Download Soal Uraian</h4>
	<div class="d-block my-3">
		<a href="{{ route('soal.latihan.siswa.essay.download',$p->id) }}">Soal Uraian - {{ $nmr++ }}</a>
	</div>
	<hr class="mb-4">
@endforeach