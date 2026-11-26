@extends('layouts.app')
@section('title', 'Form Nilai') @section('icon', 'fa-star') @section('heading', $item ? 'Edit Nilai Siswa' : 'Input Nilai Siswa')
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<form method="POST" action="{{ $item ? route('nilai.update', $item->id) : route('nilai.store') }}">@csrf @if($item) @method('PUT') @endif
<div class="form-row"><div class="form-group col-md-6"><label>Siswa</label><select name="siswa_id" class="form-control" required>
@foreach ($siswa as $s)<option value="{{ $s->id }}" @selected(old('siswa_id', $item->siswa_id ?? '') == $s->id)>{{ $s->nama }} ({{ $s->kelas->nama_kelas }})</option>@endforeach</select></div>
<div class="form-group col-md-6"><label>Mata Pelajaran</label><select name="mapel_id" class="form-control" required>
@foreach ($mapel as $m)<option value="{{ $m->id }}" @selected(old('mapel_id', $item->mapel_id ?? '') == $m->id)>{{ $m->nama }} (KKM {{ $m->kkm }})</option>@endforeach</select></div></div>
<div class="form-row">
@foreach (['nilai_tugas' => 'Nilai Tugas (30%)', 'nilai_uts' => 'Nilai UTS (30%)', 'nilai_uas' => 'Nilai UAS (40%)'] as $f => $l)
<div class="form-group col-md-4"><label>{{ $l }}</label><input type="number" step="0.01" min="0" max="100" name="{{ $f }}" class="form-control" value="{{ old($f, $item->$f ?? '') }}" required></div>
@endforeach</div>
<p class="small text-muted">Nilai akhir dihitung otomatis: Tugas×30% + UTS×30% + UAS×40%.</p>
@include('layouts._formbuttons', ['r' => 'nilai'])
</form></div></div>
@endsection
