<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\FileCategory;
use App\Models\Tryout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Tryout::orderBy('id','DESC')->paginate(8);
        $categories = FileCategory::all();
        $search = '';
        return view('pages.tryouts.index',compact('data','search','categories'))
            ->with('i', ($request->input('page', 1) - 1) * 8);
    }
}
