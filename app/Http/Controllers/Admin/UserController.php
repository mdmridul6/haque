<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserPasswordRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $pageTitle="User List";
        $users = User::all();
        return view('admin.user.index', compact('users','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {

        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\UserCreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request): RedirectResponse
    {


        try {
            DB::beginTransaction();
            $user = new User();
            self::storeAndUpdate($user, $request);
            DB::commit();
            Toastr::success('User create successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user): View
    {
        return view('admin.user.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \IIlluminate\View\View
     */
    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UserUpdateRequest  $request
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {

         try {
            DB::beginTransaction();
            self::storeAndUpdate($user, $request);
            DB::commit();
            Toastr::success('User update successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            Toastr::success('User delete successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @param $request
     * @return void
     */
    public function storeAndUpdate($user, $request): User
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->has('image')) {
            $imagePath = ImageUploader::upload($request->image,'users/');
            $user->image = $imagePath;
        }
        $user->save();
        if ($request->has('role')) {
            $user->syncRoles([$request->role]);
        }

        return $user;
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @param $request
     * @return void
     */
    public function changePassword(UserPasswordRequest $request,User $user): RedirectResponse
    {

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        Toastr::success('Password update successfuly');

        return redirect()->back();
    }
}
