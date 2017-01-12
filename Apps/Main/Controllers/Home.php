<?php

namespace Apps\Main\Controllers;

use Apps\Main;
use Apps\Main\Models;
use Core\View;

class Home extends \Apps\Main\Controller
{


    public function anyIndex()
    {
        $categories = Models\Category::get()->toArray();

        View::set('categories', $categories);

        return View::template('home');
    }


    public function anyCategory($id)
    {
        $category = Models\Category::where('id', $id)->first()->toArray();

        View::set('categoryName', $category['name']);

        return View::template('category');
    }

}