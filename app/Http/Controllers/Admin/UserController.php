<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\admin\admin;
use App\Model\admin\role;



class UserController extends Controller
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
    {   $users= admin::all();
      
    

        return view('admin.user.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= role::all();
        
        return view('admin.user.create',compact('roles'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
      
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            

        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
         $user->roles()->sync($request->role);

       
       
        return redirect(route('user.index'));
        // $user->name =$request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;

        

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
         $roles= role::all();
        
        $user = admin::find($id);
       
        return view('admin.user.edit',compact('roles','user')); 
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
      
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required'
            

            

        ]);
        
        $request->status? : $request['status']=0;
        $user = admin::where('id',$id)->update($request->except(['_method','_token','role']));
        $user->roles()->sync($request->role);

    
        // return $role->id;
         admin::find($id)->role()->sync($request->role);
       
        return redirect(route('user.index'))->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back()->with('success','User deleted successfully');
    }
}
