<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $userRepo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        $users = $this->userRepo->getUsers();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userRepo->create($data);
        if($data['role'] == 'admin') {
            $user->assignRole('admin');
        }else if($data['role'] == 'guest') {
            $user->assignRole('guest');
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepo->getUserById($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $user = $this->userRepo->getUserById($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = $this->userRepo->getUserById($id);
        if($request->status == NULL) {
            $status = false;
        }else if($request->status == 'active') {
            $status = true;
        }
        $user->update([
            'name'=>$validatedData['name'],
            'phone'=>$validatedData['phone'],
            'address'=>$validatedData['address'],
            'gender'=>$validatedData['gender'],
            'status'=>$status
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepo->getUserById($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
