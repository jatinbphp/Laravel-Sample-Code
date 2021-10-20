<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View;

class HomeController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewPath = "home.";
    }

    /**
     * [index description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        View::share('breadcrumb', trans('message.legal'));
        View::share('cls', "breadCls");
        return view($this->viewPath . ".legal");
    }
}
