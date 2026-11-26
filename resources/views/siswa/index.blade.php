@extends('layouts.app')
@section('title', 'Data Siswa') @section('icon', 'fa-user-graduate') @section('heading', 'Data Siswa')
@section('action')<a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah Siswa</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Siswa Terdaftar</h6></div>
<div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped">
<thead class="bg-primary text-white"><tr><th>No</th><th>NIS</th><th>Nama Siswa</th><th>Jenis Kelamin</th><th>Kelas</th><th>No HP</th><th class="text-center">Aksi</th></tr></thead>
<tbody>@forelse ($items as $i)
<tr><td>{{ $loop->iteration }}</td><td><span class="badge badge-secondary">{{ $i->nis }}</span></td><td>{{ $i->nama }}</td>
<td><span class="badge badge-{{ $i->jenis_kelamin === 'L' ? 'primary' : 'danger' }}">{{ $i->jk_label }}</span></td>
<td><span class="badge badge-info">{{ $i->kelas->nama_kelas }}</span></td><td>{{ $i->no_hp }}</td>
<td class="text-center text-nowrap"><a href="{{ route('siswa.show', $i->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></a>
@include('layouts._actions', ['r' => 'siswa', 'id' => $i->id])</td></tr>
@empty<tr><td colspan="7" class="text-center">Belum ada data.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
