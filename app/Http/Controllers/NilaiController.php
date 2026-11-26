<?php
namespace App\Http\Controllers;
use App\Models\{Nilai, Siswa, Mapel};
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class NilaiController extends Controller {
    public function index(Request $r) {
        $items = Nilai::with('siswa.kelas', 'mapel')
            ->when($r->q, fn ($q, $s) => $q->whereHas('siswa', fn ($w) => $w->where('nama', 'like', "%$s%"))->orWhereHas('mapel', fn ($w) => $w->where('nama', 'like', "%$s%")))
            ->orderBy('siswa_id')->get();
        return view('nilai.index', compact('items'));
    }
    public function create() { return view('nilai.form', ['item' => null] + $this->opts()); }
    public function edit(Nilai $nilai) { return view('nilai.form', ['item' => $nilai] + $this->opts()); }
    public function store(Request $r) {
        $d = $this->valid($r); $d['nilai_akhir'] = Nilai::hitung($d['nilai_tugas'], $d['nilai_uts'], $d['nilai_uas']);
        Nilai::create($d); return redirect()->route('nilai.index')->with('success', 'Nilai disimpan.');
    }
    public function update(Request $r, Nilai $nilai) {
        $d = $this->valid($r, $nilai->id); $d['nilai_akhir'] = Nilai::hitung($d['nilai_tugas'], $d['nilai_uts'], $d['nilai_uas']);
        $nilai->update($d); return redirect()->route('nilai.index')->with('success', 'Nilai diperbarui.');
    }
    public function destroy(Nilai $nilai) { $nilai->delete(); return back()->with('success', 'Nilai dihapus.'); }
    private function opts() { return ['siswa' => Siswa::with('kelas')->orderBy('nama')->get(), 'mapel' => Mapel::orderBy('nama')->get()]; }
    private function valid(Request $r, $id = null) {
        return $r->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => ['required', 'exists:mapel,id', Rule::unique('nilai')->where('siswa_id', $r->siswa_id)->ignore($id)],
            'nilai_tugas' => 'required|numeric|between:0,100', 'nilai_uts' => 'required|numeric|between:0,100', 'nilai_uas' => 'required|numeric|between:0,100',
        ], ['mapel_id.unique' => 'Nilai siswa untuk mapel ini sudah ada.']);
    }
}
