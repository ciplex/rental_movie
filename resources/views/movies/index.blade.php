@extends('layouts.default')

@section('title', 'Admin')

@section('content')

  @if (Session::get('success_message'))
  <div class="container">
  <div class="row">
  <div class="col-12">
  <div class="alert alert-info">
  {{ Session::get('success_message') }}
          </div>
        </div>
      </div>
    </div>
  @endif

<h3>Movies List</h3>
<form method="GET" action=" {{ route('movies.search') }}" class="form-inline my-2 my-lg-0 ml-5">
<input name="keyword" class="form-control" type="text" placeholder="search">
</form>
<form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="{{route('movies.create')}}" class="btn btn-outline-primary my-2 my-sm-0">Tambah Data</a>
    </form>
  
<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Actor</th>
    <th scope="col">Title</th>
    <th scope="col">CategoryID</th>
    <th scope="col">Year</th>
    <th scope="col">Description</th>
    <th scope="col">Poster</th>
    <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($movies as $movie)
    <tr>
        <td>{{ $movie->id }}</td>
        <td>{{ $movie->actor }}</td>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->category_id }}</td>
        <td>{{ $movie->year }}</td>
        <td>{{ $movie->description }}</td>
        <td>
         @if($movie->poster)
            <img src="{{ $movie->poster }}" class="col-12">
        @else
            <img src="/photos/no-avatar.png" width="100%" height="150px" class="py-1 px-1">
        @endif
        </td>
        
        <td>
        <div class="col pb-2">
                <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Update</a>
        </div>
            <div class="col">
                    <form method="POST" action="{{route('movies.destroy', $movie->id) }}">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirm('Delete {{ $movie->category_id }} ?')" class="btn btn-danger px-3">Delete</button>
                          </form> 
            </div>
        </tr>
    @endforeach
  </tbody>
</table>
 {{ $movies->render() }}
@stop