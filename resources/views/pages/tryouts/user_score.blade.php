@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('content')
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class="px-5 mt-10">
            <div class="font-medium text-center text-lg"><h3>Score Tryout</h3></div>
            <div class="text-slate-500 text-center mt-2 text-lg">{{ $data->user->name }}</div>
            <div class="text-slate-500 text-center mt-2 text-lg">{{ $data->total_score }}</div>
            <div class="text-slate-500 text-center mt-2"><a href="{{ route('tryouts.lists') }}" class="btn btn-primary">Exit</a></div>
        </div>
    </div>
    <!-- END: Wizard Layout -->
@endsection
