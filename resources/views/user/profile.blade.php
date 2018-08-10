<h3>Halo {{ $user->name }} No. Passport {{ $user->passport->no_pass }}</h3>

	<p>ini Forum dari user {{ $user->name }}</p>
@foreach ($user->forums as $forum)
	<p>Judul Forumnya {{ $forum->judul}}</p>
	<p>Isi Forumnya {{ $forum->body}}</p>
@endforeach