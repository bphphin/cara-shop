@extends('admin.layouts.app')
@section('app')
    <div class="dash-content">
        <div class="activity">
            <div class="py-20">
                <h3 class="text-gray-400 mb-4">Thêm mới danh mục con</h3>
                <form method="POST" action="{{ route('admin.cate.subcate.store')  }}">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name" id="floating_email"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " value="{{ old('name')  }}"/>
                        <label for="floating_email"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tên
                            danh mục</label>
                        @error('name')
                        <p class="my-2 text-red-400">{{ $message  }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="slug" name="slug" id="floating_password"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="floating_password"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
                    </div>
                    <label for="countries_multiple"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        category</label>
                    <select name="parent_id" multiple id="countries_multiple"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($cates as $cate)
                            <option value="{{ $cate->id  }}">{{ $cate->name  }}</option>
                        @endforeach
                    </select>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            description</label>
                        <textarea id="message" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write your thoughts here..." name="description"></textarea>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                    <a href="{{ route('admin.category.index')  }}"
                       class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
