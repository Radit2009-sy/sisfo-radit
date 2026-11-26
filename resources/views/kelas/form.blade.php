@extends('layouts.app')
@section('title', 'Form Kelas') @section('icon', 'fa-school') @section('heading', $item ? 'Edit Kelas' : 'Tambah Kelas')
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<form method="POST" action="{{ $item ? route('kelas.update', $item->id) : route('kelas.store') }}">@csrf @if($item) @method('PUT') @endif
<div class="form-group"><label>Nama Kelas</label><input name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $item->nama_kelas ?? '') }}" required></div>
<div class="form-group"><label>Wali Kelas</label><select name="wali_kelas_id" class="form-control"><option value="">- Tidak ada -</option>
@foreach ($guru as $g)<option value="{{ $g->id }}" @selected(old('wali_kelas_id', $item->wali_kelas_id ?? '') == $g->id)>{{ $g->nama }}</option>@endforeach</select></div>
@include('layouts._formbuttons', ['r' => 'kelas'])
</form></div></div>
@endsection
