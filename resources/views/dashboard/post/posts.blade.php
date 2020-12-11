@extends('dashboard')
@section('title')
    <h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
        <span class="align-middle">
            <ion-icon size="large" name="flag"></ion-icon>
        </span>
        پست های {{ $blog->url }}
    </h2>


@endsection

@section('content')


    <div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

        <div class="col-span-10 sm:col-span-10">
            <h1 class="pl-4 text-3xl ">پست های {{ $blog->url }}</h1>
        </div>
        <div class="col-span-2 sm:col-span-2 justify-self-end">

            <div>
                <a href="/{{ $blog->id }}/new"
                    class="inline-flex items-center justify-center px-2 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm whitespace-nowrap hover:bg-indigo-700">
                    <ion-icon class="text-2xl" name="add-outline"></ion-icon>
                </a>
            </div>
        </div>


    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    عنوان
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    دسته
                                </th>
                                @if ($blog->base === 'product')
                                    <th scope="col"
                                        class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                        قیمت
                                    </th>
                                @endif
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    تاریخ
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    کاربر
                                </th>

                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    وضعیت
                                </th>

                                <th scope="col" class="px-3 py-3 bg-gray-50">
                                    <span class="sr-only">ویرایش</span>
                                </th>
                                <th scope="col" class="px-3 py-3 bg-gray-50">
                                    <span class="sr-only">حذف</span>
                                </th>
                                <th scope="col" class="px-3 py-3 bg-gray-50">
                                    <span
                                        class="text-xs font-medium text-center text-gray-500 uppercase bg-gray-50">جزئیات</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $key => $item)
                                <tr>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $key + 1 }}</div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="inline-flex items-center text-sm text-gray-900">
                                            <img class="w-10 h-10 ml-2 rounded-full" src="{{ asset($item->thumbnail) }}"
                                                alt="">
                                            {{ $item->title }}
                                        </div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->category->title }}
                                            </div>

                                        </div>
                                    </td>
                                    @if ($blog->base === 'product')
                                        <td class="px-3 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> {{ $item->price }}</div>
                                        </td>
                                    @endif
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $item->created_at }}</div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $item->user->name }}</div>
                                    </td>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        @if ($item->status === 'active')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{ $item->status }}
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                {{ $item->status }}
                                            </span>
                                        @endif

                                    </td>

                                    <td class="px-3 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="/post/{{ $item->id }}"
                                            class="text-indigo-600 hover:text-indigo-900">ویرایش</a>
                                    </td>
                                    <td x-data="{var{{ $item->id }}:false}"
                                        class="px-3 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <button @click="var{{ $item->id }} = true"
                                            class="text-red-600 hover:text-indigo-900">حذف</button>

                                        <div x-show="var{{ $item->id }}" class="fixed inset-0 z-10 overflow-y-auto">
                                            <div
                                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                </div>

                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                    aria-hidden="true">&#8203;</span>

                                                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                                        <div class="sm:flex sm:items-start">


                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-right">
                                                                <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                                    id="modal-headline">
                                                                    حذف پست "{{ $item->title }}"
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">
                                                                        آیا مطمئن هستید؟ اگر یک پست حذف شود تمامی موارد
                                                                        مرتبط با آن پاک می شوند.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                                <!-- Heroicon name: exclamation -->
                                                                <svg class="w-6 h-6 text-red-600"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                        <form action="/post/{{ $item->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                حذف
                                                            </button>

                                                        </form>
                                                        <button @click="var{{ $item->id }} = false" type="button"
                                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            لغو
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </td>
                                    <td class="px-2 py-4 text-center whitespace-nowrap">
                                        <a href="/view/{{ $item->id }}" class="text-cool-gray-500">
                                            <ion-icon class="text-2xl align-middle" name="chevron-back-circle"></ion-icon>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                            <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>







@endsection
