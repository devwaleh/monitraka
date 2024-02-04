<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expenses;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function dashboard ()
    {
        $id = auth()->id();
        $cat = Category::all();
        $expense = Expenses::where('user_id', $id)
               ->orderByDesc('id')
               ->take(1)
               ->get();
        // dd($expense);
        return view('index',['cat'=>$cat,'expense'=>$expense]);
    }

    public function profile ()
    {
        return view('profile');
    }

    public function setting ()
    {
        return view('setting');
    }
}
