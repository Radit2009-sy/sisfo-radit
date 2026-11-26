<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Siswa extends Model {
    protected $table = 'siswa';
    protected $guarded = [];
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function nilai() { return $this->hasMany(Nilai::class); }
    public function getJkLabelAttribute() { return $this->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan'; }
}
