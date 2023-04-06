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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FileCategory::all();
        return view('pages.tryouts.create',compact('categories'));
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'file' => 'required|mimes:png,jpg|max:10000'
        ]);

        $file = $request->file('file');
        $fileModel = new Tryout();
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('images', $fileName, 'public');
            $fileModel->category_id = $request->category;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->name = $request->name;
            $fileModel->file_name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->type = $file->getClientOriginalExtension();
            $fileModel->size = $file->getSize();
            $fileModel->publish = $request->publish;
            $fileModel->save();
            return redirect()->route('tryouts')
            ->with('success','Tryout created successfully');
        }
    }

}
