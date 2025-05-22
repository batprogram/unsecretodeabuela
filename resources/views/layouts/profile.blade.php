@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h3>Profil: {{ $profile->name }}</h3>
    @if ($profile->default_question)
        <p class="text-muted fst-italic">{{ $profile->default_question }}</p>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4">
    <div class="card-header">Kirim Jawaban</div>
    <div class="card-body">
        <form method="POST" action="{{ route('profile.answer', $profile->slug) }}">
            @csrf
            <div class="mb-3">
                <textarea name="answer" class="form-control" rows="3" placeholder="Jawabnya disini" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Kirim Jawaban</button>
        </form>
    </div>
</div>

<h5>Jawaban Masuk:</h5>
<ul class="list-group">
    @forelse($answers as $answer)
        <li class="list-group-item">
            {{ $answer->answer }}
            <div class="text-muted small">{{ $answer->created_at->diffForHumans() }}</div>
        </li>
    @empty
        <li class="list-group-item text-muted">Belum ada jawaban masuk.</li>
    @endforelse
</ul>
@endsection
