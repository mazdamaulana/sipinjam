
@extends('layouts.app')
@section('judul', 'Daftar Alat')

@section('konten')
  <a href="{{ route('alat.create') }}">+ Tambah Alat</a>

  @if (session('sukses'))
    <p style="color:green">{{ session('sukses') }}</p>
  @endif

  <table border="1" cellpadding="6">
    <tr><th>Kode</th><th>Nama</th><th>Stok</th><th>Kondisi</th><th>Aksi</th></tr>
    @forelse ($alat as $a)
      <tr>
        <td>{{ $a->kode }}</td>
        <td>{{ $a->nama }}</td>
        <td>{{ $a->stok }}</td>
        <td>{{ $a->kondisi }}</td>
        <td>
          <a href="{{ route('alat.edit', $a) }}">Ubah</a>
        </td>
      </tr>
    @empty
      <tr><td colspan="5">Belum ada data alat.</td></tr>
    @endforelse
  </table>

  {{ $alat->links() }}
@endsection
