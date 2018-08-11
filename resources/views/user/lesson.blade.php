<h1>ini lesson dari {{ $lesson->title }}</h1>
<p>daftar User</p>

@foreach ($lesson->users as $user)
	<p>usernya {{ $user->name}}</p>
@endforeach

<h1>Daftar Tag</h1>
@foreach ($lesson->tags as $tag)
	<p>nama tagnya {{ $tag->name}}</p>
@endforeach
