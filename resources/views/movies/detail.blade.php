@extends('layouts.default')

@section('title', 'Detail Movies')

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


    <div class="row">
      <div class="col-12 col-md-3">
      @if($movie->photo)
      <img src="{{ $movies->photo }}">
      @else
      <img src="/photos/no-avatar.png" width="100%" height="150px">
      @endif
        </div>
      <div class="col-12 col-md-7">
      <table class="table table-hover">
        <tr>
        <td>ID</td>
        <td>{{ $movies->id }}</td>
        </tr>
        <tr>
        <td>Title</td>
        <td>{{ $movies->title }}</td>
        </tr>
        <tr>
        <td>Category</td>
        <td>{{ $movies->categories->name }}</td>
        </tr>
        <tr>
        <td>Year</td>
        <td>{{ $movies->year }}</td>
        </tr>
        <tr>
        <td>Description</td>
        <td>{{ $movies->description }}</td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-2">
                <form method="POST" action="{{route('movies.destroy', $movies->id) }}">
                        <input type="hidden" name="_method" value="delete" />
                        {{ csrf_field() }}
                        <button type="submit" onclick="return confirm('Hapus {{ $movies->category }} ?')" class="btn btn-danger">Delete</button>
                      </form>  
        </div>
        <div class="col-md-2">
                <a class="btn btn-primary" href="{{ route('movies.edit', $movies->id) }}">Update</a>
        </div>
    </div>
      </div>
      </div>
   @stop
    
        
