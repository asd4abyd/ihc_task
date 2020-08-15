@extends('layouts.app', ['title' => $title, 'breadcrumb' => [['title'=>'Products' , 'link'=>route('product.index')]]])

@section('content')
  <div class="card">
    <div class="card-body">
      <form class="" role="form" action="{{ $link }}" method="post">
        {{ csrf_field() }}
        @if($update)
          <input name="_method" type="hidden" value="PUT"/>
        @endif

        <div class="form-group form-group-default required {{ count($errors->get('name'))>0? 'has-error': '' }}">
          <label for="name">Product Name *</label>

          <input name="name" id="name" type="text" value="{{ App('request')->old('name', $record['name']?: '') }}" class="form-control">
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
          <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
          <button class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>

@endsection