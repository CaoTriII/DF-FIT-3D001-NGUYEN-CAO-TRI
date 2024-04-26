<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Models\Hotel;
use App\Models\BookingModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','ASC')->where('status','!=',3)->get();

        return view ('admin.modules.user.index', [
            'users' =>$users,

        ]);
    }
    public function create()
    {
        return view ('admin.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $user = new User();
        $file =$request->image;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->full_name = $request->full_name;
        $user->level = $request->level;
        $user->status = $request->status;
        $user->phone = $request->phone;
        $user->image = $fileName;
        $user->save();
        $file->move(public_path('uploads/'), $fileName);
        return redirect()->route('login')->with('success', 'Create user successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::find($id);
        if($user == null){
            abort(404);
        }
        return view ('admin.modules.user.edit',[
            'id'=>$id,
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $user =User::findOrFail($id);
        $file =$request->image;
        if(!empty($file)){
            $request ->validate([
                'image'=> 'required|mimes:jpg,bmp,png,jpeg',
            ],[
                'image.required'=>'Please enter user image',
                'image.mimes'=>'Image must be jpg,bmp,png,jpeg'
            ]);

            $old_image_path = public_path('uploads/' . $user->image);
            if(file_exists($old_image_path)){
                unlink($old_image_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $user->image = $fileName;
            $file->move(public_path('uploads/'), $fileName);
        }
        $user->email = $request->email;
        if(!empty($request->password)){
            $request->validate([
                'password'=> 'required|confirmed',
            ],[
                'password.required'=>'Please enter password',
                'password.confirmed'=>'Confirmation password does\'nt match',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->full_name = $request->full_name;
        $user->level = $request->level;
        $user->status = $request->status;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('client.index')->with('success', 'Update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->status = 3;
        $user->save();
    }
}
