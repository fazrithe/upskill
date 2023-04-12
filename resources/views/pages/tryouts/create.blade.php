@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Tryout Create</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Tryout</h2>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
                @endif
                {!! Form::open(array('route' => 'tryouts.save','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                @csrf
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Category</label>
                            <select name="category" class="form-control">
                                @foreach ($categories as $key => $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Cover</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-check form-switch flex flex-col items-start mt-3">
                            <label for="post-form-5" class="form-check-label ml-0 mb-2">Published</label>
                            <input name="publish" id="post-form-5" class="form-check-input" type="checkbox">
                        </div>
                        <button class="btn btn-primary mt-5">Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- END: Radio Button -->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
