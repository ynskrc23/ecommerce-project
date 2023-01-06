<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdressRequest;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AdressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users/{}/adresses";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $adresses = $user->adresses;
        return view("backend.adresses.index", ["adresses" => $adresses, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view("backend.adresses.create",["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, AdressRequest $request)
    {
        Adress::create($request->all());

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
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
    public function edit(User $user, Adress $adress)
    {
        return view("backend.adresses.edit",["user" => $user, "adress" => $adress]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdressRequest $request, User $user, Adress $adress)
    {
        $is_default = $request->get("is_default",0);

        $adress->is_default = $is_default;
        $adress->update($request->all());

        $this->editReturnUrl($user->user_id);
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Adress $adress)
    {
        $adress->delete();

        return response()->json(["message" => "Success", "id" => $adress->address_id]);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/users/$id/adresses";
    }
}
