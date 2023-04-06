@extends('../layout/' . $layout)

@section('subhead')
    <title>Add New Post - Icewall - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add New Question</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0">
                <i class="w-4 h-4 mr-2" data-feather="eye"></i> Preview
            </button>
            <div class="dropdown">
                <button class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false" data-tw-toggle="dropdown">
                    Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As New Post
                            </a>
                        </a>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As Draft
                            </a>
                        </a>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </a>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Word
                            </a>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
                                <div class="editor">
                                    <p>Write your question...</p>
                                </div>
                            </div>
                        </div>
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                            <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                Answare
                            </div>
                            <div class="mt-5">
                                <div>
                                    <label for="post-form-7" class="form-label font-medium">Anware A</label>
                                    <div class="editor">
                                        <p>Write your answare...</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="post-form-7" class="form-label font-medium">Anware B</label>
                                    <div class="editor">
                                        <p>Write your answare...</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="post-form-7" class="form-label font-medium">Anware C</label>
                                    <div class="editor">
                                        <p>Write your answare...</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="post-form-7" class="form-label font-medium">Anware D</label>
                                    <div class="editor">
                                        <p>Write your answare...</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="post-form-7" class="form-label font-medium">Anware E</label>
                                    <div class="editor">
                                        <p>Write your answare...</p>
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
                    <div>
                        Alex
                    </div>
                </div>
                <div class="mt-3">
                    <label for="post-form-2" class="form-label">Post Date</label>
                    <input type="text" class="datepicker form-control" id="post-form-2" data-single-mode="true">
                </div>
                <div class="mt-3">
                    <label for="post-form-3" class="form-label">Tryout :</label>
                    Menejerial
                </div>
                <div class="form-check form-switch flex flex-col items-start mt-3">
                    <label for="post-form-5" class="form-check-label ml-0 mb-2">Published</label>
                    <input id="post-form-5" class="form-check-input" type="checkbox">
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
