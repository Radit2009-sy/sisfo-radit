@extends('layouts.app')
@section('title', 'Nilai Akademik Siswa') @section('icon', 'fa-star') @section('heading', 'Nilai Akademik Siswa')
@section('action')<a href="{{ route('nilai.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Input Nilai Siswa</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Nilai Siswa</h6></div>
<div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped">
<thead class="bg-primary text-white"><tr><th>No</th><th>Siswa</th><th>Kelas</th><th>Mata Pelajaran</th><th>Nilai Tugas (30%)</th><th>Nilai UTS (30%)</th><th>Nilai UAS (40%)</th><th>Nilai Akhir</th><th>Status</th><th class="text-center">Aksi</th></tr></thead>
<tbody>@forelse ($items as $i)
<tr><td>{{ $loop->iteration }}</td><td>{{ $i->siswa->nama }}</td><td><span class="badge badge-secondary">{{ $i->siswa->kelas->nama_kelas }}</span></td><td>{{ $i->mapel->nama }}</td>
<td class="text-center">{{ number_format($i->nilai_tugas, 2) }}</td><td class="text-center">{{ number_format($i->nilai_uts, 2) }}</td><td class="text-center">{{ number_format($i->nilai_uas, 2) }}</td>
<td><span class="badge badge-info">{{ number_format($i->nilai_akhir, 2) }}</span></td>
<td>@if ($i->lulus)<span class="badge badge-success"><i class="fas fa-check-circle"></i> Lulus</span>@else<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Tidak Lulus</span>@endif</td>
<td class="text-center text-nowrap">@include('layouts._actions', ['r' => 'nilai', 'id' => $i->id])</td></tr>
@empty<tr><td colspan="10" class="text-center">Belum ada data.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
