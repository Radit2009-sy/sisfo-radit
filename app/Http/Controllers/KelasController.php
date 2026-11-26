<?php
namespace App\Http\Controllers;
use App\Models\{Kelas, Guru};
use Illuminate\Http\Request;
class KelasController extends Controller {
    public function index(Request $r) {
        $items = Kelas::with('wali')->withCount('siswa')
            ->when($r->q, fn ($q, $s) => $q->where('nama_kelas', 'like', "%$s%"))->orderBy('nama_kelas')->get();
        return view('kelas.index', compact('items'));
    }
    public function create() { return view('kelas.form', ['item' => null, 'guru' => Guru::orderBy('nama')->get()]); }
    public function edit(Kelas $kela) { return view('kelas.form', ['item' => $kela, 'guru' => Guru::orderBy('nama')->get()]); }
    public function store(Request $r) { Kelas::create($this->valid($r)); return redirect()->route('kelas.index')->with('success', 'Kelas ditambahkan.'); }
    public function update(Request $r, Kelas $kela) { $kela->update($this->valid($r, $kela->id)); return redirect()->route('kelas.index')->with('success', 'Kelas diperbarui.'); }
    public function destroy(Kelas $kela) { $kela->delete(); return back()->with('success', 'Kelas dihapus.'); }
    private function valid(Request $r, $id = null) {
        return $r->validate(['nama_kelas' => 'required|max:50|unique:kelas,nama_kelas,' . $id, 'wali_kelas_id' => 'nullable|exists:guru,id']);
    }
}
