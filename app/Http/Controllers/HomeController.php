<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use App\Department;
use App\project;
use App\supervisor;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function add(Request $request)  {
        //dd($request->all());
        
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'dept_id'=>'required'

        ]);

        /*employee::create($request->all());


        return back()->withStatus(' Successfully added Employee');*/

     $department = $request->dept_id;

        employee::insert([
            'dept_id' =>$department,
            'name' =>$request->name,
            'phone' =>$request->phone,
            'email' =>$request->email,


        ]);
       
        

        
    }



    public function employee_list(){
        $data = employee::all();
        $department=department::all();
        return $data;
        return $department;



    }

    public function employee_edit($id){

        $data=employee::find($id);


        $project=project::find($id);

        
        return view('edit',compact('data','project'));
       
        
    }

    public function update(Request $request , $id){

        employee::find($id)->update($request->all());

        return back();


      
    }

    public function delete( $id){
        
        employee::find($id)->delete();

        return back();

    }
    public function d_index(){

        return view('/department/view');
        
       

    }
   public function department_add(Request $request)  {
        
        //$this->validate($request,[
        //    'name'=>'required'

       // ]);

        Department::create([
            'name' => $request->name,
          
           

        ]);
        return back()->withStatus(' Successfully added Department');
        

        
    }

    public function department_show(){
        $data = department::all();
        return $data;



    }
    public function superviser_add(Request $request){

        $e_id = $request->employee_id;
        $p_id = $request->projects_id;

        supervisor::insert([
           'employee_id'=>$e_id,
           'project_id'=>$p_id,
        ]);
        return back();

    }


      public function supervisor_show(){

        $data = supervisor::all();
       
        return $data;
        



    }




}
