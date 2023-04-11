@extends('../layout/' . $layout)

@section('subhead')
    <title>Wizard - Icewall - Tailwind HTML Admin Template</title>
@endsection

@section('content')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">Wizard Layout</h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class="px-5 mt-10">
            <div class="font-medium text-center text-lg">Tryout {{ $data->name }}</div>
            <div class="text-slate-500 text-center mt-2">Have a great time doing it...</div>
            <div class="text-slate-500 text-center mt-2"><a href="{{ route('tryouts.test',$data->id) }}" class="btn btn-primary">Start</a></div>
        </div>
    </div>
    <!-- END: Wizard Layout -->
@endsection
