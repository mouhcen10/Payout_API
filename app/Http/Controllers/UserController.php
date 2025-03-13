<?php

namespace App\Http\Controllers;


use App\Models\Payout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(User::where('id', 5)->with('payouts')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'bank_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $payout = Payout::create($fields);

        return $payout;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payout $payout)
    {
        return $payout;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payout $payout)
    {
        $fields = $request->validate([
            'user_id' => 'required',
            'bank_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $payout->update($fields);

        return $payout;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payout $payout)
    {
        $payout->delete();
        return "payout was deleted successfuly !";
    }
}
