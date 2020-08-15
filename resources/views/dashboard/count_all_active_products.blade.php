@extends('layouts.app', ['title'=>'Count of all active products', 'breadcrumb'=>[['title'=>'dashboard', 'link'=>'javascript:void(0)']]])


@section('content')

  <div class="card">
    <div class="card-body">

      <table class="table table-striped">
        <thead>
        <tr>
          <th style="width: 50%;" scope="col">Count of all active products</th>
          <th style="width: 50%;" scope="col">{{ $active_products }}</th>
        </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection
