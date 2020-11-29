@extends('dashboard')
@section('title')
<h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
    <span class="align-middle">
        <ion-icon size="large" name="flag"></ion-icon>
    </span>
    دسته بندی
</h2>


@endsection

@section('content')


<div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

    <div class="col-span-10 sm:col-span-10">
        <h1 class="pl-4 text-3xl ">دسته بندی</h1>
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
                    <div class="inline-block w-2/3 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <form method="POST" enctype="multipart/form-data" action="/category">
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
                                        مشخصات دسته
                                    </h3>
                                </div>
                                <div class="grid">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 mb-3 sm:col-span-3">
                                                <label for="first_name"
                                                    class="block text-sm font-medium text-right text-gray-700">نام فارسی
                                                </label>

                                                <input placeholder="نام فارسی " name="title" type="text" id="first_name"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 mb-3 sm:col-span-3">
                                                <label for="first_name"
                                                    class="block text-sm font-medium text-right text-gray-700">نام
                                                    انگلیسی </label>
                                                <input placeholder="نام انگلیسی " name="text" type="text"
                                                    id="first_name"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="view"
                                                    class="block text-sm font-medium text-right text-gray-700">زیر
                                                    دسته ی:</label>
                                                <select id="view" name="category_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="0">-هیچ-</option>
                                                    @foreach ($all as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="view"
                                                    class="block text-sm font-medium text-right text-gray-700">سردسته ی
                                                    بلاگ:
                                                </label>
                                                <select id="view" name="blog_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="">هیچ</option>
                                                    @foreach ($blog as $bl)
                                                    <option value="{{$bl->id}}">{{$bl->url}}</option>
                                                    @endforeach

                                                </select>
                                            </div>


                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="img"
                                                    class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                    عکس</label>
                                                <label
                                                    class="block w-full px-3 py-2 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                    <span
                                                        class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">browse</span>
                                                    <input type='file' name="img" class="hidden" />
                                                </label>
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

                <ul class="min-w-full divide-y divide-gray-200 ">
                    @foreach ($category as $key => $item)
                    <li class="p-2" x-data={show:false}>
                        <div class="flex flex-wrap items-center justify-between">
                            <div class="flex">
                                @if($item->children->count())
                                <ion-icon @click="show=!show" class="self-center ml-2 text-2xl cursor-pointer"
                                    name="chevron-back-outline">
                                </ion-icon>
                                @else
                                <ion-icon class="self-center ml-3 mr-1 " name="remove-outline"></ion-icon>
                                @endif


                                <img class="self-center w-10 h-10 p-1 border rounded-full "
                                    src="{{ $item->img ? asset("$item->img") : '/none.png' }}" alt="">
                                <div class="px-4">
                                    <p class="text-sm font-medium text-gray-900">{{$item->title}}</p>
                                    <p class="text-sm text-gray-500">{{$item->text}}</p>
                                </div>
                            </div>
                            <span class="px-2" x-data="{var{{$item->id}}:false , edit{{$item->id}}:false}">
                                <button @click="edit{{$item->id}} = true"
                                    class="mx-2 text-sm text-indigo-600 hover:text-indigo-900"">ویرایش</button>
                                    <button @click=" var{{$item->id}}=true"
                                    class="mx-2 text-sm text-red-600 hover:text-red-900">حذف</button>

                                <div x-show="var{{$item->id}}" class="fixed inset-0 z-10 overflow-y-auto">
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
                                                            حذف دسته "{{$item->title}}"
                                                        </h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">
                                                                آیا مطمئن هستید؟
                                                                ممکن است پست هایی با این دسته در ارتباط باشند.قبل از حذف
                                                                دسته از این مورد مطمئن شوید.
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
                                                <form action="/category/{{$item->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        حذف
                                                    </button>

                                                </form>
                                                <button @click="var{{$item->id}} = false" type="button"
                                                    class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                    لغو
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div x-show="edit{{$item->id}}" class="fixed inset-0 z-10 overflow-y-auto">
                                    <div
                                        class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">&#8203;</span>

                                        <div class="inline-block w-2/3 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl modal-anim sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                            <form method="POST" enctype="multipart/form-data"
                                                action="/category/{{$item->id}}">
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
                                                        <div class="px-4 py-5 bg-white sm:p-6">

                                                            <div class="grid grid-cols-6 gap-6">
                                                                <div class="col-span-6 mb-3 sm:col-span-3">
                                                                    <label for="first_name"
                                                                        class="block text-sm font-medium text-right text-gray-700">نام
                                                                        فارسی
                                                                    </label>

                                                                    <input value="{{$item->title}}"
                                                                        placeholder="نام فارسی " name="title"
                                                                        type="text" id="first_name"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                </div>
                                                                <div class="col-span-6 mb-3 sm:col-span-3">
                                                                    <label for="first_name"
                                                                        class="block text-sm font-medium text-right text-gray-700">نام
                                                                        انگلیسی </label>
                                                                    <input placeholder="نام انگلیسی "
                                                                        value="{{$item->text}}" name="text" type="text"
                                                                        id="first_name"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-2">
                                                                    <label for="view"
                                                                        class="block text-sm font-medium text-right text-gray-700">زیر
                                                                        دسته ی:</label>
                                                                    <select id="view" name="category_id"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                        <option value="0" selected>-هیچ-</option>
                                                                        <option value="0">-هیچ-</option>
                                                                        @foreach ($all as $cat)
                                                                        <option value="{{$cat->id}}">{{$cat->title}}
                                                                        </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-2">
                                                                    <label for="view"
                                                                        class="block text-sm font-medium text-right text-gray-700">سردسته
                                                                        ی
                                                                        بلاگ:
                                                                    </label>
                                                                    <select id="view" name="blog_id"
                                                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                                        <option value="">هیچ</option>
                                                                        @foreach ($blog as $bl)
                                                                        @if($bl->id === $cat->blog_id)
                                                                        <option value="{{$bl->id}}" selected>
                                                                            {{$bl->url}}</option>
                                                                        @else
                                                                        <option value="{{$bl->id}}">{{$bl->url}}
                                                                        </option>
                                                                        @endif

                                                                        @endforeach

                                                                    </select>
                                                                </div>


                                                                <div class="col-span-6 sm:col-span-2">
                                                                    <label for="img"
                                                                        class="block pb-1 text-sm font-medium text-right text-gray-700">
                                                                        عکس</label>
                                                                    <label
                                                                        class="block w-full px-3 py-2 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                                        <span
                                                                            class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">browse</span>
                                                                        <input type='file' name="img" class="hidden" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button type="submit"
                                                        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        ویرایش
                                                    </button>
                                                    <button type="button" @click="edit{{$item->id}} = false"
                                                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                        لغو
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </span>


                        </div>
                        <div x-show="show" class="mt-2 border-t border-dashed">
                            <ul class="p-3 mx-2">
                                @foreach($item->children as $key => $children)
                                    @include('dashboard.category.ul', ['children' => $children,'all' => $all,'blog' => $blog])
                                @endforeach
                                
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>







@endsection
