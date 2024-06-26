
@extends('Dashboard::master')
@section('breadcrumb')
    <li><a href="{{ route('articles.index') }}" title=" مقالات">مقالات</a></li>
    <li><a href="#" title="ایجاد مقاله">ایجاد مقاله</a></li>
@endsection
@section('content')
    <div class="row no-gutters">
        <div class="col-12 bg-white">
            <p class="box__title">ایجاد مقاله</p>
            <form action="{{ route('articles.store') }}" class="padding-30" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex multi-text">
                <x-input name="title" placeholder="عنوان مقاله" type="text" />
                <x-input type="text" name="slug" placeholder="نام پیوند(مفید برای سئو)" class="text"  />
                </div>

                <x-select name="category_id[]" id="">
                    <option value="" >دسته بندی</option>
                    @foreach( $categories as $category)
                        <option value="{{$category->id}}"
                            {{$category->id == old('category_id') ?'selected' : ''}}>{{$category->title}}</option>
                        @endforeach
                </x-select>

                <input type="file" name="image" multiple placeholder="تصویر مقاله">

                <textarea id="mytextarea" name="body"></textarea>
                <br>
                <button class="btn btn-webamooz_net">ایجاد مقاله</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    @include('Common::layouts.tinymce')
@endsection

