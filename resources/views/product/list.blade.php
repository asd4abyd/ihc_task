@extends('layouts.app', ['title' => 'Products'])

@section('content')

  <div class="card">
    <div class="card-body">

      <div class="text-right">
        <a href="{{ Route('product.create') }}" class="btn btn-primary">Create new</a>
      </div>
        <br>
        <br>
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product name</th>
          <th scope="col">Created Date</th>

          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tableList as $row)
          <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['name'] }}</td>
            <td>{{ $row['created_at'] }}</td>
            <td>
              <form action="{{ Route('product.destroy', $row['id']) }}" method="post">

                <a href="{{ Route('product.edit', $row['id']) }}" class="btn btn-sm btn-warning">Edit</a>

                <button type="button" class="btn btn-sm btn-danger delete">Delete</button>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete"/>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <div class="text-right">{!! $tableList->render() !!}</div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    jQuery(function() {
      $(document).on('click', 'form button.delete', function () {
        if (confirm('You going to delete this record, Are you sure?')) {
          $(this).parent().submit();
        }
      });
    });
  </script>
@endsection