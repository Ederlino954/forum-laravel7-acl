<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\RoleRequest;
use App\Role;
use Illuminate\Http\Request;
use App\Classes\Enc;

class RoleController extends Controller
{
	private $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

    public function index()
    {
    	$roles = $this->role->orderBy('name')->paginate(10);

        return view('manager.roles.index', compact('roles'));
    }

    public function create()
    {
	    return view('manager.roles.create');
    }

    public function store(RoleRequest $request)
    {
	    try {
	    	$this->role->create($request->all());

		    flash('Papél criado com sucesso!')->success();
		    return redirect()->route('roles.index');

	    }catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar criação...';

		    flash($message)->error();
		    return redirect()->back();
	    }
    }

    public function show($id)
    {
        return redirect()->route('roles.edit', $id);
    }

    public function edit($idEnc)
    {
        // dd($idEnc);
        $id = Enc::desencriptar($idEnc);
        // dd($id);
    	$role = $this->role->find($id);
	    return view('manager.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
	    try {
		    $role = $this->role->find($id);
		    $role->update($request->all());

		    flash('Papél atualizado com sucesso!')->success();
		    return redirect()->route('roles.index');

	    }catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

		    flash($message)->error();
		    return redirect()->back();
	    }
    }

    public function destroyConnected($id)
    {
        $role = $this->role->find($id);
        $role->delete();
        flash('Papél removido e vínculos com usuárioos desfeitos com sucesso!')->success();
        return redirect()->route('roles.index');
    }

    public function destroy($idEnc)
    {
        try {

            $id = Enc::desencriptar($idEnc);

            $id = $id;

			$role = $this->role->find($id);

            $role1 = $role->users;

            $role2 = $role1->count();

            if ($role2 != 0) {
                flash('Existe Usuário(s) utilizando as permissões deste papel! Segue os nomes!')->warning();
                return view('manager.roles.teste', compact('role1', 'id' ));
            }

			$role->delete();
            flash('Papél removido com sucesso!')->success();
			return redirect()->route('roles.index');


        }catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

        	flash($message)->error();
        	return redirect()->back();
        }
    }

	public function syncResources(int $role)
	{
		$role = $this->role->find($role);
		$resources = \App\Resource::all(['id', 'resource', 'name']);

		return view('manager.roles.sync-resources', compact('role', 'resources'));
	}

	public function updateSyncResources($role, Request $request)
	{
		try{
			$role = $this->role->find($role);
			$role->resources()->sync($request->resources);

			flash('Recursos adicionados com sucesso!')->success();
			return redirect()->route('roles.resources', $role);

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adição de recursos...';

			flash($message)->error();
			return redirect()->back();
		}
	}
}
