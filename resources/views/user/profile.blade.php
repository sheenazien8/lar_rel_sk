<h3>Halo {{ $user->name }} No. Passport {{ $user->passport->no_pass }}</h3>
	<hr>
	<p>ini Forum dari user {{ $user->name }}</p>
@foreach ($user->forums as $forum)
	<p>Judul Forumnya {{ $forum->judul}}</p>
	<p>Isi Forumnya {{ $forum->body}}</p>
@endforeach
	

	<hr>


	<p>Daftar Kelas dari {{ $user->name }}</p>
@foreach ($user->lessons as $lesson)
	<p>Judul kelasnya {{ $lesson->title}}</p>
@endforeach