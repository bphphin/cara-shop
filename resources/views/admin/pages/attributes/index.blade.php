@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            {{--            <div class="my-20">--}}
            {{--                <div class="">--}}
            {{--                    <div class="w-[100%]">--}}
            {{--                        <div class="flex justify-start my-2">--}}
            {{--                            <a href="{{ route('admin.category.create')  }}"--}}
            {{--                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ Size--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                        <div class="relative overflow-x-auto">--}}
            {{--                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">--}}
            {{--                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
            {{--                                <tr>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Product name--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Color--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Category--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Price--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3 w-[300px]">--}}
            {{--                                        Action--}}
            {{--                                    </th>--}}
            {{--                                </tr>--}}
            {{--                                </thead>--}}
            {{--                                <tbody>--}}
            {{--                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">--}}
            {{--                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
            {{--                                        Apple MacBook Pro 17"--}}
            {{--                                    </th>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        Silver--}}
            {{--                                    </td>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        Laptop--}}
            {{--                                    </td>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        $2999--}}
            {{--                                    </td><td class="px-6 py-4">--}}
            {{--                                        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Red</button>--}}
            {{--                                        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Red</button>--}}
            {{--                                        <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Red</button>--}}
            {{--                                    </td>--}}
            {{--                                </tr>--}}
            {{--                                </tbody>--}}
            {{--                            </table>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                    <div class="w-[100%]">--}}
            {{--                        <div class="flex justify-start my-2">--}}
            {{--                            <a href="{{ route('admin.category.create')  }}"--}}
            {{--                               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ Color--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                        <div class="relative overflow-x-auto">--}}
            {{--                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">--}}
            {{--                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
            {{--                                <tr>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Product name--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Color--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Category--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Price--}}
            {{--                                    </th>--}}
            {{--                                    <th scope="col" class="px-6 py-3">--}}
            {{--                                        Action--}}
            {{--                                    </th>--}}
            {{--                                </tr>--}}
            {{--                                </thead>--}}
            {{--                                <tbody>--}}
            {{--                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">--}}
            {{--                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
            {{--                                        Apple MacBook Pro 17"--}}
            {{--                                    </th>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        Silver--}}
            {{--                                    </td>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        Laptop--}}
            {{--                                    </td>--}}
            {{--                                    <td class="px-6 py-4">--}}
            {{--                                        $2999--}}
            {{--                                    </td>--}}
            {{--                                </tr>--}}
            {{--                                </tbody>--}}
            {{--                            </table>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <select name="" id="select">
                <option value="">Size</option>
                <option value="">Color</option>
            </select>
        </div>
    </div>
    @push('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $( "#select" ).on( "change", function() {
                alert( "Handler for `change` called." );
            } );
        </script>
    @endpush
@endsection
