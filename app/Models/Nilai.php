<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Nilai extends Model {
    protected $table = 'nilai';
    protected $guarded = [];
    public function siswa() { return $this->belongsTo(Siswa::class); }
    public function mapel() { return $this->belongsTo(Mapel::class); }
    public function getLulusAttribute() { return $this->nilai_akhir >= $this->mapel->kkm; }
    public static function hitung($tugas, $uts, $uas) { return round($tugas * 0.3 + $uts * 0.3 + $uas * 0.4, 2); }
}
