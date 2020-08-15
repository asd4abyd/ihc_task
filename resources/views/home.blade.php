@extends('layouts.app', ['title'=>'Home'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                          <div class="card-body">
                    <h1 class="text-center">Hello {{ auth()->user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
