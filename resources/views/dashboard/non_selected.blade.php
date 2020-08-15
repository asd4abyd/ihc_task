@extends('layouts.app', ['title'=>'Non-selected Products', 'breadcrumb'=>[['title'=>'dashboard', 'link'=>'javascript:void(0)']]])


@section('content')

  <div class="card">
    <div class="card-body">

      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product name</th>
          <th scope="col">Created Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $row)
          <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['name'] }}</td>
            <td>{{ $row['created_at'] }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <div class="text-right">{!! $products->render() !!}</div>
    </div>
  </div>
@endsection
