<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($status)
    {
        return view('admin.order')->with(['order' => "true", "$status" => "true"]);
    }

    public function getByStatus()
    {
    }

    public function getById()
    {
    }

    public function update()
    {
    }
}
