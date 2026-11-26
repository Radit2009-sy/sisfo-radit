@extends('layouts.app')
@section('title', 'Dashboard') @section('icon', 'fa-tachometer-alt') @section('heading', 'Dashboard')
@section('content')
<div class="row">
@foreach ([['Siswa', $siswa, 'fa-user-graduate', 'primary'], ['Guru', $guru, 'fa-chalkboard-teacher', 'success'], ['Kelas', $kelas, 'fa-school', 'info'], ['Mata Pelajaran', $mapel, 'fa-book', 'warning']] as [$l, $n, $i, $c])
    <div class="col-xl-3 col-md-6 mb-4"><div class="card border-left-{{ $c }} shadow h-100 py-2"><div class="card-body"><div class="row no-gutters align-items-center">
        <div class="col mr-2"><div class="text-xs font-weight-bold text-{{ $c }} text-uppercase mb-1">{{ $l }}</div><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $n }}</div></div>
        <div class="col-auto"><i class="fas {{ $i }} fa-2x text-gray-300"></i></div>
    </div></div></div></div>
@endforeach
</div>
@endsection
