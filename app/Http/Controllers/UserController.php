<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('users.index', ['users' => User::where('is_admin', 0)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $newUser = new User();
        $newUser ->name = $request->get('name');
        $newUser ->email = $request->get('email');
        $newUser ->hours_worked = $request->get('hours_worked');
        $newUser ->category_id = $request->get('category');
        $newUser ->password = $request->get('password');

        $newUser -> save();
        $newUser->assignRole('Employee');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        return view('users.form', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Redirector
     */
    public function update(Request $request, int $id)
    {

        $userUpdt = User::find($id);
        $userUpdt ->name = $request->get('name');
        $userUpdt ->email = $request->get('email');
        $userUpdt ->hours_worked = $request->get('hours_worked');
        $userUpdt ->category_id = $request->get('category');
        if ($request->password != null ) {
            $userUpdt ->password = Hash::make($request->get('password'));
        };
        $userUpdt -> save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }

    public function drop($id)
    {
        $dropUser = User::findOrFail($id);
        return view('users.drop', ['dropUser' => $dropUser]);
    }
}
