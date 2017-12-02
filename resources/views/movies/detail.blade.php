@extends('layouts.default')

@section('title', 'Detail Movies')

@section('content')



    <div class="row">
      <div class="col-12 col-md-3">
      @if($movie->poster)
      <img src="{{ $movie->poster }}" class="col-12">
      @else
      <img src="/photos/no-avatar.png" width="100%" height="150px">
      @endif
        </div>
      <div class="col-12 col-md-7">
      <table class="table table-hover">
        <tr>
        <td>ID</td>
        <td>{{ $movie->id }}</td>
        </tr>
        <tr>
        <td>Title</td>
        <td>{{ $movie->title }}</td>
        </tr>
        <tr>
        <td>Category</td>
        <td>{{ $movie->category_id }}</td>
        </tr>
        <tr>
        <td>Year</td>
        <td>{{ $movie->year }}</td>
        </tr>
        <tr>
        <td>Description</td>
        <td>{{ $movie->description }}</td>
        </tr>
    </table>
      </div>
      </div>
   @stop
    
        
