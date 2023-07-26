@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end my-2">
                    <a href="{{ route('admin.category.create')  }}"
                       class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+ New
                        Customer
                    </a>
                    <a
                        class="bg-[#f687b3] hover:bg-[#f687b3] text-white font-bold py-2 px-4 rounded-full"
                        href="{{ route('admin.category.trash')  }}">
                        Trash
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                {{--Table--}}
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 w-[400px]">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $cus)
                            @if($cus->role !== 1)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4">
                                    {{ $cus->name  }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cus->address  }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cus->phone  }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Người dùng
                                    </span>

                                </td>
                                <td class="px-6 py-4 flex gap-x-4">
                                    <a href=""
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Detail
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href=""
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Edit
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                            Remove
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
