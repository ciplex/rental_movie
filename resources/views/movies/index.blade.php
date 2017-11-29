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
  @endif

<!-- <form method="GET" action=" {{ route('movie.search') }}" class="form-inline my-2 my-lg-0 ml-5">
<input name="keyword" class="form-control" type="text" placeholder="searching..">
</form>
<form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="{{route('movie.create')}}" class="btn btn-outline-primary my-2 my-sm-0">Tambah Data</a>
    </form> -->
   
    <div class="row">
        @foreach($movies as $movie)
      <div class="col-12 col-md-3 py-2">
        <div class="card">
      @if($movie->photo)
      <img src="{{ $movies->photo }}">
      @else
      <img src="/photos/no-avatar.png" width="100%" height="150px">
      @endif
      <div class="card-body">
        <h4 class="card-title">{{ $movie->title }}</h4>
        <p class="card-text">{{ $movie->categories->name }}</p>
        <a href="#" class="btn btn-primary">Detail</a>
      </div>
      </div>
     </div>
      @endforeach
      @stop
    </div>
    </div>
          <!-- <form method="POST" action="{{route('movie.destroy', $movie->id) }}" class="row no-gutters pb-2">
            <input type="hidden" name="_method" value="delete" />
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Hapus {{ $movie->category }} ?')" class="btn btn-danger col-sm-12">Delete</button>
          </form>    
            <a class="btn btn-primary col-sm-12" href="{{ route('movie.edit', $movie->id) }}">Update</a>
        </tr> -->
    
 <!-- {{ $movies->render() }} -->
