@extends('dashboard')
@section('title')
<h2 class="items-baseline mx-4 my-0 text-xl font-semibold leading-tight text-gray-800">
    <span class="align-middle"><ion-icon size="large" name="cube"></ion-icon></span>
     پروژه
</h2>

 
@endsection
@section('content')


<div class="grid grid-cols-12 pb-4 mb-8 border-b-2">

    <div class="col-span-10 sm:col-span-10">
        <h1 class="pl-4 text-3xl "> ویرایش پروژه </h1>
    </div>
   


</div>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
            <form method="POST" enctype="multipart/form-data" action="/project/{{$project->id}}">
                    {{ method_field('PUT') }}
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div
                            class="inline-flex w-full pb-3 align-middle border-b-2 border-indigo-100 border-dashed ">
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-3 bg-indigo-100 border rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <img class="w-10 h-10 rounded-full" src="<?php echo asset("$project->slogan")?>"
                                alt="">
                            </div>
                            <h3 class="inline-flex items-center justify-center px-2 text-lg font-medium leading-6 text-gray-900 "
                                id="modal-headline">
                                {{$project->brand}}
                            </h3>
                        </div>
                        <div class="grid">
                            @csrf
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="col-span-12 mb-3 sm:col-span-3">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-right text-gray-700">نام
                                        برند</label>
                                <input placeholder="brand name" value="{{$project->brand}}" name="brand" type="text" id="first_name"
                                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                </div>
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="status"
                                            class="block text-sm font-medium text-right text-gray-700">وضعیت</label>
                                        <select id="status" name="status" value="{{$project->status}}"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            <option value="active">فعال</option>
                                            <option value="inactive">غیرفعال</option>
                                        </select>
                                    </div>


                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="base"
                                            class="block text-sm font-medium text-right text-gray-700">نوع</label>
                                        <select id="base" name="base"  value="{{$project->base}}"
                                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            <option>عکس</option>
                                            <option>ویدیو</option>
                                            <option>پست</option>
                                            <option>موزیک</option>
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <div>
                                            <label for="slogan"
                                            class="block pb-1 text-sm font-medium text-right text-gray-700">
                                            لوگو اصلی</label>
                                            <div class="items-center ">
                                              
                                              <label
                                              class="block px-8 py-2 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                              <span
                                                  class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                              <input type='file' name="logo" class="hidden" />
                                          </label>
                                          <img class="p-2 mt-2 border border-gray-300 rounded-md " src="<?php echo asset("$project->logo")?>"
                                            alt="">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <div>
                                            <label for="slogan"
                                            class="block pb-1 text-sm font-medium text-right text-gray-700">
                                            لوگو ساده</label>
                                            <div class="flex items-center ">
                                              
                                              <label
                                              class="block px-8 py-2 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                              <span
                                                  class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">ویرایش</span>
                                              <input type='file' name="slogan" class="hidden" />
                                          </label>
                                          <img class="w-10 h-10 mx-2 border border-gray-300 rounded-full" src="<?php echo asset("$project->slogan")?>"
                                            alt="">
                                            </div>
                                          </div>
                                       
                                       
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
                        <a type="button" href="/project" 
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            لغو
                    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







@endsection
