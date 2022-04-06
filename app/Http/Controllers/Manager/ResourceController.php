<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ResourceRequest;
use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{

	private $resource;

	public function __construct(Resource $resource)
	{
		$this->resource = $resource;
	}

	public function index()
	{
		$resources = $this->resource->orderBy('name')->get();
		// $resources = $this->resource->all();

		return view('manager.resources.index', compact('resources'));
	}

	public function create()
	{
		return view('manager.resources.create');
	}

	public function store(ResourceRequest $request)
	{
		try {
			$this->resource->create($request->all());

			flash('Recurso atualizado com sucesso!')->success();
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			flash($message)->error();
			return redirect()->back();
		}
	}

	public function show($id)
	{
		return redirect()->route('resources.edit', $id);
	}

	public function edit($id)
	{
		$resource = $this->resource->find($id);
		return view('manager.resources.edit', compact('resource'));
	}

	public function update(ResourceRequest $request, $id)
	{
		try {
			$resource = $this->resource->find($id);
			$resource->update($request->all());

			flash('Recurso atualizado com sucesso!')->success();
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

			flash($message)->error();
			return redirect()->back();
		}
	}

	public function destroy($id)
	{
		try {
			$resource = $this->resource->find($id);
			$resource->delete();

			flash('Recurso removido com sucesso!')->success();
			return redirect()->route('resources.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remoção...';

			flash($message)->error();
			return redirect()->back();
		}
	}
}
