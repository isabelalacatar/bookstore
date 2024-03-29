@extends('layouts.app')

@section('content')
<h3 class="text-2xl font-medium text-gray-700">Books List</h3><br><br>
<div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('searchcategory') }}" method="get">
                 <div class="row">
                    <div class="col-md-10 form-group">
                        <label for="">Category</label>
                        <select name="category_id[]" class="form-control" multiple>
                            @foreach (\App\Models\Category::all() as $item)
                            <option value="{{ $item->id }}" {{ !is_null(request()->category_id) ?
                                 in_array($item->id,request()->category_id) ? 'selected' : '' : '' }}>
                                 {{ $item->typecategory }}
                            </option>
                            @endforeach
                        </select>
                     </div>
                     <div class="col-md-2 form-group" style="margin-top:25px;">
                        <input type="submit" class="btn btn-primary" value="Filter by category">
                     </div>
                 </div>
            </form>
        </div>
</div>
            <!-- filter by tag -->
            <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('searchtag') }}" method="get">
                 <div class="row">
                 <div class="col-md-10 form-group">
                        <label for="">Tags</label>
                        <select name="tag_id[]" class="form-control" multiple>
                            @foreach (\App\Models\Tag::all() as $item)
                            <option value="{{ $item->id }}" {{ !is_null(request()->tag_id) ?
                                in_array($item->id, request()->tag_id) ? 'selected' : '' : '' }}>
                                {{ $item->typetag }}
                            </option>
                            @endforeach
                        </select>
                     </div>
                     <div class="col-md-2 form-group" style="margin-top:25px;">
                        <input type="submit" class="btn btn-primary" value="Filter by tag">
                        
                     </div>
                 </div>
            </form>
        </div>
            </div>
            
<!-- cart -->
            <div class="album py-5 bg-light">
   <div class="container px-6 mx-auto">
            @foreach ($books as $book)
            <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
            <div>
            <h3 class="text-gray-700 uppercase">{{ $book->title }}</h3>
                <img src={{Storage::url("public/bookstore/".$book->id."/".$book->coverimage)}} alt="" class="60" width="100" height="150">
                <div>
                    <span class="mt-2 text-gray-500">Price: {{ $book->price }}</span>
                    <form method="get" action="{{route('list', $book->id)}}">
                                                <button class="btn btn-sm btn-outline-secondary">View details
                                                </button>
                                            </form>
                </div>
            </div>
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $book->id }}" name="id">
                        <input type="hidden" value="{{ $book->title }}" name="title">
                        <input type="hidden" value="{{ $book->author }}" name="author">
                        <input type="hidden" value="{{ $book->description }}" name="description">
                        <input type="hidden" value="{{ $book->category }}" name="category">
                        <input type="hidden" value="{{ $book->tags }}" name="tags">
                        <input type="hidden" value="{{ $book->coverimage }}"  name="coverimage">
                        <input type="hidden" value="{{ $book->price }}"  name="price">
                        <input type="hidden" value="1" name="quantity">
                        <!-- <button class="">Add To Cart</button> -->
                    </form>
                </div>
                
            @endforeach

        </div>
    </div>
        </div>
    </div>

@endsection