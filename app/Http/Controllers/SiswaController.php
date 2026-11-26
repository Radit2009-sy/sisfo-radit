<?php
namespace App\Http\Controllers;
use App\Models\{Siswa, Kelas};
use Illuminate\Http\Request;
class SiswaController extends Controller {
    public function index(Request $r) {
        $items = Siswa::with('kelas')->when($r->q, fn ($q, $s) => $q->where(fn ($w) => $w->where('nama', 'like', "%$s%")->orWhere('nis', 'like', "%$s%")))
            ->orderBy('nis')->get();
        return view('siswa.index', compact('items'));
    }
    public function show(Siswa $siswa) { $siswa->load('kelas', 'nilai.mapel'); return view('siswa.show', ['item' => $siswa]); }
    public function create() { return view('siswa.form', ['item' => null, 'kelas' => Kelas::orderBy('nama_kelas')->get()]); }
    public function edit(Siswa $siswa) { return view('siswa.form', ['item' => $siswa, 'kelas' => Kelas::orderBy('nama_kelas')->get()]); }
    public function store(Request $r) { Siswa::create($this->valid($r)); return redirect()->route('siswa.index')->with('success', 'Siswa ditambahkan.'); }
    public function update(Request $r, Siswa $siswa) { $siswa->update($this->valid($r, $siswa->id)); return redirect()->route('siswa.index')->with('success', 'Siswa diperbarui.'); }
    public function destroy(Siswa $siswa) { $siswa->delete(); return back()->with('success', 'Siswa dihapus.'); }
    private function valid(Request $r, $id = null) {
        return $r->validate([
            'nis' => 'required|max:20|unique:siswa,nis,' . $id, 'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P', 'kelas_id' => 'required|exists:kelas,id', 'no_hp' => 'nullable|max:20',
        ]);
    }
}
