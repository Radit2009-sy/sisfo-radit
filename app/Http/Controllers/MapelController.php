<?php
namespace App\Http\Controllers;
use App\Models\Mapel;
use Illuminate\Http\Request;
class MapelController extends Controller {
    public function index(Request $r) {
        $items = Mapel::when($r->q, fn ($q, $s) => $q->where(fn ($w) => $w->where('nama', 'like', "%$s%")->orWhere('kode', 'like', "%$s%")))->orderBy('id')->get();
        return view('mapel.index', compact('items'));
    }
    public function create() { return view('mapel.form', ['item' => null]); }
    public function edit(Mapel $mapel) { return view('mapel.form', ['item' => $mapel]); }
    public function store(Request $r) { Mapel::create($this->valid($r)); return redirect()->route('mapel.index')->with('success', 'Mapel ditambahkan.'); }
    public function update(Request $r, Mapel $mapel) { $mapel->update($this->valid($r, $mapel->id)); return redirect()->route('mapel.index')->with('success', 'Mapel diperbarui.'); }
    public function destroy(Mapel $mapel) { $mapel->delete(); return back()->with('success', 'Mapel dihapus.'); }
    private function valid(Request $r, $id = null) {
        return $r->validate(['kode' => 'required|max:20|unique:mapel,kode,' . $id, 'nama' => 'required|max:100', 'kkm' => 'required|integer|between:0,100']);
    }
}
