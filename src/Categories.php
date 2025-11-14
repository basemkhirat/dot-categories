<?php

namespace Dot\Categories;

use Illuminate\Support\Facades\Auth;
use Dot\Platform\Facades\Navigation;

class Categories extends \Dot\Platform\Plugin
{

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {

            if (Auth::user()->can("categories.manage")) {
                $menu->item('categories', trans("categories::categories.categories"), route("admin.categories.show"))->icon("fa-folder")->order(1);
            }
        });
    }
}
