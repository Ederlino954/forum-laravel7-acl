<?php

namespace App\Http\Views;

class MenuViewComposer
{
    public function compose($view)
    {
        $menus = auth()->user()
                       ->role
                       ->modules;

        return $view->with('menus', $menus);
    }
}
