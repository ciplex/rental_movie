@extends('layouts.app')

@section('content')


<form class="container" enctype="multipart/form-data" method="POST"  action="{{  route('movie.store') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="input">Category ID</label>
    <input type="text" class="form-control"  name="category_id" placeholder="Enter ID Category">
        {{--  @if($errors->first('name'))
          <p style="color: red">{{ $errors->first('name') }}</p>
        @endif  --}}
  </div>
  <div class="form-group">
    <label for="input">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Title">
    {{--  @if($errors->first('address'))
          <p style="color: red">{{ $errors->first('address') }}</p>
        @endif  --}}
  </div>
  <div class="form-group">
    <label for="input">Year</label>
    <input type="date" class="form-control"  name="year">
  </div>
  {{--  @if($errors->first('age'))
          <p style="color: red">{{ $errors->first('age') }}</p>
        @endif  --}}
  <div class="form-group">
    <label for="input">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Enter description">
  </div>
  {{--  @if($errors->first('email'))
          <p style="color: red">{{ $errors->first('email') }}</p>
        @endif  --}}
      <div class="form-group">
    <label >Poster</label>
    <input type="file" class="form-control" name="poster" placeholder="Enter Email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
{{--  </br>
    @if($errors->any())
      <div class="alert alert-danger mt-3 ml-3">
    <ul>
      @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
      @endforeach
</ul>

</div>

@endif

@stop  --}}
@endsection