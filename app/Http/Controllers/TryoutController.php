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
use App\Models\Question;
use App\Models\Tryout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\UserAnswer;
use Faker\Provider\UserAgent;
use App\Models\UserAnswerScore;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Tryout::orderBy('id','DESC')->paginate(10);
        $categories = FileCategory::all();
        $search = '';
        return view('pages.tryouts.index',compact('data','search','categories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
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

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tryout = Tryout::find($id);
        $categories = FileCategory::all();
        $publish = [
            'on'=> 'on',
            'off'=> 'off'
        ];
        return view('pages.tryouts.edit',compact('tryout','categories','publish'));
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);

        $file = $request->file('file');
        if($request->file()) {
            $fileModel = new Tryout();
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
        }else{
            $fileModel = Tryout::find($id);
            $fileModel->category_id = $request->category;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->name = $request->name;
            $fileModel->publish = $request->publish;
            $fileModel->save();
            return redirect()->route('tryouts')
            ->with('success','Tryout created successfully');
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Tryout::findOrFail($id);
        if (file_exists(public_path($file->file_path))){
            $filedeleted = unlink(public_path($file->file_path));
            if ($filedeleted) {
               echo "File deleted";
            }
         } else {
            dd('Unable to delete the given file');
         }
         $file->delete();
        return redirect()->route('tryouts')
                        ->with('success','Tryout deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $data = Tryout::with('user')->orderBy('id','DESC')->paginate(6);
        $categories = FileCategory::all();
        $search = '';
        return view('pages.tryouts.list',compact('data','search','categories'))
            ->with('i', ($request->input('page', 1) - 1) * 6);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data = Tryout::where('id',$id)->with('user')->orderBy('id','DESC')->first();
        $categories = FileCategory::all();
        return view('pages.tryouts.view',compact('data','categories'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request,$id)
    {
        $data = Question::where('tryout_id',$id)->with('user')->orderBy('id','ASC')->paginate(1);
        $data_count = Question::where('questions.tryout_id',$id)
                    ->select('questions.id','user_answers.question_id')
                    ->leftjoin('user_answers', 'user_answers.question_id', '=', 'questions.id')
                    ->orderBy('id','ASC')
                    ->get();
        $answers = UserAnswer::where('tryout_id',$id)->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
        $categories = FileCategory::all();
        return view('pages.tryouts.test',compact('data','categories','data_count','answers'))
                    ->with('i', ($request->input('page', 1) - 1) * 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request)
    {
        $question = Question::where('id',$request->question_id)->with('user')->orderBy('id','DESC')->first();
        $check = UserAnswer::where('question_id',$request->question_id)->first();
        // return $check;

        foreach(json_decode($question->score) as $key => $value){
            if($request->answer == 'a'){
                $score = $value->a;
            }
            if($request->answer == 'b'){
                $score = $value->b;
            }
            if($request->answer == 'c'){
                $score = $value->c;
            }
            if($request->answer == 'd'){
                $score = $value->d;
            }
            if($request->answer == 'e'){
                $score = $value->e;
            }
        }

        if(empty($check)){
            $answer = new UserAnswer();
            $answer->question_id    = $request->question_id;
            $answer->tryout_id      = $request->tryout_id;
            $answer->user_id        = Auth::user()->id;
            $answer->answer         = $request->answer;
            $answer->score          = $score;
            $answer->save();
            return redirect(url($request->question_url));
        }else{
            $answer = UserAnswer::where('question_id', $request->question_id)->first();
            $answer->question_id    = $request->question_id;
            $answer->tryout_id      = $request->tryout_id;
            $answer->user_id        = Auth::user()->id;
            $answer->answer         = $request->answer;
            $answer->score          = $score;
            $answer->save();
            return redirect(url($request->question_url));
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request)
    {
        $totalScore = UserAnswer::where('tryout_id', $request->tryout_id)->where('user_id', Auth::user()->id)->sum('score');
        $score = new UserAnswerScore();
        $score->tryout_id   = $request->tryout_id;
        $score->user_id     = Auth::user()->id;
        $score->total_score = $totalScore;
        $score->save();

        $data = UserAnswerScore::where('tryout_id', $request->tryout_id)->where('user_id', Auth::user()->id)->with('user')->first();
        return view('pages.tryouts.user_score',compact('data'));
    }

}
