<h3>Halo {{ $user->name }} No. Passport {{ $user->passport->no_pass }}</h3>
	<hr>
	<p>ini daftar Forum dari user {{ $user->name }}</p>
@foreach ($user->forums as $forum)
	<p>
		+ Judul Forumnya {{ $forum->judul}}
		|| Tag :
		@foreach ($forum->tags as $tag)
			{{ $tag->name }}
		@endforeach
	</p>
@endforeach
	
	<hr>

	<p>Daftar Kelas dari {{ $user->name }}</p>
@foreach ($user->lessons as $lesson)
	<p>Judul kelasnya {{ $lesson->title}}</p>
@endforeach