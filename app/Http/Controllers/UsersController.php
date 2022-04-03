<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;


class UsersController extends AppBaseController
{

    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->middleware('auth');
        $this->usersRepository = $usersRepo;
    }

    public function index(Request $request)
    {
        $users = Users::paginate(15);
        return view('admin.users.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $users = $this->usersRepository->create($input);
        $users = $this->usersRepository->paginate(15);

        Flash::success('Thêm nhân viên thành công.');
        return view('admin.users.index')->with('users', $users);
    }

    public function show($id)
    {
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        return view('admin.users.show')->with('users', $users);
    }

    public function edit($id)
    {
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Nhân viên trống');

            return redirect(route('users.index'));
        }
        return view('admin.users.edit')->with('users', $users);
    }

    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);
        $input = $request->all();
        if ($request->password == null) {
            $input['password'] = $users->password;
        } else {
            $input['password'] = Hash::make($request->password);
        }
        $users = $this->usersRepository->update($input, $id);
        Flash::success('Cập nhật nhân viên thành công.');
        return redirect(route('users.index'));
    }
    public function destroy($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();
        return redirect(route('users.index'));
    }
}
