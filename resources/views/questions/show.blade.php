@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('questions.index') }}" class="btn btn-link mb-3">&larr; Kembali</a>

  <div class="card mb-3">
    <div class="card-body">
      <h4 class="mb-0">{{ $profile->name }}</h4>
      @if($profile->default_question)
        <p class="text-muted fst-italic mt-2">{{ $profile->default_question }}</p>
      @endif
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('profile.answer', $profile->slug) }}">
    @csrf
    <div class="mb-3">
      <textarea name="answer" class="form-control" rows="3" placeholder="Tulis jawaban kamu..." required></textarea>
    </div>
    <button type="submit" class="btn btn-success w-100">Kirim Jawaban</button>
  </form>

  <hr>

  <h5 class="mt-4">Jawaban Masuk:</h5>
  @forelse($answers as $answer)
    <div class="card mb-2">
      <div class="card-body">
        {{ $answer->answer }}
        <div class="text-muted small">{{ $answer->created_at->diffForHumans() }}</div>
      </div>
    </div>
  @empty
    <div class="alert alert-warning">Belum ada jawaban.</div>
  @endforelse
</div>
@endsection
