@extends('layouts.app')
@section('title', 'Data Mata Pelajaran') @section('icon', 'fa-book') @section('heading', 'Data Mata Pelajaran')
@section('action')<a href="{{ route('mapel.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah Mapel</a>@endsection
@section('content')
<div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Mata Pelajaran</h6></div>
<div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped">
<thead class="bg-primary text-white"><tr><th>No</th><th>Kode Mapel</th><th>Nama Mata Pelajaran</th><th>KKM Minimum</th><th class="text-center">Aksi</th></tr></thead>
<tbody>@forelse ($items as $i)
<tr><td>{{ $loop->iteration }}</td><td><span class="badge badge-secondary">{{ $i->kode }}</span></td><td>{{ $i->nama }}</td><td><span class="badge badge-warning">{{ $i->kkm }}</span></td>
<td class="text-center">@include('layouts._actions', ['r' => 'mapel', 'id' => $i->id])</td></tr>
@empty<tr><td colspan="5" class="text-center">Belum ada data.</td></tr>@endforelse</tbody></table></div></div></div>
@endsection
