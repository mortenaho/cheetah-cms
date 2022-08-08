<?php

namespace App\Http\Controllers\Customer;


use AdminHelper;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        View::share('CurrentPage', 'customer');
    }

    //This is just a test for gitlab :)
    public function index()
    {
        return view('customer.main.index');
    }


}
