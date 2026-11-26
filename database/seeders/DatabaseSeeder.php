<?php
namespace Database\Seeders;
use App\Models\{User, Guru, Kelas, Siswa, Mapel, Nilai};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::forceCreate(['name' => 'Administrator SISFO', 'email' => 'admin@sisfo.test', 'password' => Hash::make('password'), 'role' => 'admin']);
        $g1 = Guru::create(['nip' => '198501152010011001', 'nama' => 'Drs. Ahmad Dahlan, M.Pd', 'gender' => 'L', 'email' => 'ahmad.dahlan@sekolah.sch.id', 'no_hp' => '081399887766']);
        Guru::create(['nip' => '199003202015022002', 'nama' => 'Dewi Sartika, S.Kom', 'gender' => 'P', 'email' => 'dewi.sartika@sekolah.sch.id', 'no_hp' => '081544332211']);
        $k1 = Kelas::create(['nama_kelas' => 'XI RPL 1', 'wali_kelas_id' => $g1->id]);
        $k2 = Kelas::create(['nama_kelas' => 'XI RPL 2']);
        $budi = Siswa::create(['nis' => '2026001', 'nama' => 'Budi Santoso', 'jenis_kelamin' => 'L', 'kelas_id' => $k1->id, 'no_hp' => '081234567890']);
        $siti = Siswa::create(['nis' => '2026002', 'nama' => 'Siti Nurhaliza', 'jenis_kelamin' => 'P', 'kelas_id' => $k1->id, 'no_hp' => '081987654321']);
        Siswa::create(['nis' => '2026003', 'nama' => 'Rizky Pratama', 'jenis_kelamin' => 'L', 'kelas_id' => $k2->id, 'no_hp' => '082112233445']);
        $pwpb = Mapel::create(['kode' => 'MP-PWPB', 'nama' => 'Pemrograman Web & Perangkat Bergerak', 'kkm' => 75]);
        Mapel::create(['kode' => 'MP-PBO', 'nama' => 'Pemrograman Berorientasi Objek', 'kkm' => 75]);
        $bd = Mapel::create(['kode' => 'MP-BASDAT', 'nama' => 'Basis Data', 'kkm' => 78]);
        foreach ([[$budi, $pwpb, 85, 80, 90], [$budi, $bd, 90, 88, 92], [$siti, $pwpb, 80, 76, 100]] as [$s, $m, $t, $u, $a]) {
            Nilai::create(['siswa_id' => $s->id, 'mapel_id' => $m->id, 'nilai_tugas' => $t, 'nilai_uts' => $u, 'nilai_uas' => $a, 'nilai_akhir' => Nilai::hitung($t, $u, $a)]);
        }
    }
}
