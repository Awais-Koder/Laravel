<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationForm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Register::paginate(10);
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationRequest $request)
    {
        $input  = $request->all();
        $input['password'] =  Hash::make($input['password']);
        Register::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function showTrash()
    {
        $users = Register::onlyTrashed()->get();
        return view('trash',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $user)
    {
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Register::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save();
        $user->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Register::find($id);
        $user->delete();
        return redirect()->back();
    }
    // 
    public function restoreRecord($id){
        $record = Register::onlyTrashed()->find($id);
        $record->restore();
        return redirect()->back();
    }
    public function deleteRecord($id){
        $record = Register::onlyTrashed()->find($id);
        $record->forceDelete();
        return redirect()->back();
    }
}
