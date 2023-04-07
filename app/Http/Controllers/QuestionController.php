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
        $data = Question::with('user')->orderBy('id','DESC')->paginate(10);
        $search = '';
        return view('pages.questions.index',compact('data','search','id'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $data = Question::where('question','like',"%".$search."%")->with('user')->orderBy('id','DESC')->paginate(10);
        $question_id = Question::where('question','like',"%".$search."%")->first();
        if(!empty($question_id)){
            $id = $question_id->id;
            return view('pages.questions.index',compact('data','search','id'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
        }

        return back();
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
                         ->with('success','Question created successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $tryout = Tryout::where('id',$id)->first();
        $categories = FileCategory::all();
        $publish = [
            'on'=> 'on',
            'off'=> 'off'
        ];
        return view('pages.questions.edit',compact('question','categories','publish','tryout'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $question = Question::find($id);
        $question->tryout_id = $request->tryout_id;
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->type = 'text';
        if($request->publish){
            $question->publish = $request->publish;
        }else{
            $question->publish = 'off';
        }
        $question->save();
        return redirect()->route('questions',$request->tryout_id)
                         ->with('success','Question updated successfully');
    }

}
