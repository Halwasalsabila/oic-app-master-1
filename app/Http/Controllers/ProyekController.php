<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

class ProyekController extends Controller
{
    //
    public function index(Project $type_project)
    {
        $projects = Proyek::whereHas('projects', function ($query) use ($type_project) {
            $query->where('slug', $type_project->slug);
        })->latest()->paginate(15);
        return view('project.project', compact('projects', 'type_project'));
    }


    /*
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Project $type_project)
    {
        $projects = Project::get();
        return view('project.addproject', compact('projects', 'type_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $type_project, ProjectStoreRequest $request)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
        $create = Proyek::create([
            'name' => $input['inp_name'],
            'project' => $type_project->id,
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],

        ]);
        return redirect()->route('project.index', $type_project->slug)->with('success', "Data project " . $type_project->name . " berhasil ditambahkan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $type_project
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $type_project, Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('project.index', $type_project->slug)->with('success', "Data project " . $type_project->name . " berhasil dihapus");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $type_project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $type_project, Proyek $proyek)
    {
        $projects = Project::get();
        return view('project.editproject', compact('proyek', 'projects', 'type_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Project $type_project,  ProjectUpdateRequest $request, Proyek $proyek)
    {
        $input = $request->safe([
            'inp_name', 'inp_inv_card', 'inp_project', 'inp_lokasi', 'inp_harga', 'inp_deskripsi', 'inp_kondisi', 'inp_tglpeminjaman', 'inp_tglpembelian', 'inp_pemakai'
        ]);
        $create = $proyek->update([
            'name' => $input['inp_name'],
            'project' => $type_project->id,
            'inventory_card' => $input['inp_inv_card'],
            'location' => $input['inp_lokasi'],
            'price' => $input['inp_harga'] ?? 0,
            'condition' => $input['inp_kondisi'],
            'description' => $input['inp_deskripsi'],
            'loan_date' => $input['inp_tglpeminjaman'],
            'buy_date' => $input['inp_tglpembelian'],
            'user' => $input['inp_pemakai'],

        ]);
        return redirect()->route('project.index', $type_project->slug)->with('success', "Data project " . $type_project->name . " berhasil diubah");
    }
}
