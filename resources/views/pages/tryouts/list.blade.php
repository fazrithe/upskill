@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Tryout Lists</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Add New Tryout</button>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
        @foreach ($data as $value)
            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                    <div class="w-10 h-10 flex-none image-fit">
                        @if($value->user->photo == null)
                        <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
                        @else
                        <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ $value->user->photo }}">
                        @endif
                    </div>
                    <div class="ml-3 mr-auto">
                        <a href="" class="font-medium">{{ $value->user->name }}</a>
                        <div class="flex text-slate-500 truncate text-xs mt-0.5">
                            <a class="text-primary inline-block truncate" href=""></a> <span class="mx-1">
                        </div>
                    </div>
                    <div class="dropdown ml-3">
                        <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-slate-500" aria-expanded="false" data-tw-toggle="dropdown">
                            <i data-feather="more-vertical" class="w-4 h-4"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="" class="dropdown-item">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="h-40 2xl:h-56 image-fit">
                        <img alt="Icewall Tailwind HTML Admin Template" class="rounded-md" src="{{ $value->file_path }}">
                    </div>
                    <a href="" class="block font-medium text-base mt-5">{{ $value->name }}</a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-full flex text-slate-500 text-xs sm:text-sm">
                        <div class="mr-2">
                            Have Done: <span class="font-medium">{{ getScore($value->id) }}</span>
                        </div>
                    </div>
                    <div class="w-full flex items-center mt-3">
                        <div class="">
                            <a href="{{ route('tryouts.view',$value->id) }}" class="btn btn-primary">View</a>
                        </div>
                        <div class="ml-4">
                            <a href="#" class="btn btn-danger">Score</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {!! $data->render() !!}
            </nav>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
