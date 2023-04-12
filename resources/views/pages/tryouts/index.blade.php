@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Tryouts</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a class="btn btn-primary shadow-md mr-2" href="{{ route('tryouts.create') }}">Add New Tryout</a>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of {{ count($data) }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    {!! Form::open(array('route' => 'roles.search','method'=>'GET')) !!}
                        <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Search..." value="{{ $search }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th></th>
                        <th class="whitespace-nowrap">Name</th>
                        <th class="text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{ ++$i }}
                            </td>
                            <td>
                                <div class="flex">
                                    <a class="btn btn-primary" href="{{ route('questions',$value->id) }}" title="Add Question">
                                        Question
                                    </a>
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Icewall Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset($value->file_path) }}" title="{{ $value->name }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $value->name }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('tryouts.edit',$value->id) }}">
                                        Edit
                                    </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['tryouts.destroy', $value->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => '']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {!! $data->render() !!}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
