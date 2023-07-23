@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Brand Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 w-[300px]">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    Trace
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4">
                                    {{ $brand->name  }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $brand->description  }}
                                </td>
                                <td class="px-6 py-4">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Edit
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
{{--                        <div class="flex justify-end">{{ $brands->links()  }}</div>--}}
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

