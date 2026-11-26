@extends('layouts.app')
@section('title', 'Form Siswa') @section('icon', 'fa-user-graduate') @section('heading', $item ? 'Edit Siswa' : 'Tambah Siswa')
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<form method="POST" action="{{ $item ? route('siswa.update', $item->id) : route('siswa.store') }}">@csrf @if($item) @method('PUT') @endif
<div class="form-row"><div class="form-group col-md-4"><label>NIS</label><input name="nis" class="form-control" value="{{ old('nis', $item->nis ?? '') }}" required></div>
<div class="form-group col-md-8"><label>Nama Siswa</label><input name="nama" class="form-control" value="{{ old('nama', $item->nama ?? '') }}" required></div></div>
<div class="form-row"><div class="form-group col-md-4"><label>Jenis Kelamin</label><select name="jenis_kelamin" class="form-control" required>
<option value="L" @selected(old('jenis_kelamin', $item->jenis_kelamin ?? '') == 'L')>Laki-Laki</option><option value="P" @selected(old('jenis_kelamin', $item->jenis_kelamin ?? '') == 'P')>Perempuan</option></select></div>
<div class="form-group col-md-4"><label>Kelas</label><select name="kelas_id" class="form-control" required>@foreach ($kelas as $k)<option value="{{ $k->id }}" @selected(old('kelas_id', $item->kelas_id ?? '') == $k->id)>{{ $k->nama_kelas }}</option>@endforeach</select></div>
<div class="form-group col-md-4"><label>No HP</label><input name="no_hp" class="form-control" value="{{ old('no_hp', $item->no_hp ?? '') }}"></div></div>
@include('layouts._formbuttons', ['r' => 'siswa'])
</form></div></div>
@endsection
