@extends('layouts.app', ['title' => 'User Settings'])

@section('content')
  <div class="card">
    <div class="card-body">
      <form role="form" action="{{ route('setting') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group form-group-default required {{ count($errors->get('name'))>0? 'has-error': '' }}">
          <label for="name">Name *</label>

          <input name="name" id="name" type="text" value="{{ App('request')->old('name', auth()->user()->name) }}" class="form-control">
          @if (count($errors->get('name'))>0)
            <br/>
            <div class="b-t text-danger">
              <ul>
                @foreach ($errors->get('name') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        <div class="form-group form-group-default disabled text-right">
          <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
          <button class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

@endsection