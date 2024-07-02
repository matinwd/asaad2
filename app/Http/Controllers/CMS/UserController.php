<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\EmailCriteria;
use App\Criteria\FullNameCriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

/**
 * Class UserController.
 *
 * @package namespace App\Http\Controllers;
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new EmailCriteria($request->email));
        $this->repository->pushCriteria(new FullNameCriteria($request->name));

        $users = $this->repository->paginate();


        return view('admin.pages.user.list', compact('users'));
    }

    public function store(UserCreateRequest $request)
    {
        try {
            $attributes  = $request->merge(['password' => $request->password ])->all();
            $user = $this->repository->create($attributes);

            $response = [
                'message' => 'User created.',
                'data'    => $user->toArray(),
            ];


            return redirect()->route('admin.users.index')->with('message', $response['message']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function create(){
        return view('admin.pages.user.create');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);


        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);

        return view('admin.pages.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $attributes = $request->validated();
            $this->initPassword($attributes);


            $user = $this->repository->update($attributes, $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
            ];

            return redirect()->route('admin.users.index')->with('message', $response['message']);
        } catch (\Exception $e) {

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()->back()->with('message', 'User deleted.');


    }


    private function initPassword(&$attributes)
    {
        if (isset($attributes['password']) && !is_null($attributes['password'])) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }
    }

}
