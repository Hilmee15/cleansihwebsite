<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Outlet::all();
        return view('outlet.index', compact('data'));
    }

    public function viewIndex()
    {
        return view('outlet.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        Outlet::create($data);
        return redirect()->route('outlet.view')->with('success', 'Outlet created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();

        $outlet = Outlet::findOrFail($id);

        $outlet->update($input);
        return redirect()->route('outlet.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();
        return redirect()->route('outlet.view')->with('success', 'Berhasil Menghapus Data Laundry');
    }
}
