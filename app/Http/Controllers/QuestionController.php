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
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $data = Question::orderBy('id','DESC')->paginate(10);
        $search = '';
        return view('pages.questions.index',compact('data','search','id'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tryout = Tryout::where('id',$id)->first();
        return view('pages.questions.create', compact('tryout'));
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->tryout_id = $request->tryout_id;
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->type = 'text';
        $question->publish = $request->publish;
        $question->save();
        return redirect()->route('questions',$request->tryout_id)
                         ->with('success','Role deleted successfully');
    }

}
