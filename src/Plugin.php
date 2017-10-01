<?php

namespace Dot\Categories;

use Gate;
use Navigation;
use URL;

class Plugin extends \Dot\Platform\Plugin
{

    public $permissions = [
        "manage"
    ];

    function boot()
    {
        Navigation::menu("sidebar", function ($menu) {

            if (Gate::allows("categories.manage")) {
                $menu->item('categories', trans("categories::categories.categories"), URL::to(ADMIN . '/categories'))->icon("fa-folder")->order(1);
            }
        });

        include __DIR__ . "/routes.php";
    }
}
