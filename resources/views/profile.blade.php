<h2>Halo, {{ $profile->name }}</h2>

<p>Pertanyaan default:</p>
<p>{{ $profile->default_question }}</p>

<h3>Kirim jawaban anonim:</h3>
<form method="POST" action="{{ route('profile.answer', $profile->slug) }}">
    @csrf
    <textarea name="answer" placeholder="Tulis jawaban..."></textarea>
    <button type="submit">Kirim</button>
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<h3>Jawaban Masuk:</h3>
<ul>
    @foreach($answers as $answer)
        <li>{{ $answer->answer }} ({{ $answer->created_at->diffForHumans() }})</li>
    @endforeach
</ul>
