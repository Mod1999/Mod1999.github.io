<?php

use Phalcon\Mvc\Router;


$router = new Router();
/* Пользовательские */
$router->setDefaults(["controller" => "Pages", "action" => "global",]);
$router->addPost("/play", ["controller" => "Games", "action" => "play"]);
$router->add("/guarantees", ["controller" => "Pages", "action" => "guarantees"]);
$router->add("/reviews", ["controller" => "Pages", "action" => "reviews"]);
$router->add("/faq", ["controller" => "Pages", "action" => "faq"]);
$router->add("/", ["controller" => "Pages", "action" => "index"]);
$router->add("/user/{id}", ["controller" => "Pages", "action" => "user"]);
$router->add("/case/{id}", ["controller" => "Pages", "action" => "case"]);
$router->add("/logout", ["controller" => "Auth", "action" => "logout"]); // Выход
$router->add("/login", ["controller" => "Auth", "action" => "login"]); // Вход
/* Администратор */
$router->add("/admin/", ["controller" => "Admin", "action" => "index",]);
$router->add("/admin/case", ["controller" => "Admin", "action" => "case"]);
$router->add("/admin/case/{id}", ["controller" => "Admin", "action" => "caseid"]);
$router->add("/admin/cases", ["controller" => "Admin", "action" => "casenew"]);
$router->add("/admin/items", ["controller" => "Admin", "action" => "items"]);
$router->add("/admin/caseedit", ["controller" => "Admin", "action" => "caseedit",]);
$router->add("/admin/items/{id}", ["controller" => "Admin", "action" => "itemsid"]);
$router->add("/admin/items", ["controller" => "Admin", "action" => "items"]);
$router->add("/admin/item", ["controller" => "Admin", "action" => "itemsnew"]);
$router->add("/admin/itemsedit", ["controller" => "Admin", "action" => "itemsedit",]);
$router->add("/admin", ["controller" => "Admin", "action" => "index"]);
return $router;