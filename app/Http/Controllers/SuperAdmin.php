<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=>'success',
            'data'=> [
                    'id' => 1,
                    'name' => 'Super Admin',
                    'email' =>'superadmin@example.com',
                    'password' => 'password'
            ]
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adminvalidte=validator([$data=[
            'frist_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' =>['required', 'string', 'email', 'max:255', 'unique:super-admins'],
            'password' =>['required', 'string', 'min:8', 'confirmed']
        ]]);
        if($adminvalidte->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$adminvalidte->errors()->first()
            ]);
        }
        $superadmin=new SuperAdmin;
        $superadmin->create(
            [
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'emai'=>$request->email,
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
               'status'=>'success',
               'data'=>$request->email
            ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
