<?php

/*
 * WEB
 */
Route::group(array(
    "prefix" => ADMIN,
    "middleware" => ["web", "auth"],
        ), function($route) {
    $route->group(array("prefix" => "categories"), function($route) {
        $route->any('/create', array("as" => "admin.categories.create", "uses" => "Dot\Categories\Controllers\CategoriesController@create"));
        $route->any('/delete', array("as" => "admin.categories.delete", "uses" => "Dot\Categories\Controllers\CategoriesController@delete"));
        $route->any('/{id?}', array("as" => "admin.categories.show", "uses" => "Dot\Categories\Controllers\CategoriesController@index"));
        $route->any('/{id}/edit', array("as" => "admin.categories.edit", "uses" => "Dot\Categories\Controllers\CategoriesController@edit"));
    });
});

/*
 * API
 */
Route::group([
    "prefix" => API,
    "middleware" => ["auth:api"]
], function ($route) {
    $route->get("/categories/show", "Dot\Categories\Controllers\CategoriesApiController@show");
    $route->get("/categories/samples", "Dot\Categories\Controllers\CategoriesApiController@samples");
    $route->post("/categories/create", "Dot\Categories\Controllers\CategoriesApiController@create");
    $route->post("/categories/update", "Dot\Categories\Controllers\CategoriesApiController@update");
    $route->post("/categories/destroy", "Dot\Categories\Controllers\CategoriesApiController@destroy");
});


