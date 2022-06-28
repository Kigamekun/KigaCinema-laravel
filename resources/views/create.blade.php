@extends('layouts.base')

@section('main')
    <style>
        label {
            color: white;
        }

        .dropify-wrapper .dropify-message span.file-icon {
            font-size: 30px !important;
        }
    </style>
    <center>
        <h1 style="color: white;font-size: 35px;font-weight: bold">Create Movies</h1>
    </center>
    <div style="margin: auto;width:50%;">
        @if (session('messeage'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">Messeage</p>
                        <p class="text-sm">{{ session('messeage') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Danger
                </div>
                @foreach ($errors->all() as $error)
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
    <div style="margin: auto;width:80%;display:flex;justify-content:center;">

        <br>
        <form method="POST" action="{{ route('store') }}" class="w-full max-w-lg" enctype="multipart/form-data">

            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-password">
                        Title
                    </label>
                    <input name="title"
                        class="appearance-none block w-full bg-white-200 text-white-700 border border-white-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-white-500"
                        id="grid-password" type="text" placeholder="Fill The Title">

                </div>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-password">
                        Description
                    </label>
                    <textarea name="description" style="width:100%;" class="resize-y border rounded-md"></textarea>

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-state">
                        Country
                    </label>
                    <div class="relative">
                        <select id="country" name="country"
                            class="block appearance-none w-full bg-white-200 border border-white-200 text-white-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-white-500"
                            id="grid-state">
                            <option>Japan</option>
                            <option>USA</option>
                            <option>Indonesia</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-city">
                        Price
                    </label>
                    <input name="price"
                        class="appearance-none block w-full bg-white-200 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white-500"
                        id="grid-city" type="text" placeholder="20000">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white-700 text-xs font-bold mb-2" for="grid-zip">
                        On Air
                    </label>
                    <input name="on_air"
                        class="appearance-none block w-full bg-white-200 text-white-700 border border-white-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white-500"
                        id="grid-zip" type="text" placeholder="1 , 2 , 3">
                </div>
            </div>



            <br>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">


                    <input name="thumb" type="file" class="dropify" />
                </div>
            </div>






            <br>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Button
            </button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
