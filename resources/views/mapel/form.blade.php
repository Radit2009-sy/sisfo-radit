@extends('layouts.app')
@section('title', 'Form Mapel') @section('icon', 'fa-book') @section('heading', $item ? 'Edit Mapel' : 'Tambah Mapel')
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<form method="POST" action="{{ $item ? route('mapel.update', $item->id) : route('mapel.store') }}">@csrf @if($item) @method('PUT') @endif
<div class="form-row"><div class="form-group col-md-3"><label>Kode Mapel</label><input name="kode" class="form-control" value="{{ old('kode', $item->kode ?? '') }}" required></div>
<div class="form-group col-md-6"><label>Nama Mata Pelajaran</label><input name="nama" class="form-control" value="{{ old('nama', $item->nama ?? '') }}" required></div>
<div class="form-group col-md-3"><label>KKM Minimum</label><input type="number" name="kkm" min="0" max="100" class="form-control" value="{{ old('kkm', $item->kkm ?? 75) }}" required></div></div>
@include('layouts._formbuttons', ['r' => 'mapel'])
</form></div></div>
@endsection
