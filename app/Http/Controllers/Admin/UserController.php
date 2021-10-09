<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseAppController;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseAppController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => User::paginate(5)
        ];

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->input();
        $firstName = $input['first_name'];
        $lastName = $input['last_name'];
        $email = $input['email'];
        $password = $input['password'];

        $newUser = User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => Hash::make($password),
            'type' => User::$_TYPE_USER
        ]);

        Balance::create([
            'user_id' => $newUser->id,
            'total' => 0,
            'is_platform' => false,
            'type' => Balance::$_TYPE_AVAILABLE
        ]);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'selectedUser' => User::findOrFail($id)
        ];

        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $selectedUser = User::findOrFail($id);
        $input = $request->input();
        $firstName = $input['first_name'];
        $lastName = $input['last_name'];

        $selectedUser->update([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        return redirect('/admin/users');
    }
}
