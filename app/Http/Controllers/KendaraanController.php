<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Requests\KendaraanStoreRequest;
use App\Http\Requests\KendaraanUpdateRequest;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraans = Kendaraan::latest()->paginate(15);
        return view('kendaraan.kendaraan', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        return view('kendaraan.addkendaraan', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KendaraanStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KendaraanStoreRequest $request)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_residu', 'inp_penyusutan', 'inp_ekonomis', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
        $create = Kendaraan::create([
            'name' => $input['inp_name'],
            'project' => $input['inp_project'],
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => (int) $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],
            'residu_value' => (int) $input['inp_residu'],
            'economic_value' => (int) $input['inp_ekonomis'],
            'depreciation_value' => (int) $input['inp_penyusutan'],
        ]);
        return redirect()->route('kendaraan.index')->with('success', "Data produk berhasil ditambahkan");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        $projects = Project::get();
        return view('kendaraan.editkendaraan', compact('kendaraan', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KendaraanUpdateRequest $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(KendaraanUpdateRequest $request, Kendaraan $kendaraan)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_residu', 'inp_penyusutan', 'inp_ekonomis', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
        $update = $kendaraan->update([
            'name' => $input['inp_name'],
            'project' => $input['inp_project'],
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => (int) $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],
            'residu_value' => (int) $input['inp_residu'],
            'economic_value' => (int) $input['inp_ekonomis'],
            'depreciation_value' => (int) $input['inp_penyusutan'],
        ]);
        if (!$update) {
            return redirect()->back()->with('error', "Terjadi kesalahan pada sistem");
        }

        return redirect()->route('kendaraan.index')->with('success', "Data kendaraan berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success', "Data kendaraan berhasil dihapus");
    }
}
