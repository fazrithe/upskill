@extends('../layout/' . $layout)

@section('subhead')
    <title>Wizard - Icewall - Tailwind HTML Admin Template</title>
@endsection

@section('content')
    <div class="flex items-center mt-8 mb-8">
        <h2 class="intro-y text-lg font-medium mr-auto">Tryout</h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="container mt-8">
        <div class="row">
          <div class="col-4">
            <div class="">
                <button class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2 mb-2">1</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">2</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">3</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">2</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">3</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">2</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">3</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">2</button>
                <button class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">3</button>
            </div>
          </div>
          <div class="col-8">
            @foreach($data as $value)

                {!! $value->question !!}

                @foreach(json_decode($value->answer) as $value)
                    {!! $value->a !!}
                    {!! $value->b !!}
                    {!! $value->c !!}
                    {!! $value->d !!}
                    {!! $value->e !!}
                    <hr class="mt-4">
                @endforeach

            @endforeach
              <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {!! $data->render() !!}
            </nav>
        </div>
        <!-- END: Pagination -->
          </div>
        </div>
      </div>
    <!-- END: Wizard Layout -->
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
