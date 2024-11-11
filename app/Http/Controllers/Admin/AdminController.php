<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.admin_dashboard');
    }
}
