<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::all();
        $outlet = Outlet::all();
        $paket = Paket::all();
        return view('transaksi.index', compact('data', 'outlet', 'paket'));
    }

    public function viewTransaksi()
    {
        return view('transaksi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Transaksi::create($data);
        return redirect()->route('transaksi.view');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update($input);
        return redirect()->route('transaksi.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->delete();
        return redirect()->route('transaksi.view')->with('success', 'Berhasil menghapus data');
    }
}
