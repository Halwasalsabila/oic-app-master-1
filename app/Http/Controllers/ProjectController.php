<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Database\QueryException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('kategori_project.project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::get();
        return view('kategori_project.addproject', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $input = $request->safe([
            'inp_name',
        ]);
        try {
            $add = Project::create([
                'name' => $input['inp_name'],
                'slug' => Str::slug($input['inp_name'])
            ]);
            return redirect()->route('kategori_project.index')->with('success', "Data kategori project berhasil ditambah");
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->back()->with('error', "Data sudah tercatat di dalam database sistem ");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $check = $project->delete();
        if (!$check) {
            return redirect()->route('kategori_project.index')->with('error', "Data tidak bisa dihapus dikarenakan data ini terkait dengan data lain");
        }
        return redirect()->route('kategori_project.index')->with('success', "Data tanah berhasil dihapus");
    }
}
