<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $globalHeader, $respondData;

    public function __construct()
    {
        $this->globalHeader = [
            'title' => 'Dashboard',
            'active' => ['dashboard','']
        ];

        $this->respondData = [];
    }

    public function index()
    {
        $sData = Session::get('loginId');
        dd($sData);
        $data = array();
        if(Session::has('loginId')){
            $data = Admin::Where('email', '=', $request->email)->first();
        }
        return view('admin.production.index');
    }
    
    
}
