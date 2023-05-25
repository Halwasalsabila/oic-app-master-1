<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuildStoreRequest;
use App\Http\Requests\BuildUpdateRequest;
use App\Models\Project;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builds = Build::latest()->paginate(15);
        return view('build.build', compact('builds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $projects = Project::get();
        return view('build.addbuild', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BuildStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildStoreRequest $request)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_residu', 'inp_ekonomis', 'inp_penyusutan', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
     
        $create = Build::create([
            'name' => $input['inp_name'],
            'project' => $input['inp_project'],
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],
            'residu_value' => (int) $input['inp_residu'],
            'economic_value' => (int) $input['inp_ekonomis'],
            'depreciation_value' => (int) $input['inp_penyusutan'],

        ]);
       
        return redirect()->route('build.index')->with('success', "Data bangunan berhasil ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function edit(Build $build)
    {
        $projects = Project::get();
        return view('build.editbuild', compact('build', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BuildUpdateRequest $request
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function update(BuildUpdateRequest $request, Build $build)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
        $update = $build->update([
            'name' => $input['inp_name'],
            'project' => $input['inp_project'],
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],

        ]);
        if (!$update) {
            return redirect()->back()->with('error', "Terjadi kesalahan pada sistem");
        }

        return redirect()->route('build.index')->with('success', "Data bangunan berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Build  $build
     * @return \Illuminate\Http\Response
     */
    public function destroy(Build $build)
    {
        $build->delete();
        return redirect()->route('build.index')->with('success', "Data bangunan berhasil dihapus");
    }
}
