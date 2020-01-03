<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
class AdminDepts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depts = Department::all();
        return view('admin.departments.index', compact('depts'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'roomNo' => 'required',
            'deptName' => 'required'
        ]);
        Department::create($request->all());
        return redirect()->back()
            ->with('success','Department has been added succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'roomNo' => 'required',
            'deptName' => 'required'
        ]);
        $dept = Department::find($id);
        $dept->roomNo = $request->get('roomNo');
        $dept->deptName = $request->get('deptName');
        $dept->save();
        return redirect()->back()
            ->with('success','Department has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    
        $dept = Department::find($id);
        $dept->delete();
            return redirect()->back()
        ->with("success","Department deleted Successfully!");
    }
}
