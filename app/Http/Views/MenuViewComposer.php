<?php
namespace App\Http\Views;

use App\User;

class MenuViewComposer
{
    public function compose($view)
    {

        // $users = \App\User::all();

        // dd($users);



        //  return $view->with('modules', $users);

        // $roleUser = auth()->user()->role;

        // $modulesFiltered = [];

        // foreach($roleUser->modules as $key => $module) {
        //     $modulesFiltered[$key]['name'] = $module->name;

        //     foreach ($module->resources as $resource) {
        //         if ($resource->roles->contains($roleUser)) {
        //             $modulesFiltered[$key]['resources'][] = $resource;
        //         }
        //     }
        // };

        // return $view->with('modules', $modulesFiltered);
    }
}



// class MenuViewComposer
// {
// 	private $module;

// 	public function __construct(Module $module)
// 	{
// 		$this->module = $module;
// 	}

// 	public function compose($view)
// 	{
// 		// dd($user = auth()->user());
// 		$user = auth()->user();

// 		$modulesFiltered = session()->get('modules')?: [];
//         // session()->forget('modules');

// 		if(!$modulesFiltered) {

// 			if($user->isAdmin()) {

// 				// dd($modulesFiltered = ($this->getModules($this->module))->toArray());
// 				$modulesFiltered = ($this->getModules($this->module))->toArray();

// 			} else {

// 				$modules = $this->getModules($user->role->modules());

// 				foreach($modules as $key => $module) {
// 					$modulesFiltered[$key]['name'] = $module->name;
//                     // dd($modulesFiltered);

// 					foreach($module->resources  as $k => $resource) {
// 						if($resource->roles->contains($user->role)) {

// 							$modulesFiltered[$key]['resources'][$k]['name'] = $resource->name;
// 							$modulesFiltered[$key]['resources'][$k]['resource'] = $resource->resource;

// 						}
// 					}
// 				}

// 			}

// 			session()->put('modules', $modulesFiltered);
// 		}

// 		return $view->with('modules', $modulesFiltered);
// 	}

// 	public function getModules($module)
// 	{
// 		return $module->with(['resources' => function($queryBuilder){
// 			return $queryBuilder->where('is_menu', true);
// 		}])->get();
// 	}
// }

