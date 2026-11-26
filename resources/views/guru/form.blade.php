@extends('layouts.app')
@section('title', 'Form Guru') @section('icon', 'fa-chalkboard-teacher') @section('heading', $item ? 'Edit Guru' : 'Tambah Guru')
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<form method="POST" action="{{ $item ? route('guru.update', $item->id) : route('guru.store') }}">@csrf @if($item) @method('PUT') @endif
<div class="form-row"><div class="form-group col-md-4"><label>NIP</label><input name="nip" class="form-control" value="{{ old('nip', $item->nip ?? '') }}" required></div>
<div class="form-group col-md-8"><label>Nama Guru</label><input name="nama" class="form-control" value="{{ old('nama', $item->nama ?? '') }}" required></div></div>
<div class="form-row"><div class="form-group col-md-4"><label>Gender</label><select name="gender" class="form-control">
<option value="L" @selected(old('gender', $item->gender ?? '') == 'L')>Laki-Laki</option><option value="P" @selected(old('gender', $item->gender ?? '') == 'P')>Perempuan</option></select></div>
<div class="form-group col-md-4"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $item->email ?? '') }}"></div>
<div class="form-group col-md-4"><label>No HP</label><input name="no_hp" class="form-control" value="{{ old('no_hp', $item->no_hp ?? '') }}"></div></div>
@include('layouts._formbuttons', ['r' => 'guru'])
</form></div></div>
@endsection
