<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TrackerController extends Controller
{
    public function index(){
        $Data = session('data_collection');
        dd($Data);
    }
}
