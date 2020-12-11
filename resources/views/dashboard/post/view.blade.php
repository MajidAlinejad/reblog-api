@extends('dashboard')
@section('title')
    <h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
        <span class="align-middle">
            <ion-icon size="large" name="flag"></ion-icon>
        </span>
        پست : {{ $post->title }}
    </h2>


@endsection

@section('content')


    <div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

        <div class="inline-flex items-center col-span-10 sm:col-span-10">
            <img class="w-12 h-12 p-1 ml-2 border rounded-full" src="{{ asset($post->thumbnail) }}" alt="">
            <h2 class="pl-4 text-2xl "> {{ $post->title }} <span>
                    @if ($post->status === 'active')
                        <span
                            class="inline-flex px-2 py-1 text-sm font-semibold leading-5 text-green-800 bg-green-100 rounded-xl">
                            فعال
                        </span>
                    @else
                        <span
                            class="inline-flex px-2 py-1 text-sm font-semibold leading-5 text-red-800 bg-red-100 rounded-xl">
                            غیر فعال
                        </span>
                    @endif
                </span></h2>


        </div>
        <div class="flex col-span-2 sm:col-span-2 justify-self-end" x-data="{wire:false}"><button @click="wire = true"
                class="inline-flex items-center px-4 py-2 text-white bg-blue-400 rounded-lg hover:bg-blue-500">
                <ion-icon class="ml-1 text-xl text-white " name="git-compare-outline"></ion-icon> <span class="">
                    مقادیر
                    مشخصه</span>
            </button>
            <div x-show=" wire" class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div class="inline-block w-2/3 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <form method="POST" enctype="multipart/form-data" action="/connect/{{ $post->id }}">
                            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                <div class="inline-flex w-full pb-3 align-middle border-b-2 border-blue-100 border-dashed ">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <h3 class="inline-flex items-center justify-center px-2 text-lg font-medium leading-6 text-gray-900 "
                                        id="modal-headline">
                                        ارتباط با مقادیر:
                                    </h3>
                                </div>


                                @csrf

                                @foreach ($spec as $sp)
                                    <div class="grid grid-cols-8 gap-6 px-6 pb-6">
                                        <p class="pt-2 mt-2 text-right border-b sm:col-span-8">{{ $sp->name }}</p>

                                        @foreach ($sp->details as $det)
                                            <label class="text-right sm:col-span-2 ">
                                                <input name="det[]" value="{{ $det->id }}" type="checkbox"
                                                    class="form-checkbox" @foreach ($post->details as $pivot)
                                                @if ($pivot->id === $det->id)
                                                    checked
                                                @endif
                                        @endforeach
                                        >
                                        {{ $det->value }}</label>
                                @endforeach




                            </div>



                            @endforeach
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            مرتبط
                        </button>
                        <button type="button" @click="wire = false"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            لغو
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
    <div class="grid grid-cols-4">
        <div class="col-span-1 p-1"><img class="p-1 border rounded-md" src="{{ asset($post->img) }}" alt="">
        </div>
        <div class="col-span-3 px-3">
            <ul class="inline-flex">
                <li class="px-2 py-1 mx-3 text-sm font-semibold leading-5 text-teal-600 bg-teal-100 rounded-xl">در دسته :
                    {{ $post->category->title }}
                </li>
                @if ($post->group_id)
                    <li class="px-2 py-1 mx-3 text-sm font-semibold leading-5 text-teal-600 bg-teal-100 rounded-xl">در گروه
                        :{{ $post->group->title }}</li>
                @endif

                <li class="px-2 py-1 mx-3 text-sm font-semibold leading-5 text-teal-600 bg-teal-100 rounded-xl">کلمات کلیدی
                    :{{ $post->meta }}</li>
                {{-- <li
                    class="px-2 py-1 mx-3 text-sm font-semibold leading-5 text-teal-600 bg-teal-100 rounded-xl">
                    {{ $post->category->title }}
                </li> --}}
            </ul>
            <p class="p-1 mt-2 border-t border-dashed text-cool-gray-600">{{ $post->caption }}</p>

        </div>
    </div>

    @foreach ($post->blocks as $bl)


        <div class="flex flex-col ">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    <div class="grid grid-cols-4 p-2 mt-2 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <div class="col-span-1">
                            <img class="p-1 border rounded-md" src="{{ asset($bl->img) }}" alt="">
                        </div>
                        <div class="col-span-3 px-3">
                            <div class="inline-flex items-center ">
                                <h2 class="px-4 py-2">{{ $bl->title }}</h2>
                                <div class="mt-1">
                                    {{-- --}}


                                    <span class="px-2" x-data="{var{{ $bl->id }}:false , edit{{ $bl->id }}:false}">
                                        <button @click="edit{{ $bl->id }} = true">
                                            <ion-icon name="create"
                                                class="px-1 cursor-pointer text-cool-gray-500 hover:text-orange-400">
                                            </ion-icon>
                                        </button>
                                        <button @click=" var{{ $bl->id }}=true">
                                            <ion-icon name="trash-bin"
                                                class="px-1 cursor-pointer text-cool-gray-500 hover:text-red-600">
                                            </ion-icon>
                                        </button>

                                        <div x-show="var{{ $bl->id }}" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                                    حذف بلاک "{{ $bl->title }}"
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">
                                                                        آیا مطمئن هستید؟
                                                                        این بلاک یا تمام جزئیات خود حذف میشود!
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
                                                        <form action="/block/{{ $bl->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                حذف
                                                            </button>

                                                        </form>
                                                        <button @click="var{{ $bl->id }} = false" type="button"
                                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            لغو
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div x-show="edit{{ $bl->id }}" class="fixed inset-0 z-10 overflow-y-auto">
                                            <div
                                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                </div>

                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                    aria-hidden="true">&#8203;</span>

                                                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full"
                                                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                    <form method="POST" enctype="multipart/form-data"
                                                        action="/block/{{ $bl->id }}">
                                                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                                            <div
                                                                class="inline-flex w-full pb-3 align-middle border-b-2 border-indigo-100 border-dashed ">
                                                                <div
                                                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-indigo-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="w-6 h-6 text-indigo-600"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor"
                                                                        aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                    </svg>
                                                                </div>
                                                                <h3 class="inline-flex items-center justify-center px-2 text-lg font-medium leading-6 text-gray-900 "
                                                                    id="modal-headline">
                                                                    مشخصات بلاک
                                                                </h3>
                                                            </div>
                                                            <div class="grid">
                                                                @csrf
                                                                @method('put')
                                                                <div class="px-4 py-5 bg-white sm:p-6">

                                                                    <div class="grid grid-cols-8 gap-6">


                                                                    </div>
                                                                    <div class="grid grid-cols-12 gap-6 mt-6">
                                                                        <div class="col-span-6 sm:col-span-9">
                                                                            <label for="title"
                                                                                class="block text-sm font-medium text-right text-gray-700">
                                                                                عنوان</label>
                                                                            <input placeholder="عنوان" name="title"
                                                                                value="{{ $bl->title }}" type="text"
                                                                                id="title"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-3">
                                                                            <label for="order"
                                                                                class="block text-sm font-medium text-right text-gray-700">
                                                                                ترتیب</label>
                                                                            <input placeholder="ترتیب" name="order"
                                                                                value="{{ $bl->order }}" type="number"
                                                                                id="order"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-4">
                                                                            <label for=" img"
                                                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                                                عکس اصلی</label>
                                                                            <div class="flex items-center ">

                                                                                <label
                                                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                                                    <span
                                                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                                                    <input type='file' name="img"
                                                                                        class="hidden" />
                                                                                </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-4">
                                                                            <label for=" special"
                                                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                                                عکس رزرو</label>
                                                                            <div class="flex items-center ">

                                                                                <label
                                                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                                                    <span
                                                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                                                    <input type='file' name="special"
                                                                                        class="hidden" />
                                                                                </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-span-2 sm:col-span-4">
                                                                            <label for=" stream"
                                                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                                                ویدیو ، صوت</label>
                                                                            <div class="flex items-center ">

                                                                                <label
                                                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                                                    <span
                                                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                                                    <input type='file' name="stream"
                                                                                        class="hidden" />
                                                                                </label>

                                                                            </div>
                                                                        </div>


                                                                        <div class="col-span-12 sm:col-span-12">
                                                                            <label for="text"
                                                                                class="block text-sm font-medium text-right text-gray-700">متن</label>
                                                                            <textarea id="text" name="text" rows="3"
                                                                                class="block w-full p-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:outline-none"
                                                                                placeholder="متن">{{ $bl->text }}
                                                                            </textarea>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div
                                                            class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <button type="submit"
                                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                ویرایش
                                                            </button>
                                                            <button type="button" @click="edit{{ $bl->id }} = false"
                                                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                لغو
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    {{-- --}}

                                </div>

                            </div>

                            <hr />
                            <p class="px-4 py-2">{{ $bl->text }}</p>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    @endforeach


    <div x-data="{ open: false }">
        <div @click="open = true"
            class="inline-flex items-center justify-center w-full p-5 my-3 align-middle border-2 border-dashed cursor-pointer rounded-xl">
            <ion-icon class="text-4xl text-cool-gray-500" name="add-circle-outline"></ion-icon>
            <span class="text-cool-gray-500">افزودن بلاک</span>
        </div>

        <div x-show="open" @click.away="open = false" class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block w-11/12 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form method="POST" enctype="multipart/form-data" action="/block">
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                            <div class="inline-flex w-full pb-3 align-middle border-b-2 border-indigo-100 border-dashed ">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-indigo-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <h3 class="inline-flex items-center justify-center px-2 text-lg font-medium leading-6 text-gray-900 "
                                    id="modal-headline">
                                    مشخصات بلاک
                                </h3>
                            </div>
                            <div class="grid">
                                @csrf
                                <div class="px-4 py-5 bg-white sm:p-6">

                                    <div class="grid grid-cols-8 gap-6">
                                        <input type="text" name="post_id" value="{{ $post->id }}" hidden>


                                    </div>
                                    <div class="grid grid-cols-12 gap-6 mt-6">
                                        <div class="col-span-6 sm:col-span-9">
                                            <label for="title" class="block text-sm font-medium text-right text-gray-700">
                                                عنوان</label>
                                            <input placeholder="عنوان" name="title" type="text" id="title"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="order" class="block text-sm font-medium text-right text-gray-700">
                                                ترتیب</label>
                                            <input placeholder="ترتیب" name="order" type="number" id="order"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <div class="col-span-2 sm:col-span-4">
                                            <label for=" img"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                عکس اصلی</label>
                                            <div class="flex items-center ">

                                                <label
                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                    <span
                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                    <input type='file' name="img" class="hidden" />
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-span-2 sm:col-span-4">
                                            <label for=" special"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                عکس رزرو</label>
                                            <div class="flex items-center ">

                                                <label
                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                    <span
                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                    <input type='file' name="special" class="hidden" />
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-span-2 sm:col-span-4">
                                            <label for=" stream"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                ویدیو ، صوت</label>
                                            <div class="flex items-center ">

                                                <label
                                                    class="block w-full px-8 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                    <span
                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                                    <input type='file' name="stream" class="hidden" />
                                                </label>

                                            </div>
                                        </div>


                                        <div class="col-span-12 sm:col-span-12">
                                            <label for="text"
                                                class="block text-sm font-medium text-right text-gray-700">متن</label>
                                            <textarea id="text" name="text" rows="3"
                                                class="block w-full p-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:outline-none"
                                                placeholder="متن"></textarea>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                افزودن
                            </button>
                            <button type="button" @click="open = false"
                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                لغو
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>








@endsection
