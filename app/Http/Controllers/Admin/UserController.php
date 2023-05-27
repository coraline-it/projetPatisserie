<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserRepository $repository, $search = null)
    {
        if (isset($search)) {
            $users = $repository->searchUsers($search);
        } else {
            $users = $repository->pagination();
        }
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a bien été créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'L\'utilisateur a bien été supprimé !');
    }

    /**
     * Search the specified resource from input.
     */
    public function searchUsers(Request $request, UserRepository $repository)
    {
        $users = $repository->searchUsers($request->search_user);

        return view('admin.users.index', compact('users'));
    }
}
