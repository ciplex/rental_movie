@extends('layouts.default')

@section('title', 'Movie')

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

<h1>Movie</h1>
<form method="GET" action=" {{ route('movie.search') }}" class="form-inline my-2 my-lg-0 ml-5">
<input name="keyword" class="form-control" type="text" placeholder="searching..">
</form>
<form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="{{route('movie.create')}}" class="btn btn-outline-primary my-2 my-sm-0">Tambah Data</a>
    </form>
  
<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Poster</th>
    <th scope="col">Category</th>
    <th scope="col">Title</th>
    <th scope="col">Year</th>
    <th scope="col">Description</th>
    <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($movies as $movie)
    <tr>
        <td>{{ $movie->id }}</td>
        <td>
        @if($movie->photo)
        <img src="{{ $movies->photo }}" width="100" height="100">
        @else
        <img src="/photos/no-avatar.png" width="100" height="100">
        @endif
        </td>
        <td>{{ $movie->categories->name }}</td>
        <td>{{ $movie->title }}</td>
        <td>{{ $movie->year }}</td>
        <td>{{ $movie->description }}</td>
        <td>
          <form method="POST" action="{{route('movie.destroy', $movie->id) }}" class="row no-gutters pb-2">
            <input type="hidden" name="_method" value="delete" />
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Hapus {{ $movie->category }} ?')" class="btn btn-danger col-sm-12">Delete</button>
          </form>    
            <a class="btn btn-primary col-sm-12" href="{{ route('movie.edit', $movie->id) }}">Update</a>
        </tr>
    @endforeach
  </tbody>
</table>
 {{ $movies->render() }}
@stop