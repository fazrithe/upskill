@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add New Question</h2>
    </div>

    {!! Form::open(array('route' => 'questions.save','method'=>'POST','enctype'=>'multipart/form-data')) !!}
    @csrf
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                Question
                            </div>
                            <div class="mt-5">
                                <textarea class="editor" name="question" required><p>Write your question...</p></textarea>
                            </div>
                        </div>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                Answare
                            </div>
                            <div class="mt-5">
                                <div>
                                    <label for="post-form-7" class="form-label font-medium">Answer A</label>
                                    <textarea class="editor" name="answer_a" required><p>Write your question...</p></textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="a" type="radio" name="correct" checked id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                        <div class="ml-4 form-group row">
                                            <label>Score</label>
                                            <div class="col-xs-2">
                                                <input type="number" name="answer_a_score" class="form-control ml-4" width="10" value="0">
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer B</label>
                                    <textarea class="editor" name="answer_b" required><p>Write your question...</p></textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="b" type="radio" name="correct" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                        <div class="ml-4 form-group row">
                                            <label>Score</label>
                                            <div class="col-xs-2">
                                                <input type="number" name="answer_b_score" class="form-control ml-4" width="10" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer C</label>
                                    <textarea class="editor" name="answer_c" required><p>Write your question...</p></textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="c" type="radio" name="correct" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                        <div class="ml-4 form-group row">
                                            <label>Score</label>
                                            <div class="col-xs-2">
                                                <input type="number" name="answer_c_score" class="form-control ml-4" width="10" value="0">
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer D</label>
                                    <textarea class="editor" name="answer_d" required><p>Write your question...</p></textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="d" type="radio" name="correct" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                        <div class="ml-4 form-group row">
                                            <label>Score</label>
                                            <div class="col-xs-2">
                                                <input type="number" name="answer_d_score" class="form-control ml-4" width="10" value="0">
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer E</label>
                                    <textarea class="editor" name="answer_e" required><p>Write your question...</p></textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="e" type="radio" name="correct" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                        <div class="ml-4 form-group row">
                                            <label>Score</label>
                                            <div class="col-xs-2">
                                                <input type="number" name="answer_e_score" class="form-control ml-4" width="10" value="0">
                                            </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div>
                    <label class="form-label">Written By</label>
                        {{ Auth::user()->name }}
                </div>
                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Tryout :</label>
                    {{ $tryout->name }}
                    <input type="hidden" name="tryout_id" value="{{ $tryout->id }}">
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Published</label>
                    <input id="post-form-5" class="form-check-input" name="publish" type="checkbox" checked>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary mt-5">Save</button>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>

    {!! Form::close() !!}
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
