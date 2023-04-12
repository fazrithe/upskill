@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">User Create</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">User</h2>
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
                {!! Form::open(array('route' => 'users.save','method'=>'POST')) !!}
                @csrf
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Email</label>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','required')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="famale">Famale</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Password</label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','required')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Confirm Password</label>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','required')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Role</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Status</label>
                            <select name="active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
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
