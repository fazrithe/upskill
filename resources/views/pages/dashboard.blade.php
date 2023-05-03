@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ Route::current()->getName() }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- END: General Report -->

                <!-- BEGIN: Ads 1 -->
                <div class="col-span-12 lg:col-span-6 mt-6">
                    <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                        <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Asah skill kamu </div>
                        <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Dengan selalu menjawab soal tryout</div>
                        <button class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">Start Now</button>
                        <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2" alt="Icewall Tailwind HTML Admin Template" src="{{ asset('dist/images/woman-illustration.svg') }}">
                    </div>
                </div>
                <!-- END: Ads 1 -->
                <!-- BEGIN: Ads 2 -->
                <div class="col-span-12 lg:col-span-6 mt-6">
                    <div class="box p-8 relative overflow-hidden intro-y">
                        <div class="leading-[2.15rem] w-full sm:w-52 text-primary dark:text-white text-xl -mt-3">Ajak teman kamu untuk bergabung di sini <span class="font-medium">FREE</span> bonuses!</div>
                        <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2">Untuk mendapatkan potongan harga paket tryout</div>
                        <div class="w-48 relative mt-6 cursor-pointer tooltip" title="Copy referral link">
                            <input type="text" class="form-control" value="https://localhost">
                            <i data-feather="copy" class="absolute right-0 top-0 bottom-0 my-auto mr-4 w-4 h-4"></i>
                        </div>
                        <img class="hidden sm:block absolute top-0 right-0 w-1/2 mt-1 -mr-12" alt="Icewall Tailwind HTML Admin Template" src="{{ asset('dist/images/phone-illustration.svg') }}">
                    </div>
                </div>
                <!-- END: Ads 2 -->
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Weekly Top Score</h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Avatar</th>
                                    <th class="whitespace-nowrap">Name</th>
                                    <th class="text-center whitespace-nowrap">Category</th>
                                    <th class="text-center whitespace-nowrap">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_score as $score)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    @if($score->user->photo == null)
                                                    <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
                                                    @else
                                                    <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ $score->user->photo }}">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="font-medium whitespace-nowrap">{{ $score->user->name }}</a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                                        </td>
                                        <td class="text-center"> {{ $score->total_score }}</td>
                                        <td class="w-40">
                                            {{ $score->total_score }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            {!! $data_score->render() !!}
                        </nav>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto">Important Notes</h2>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-feather="chevron-left" class="w-4 h-4"></i>
                            </button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-feather="chevron-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                        <div class="text-slate-400 mt-1">20 Hours ago</div>
                                        <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>

                                    </div>
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                        <div class="text-slate-400 mt-1">20 Hours ago</div>
                                        <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>

                                    </div>
                                    <div class="p-5">
                                        <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                        <div class="text-slate-400 mt-1">20 Hours ago</div>
                                        <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>
        </div>
    </div>
@endsection
