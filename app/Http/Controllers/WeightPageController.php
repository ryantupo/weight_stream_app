<?php

namespace App\Http\Controllers;
use App\Models\WeightPage;

use Illuminate\Http\Request;

class WeightPageController extends Controller
{
    public function index()
    {
        $data = WeightPage::all(); // Replace YourModel with your actual model name

        return view('auth.weight_controller_page', compact('data'));

    }
}
