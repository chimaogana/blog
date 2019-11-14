<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
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
        $permissions =Permission::all();
        return view('admin.permission.show',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'for'=>'required'
        ]);
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->for = $request->for;
        
        
        $permission->save();
        return redirect(route('Permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit( $permission)
    {
       $permission = Permission::find($permission);
        
        return view('admin.Permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $permission)
    {
        $this->validate($request,[
            'name'=>'required',
            'for' =>'required'
        ]);
        $permission =Permission::find($permission);
        $permission->name =$request->name;
        $permission->for =$request->for;
        $permission->save();
        return redirect(route('Permission.index'))->with('success','Permission updated succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        
        Permission::where('id',$permission)->delete();
        return redirect()->back()->with('success','Permission delete successfully');
    }
}
