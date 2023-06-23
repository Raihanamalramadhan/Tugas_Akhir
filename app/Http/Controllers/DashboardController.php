<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kabupaten;

class DashboardController extends Controller
{
    public function index()
    {
        $kabupaten = DB::table("kabupatens")->get();

        return view('dataMerek/data_merek',
        compact('kabupaten'));
    }
}