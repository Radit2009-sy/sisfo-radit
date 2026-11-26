<?php
namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;
class GuruController extends Controller {
    public function index(Request $r) {
        $items = Guru::when($r->q, fn ($q, $s) => $q->where(fn ($w) => $w->where('nama', 'like', "%$s%")->orWhere('nip', 'like', "%$s%")))->orderBy('nama')->get();
        return view('guru.index', compact('items'));
    }
    public function create() { return view('guru.form', ['item' => null]); }
    public function edit(Guru $guru) { return view('guru.form', ['item' => $guru]); }
    public function store(Request $r) { Guru::create($this->valid($r)); return redirect()->route('guru.index')->with('success', 'Guru ditambahkan.'); }
    public function update(Request $r, Guru $guru) { $guru->update($this->valid($r, $guru->id)); return redirect()->route('guru.index')->with('success', 'Guru diperbarui.'); }
    public function destroy(Guru $guru) { $guru->delete(); return back()->with('success', 'Guru dihapus.'); }
    private function valid(Request $r, $id = null) {
        return $r->validate([
            'nip' => 'required|max:30|unique:guru,nip,' . $id, 'nama' => 'required|max:100', 'gender' => 'required|in:L,P',
            'email' => 'nullable|email', 'no_hp' => 'nullable|max:20',
        ]);
    }
}
