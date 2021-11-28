<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Site extends BaseController
{
    public function index()
    {
        
    }
    public function firstForm(){
        if($this->request->getMethod() == 'post'){
            //handel post return
            dd($this->request->getVar());
        }
        return view('first-form');
    }

    public function secondForm(){
        if($this->request->getMethod() == 'post'){
            //handle post return
            dd($this->request->getVar());
        }
        return view('second-form');
    }
}
