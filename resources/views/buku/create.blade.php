@extends('layouts.app')
@section('judul', 'Tambah Buku')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('buku.store') }}">
    @csrf
    <p>ISBN: <input name="isbn" value="{{ old('isbn') }}"></p>
    <p>Judul: <input name="judul" value="{{ old('judul') }}"></p>
    <p>Jumlah Halaman: <input name="jumlah_halaman" type="number" value="{{ old('jumlah_halaman') }}"></p>
    <p>Penerbit: <input name="penerbit" value="{{ old('penerbit') }}"></p>
    <button type="submit">Simpan</button>
  </form>
@endsection