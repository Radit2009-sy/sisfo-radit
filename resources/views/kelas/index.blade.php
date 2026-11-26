@extends('layouts.app')
@section('title', 'Data Kelas') @section('icon', 'fa-school') @section('heading', 'Data Kelas')
@section('action')<a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah Kelas</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6></div>
<div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped">
<thead class="bg-primary text-white"><tr><th>No</th><th>Nama Kelas</th><th>Wali Kelas</th><th>Jumlah Siswa</th><th class="text-center">Aksi</th></tr></thead>
<tbody>@forelse ($items as $i)
<tr><td>{{ $loop->iteration }}</td><td><span class="badge badge-info">{{ $i->nama_kelas }}</span></td><td>{{ $i->wali->nama ?? '-' }}</td><td>{{ $i->siswa_count }}</td>
<td class="text-center">@include('layouts._actions', ['r' => 'kelas', 'id' => $i->id])</td></tr>
@empty<tr><td colspan="5" class="text-center">Belum ada data.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
