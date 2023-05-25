<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeStoreRequest;
use App\Http\Requests\OfficeUpdateRequest;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::latest()->paginate(15);
        return view('office.office', compact('offices'));
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
        return view('office.addoffice', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OfficeStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeStoreRequest $request)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai', 'inp_total', 'inp_satuan', 'inp_jumlah'
        ]);
        if (isset($input['inp_total']))
            if ($input['inp_total'] === $input['inp_jumlah'] * $input['inp_harga']) {
                return redirect()->back()->withInput()->with('error', "Terjadi kesalahan pada sistem");
            }
        $create = Office::create([
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
            'amount' => $input['inp_jumlah'],
            'unit' => $input['inp_satuan'],
            'total' => $input['inp_jumlah'] * $input['inp_harga']
        ]);
        return redirect()->route('office.index')->with('success', "Data produk berhasil ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        $projects = Project::get();
        return view('office.editoffice', compact('office', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OfficeUpdateRequest $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeUpdateRequest $request, Office $office)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai', 'inp_total', 'inp_satuan', 'inp_jumlah'
        ]);
        if (isset($input['inp_total']))
            if ($input['inp_total'] === $input['inp_jumlah'] * $input['inp_harga']) {
                return redirect()->back()->withInput()->with('error', "Terjadi kesalahan pada sistem");
            }
        $update = $office->update([
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
            'amount' => $input['inp_jumlah'],
            'unit' => $input['inp_satuan'],
            'total' => $input['inp_jumlah'] * $input['inp_harga']
        ]);
        if (!$update) {
            return redirect()->back()->with('error', "Terjadi kesalahan pada sistem");
        }

        return redirect()->route('office.index')->with('success', "Data office berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('office.index')->with('success', "Data office berhasil dihapus");
    }
}
