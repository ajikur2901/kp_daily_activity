<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all()->pluck('name');
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), User::RULES, [], User::NICE_NAMES);

        if ($validator->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->post();

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'disabled' => 0,
            ]);

            $user->syncRoles([$data['level']]);

            return redirect()
                ->route('user.index')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name');
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), User::updateRules($user), [], User::NICE_NAMES);

        if ($validator->fails()) {
            return redirect()
                ->route('user.edit', $user)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->post();

        try {
            $user->name = $data['name'];
            $user->email = $data['email'];
            if (isset($data['password']) && !empty($data['password'])) {
                $user->password = Hash::make($data['password']);
            }

            $user->save();

            $user->syncRoles([$data['level']]);

            return redirect()
                ->route('user.index')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()
                ->route('user.index')
                ->with('success', 'User has been deleted successfully.');
        } else {
            return redirect()
                ->route('user.index')
                ->with('failed', 'User delete failed.');
        }
    }
}
