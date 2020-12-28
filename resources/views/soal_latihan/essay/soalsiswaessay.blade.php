@php
$nmr = 1;
@endphp
{{-- {{ dd($essay) }} --}}
@foreach($essay as $key => $p)
	<h4 class="mb-3">Silahkan Download Soal Uraian</h4>
	<div class="d-block my-3">
		<a href="{{ route('soal.latihan.siswa.essay.download',$p->id) }}">Soal Uraian - {{ $nmr++ }}</a>
	</div>
	<hr class="mb-4">
<br>
<br>
<br>
<br>
<br>
<br>
@if($errors->any())
<div class="alert alert-danger" role="alert">
	@foreach ($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
</div>
@endif
<form action="{{ route('soal.latihan.siswa.essay.submit.jawab',[$p->matapelajaran_id,$p->id]) }}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="mb-3">
		<h4 class="mb-3">Silahkan Upload Jawaban Uraian</h4>
		<label for="jawaban">Submit Jawaban (max 10mb) only .pdf,.docs,.docx,.doc</label>
		<input type="file" name="jawaban" class="form-control" accept=".pdf,.docs,.docx,.doc">
	</div>
	<button type="submit" class="btn btn-primary mb-3">Submit</button>
</form>

@endforeach