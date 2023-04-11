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
                @php
                    $last = 1;
                    $now = count($data_count);
                    $url = url()->current();
                @endphp
                @for ($i = $last; $i <= $now; $i++)
                    @if($i == 3)
                    <button class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2 mb-2">3</button>
                    @else
                    <a href="{{ $url.'?page='.$i }}" class="intro-y w-10 h-10 rounded-full btn bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 text-slate-500 mx-2 mb-2">{{ $i }}</a>
                    @endif
                @endfor
            </div>
          </div>
          <div class="col-8">
            @foreach($data as $key => $value)

                {!! $value->question !!}
                <input type="hidden" type="number_page" value="{{ $data->currentPage(); }}">
                @foreach(json_decode($value->answer) as $value)
                <div class="mt-4">
                    <input name="answer" value="a" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        {!! $value->a !!}
                    </label>
                </div>
                <div class="mt-4">
                <input name="answer" value="b" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    {!! $value->b !!}
                </label>
                </div>
                <div class="mt-4">
                <input name="answer" value="c" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    {!! $value->c !!}
                </label>
                </div>
                <div class="mt-4">
                <input name="answer" value="d" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    {!! $value->d !!}
                </label>
                </div>
                <div class="mt-4">
                <input name="answer" value="e" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    {!! $value->e !!}
                </label>
                </div>
                <div class="row mt-4">
                    <div class="col-2">
                        <button class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-2">
                        <a href="{{$data->nextPageUrl()}}" class="btn btn-danger">Next</a>
                    </div>
                </div>
                    <hr class="mt-4">
                @endforeach

            @endforeach
              <!-- BEGIN: Pagination -->
        {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                {!! $data->render() !!}
            </nav>
        </div> --}}
        <!-- END: Pagination -->
          </div>
        </div>
      </div>
    <!-- END: Wizard Layout -->
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
