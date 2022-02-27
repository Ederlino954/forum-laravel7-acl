<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\UserRequest;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
    	$users = $this->user->paginate(10);

        return view('manager.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = \App\Role::all('id', 'name');

        return view('manager.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        try{
        	$data = $request->all();

        	if($data['password']){

        		$validator = Validator::make($data, [
        			'password' => 'required|string|min:8|confirmed',
                    // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
		        ]);

        		if($validator->fails())
        			return redirect()->back()->withErrors($validator);

				$data['password'] = bcrypt($data['password']);

	        } else {
        		unset($data['password']);
	        }

			$user = $this->user->find($id);
			$user->update($data);

			$role = \App\Role::find($data['role']);
			$user = $user->role()->associate($role);
			$user->save();

			flash('Usuário atualizado com sucesso!')->success();
			return redirect()->route('users.index');

        }catch (\Exception $e) {
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        flash($message)->error();
	        return redirect()->back();
        }
    }

    public function associatedPermissions($id)
    {
        $user = $this->user->find($id);
        // dd($user);
        // dd($user->role_id);

        if ($user->role_id == null) {
            flash("Usuário $user->name não tem permissões para serem visualizadas! Associe um papel para visualizar permissões!")->warning();
            return redirect()->route('users.index');
        }

        $user1 = $user->role->resources;

        return view('manager.users.permissions', compact('user', 'user1'));

    }
}
