<?php

namespace App\Http\Controllers;

use App\Http\Models\Project;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all projects that relates to user id
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', ['projects'=>$projects]);
        }
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        //
        return view('projects.create',['company_id'=>$company_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save data
        if (Auth::check()) {
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            
            //if sucecess, sent flash and redirect to project page
            if ($project) {
                return redirect()->route('projects.show', ['project'=>$project->id])->with('success', 'project added successfully');
            }  
        }

        return back()->withInput()->with('error', 'Error creating project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //retrieve one data
        $project = Project::find($project->id);

        return view('projects.show', ['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //retrieve one data
        $project = Project::find($project->id);
        
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //save data
        $projectUpdate = Project::where('id', $project->id)->update([
                            'name'=>$request->input('name'),
                            'description'=>$request->input('description')
                        ]);
        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project'=>$project->id])->with('success', 'project update successfully');
        }
        //redirect
        return back()->withInput()->with('error', 'project could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findproject = Project::find($project->id);
        if ($findproject->delete()) {
            return redirect()->route('projects.index')->with('success', 'project delete successfully');
        }

        return back()->withInput()->with('error', 'project could not be delete');
    }
}
