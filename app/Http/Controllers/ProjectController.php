<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use App\supervisor;

class ProjectController extends Controller
{
     public function project_show(){
        $data = project::all();
        return $data;



    }
    public function index(){
     	return view('project/view');
        



    }
    public function add(Request $request)  {

       project::insert($request->all());
       return back();
    	


    }

    public function delete( $id){
        
        project::find($id)->delete();
        //supervisor::where('project_id','=',$id)->delete();

        return back();

    }




     
}
