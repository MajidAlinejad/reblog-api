@extends('dashboard')
@section('title')
<h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
    <span class="align-middle">
        <ion-icon size="large" name="flag"></ion-icon>
    </span>
    پست
</h2>


@endsection

@section('content')


<div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

    <div class="col-span-10 sm:col-span-10">
        <h1 class="pl-4 text-3xl ">پست</h1>
    </div>
    <div class="col-span-2 sm:col-span-2 justify-self-end">

        <div x-data="{ open: false }">
            <button @click="open = true"
                class="inline-flex items-center justify-center px-2 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-full shadow-sm whitespace-nowrap hover:bg-indigo-700"><ion-icon class="text-2xl" name="add-outline"></ion-icon>
            </button>


            <div x-show="open" @click.away="open = false" class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block w-11/12 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full "
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <form method="POST" enctype="multipart/form-data" action="/blog">
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
                                        مشخصات پست
                                    </h3>
                                </div>
                                <div class="grid">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">

                                        <div class="grid grid-cols-8 gap-6">

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="status"
                                                    class="block text-sm font-medium text-right text-gray-700">وضعیت</label>
                                                <select id="status" name="status"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="active">فعال</option>
                                                    <option value="inactive">غیرفعال</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="view"
                                                    class="block text-sm font-medium text-right text-gray-700">حالت
                                                    نمایش</label>
                                                <select id="view" name="view"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="grid">جدول</option>
                                                    <option value="list">لیستی</option>
                                                </select>
                                            </div>


                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="base"
                                                    class="block text-sm font-medium text-right text-gray-700">نوع</label>
                                                <select id="base" name="base"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="img">عکس</option>
                                                    <option value="video">ویدیو</option>
                                                    <option value="post">پست</option>
                                                    <option value="music">موزیک</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="toolbar"
                                                    class="block text-sm font-medium text-right text-gray-700">نوار
                                                    بالایی</label>
                                                <select id="toolbar" name="toolbar"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="serach">جستجو</option>
                                                    <option value="hashtags">هشتگ</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="sidebar"
                                                    class="block text-sm font-medium text-right text-gray-700">سایدبار</label>
                                                <select id="sidebar" name="sidebar"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="drawer">drawer</option>
                                                    <option value="sider">sidebar</option>
                                                    <option value="null">بدون ساید بار</option>
                                                </select>
                                            </div>


                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="loader"
                                                    class="block text-sm font-medium text-right text-gray-700">لودر
                                                </label>
                                                <select id="loader" name="loader"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="paginate">صفحه ای</option>
                                                    <option value="loadmore">لودر مرحله ای</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="switcher"
                                                    class="block text-sm font-medium text-right text-gray-700">سویچر</label>
                                                <select id="switcher" name="switcher"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="project_id"
                                                    class="block text-sm font-medium text-right text-gray-700">زیر
                                                    مجموعه پروژه:</label>
                                                <select id="project_id" name="project_id"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                    {{-- @foreach($projects as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->brand}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-8 gap-6 mt-6">
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="icon"
                                                    class="block text-sm font-medium text-right text-gray-700">svg(d-code)
                                                    icon</label>
                                                <input placeholder="svg-d code" name="icon" type="text" id="icon"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="seo"
                                                    class="block text-sm font-medium text-right text-gray-700">seo</label>
                                                <input placeholder="سنو" name="seo" type="text" id="seo"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="first_name"
                                                    class="block text-sm font-medium text-right text-gray-700">آدرس
                                                    url</label>
                                                <input placeholder="url" name="url" type="text" id="first_name"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="meta"
                                                    class="block text-sm font-medium text-right text-gray-700">meta</label>
                                                <input placeholder="meta" name="meta" type="text" id="meta"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>

                                            <div class="col-span-8 sm:col-span-8">
                                                <label for="meta_desc"
                                                    class="block text-sm font-medium text-right text-gray-700">meta_desc</label>
                                                <textarea id="meta_desc" name="meta_desc" rows="3"
                                                    class="block w-full p-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:outline-none"
                                                    placeholder="meta_desc"></textarea>

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
                                آیکون
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                آدرس
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                حالت نمایش
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                نوع
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                وضعیت
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                <span class="sr-only">ویرایش</span>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                <span class="sr-only">حذف</span>
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50">
                                <span class="text-xs font-medium text-center text-gray-500 uppercase bg-gray-50">پست</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $key => $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{$key+1}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="mx-2 text-sm text-gray-900">
                                    <svg class="text-2xl text-gray-600" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 1024 1024">
                                        <path d="{{$item->icon}}" />
                                    </svg>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="mx-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$item->url}}/
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{$item->view}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{$item->base}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ( $item->status === 'active')
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    {{$item->status}}
                                </span>
                                @else
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                    {{$item->status}}
                                </span>
                                @endif

                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="/blog/{{$item->id}}" class="text-indigo-600 hover:text-indigo-900">ویرایش</a>
                            </td>
                            <td x-data="{var{{$item->id}}:false}"
                                class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <button @click="var{{$item->id}} = true"
                                    class="text-red-600 hover:text-indigo-900">حذف</button>

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
                                                            حذف پست با آدرس {{$item->url}}/
                                                        </h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">
                                                             آیا مطمئن هستید؟ اگر یک پست حذف شود تمامی موارد مرتبط با آن پاک می شوند.
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
                                                <form action="/blog/{{$item->id}}" method="POST">
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



                            </td>
                            <td class="px-2 py-4 text-center whitespace-nowrap">
                                <a href="/posts/{{$item->id}}" class="text-cool-gray-500"><ion-icon class="text-2xl align-middle" name="chevron-back-circle"></ion-icon></a>
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
