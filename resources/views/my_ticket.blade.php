@extends('layouts.base')

@section('main')
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen  flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-1000 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Movie</th>
                                <th class="py-3 px-6 text-center">Room</th>
                                <th class="py-3 px-6 text-center">Date</th>
                                <th class="py-3 px-6 text-center">Seat</th>
                                <th class="py-3 px-6 text-center">Status</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-100 text-sm font-light">
                            @foreach ($data as $item)
                                <tr class=" bg-gray-900 hover:bg-gray-600">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{ $item->name }}
                                            </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                {{ \App\Models\movie::where('id', $item->movie_id)->pluck('title')->first() }}
                                            </div>

                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{ $item->room }}
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        {{ $item->date }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{ $item->seat }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if ($item->date > date('Y-m-d'))
                                            <span
                                                class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Available</span>
                                        @elseif($item->date == date('Y-m-d'))
                                            <span
                                                class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Warning
                                                This Day!</span>
                                        @else
                                            <span
                                                class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Expired</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
