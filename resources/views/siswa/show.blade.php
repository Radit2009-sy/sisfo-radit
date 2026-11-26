@extends('layouts.app')
@section('title', 'Detail Siswa') @section('icon', 'fa-user-graduate') @section('heading', 'Detail Siswa')
@section('action')<a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">Kembali</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-body">
<table class="table table-borderless w-auto mb-0"><tr><th>NIS</th><td>{{ $item->nis }}</td></tr><tr><th>Nama</th><td>{{ $item->nama }}</td></tr>
<tr><th>Jenis Kelamin</th><td>{{ $item->jk_label }}</td></tr><tr><th>Kelas</th><td>{{ $item->kelas->nama_kelas }}</td></tr><tr><th>No HP</th><td>{{ $item->no_hp }}</td></tr></table></div></div>
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Nilai</h6></div><div class="card-body"><table class="table table-bordered">
<thead class="bg-primary text-white"><tr><th>Mapel</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Akhir</th><th>Status</th></tr></thead>
<tbody>@forelse ($item->nilai as $n)<tr><td>{{ $n->mapel->nama }}</td><td>{{ $n->nilai_tugas }}</td><td>{{ $n->nilai_uts }}</td><td>{{ $n->nilai_uas }}</td><td>{{ $n->nilai_akhir }}</td>
<td><span class="badge badge-{{ $n->lulus ? 'success' : 'danger' }}">{{ $n->lulus ? 'Lulus' : 'Tidak Lulus' }}</span></td></tr>
@empty<tr><td colspan="6" class="text-center">Belum ada nilai.</td></tr>@endforelse</tbody></table></div></div>
@endsection
