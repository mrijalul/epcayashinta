@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4 kathen" style="color: #fff">Video Pembelajaran</h1>
</div>
<div class="row">
	<div class="col-md-8 blog-main">
		<div class="card-deck mb-3">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 text-center">Tambah Video Pembelajaran</h4>
					
					@if($message = Session::get('success'))
						<div class="alert alert-primary" role="alert">
							{{ $message }}
						</div>
					@endif

					@if($errors->any())
					<div class="alert alert-danger" role="alert">
						@foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
					@endif

					<form action="{{ route('video-pembelajaran.store') }}" method="post" enctype="multipart/form-data">

						@csrf

						<div class="mb-3">
							<label for="nama_video">Nama Video</label>
							<input type="text" class="form-control" id="nama_video" placeholder="" name="nama_video" required>
						</div>
						<div class="mb-3">
							<select id="opsivideo" class="form-control">
								<option>Pilih Salah satu</option>
								<option value="pil1">Link Youtube</option>
								<option value="pil2">Upload Video</option>
							</select>
						</div>
						<div class="mb-3 videos" id="pil1">
							<label for="file_video">Link Youtube</label>
							<input type="text" class="form-control" id="link_ytb" placeholder="https://www.youtube.com/watch?v=GmLFHGud7I8" name="link_ytb">
						</div>
						<div class="mb-3 videos" id="pil2">
							<label for="file_video">File Video (mp4,m4a,mkv only) max. 50mb</label>
							<input type="file" class="form-control" id="file_video" name="file_video" accept=".mp4,.m4a,.mkv">
						</div>

						<button type="submit" class="btn btn-primary mb-3">Submit</button>
					</form>

				</div>
			</div>
		</div>
		<div class="card-deck mb-3 text-center">
			<div class="card">
				<div class="card-body">
					<table id="videoid" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Video</th>
								<th>File Video</th>
							</tr>
						</thead>
						<tbody>
							@php
							$no = 1;	
							@endphp
							@foreach ($data as $video)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $video->nama_video }}</td>
								<td>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#video{{ $video->id }}">
										Lihat Video 
									</button>

									<!-- Modal -->
									<div class="modal fade" id="video{{ $video->id }}" tabindex="-1" aria-labelledby="video{{ $video->id }}Label" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="video{{ $video->id }}Label">Modal - {{ $video->id }}</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body" style="margin: 0 auto;">
													<video
														id="my-video"
														class="video-js"
														controls
														preload="auto"
														width="640"
														height="264"
														poster="MY_VIDEO_POSTER.jpg"
														@if (!empty($video->link_ytb))
														data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $video->link_ytb }}"}] }'
														@else
														data-setup="{}"	
														@endif
														>
														@if (!empty($video->file_video))
															<source src="{{ asset('video') }}/{{ $video->file_video }}" type="video/mp4" />
															<source src="{{ asset('video') }}/{{ $video->file_video }}" type="video/webm" />
														@endif

														<p class="vjs-no-js">
															To view this video please enable JavaScript, and consider upgrading to a
															web browser that
															<a href="https://videojs.com/html5-video-support/" target="_blank"
															>supports HTML5 video</a
															>
														</p>
													</video>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												</div>
											</div>
										</div>
									</div>
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
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.10.2/video.js"></script>
<script src="{{ asset('js/Youtube.min.js') }}"></script>
<script>
	$( document ).ready(function() {
		$('#opsivideo').change(function(){
			$('.videos').hide();
			$('#' + $(this).val()).show();
		});
		$('#videoid').DataTable();
	} );
</script>
@endpush
@push('styles')
<link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
<style>
	.videos{
		display: none;
	}
</style>
@endpush
