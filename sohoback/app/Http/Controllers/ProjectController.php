<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Storage;



class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
		$projects = Project::where('status', 1)->get();

        return view('admin.projects.index', compact('projects') );
    }

	public function store(Request $request){

		$imageInputLogo = $request->file('logo');
		$path_logo = Storage::disk('public')->put('proyectos', $imageInputLogo);

		$imageInputImg = $request->file('image');
		$path_img = Storage::disk('public')->put('proyectos', $imageInputImg);

		$projects = Project::create([
			'name' => $request->name,
			'description' => $request->description,
			'tags' => $request->tags,
			'logo' => $path_logo,
			'image' => $path_img,
			'url' => $request->url,
			'background_color' => $request->background_color,
			'font_color' => $request->font_color,
			
		]);
		
		return redirect()->back();
	}

	public function edit($id){
		$project = Project::find($id);

		return view('admin.projects.edit', compact('project'));
	}

	public function update(Request $request, $id){
		$project = Project::find($id);

		$project->name = $request->name;
		$project->tags = $request->tags;
		$project->description = $request->description;
		$project->url = $request->url;
		$project->background_color = $request->background_color;
		$project->font_color = $request->font_color;
		
		$project->save();

		return redirect()->route('projects.index');
	}

	public function destroy($id)
	{
		$project = Project::find($id);

		$project->delete();

		return redirect()->back();
	
	}

}
