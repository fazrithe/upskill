<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\File;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\FileCategory;
use Illuminate\Support\Facades\Auth;

class FileCategoryController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = FileCategory::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
        ]);

        return redirect()->route('files')
                        ->with('success','Category created successfully');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        FileCategory::whereIn('id',explode(",",$ids))->delete();
        return redirect()->route('files')
                        ->with('success','Category created successfully');
    }
}
