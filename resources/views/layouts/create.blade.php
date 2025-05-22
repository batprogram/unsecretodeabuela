@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-header">
        <h4 class="mb-0">Buat Profil Secreto Kamu</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('create.profile') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input name="name" class="form-control" placeholder="Nama kamu" required>
            </div>
            <div class="mb-3">
                <label class="form-label">mau tanya apa?</label>
                <textarea name="default_question" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Buat Link</button>
        </form>
    </div>
</div>
@endsection
