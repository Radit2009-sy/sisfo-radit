<?php
namespace App\Http\Controllers;
use App\Models\{Siswa, Guru, Kelas, Mapel};
class DashboardController extends Controller {
    public function index() {
        return view('dashboard.index', [
            'siswa' => Siswa::count(), 'guru' => Guru::count(), 'kelas' => Kelas::count(), 'mapel' => Mapel::count(),
        ]);
    }
}
