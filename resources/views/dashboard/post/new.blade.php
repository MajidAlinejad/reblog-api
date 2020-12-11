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
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <form method="POST" enctype="multipart/form-data" action="/post">
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
                                    مشخصات پست
                                </h3>
                            </div>
                            <div class="grid">
                                @csrf
                                <div class="px-4 py-5 bg-white sm:p-6">

                                    <input value="{{ $blog->id }}" name="blog_id" type="text" hidden>
                                    <div class="grid grid-cols-8 gap-6 mt-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="title" class="block text-sm font-medium text-right text-gray-700">
                                                عنوان</label>
                                            <input placeholder="عنوان" name="title" type="text" id="title"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="meta_desc"
                                                class="block text-sm font-medium text-right text-gray-700">
                                                meta_desc</label>
                                            <input placeholder="meta_desc" name="meta_desc" type="text" id="meta_desc"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
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
                                            <label for="seo"
                                                class="block text-sm font-medium text-right text-gray-700">seo</label>
                                            <input placeholder="سنو" name="seo" type="text" id="seo"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="tag" class="block text-sm font-medium text-right text-gray-700">
                                                tag</label>
                                            <input placeholder="tag" name="tag" type="text" id="first_name"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="meta"
                                                class="block text-sm font-medium text-right text-gray-700">meta</label>
                                            <input placeholder="meta" name="meta" type="text" id="meta"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>
                                        <input value="0" name="product" type="text" hidden>

                                        @if ($blog->base === 'product')
                                            <input value="1" name="product" type="text" hidden>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="price"
                                                    class="block text-sm font-medium text-right text-gray-700">قیمت</label>
                                                <input required placeholder="قیمت" name="price" type="text" id="price"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="off"
                                                    class="block text-sm font-medium text-right text-gray-700">تخفیف</label>
                                                <input placeholder="تخفیف" name="off" type="text" id="price"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="expire"
                                                    class="block text-sm font-medium text-right text-gray-700">انقضا</label>
                                                <input required placeholder="انقضا" name="expire" type="text" id="expire"
                                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                            </div>

                                        @endif

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="group÷"
                                                class="block text-sm font-medium text-right text-gray-700">متعلق به
                                                گروه:</label>
                                            <select id="group" name="group_id"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                <option value="">هیچکدام</option>
                                                @foreach ($group as $key => $g)
                                                    <option value="{{ $g->id }}">{{ $g->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="cat"
                                                class="block text-sm font-medium text-right text-gray-700">متعلق به
                                                دسته:</label>
                                            <select id="cat" name="cat_id"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                                @foreach ($category as $key => $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="link"
                                                class="block text-sm font-medium text-right text-gray-700">link</label>
                                            <input placeholder="link" name="link" type="text" id="link"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>


                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="special"
                                                class="block text-sm font-medium text-right text-gray-700">special</label>
                                            <input placeholder="special" name="special" type="text" id="special"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="lable"
                                                class="block text-sm font-medium text-right text-gray-700">lable</label>
                                            <input placeholder="lable" name="lable" type="text" id="lable"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="icon"
                                                class="block text-sm font-medium text-right text-gray-700">icon</label>
                                            <input placeholder="icon" name="icon" type="text" id="icon"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>




                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="stream"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">فایل صوتی یا
                                                ویدیو</label>
                                            <label
                                                class="block w-full px-3 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                <span
                                                    class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">browse</span>
                                                <input type='file' name="stream" class="hidden" />
                                            </label>
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="alt-stream"
                                                class="block text-sm font-medium text-right text-gray-700">لینک ویدیو یا صوت
                                            </label>
                                            <input placeholder="alt-stream" name="alt_stream" type="text" id="alt-stream"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ">
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="attach"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">فایل
                                                ضمیمه</label>
                                            <label
                                                class="block w-full px-3 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                <span
                                                    class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">attach</span>
                                                <input type='file' name="attach" class="hidden" />
                                            </label>
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="file"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">عکس بند
                                                انگشتی</label>
                                            <label
                                                class="block w-full px-3 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                <span
                                                    class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">browse</span>
                                                <input type='file' name="thumbnail" class="hidden" />
                                            </label>
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="file"
                                                class="block pb-1 text-sm font-medium text-right text-gray-700">عکس</label>
                                            <label
                                                class="block w-full px-3 py-1 mt-1 text-center bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:outline-none hover:ring-indigo-500 hover:border-indigo-500 sm:text-sm">
                                                <span
                                                    class="text-base leading-normal text-cool-gray-500 hover:text-indigo-600">browse</span>
                                                <input type='file' name="img" class="hidden" />
                                            </label>
                                        </div>

                                        <div class="col-span-8 sm:col-span-8">
                                            <label for="caption"
                                                class="block text-sm font-medium text-right text-gray-700">توضیح</label>
                                            <textarea id="caption" name="caption" rows="3"
                                                class="block w-full p-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:outline-none"
                                                placeholder="توضیح"></textarea>

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
                            <a type="button" href="/posts/{{ $blog->id }}"
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
