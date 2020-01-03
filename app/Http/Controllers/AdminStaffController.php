<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Department;
use App\Performance;
use App\Trace;
use Auth;
use App\Category;
class AdminStaffController extends Controller
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
        $staffs = User::all();
        return view('admin.staff.index', compact('staffs','depts'))->with('i');
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
        if(isset($_POST['form2']))
        {
            $trace = new Trace();
            $trace->category_id = $request->get('category');
            $trace->admin_id = Auth::User()->id;
            $trace->user_id = $request->get('user_id');
            $status = $request->get('status');
            if($status == "add")
            {
                $trace->points = +$request->get('points');
            }else
            if($status == "deduct")
            {
                $trace->points = -$request->get('points');
            }
            
            $trace->save();
            $perfomid = Performance::where('staff_id',$request->get('user_id'))->pluck('id');
            //dd($perfomid[0]);
            $perfom = Performance::find($perfomid[0]);
            if($status == "add")
            {
            $perfom->points = $request->get('total') + $request->get('points');
            }else
            if($status == "deduct")
            {
                $perfom->points = $request->get('total') - $request->get('points');
            }
            //dd($perfom->points);
            $perfom->save();
            return redirect()->back()
            ->with('success','Performance has been added succesfully.');
        }
        else if(isset($_POST['form1']))
        {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->otherNames = $request->get('otherNames');
            $user->staffNo = $request->get('staffNo');
            $user->deptId = $request->get('deptId');
            $user->phone = $request->get('phone');
            $user->position = $request->get('position');
            $user->password = Hash::make('Staff123');

            $perfomance = new Performance();
            $perfomance->points = "360";
            $uid = User::max('id');
            //dd($uid);
            $newid = $uid + 1;
            $perfomance->staff_id = $newid;
            $user->save();            
            $perfomance->save();
            return redirect()->back()
            ->with('success','Staff has been added succesfully.');
        }
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
        $depts = Department::all();
        $traces = Trace::where('user_id',$id)->get();
        $performs = Performance::where('staff_id',$id)->get();
        $cats = Category::all();
        $staffs = User::find($id);
        return view('admin.staff.details', compact('staffs','depts','traces','performs','cats'))->with('i');
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
    }
}
