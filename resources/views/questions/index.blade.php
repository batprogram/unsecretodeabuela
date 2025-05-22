@extends('layouts.app')

@section('content')
<div class="container">
  <h1>?????????????????????????????????????</h1>
  
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('create.profile') }}">
    @csrf
    <div class="mb-3">
      <input name="name" class="form-control" placeholder="Siapa yang tanya?" required>
    </div>
    <div class="mb-3">
      <textarea name="default_question" class="form-control" rows="2" placeholder="Mau tanya apa?"></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Kirim pertanyaan</button>
  </form>

  <hr>

  <h4 class="mt-4">Questions list</h4>
  @foreach($profiles as $profile)
    <div class="card mb-2">
      <div class="card-body">
        <strong>{{ $profile->name }}</strong>  
        <div><a href="{{ route('profile.show', $profile->slug) }}">Lihat & Jawab</a></div>
      </div>
    </div>
  @endforeach
</div>
@endsection
