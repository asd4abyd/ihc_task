@extends('layouts.app', ['title'=>'Summarized prices of products', 'breadcrumb'=>[['title'=>'dashboard', 'link'=>'javascript:void(0)']]])


@section('content')

  <div class="card">
    <div class="card-body">

      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User name</th>
          <th scope="col">Summarized prices (Average)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $row)
          <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['name'] }}</td>
            <td>{{ $row->active_products->avg('pivot.price')?:0 }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <div class="text-right">{!! $users->render() !!}</div>
    </div>
  </div>
@endsection
