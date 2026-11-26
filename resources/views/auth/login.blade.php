<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login - SISFO Akademik</title>
<link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,400,600,700,800" rel="stylesheet">
<link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet"></head>
<body class="bg-gradient-primary"><div class="container"><div class="row justify-content-center"><div class="col-xl-5 col-lg-6 col-md-8">
<div class="card o-hidden border-0 shadow-lg my-5"><div class="card-body p-5">
    <div class="text-center"><h1 class="h4 text-gray-900 mb-4"><i class="fas fa-graduation-cap text-primary"></i> SISFO Akademik</h1></div>
    @if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('login') }}" class="user">@csrf
        <div class="form-group"><input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Email" required autofocus></div>
        <div class="form-group"><input type="password" name="password" class="form-control form-control-user" placeholder="Password" required></div>
        <div class="form-group"><div class="custom-control custom-checkbox small"><input type="checkbox" name="remember" class="custom-control-input" id="rm"><label class="custom-control-label" for="rm">Ingat saya</label></div></div>
        <button class="btn btn-primary btn-user btn-block">Login</button>
    </form>
</div></div></div></div></div></body></html>
