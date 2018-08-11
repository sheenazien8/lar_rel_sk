<p>Form tag</p>

<h1>Daftar Tag</h1>
@foreach ($forum->tags as $tag)
	<p>nama tagnya {{ $tag->name}}</p>
@endforeach
