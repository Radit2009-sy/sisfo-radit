@extends('layouts.app')
@section('title', 'Data Guru') @section('icon', 'fa-chalkboard-teacher') @section('heading', 'Data Guru')
@section('action')<a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah Guru</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Guru / Tenaga Pendidik</h6></div>
<div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped">
<thead class="bg-primary text-white"><tr><th>No</th><th>NIP</th><th>Nama Guru</th><th>Gender</th><th>Email</th><th>No HP</th><th class="text-center">Aksi</th></tr></thead>
<tbody>@forelse ($items as $i)
<tr><td>{{ $loop->iteration }}</td><td><span class="badge badge-secondary">{{ $i->nip }}</span></td><td>{{ $i->nama }}</td>
<td><span class="badge badge-{{ $i->gender === 'L' ? 'primary' : 'danger' }}">{{ $i->gender_label }}</span></td><td>{{ $i->email }}</td><td>{{ $i->no_hp }}</td>
<td class="text-center text-nowrap">@include('layouts._actions', ['r' => 'guru', 'id' => $i->id])</td></tr>
@empty<tr><td colspan="7" class="text-center">Belum ada data.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
