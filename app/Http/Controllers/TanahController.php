<?php

namespace App\Http\Controllers;

use App\Http\Requests\TanahStoreRequest;
use App\Http\Requests\TanahUpdateRequest;
use App\Models\Project;
use App\Models\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanahs = Tanah::orderBy('date_buy', 'desc')->paginate(15);
        return view('tanah.tanah', compact('tanahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        return view('tanah.addtanah', compact('projects'));
    }

    public function print()
    {
        $tanahs = Tanah::get();
        // return view('pages.transaksi.invoice-print', compact('kendaraans'));
        $pdf = app('dompdf.wrapper')->loadView('tanah.print', compact('tanahs'));
        $pdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');

        return $pdf->stream('databangunan.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TanahStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TanahStoreRequest $request)
    {
        $input = $request->safe([
            'inp_name', 'inp_project', 'inp_inv_card', 'inp_harga', 'inp_lokasi', 'inp_kondisi', 'inp_tglpembelian', 'inp_pemakai', 'inp_tglpeminjaman'
        ]);

        $add = Tanah::create([
            'name' => $input['inp_name'],
            'inventory_card' => $input['inp_inv_card'],
            'project' => $input['inp_project'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'],
            'condition' => $input['inp_kondisi'],
            'date_buy' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],
            'loan_date' => $input['inp_tglpeminjaman'],

        ]);
        return redirect()->route('tanah.index')->with('success', "Data produk berhasil ditambahkan");;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanah $tanah)
    {
        $projects = Project::get();
        return view('tanah.edittanah', compact('tanah', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TanahUpdateRequest $request
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function update(TanahUpdateRequest $request, Tanah $tanah)
    {
        $input = $request->safe([
            'inp_name', 'inp_project', 'inp_inv_card', 'inp_harga', 'inp_lokasi', 'inp_kondisi', 'inp_tglpembelian', 'inp_pemakai', 'inp_tglpeminjaman'
        ]);
        $update = $tanah->update([
            'name' => $input['inp_name'],
            'inventory_card' => $input['inp_inv_card'],
            'project' => $input['inp_project'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'],
            'condition' => $input['inp_kondisi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'date_buy' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],

        ]);
        if (!$update) {
            return redirect()->back()->with('error', "Terjadi kesalahan pada sistem");
        }

        return redirect()->route('tanah.index')->with('success', "Data tanah berhasil diubah");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TanahUpdateRequest $request
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function approve(Tanah $tanah)
    {
        $update = $tanah->update([
            'status' => 1
        ]);
        if (!$update) {
            return redirect()->back()->with('error', "Terjadi kesalahan pada sistem");
        }

        return redirect()->route('tanah.index')->with('success', "Data tanah {$tanah->name} berhasil diapprove");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanah  $tanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanah $tanah)
    {
        $tanah->delete();
        return redirect()->route('tanah.index')->with('success', "Data tanah berhasil dihapus");
    }
}
