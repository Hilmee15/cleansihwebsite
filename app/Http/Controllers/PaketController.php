<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paket::all();
        $outlet = Outlet::all();
        return view('paket.index', compact('data', 'outlet'));
    }

    public function viewPaket()
    {
        return view('paket.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'outlet_id' => 'required|exists:outlets,id',
            'jenis' => 'required|in:kiloan,selimut,setrika',
            'nama_paket' => 'required|max:100',
            'harga' => 'required'
        ]);


        Paket::create($data);
        return redirect()->route('paket.view');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $paket = Paket::findOrFail($id);

        $paket->update($input);
        return redirect()->route('paket.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);

        $paket->delete();
        return redirect()->route('paket.view')->with('success', 'Berhasil menghapus data');
    }
}
