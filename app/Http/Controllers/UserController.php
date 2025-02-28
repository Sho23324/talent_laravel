<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
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
        $this->userRepo = $userRepo;
        $this->middleware('auth');
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
        $this->userRepo->create($data);
        // $user = User::create([
        //     'name'=>$data['name'],
        //     'email'=>$data['email'],
        //     'password'=>Hash::make($data['password']),
        //     'phone'=>$data['phone'],
        //     'address'=>$data['address'],
        //     'gender'=>$data['gender']

        // ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(UserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = $this->userRepo->getUserById($id);
        $user->update([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
            'phone'=>$validatedData['phone'],
            'address'=>$validatedData['address'],
            'gender'=>$validatedData['gender']
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
