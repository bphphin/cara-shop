@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.product.store')  }}"
                       class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mx-2 rounded-full">+
                        Product</a>
                    <a
                        class="bg-[#f687b3] hover:bg-[#f687b3] text-white font-bold py-2 px-4 rounded-full"
                        href="{{ route('admin.product.trash')  }}">
                        Trash
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                <div class="relative overflow-x-auto mb-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 w-[150px]">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pro)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white truncate">
                                    {{ $pro->name  }}
                                </th>
                                <td class="px-6 py-4">
                                    <img src="{{ $pro->image  }}" alt="">
                                </td>
                                <td class="px-6 py-4 flex gap-x-4">
                                    <a href=""
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Detail
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.product.update',$pro->id)  }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Edit
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.product.softDelete',$pro->id)  }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                            Remove
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $products->links('admin.layouts.pagination')  }}
            </div>
        </div>
    </div>
@endsection
