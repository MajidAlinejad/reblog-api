@extends('dashboard')
@section('title')
    <h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
        <span class="align-middle">
            <ion-icon size="large" name="cube"></ion-icon>
        </span>
        پروژه
    </h2>


@endsection

@section('content')


    <div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

        <div class="col-span-10 sm:col-span-10">
            <h1 class="pl-4 text-3xl ">مشخصات دسته : {{ $category->title }}</h1>
        </div>
        <div class="col-span-2 sm:col-span-2 justify-self-end">

            <div x-data="{ open: false }">
                <button @click="open = true"
                    class="inline-flex items-center justify-center px-2 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm whitespace-nowrap hover:bg-indigo-700">
                    <ion-icon class="text-2xl" name="add-outline"></ion-icon>
                </button>


                <div x-show="open" @click.away="open = false" class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block w-11/12 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <form method="POST" enctype="multipart/form-data" action="/specs">
                                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                    <div
                                        class="inline-flex w-full pb-3 align-middle border-b-2 border-indigo-100 border-dashed ">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-indigo-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="w-6 h-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <h3 class="inline-flex items-center justify-center px-2 text-lg font-medium leading-6 text-gray-900 "
                                            id="modal-headline">
                                            افزودن مشخصه
                                        </h3>
                                    </div>
                                    <div class="grid">
                                        @csrf
                                        <input type="text" name="cat_id" value="{{ $category->id }}" hidden>
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="col-span-12 mb-3 sm:col-span-3">
                                                <label for="first_name"
                                                    class="block text-sm font-medium text-right text-gray-700">
                                                    نام مشخصه</label>
                                                <input placeholder=" name" name="name" type="text" id="name"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-12 mb-3 sm:col-span-3">
                                                <label for="desc"
                                                    class="block text-sm font-medium text-right text-gray-700">
                                                    توضیحات مشخصه</label>
                                                <input placeholder="desc" name="desc" type="text" id="desc"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="filterize"
                                                        class="block text-sm font-medium text-right text-gray-700">نشان دادن
                                                        در فیلترینگ</label>
                                                    <select id="filterize" name="filterize"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                        <option value="1">فعال</option>
                                                        <option value="0">غیرفعال</option>
                                                    </select>
                                                </div>


                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="spec_id"
                                                        class="block text-sm font-medium text-right text-gray-700">زیر
                                                        مجموعه مشخصه</label>
                                                    <select id="spec_id" name="spec_id"
                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                        <option value="">هیچکدام</option>
                                                        @foreach ($specs as $key => $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
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
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    نام
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                    نشان دادن در فیلترینگ
                                </th>

                                <th scope="col" class="px-6 py-3 bg-gray-50">
                                    <span class="sr-only">ویرایش</span>
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50">
                                    <span class="sr-only">حذف</span>
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50">
                                    <span class="sr-only">مقادیر</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($spec as $key => $spec)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $key + 1 }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="mx-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $spec->name }}
                                                </div>

                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($spec->filterize == '1')
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                فعال
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                غیر فعال
                                            </span>
                                        @endif

                                    </td>

                                    <td x-data="{edit:false}" class="py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <button @click="edit = true"
                                            class="text-indigo-600 hover:text-indigo-900">ویرایش</button>
                                        <div x-show="edit" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                        action="/specs/{{ $spec->id }}">
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
                                                                    مشخصات دسته
                                                                </h3>
                                                            </div>
                                                            <div class="grid">
                                                                @csrf
                                                                @method('put')
                                                                <input type="text" name="cat_id" value="{{ $spec->cat_id }}"
                                                                    hidden>
                                                                <div class="px-4 py-5 bg-white sm:p-6">

                                                                    <div class="grid grid-cols-6 gap-6">
                                                                        <div class="col-span-6 mb-3 sm:col-span-2">
                                                                            <label for="name"
                                                                                class="block text-sm font-medium text-right text-gray-700">نام

                                                                            </label>

                                                                            <input value="{{ $spec->name }}"
                                                                                placeholder="نام  " name="name" type="text"
                                                                                id="name"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-2">
                                                                            <label for="view"
                                                                                class="block text-sm font-medium text-right text-gray-700">زیر
                                                                                محموعه مشخصه</label>
                                                                            <select id="view" name="spec_id"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                                <option value="">-هیچ-</option>
                                                                                @foreach ($specs as $s)
                                                                                    </option>
                                                                                    @if ($s->id === $spec->spec_id)
                                                                                        <option value="{{ $s->id }}"
                                                                                            selected>{{ $s->name }}
                                                                                        </option>
                                                                                    @else
                                                                                        <option value="{{ $s->id }}">
                                                                                            {{ $s->name }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-span-6 sm:col-span-2">
                                                                            <label for="filterize"
                                                                                class="block text-sm font-medium text-right text-gray-700">نشان
                                                                                دادن در فیلترینگ</label>
                                                                            <select id="filterize" name="filterize"
                                                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                                @if ($spec->filterize == '1')
                                                                                    <option value="1" selected>فعال
                                                                                    </option>
                                                                                    <option value="0">غیر فعال
                                                                                    </option>
                                                                                @endif

                                                                                @if ($spec->filterize == '0')
                                                                                    <option value="1">فعال</option>
                                                                                    <option value="0" selected>غیر
                                                                                        فعال</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>

                                                                        <div class="col-span-6 mb-3 sm:col-span-6">
                                                                            <label for="first_name"
                                                                                class="block text-sm font-medium text-right text-gray-700">توضیحات
                                                                            </label>
                                                                            <input placeholder="توضیحات "
                                                                                value="{{ $spec->desc }}" name="desc"
                                                                                type="text" id="first_name"
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
                                                            <button type="button" @click="edit = false"
                                                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                لغو
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td x-data="{remove:false}"
                                        class="py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <button @click="remove = true" class="text-red-600 hover:text-red-900">حذف</button>
                                        <div x-show="remove" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                                    حذف مشخصه: {{ $spec->name }}
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">
                                                                        آیا مطمئن هستید؟ مشخصه ممکن است زیر شاخه داشته باشد.
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
                                                        <form action="/specs/{{ $spec->id }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                حذف
                                                            </button>

                                                        </form>
                                                        <button @click="remove = false" type="button"
                                                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            لغو
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 whitespace-nowrap">
                                        <div class="flex items-center h-0">
                                            @if ($spec->spec_id > 0)
                                                <a href="/details/{{ $spec->id }}">
                                                    <ion-icon
                                                        class="text-2xl font-medium cursor-pointer text-cool-gray-400 hover:text-cool-gray-700 "
                                                        name="ellipsis-vertical-circle"></ion-icon>
                                                </a>
                                            @endif

                                        </div>
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
