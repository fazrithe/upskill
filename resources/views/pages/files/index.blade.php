@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">File Manager</h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <input type="checkbox" class="input-controller" id="master"><i class="w-4 h-4 mr-2" data-feather="file"></i> All
                    </a>
                    @foreach ($categories as $key => $cat)
                    <div class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <input type="checkbox" class="input-controller sub_chk" data-id="{{$cat->id}}">
                        <i class="w-4 h-4 mr-2" data-feather="file"></i><a href=""> {{ $cat->name }}</a>
                    </div>
                    @endforeach
                    <button style="margin-bottom: 10px" class="text-danger delete_all" data-url="{{ route('file.categories.deleteall') }}">Delete All Selected</button>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#basic-modal-preview" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Label
                    </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" data-feather="search"></i>
                    <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search files">
                </div>
                <div class="w-full sm:w-auto flex">
                    <button data-tw-toggle="modal" data-tw-target="#modal-file-upload" class="btn btn-primary shadow-md mr-2">Upload New Files</button>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($data as $value)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            @if ($value['type'] == 'Empty Folder')
                                <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a>
                            @elseif ($value['type'] == 'Folder')
                                <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a>
                            @elseif ($value['type'] == 'img')
                                <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                                    <div class="file__icon--image__preview image-fit">
                                        <img alt="Icewall Tailwind HTML Admin Template" src="{{ asset('dist/images/' . strtolower($value['file_name'])) }}">
                                    </div>
                                </a>
                            @else
                                <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                                    <div class="file__icon__file-name">{{ $value['type'] }}</div>
                                </a>
                            @endif
                            <a href="" class="block font-medium mt-4 text-center truncate">{{ $value['name'] }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ $value['size'] }}</div>
                            <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <i data-feather="more-vertical" class="w-5 h-5 text-slate-500"></i>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <i data-feather="users" class="w-4 h-4 mr-2"></i> Share File
                                            </a>
                                        </li>
                                        <li>
                                            {!! Form::open(['method' => 'DELETE','route' => ['files.destroy', $value->id],'style'=>'display:inline']) !!}
                                            <div class="dropdown-item">

                                            <i data-feather="trash" class="w-4 h-4 mr-2"></i>{!! Form::submit('Delete', ['class' => '']) !!}

                                            </div>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    {!! $data->render() !!}
                </nav>

            </div>
            <!-- END: Pagination -->
        </div>
    </div>
    {{-- Modal Form Cateogry --}}
<div id="basic-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-10">
                {!! Form::open(array('route' => 'file.categories.save','method'=>'POST')) !!}
                @csrf
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">Name</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required')) !!}
                        </div>
                        <button class="btn btn-primary mt-5">Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div id="modal-file-upload" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-10">
                {!! Form::open(array('route' => 'files.save','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                @csrf
                <div id="input" class="p-5">
                    <div class="preview">
                        <div>
                            <label for="regular-form-1" class="form-label">Category</label><br>
                            <select name="category" class="form-control">
                                @foreach ($categories as $key => $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div>
                            <label for="regular-form-1" class="form-label">Name</label><br>
                            <input type="text" name="name" class="form-control">
                        </div><br>
                        <div class="fallback">
                            <input name="file" id="file" type="file" class="form-controll" /><br>
                            <label class="text-danger">PDF</label>
                        </div>
                        <button class="btn btn-primary mt-5">Save</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script language="javascript">
     $(document).ready(function () {


$('#master').on('click', function(e) {
 if($(this).is(':checked',true))
 {
    $(".sub_chk").prop('checked', true);
 } else {
    $(".sub_chk").prop('checked',false);
 }
});


$('.delete_all').on('click', function(e) {


    var allVals = [];
    $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
    });


    if(allVals.length <=0)
    {
        alert("Please select row.");
    }  else {


        var check = confirm("Are you sure you want to delete this row?");
        if(check == true){
;
            var join_selected_values = allVals.join(",");


            $.ajax({
                url: $(this).data('url'),
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    window.location.reload();
                }
            });


          $.each(allVals, function( index, value ) {
              $('table tr').filter("[data-row-id='" + value + "']").remove();
          });
        }
    }
});


$('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    onConfirm: function (event, element) {
        element.trigger('confirm');
    }
});


$(document).on('confirm', function (e) {
    var ele = e.target;
    e.preventDefault();


    $.ajax({
        url: ele.href,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (data) {
            if (data['success']) {
                $("#" + data['tr']).slideUp("slow");
                alert(data['success']);
            } else if (data['error']) {
                alert(data['error']);
            } else {
                alert('Whoops Something went wrong!!');
            }
        },
        error: function (data) {
            alert(data.responseText);
        }
    });

    return false;
});
});
</script>
@endsection
