@extends('layouts.app')

@section('content')
<!-- cart -->
<div class="album py-5 bg-light">
   <div class="container px-6 mx-auto">
                <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                <img src={{Storage::url("public/bookstore/".$list->id."/".$list->coverimage)}} alt="" class="60" width="100" height="150">
                <div class="px-5 py-3">
                <h4 class="mt-2 text-gray-500">Title: {{ $list->title }}</h4>
                <h4 class="mt-2 text-gray-500">Author: {{ $list->author }}</h4>
                <h4 class="mt-2 text-gray-500">Description: {{ $list->description }}</h4>
                <h4 class="mt-2 text-gray-500">Category: {{ $list->category }}</h4>
                <h4 class="mt-2 text-gray-500">Tags: {{ $list->tags }}</h4>
                    <h4 class="mt-2 text-gray-500">Price: ${{ $list->price }}</h4><br>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $list->id }}" name="id">
                        <input type="hidden" value="{{ $list->title }}" name="title">
                        <input type="hidden" value="{{ $list->author }}" name="author">
                        <input type="hidden" value="{{ $list->description }}" name="description">
                        <input type="hidden" value="{{ $list->category }}" name="category">
                        <input type="hidden" value="{{ $list->tags }}" name="tags">
                        <input type="hidden" value="{{ $list->coverimage }}"  name="coverimage">
                        <input type="hidden" value="{{ $list->price }}"  name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="">Add To Cart</button>
                    </form>
                </div>
            </div>
    </div>
        </div>
    </div>
    @endsection