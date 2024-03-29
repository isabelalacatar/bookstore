@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tags</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tags.create') }}"> Create New Tag</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tag type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tags as $tag)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tag->typetag }}</td>
            <td>
                <form action="{{ route('tags.destroy',$tag->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('tags.show',$tag->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('tags.edit',$tag->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $tags->links() !!}
        
@endsection