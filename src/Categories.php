<?php

namespace Dot\Categories;

use Gate;
use Navigation;
use URL;

class Categories extends \Dot\Platform\Plugin
{

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {

            if (Gate::allows("categories.manage")) {
                $menu->item('categories', trans("categories::categories.categories"), URL::to(ADMIN . '/categories'))->icon("fa-folder")->order(1);
            }
        });
    }
}
