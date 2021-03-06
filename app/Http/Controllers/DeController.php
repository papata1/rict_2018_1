<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Department;
use App\Http\Requests\DepartRequest;
use Illuminate\Support\Facades\DB;

class DeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      $des = DB::table('department')->get();
      return view('de.index', compact('des'));
    }
    public function create(){
    return view('/de.create');
    }
    public function store(DepartRequest $request)
     {
       Department::create($request->all());
        return redirect()->route('de.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Department $de)
    {
        return view('de.edit',compact('de'));
    }

    public function update(DeRequest $request,Department $de)
   {

       $de->update($request->all());
       return redirect()->route('de.index')->with('message','item has been updated successfully');
   }

     public function destroy(Department $de)
     {
        $de->delete();
        return redirect()->route('de.index')->with('message','item has been deleted successfully');
     }
}
