<h2>Buat Profil Kamu</h2>
<form method="POST" action="{{ route('create.profile') }}">
    @csrf
    <input name="name" placeholder="Nama kamu">
    <textarea name="default_question" placeholder="Pertanyaan default (opsional)"></textarea>
    <button type="submit">Buat Link</button>
</form>