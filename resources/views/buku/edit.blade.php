@extends('layouts.app')
@section('judul', 'Ubah Buku')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('buku.update', $buku) }}">
    @csrf @method('PUT')
    <p>ISBN: <input name="isbn" value="{{ old('isbn', $buku->isbn) }}"></p>
    <p>Judul: <input name="judul" value="{{ old('judul', $buku->judul) }}"></p>
    <p>Jumlah Halaman: <input name="jumlah_halaman" type="number" value="{{ old('jumlah_halaman', $buku->jumlah_halaman) }}"></p>
    <p>Penerbit: <input name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}"></p>
    <button type="submit">Perbarui</button>
  </form>
@endsection