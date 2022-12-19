<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       /*
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $is_admin = $request->get('is_admin',0);
        $is_active = $request->get('is_active',0);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();
       */

        User::create($request->all());

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("backend.users.edit",["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
     /*
        $name = $request->get('name');
        $email = $request->get('email');
        $is_admin = $request->get('is_admin',"0");
        $is_active = $request->get('is_active',"0");

        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();
     */

        dd($request->all());
        $user->update($request->all());

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(["message" => "Success", "id" => $user->user_id]);
    }

    public function getPassword(User $user)
    {
        return view("backend.users.password",["user" => $user]);
    }

    public function postPassword(UserRequest $request, User $user)
    {
        $password = $request->get('password');
        $user->password = Hash::make($password);

        $user->save();

        return Redirect::to($this->returnUrl);
    }
}
