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



<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data" action="/blog/{{$blog->id}}">
                {{ method_field('PUT') }}
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
                            مشخصات بلاگ
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

                                        @if ($blog->status === 'active')
                                        <option value="active" selected>فعال</option>
                                        <option value="inactive">غیرفعال</option>

                                        @endif
                                        @if ($blog->status === 'inactive')
                                        <option value="active">فعال</option>
                                        <option value="inactive" selected>غیرفعال</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="view"
                                        class="block text-sm font-medium text-right text-gray-700">حالت
                                        نمایش</label>
                                    <select id="view" name="view"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->view === 'grid')
                                        <option value="grid" selected>جدول</option>
                                        <option value="list">لیستی</option>

                                        @endif
                                        @if ($blog->view === 'list')
                                        <option value="grid">جدول</option>
                                        <option value="list" selected>لیستی</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="col-span-6 sm:col-span-2">
                                    <label for="base"
                                        class="block text-sm font-medium text-right text-gray-700">نوع</label>
                                    <select id="base" name="base"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->base === 'img')
                                        <option value="img" selected>عکس</option>
                                        <option value="video">ویدیو</option>
                                        <option value="post">پست</option>
                                        <option value="music">موزیک</option>
                                        @endif
                                        @if ($blog->base === 'video')
                                        <option value="img">عکس</option>
                                        <option value="video" selected>ویدیو</option>
                                        <option value="post">پست</option>
                                        <option value="music">موزیک</option>
                                        @endif
                                        @if ($blog->base === 'post')
                                        <option value="img">عکس</option>
                                        <option value="video" >ویدیو</option>
                                        <option value="post" selected>پست</option>
                                        <option value="music">موزیک</option>
                                        @endif
                                        @if ($blog->base === 'music')
                                        <option value="img">عکس</option>
                                        <option value="video">ویدیو</option>
                                        <option value="post">پست</option>
                                        <option value="music" selected>موزیک</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="toolbar"
                                        class="block text-sm font-medium text-right text-gray-700">نوار
                                        بالایی</label>
                                    <select id="toolbar" name="toolbar"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->toolbar === 'serach')
                                        <option value="serach" selected>جستجو</option>
                                        <option value="hashtags">هشتگ</option>
                                        @endif

                                        @if ($blog->toolbar === 'hashtags')
                                        <option value="serach">جستجو</option>
                                        <option value="hashtags" selected>هشتگ</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="sidebar"
                                        class="block text-sm font-medium text-right text-gray-700">سایدبار</label>
                                    <select id="sidebar" name="sidebar"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->sidebar === 'drawer')
                                        <option value="drawer" selected>drawer</option>
                                        <option value="sider">sidebar</option>
                                        <option value="null">بدون ساید بار</option>
                                        @endif
                                        @if ($blog->sidebar === 'sider')
                                        <option value="drawer">drawer</option>
                                        <option value="sider" selected>sidebar</option>
                                        <option value="null">بدون ساید بار</option>
                                        @endif
                                        @if ($blog->sidebar === 'null')
                                        <option value="drawer">drawer</option>
                                        <option value="sider">sidebar</option>
                                        <option value="null" selected>بدون ساید بار</option>
                                        @endif
                                    </select>
                                </div>


                                <div class="col-span-6 sm:col-span-2">
                                    <label for="loader"
                                        class="block text-sm font-medium text-right text-gray-700">لودر
                                    </label>
                                    <select id="loader" name="loader"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->loader === 'paginate')
                                        <option value="paginate" selected>صفحه ای</option>
                                        <option value="loadmore">لودر مرحله ای</option>
                                        @endif
                                        @if ($blog->loader === 'loadmore')
                                        <option value="paginate">صفحه ای</option>
                                        <option value="loadmore" selected>لودر مرحله ای</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="switcher"
                                        class="block text-sm font-medium text-right text-gray-700">سویچر</label>
                                    <select id="switcher" name="switcher"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @if ($blog->switcher == '1')
                                        <option value="1" selected>فعال</option>
                                        <option value="0">غیرفعال</option>
                                        @endif
                                        @if ($blog->switcher == '0')
                                        <option value="1">فعال</option>
                                        <option value="0" selected>غیرفعال</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="project_id"
                                        class="block text-sm font-medium text-right text-gray-700">زیر
                                        مجموعه پروژه:</label>
                                    <select id="project_id" name="project_id"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        @foreach($projects as $key => $value)
                                        @if ($value->id === $blog->project_id)
                                        <option value="{{$value->id}}" selected>{{$value->brand}}</option>
                                        @else
                                        <option value="{{$value->id}}">{{$value->brand}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-8 gap-6 mt-6">
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="icon"
                                        class="block text-sm font-medium text-right text-gray-700">svg(d-code)
                                        icon</label>
                                <input placeholder="svg-d code" value="{{$blog->icon}}" name="icon" type="text" id="icon"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="seo"
                                        class="block text-sm font-medium text-right text-gray-700">seo</label>
                                    <input placeholder="سنو" value="{{$blog->seo}}" name="seo" type="text" id="seo"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-right text-gray-700">آدرس
                                        url</label>
                                    <input placeholder="url" value="{{$blog->url}}" name="url" type="text" id="first_name"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="meta"
                                        class="block text-sm font-medium text-right text-gray-700">meta</label>
                                    <input placeholder="meta" value="{{$blog->meta}}" name="meta" type="text" id="meta"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                </div>

                                <div class="col-span-8 sm:col-span-8">
                                    <label for="meta_desc"
                                        class="block text-sm font-medium text-right text-gray-700">meta_desc</label>
                                    <textarea id="meta_desc"  name="meta_desc" rows="3"
                                        class="block w-full p-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:outline-none"
                                        placeholder="meta_desc">{{$blog->meta_desc}}</textarea>

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
                    <a type="button" href="/blog"
                        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        لغو
                </a>
                </div>
            </form>
        </div>
    </div>
</div>







@endsection
