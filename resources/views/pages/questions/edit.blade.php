@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add New Question</h2>
    </div>

    {!! Form::model($question, ['method' => 'PATCH','route' => ['questions.update', $question->id]]) !!}
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
                                <textarea class="editor" name="question" required>{{ $question->question }}</textarea>
                            </div>
                        </div>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                Answare
                            </div>
                            <div class="mt-5">
                                <div>
                                    <label for="post-form-7" class="form-label font-medium">Answer A</label>
                                    <textarea class="editor" name="answer_a" required>{{ $answare['a'] }}</textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="a" type="radio" name="correct" {{ $question->correct=='a' ? 'checked' : ''; }} id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer B</label>
                                    <textarea class="editor" name="answer_b" required>{{ $answare['b'] }}</textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="b" type="radio" name="correct" {{ $question->correct=='b' ? 'checked' : ''; }} id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer C</label>
                                    <textarea class="editor" name="answer_c" required>{{ $answare['c'] }}</textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="c" type="radio" name="correct" {{ $question->correct=='c' ? 'checked' : ''; }} id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer D</label>
                                    <textarea class="editor" name="answer_d" required>{{ $answare['d'] }}</textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="d" type="radio" name="correct" {{ $question->correct=='d' ? 'checked' : ''; }} id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
                                      </div>
                                </div>
                                <div class="mt-5">
                                    <label for="post-form-7" class="form-label font-medium">Answer E</label>
                                    <textarea class="editor" name="answer_e" required>{{ $answare['e'] }}</textarea>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" value="e" type="radio" name="correct" {{ $question->correct=='e' ? 'checked' : ''; }} id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Correct
                                        </label>
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
                    <input name="publish" id="post-form-5" class="form-check-input" type="checkbox" @if($question->publish == 'on'){ {{ 'checked' }} } @endif>
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
