<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->wantsJson()){
            return User::paginate(15)->toJson();
        }

        $deleteRoute = 'users.destroy';
        $editRoute ='/users/';

        if(auth()->user()->cannot('delete', new User())) {
            $deleteRoute = null;
        }
        
        return Inertia::render('User/Index', ['users' => User::paginate(15), 'deleteRoute'=>$deleteRoute, 'editRoute'=> $editRoute]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if(request()->wantsJson()){
            return $user->toJson();
        }
        return "(show) ".$user->name;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::where(['id' => $request->id])->first();
        $user->name = $request->name;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
