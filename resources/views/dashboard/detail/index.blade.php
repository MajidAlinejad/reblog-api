@extends('dashboard')
@section('title')
    <h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
        <span class="align-middle">
            <ion-icon size="large" name="cube"></ion-icon>
        </span>
        مشخصه
    </h2>


@endsection

@section('content')


    <div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

        <div class="col-span-10 sm:col-span-10">
            <h1 class="pl-4 text-3xl ">مشخصه : {{ $spec->title }}</h1>
        </div>



    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    {{-- @foreach ($spec as $key => $sp)
                        --}}
                        <div class="col-span-6 mx-5 my-3 sm:col-span-6">

                            <label x-data="{open:false}"
                                class="inline-flex justify-between w-full pb-2 mb-3 text-lg font-medium text-gray-700 border-b">
                                <span class="">
                                    {{ $spec->name }}
                                    :</span>
                                <ion-icon @click="open = true"
                                    class="text-3xl text-indigo-500 cursor-pointer hover:text-indigo-600"
                                    name="add-circle-outline">
                                </ion-icon>

                                {{-- --}}

                                <div x-show="open" class="fixed inset-0 z-10 overflow-y-auto">
                                    <div
                                        class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">&#8203;</span>

                                        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full"
                                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <form method="POST" enctype="multipart/form-data" action="/detail">
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
                                                            خصوصیات {{ $spec->name }}
                                                        </h3>
                                                    </div>
                                                    <div class="grid">
                                                        @csrf
                                                        <input type="text" name="spec_id" hidden value="{{ $spec->id }}">
                                                        <div class="bg-white sm:p-6">

                                                            <div class="grid grid-cols-6 gap-6">
                                                                <div class="col-span-6 mb-3 sm:col-span-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-right text-gray-700 ">مقدار
                                                                        فارسی
                                                                        :
                                                                    </label>
                                                                    <input name="value" type="text" id="value"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

                                                                </div>
                                                                <div class="col-span-6 mb-3 sm:col-span-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-right text-gray-700 ">مقدار
                                                                        انگلیسی
                                                                        :
                                                                    </label>
                                                                    <input name="text" type="text" id="text"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

                                                                </div>
                                                                <div class="col-span-6 mb-3 sm:col-span-2">
                                                                    <label
                                                                        class="block text-sm font-medium text-right text-gray-700 ">فیلد
                                                                        مقدار مخصوص
                                                                        :
                                                                    </label>
                                                                    <input name="special" type="text" id="special"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

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

                                {{-- --}}
                            </label>

                        </div>
                        <ul class="grid grid-cols-9 gap-6 mx-8 mb-8">
                            @foreach ($spec->details as $item)

                                <li
                                    class="inline-flex justify-between col-span-2 px-3 py-1 mx-3 mb-3 border border-gray-400 border-dashed rounded-lg sm:col-span-3 ">
                                    <span>{{ $item->value }} <span
                                            class="text-cool-gray-400">({{ $item->text }})</span></span>
                                    <span class="h-0 text-xl"
                                        x-data="{edit{{ $item->id }}:false , rm{{ $item->id }}:false}">
                                        <ion-icon @click="edit{{ $item->id }} = true"
                                            class="text-blue-700 cursor-pointer hover:text-indigo-800"
                                            name="create-outline">
                                        </ion-icon>
                                        <ion-icon @click="rm{{ $item->id }} = true"
                                            class="text-red-700 cursor-pointer hover:text-red-800" name="trash-bin-outline">
                                        </ion-icon>

                                        <div x-show="edit{{ $item->id }}" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                        action="/detail/{{ $item->id }}">
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
                                                                    خصوصیات {{ $spec->name }}
                                                                </h3>
                                                            </div>
                                                            <div class="grid">
                                                                @csrf
                                                                @method('put')
                                                                <input type="text" name="spec_id" hidden
                                                                    value="{{ $spec->id }}">
                                                                <div class="bg-white sm:p-6">

                                                                    <div class="grid grid-cols-6 gap-6">
                                                                        <div class="col-span-6 mb-3 sm:col-span-2">
                                                                            <label
                                                                                class="block text-sm font-medium text-right text-gray-700 ">مقدار
                                                                                فارسی
                                                                                :
                                                                            </label>
                                                                            <input name="value" type="text" id="value"
                                                                                value="{{ $item->value }}"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

                                                                        </div>
                                                                        <div class="col-span-6 mb-3 sm:col-span-2">
                                                                            <label
                                                                                class="block text-sm font-medium text-right text-gray-700 ">مقدار
                                                                                انگلیسی
                                                                                :
                                                                            </label>
                                                                            <input name="text" type="text" id="text"
                                                                                value="{{ $item->text }}"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

                                                                        </div>
                                                                        <div class="col-span-6 mb-3 sm:col-span-2">
                                                                            <label
                                                                                class="block text-sm font-medium text-right text-gray-700 ">فیلد
                                                                                مقدار مخصوص
                                                                                :
                                                                            </label>
                                                                            <input name="special" type="text" id="special"
                                                                                value="{{ $item->special }}"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">

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
                                                            <button type="button" @click="edit{{ $item->id }} = false"
                                                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                لغو
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div x-show="rm{{ $item->id }}" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                                    حذف مقدار " {{ $item->value }} "
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">
                                                                        آیا مطمئن هستید؟
                                                                        ممکن است پست هایی با این مقدار در ارتباط باشند.قبل
                                                                        از
                                                                        حذف مقدار از این
                                                                        مورد مطمئن شوید.
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
                                                        <form action="/brand/{{ $item->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                حذف
                                                            </button>

                                                        </form>
                                                        <button @click="rm{{ $item->id }} = false" type="button"
                                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            لغو
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>


                                </li>
                            @endforeach
                        </ul>

                        {{--
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>







@endsection
