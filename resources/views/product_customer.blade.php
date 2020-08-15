@extends('layouts.app', ['title' => 'Products'])

@section('style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
  <link href="{{ asset('css/switch.css') }}" rel="stylesheet"/>
@endsection

@section('content')
  <form class="" role="form" action="{{ route('product_customer') }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="card">
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required">
                <label for="questions">@lang('Questions selector')</label>

                <select id="products" multiple class="form-control">
                  @foreach($products as $product)
                    <option {!! in_array($product->id, $product_ids)? 'selected=""':'' !!} value="{{ $product->id }}">{{ $product->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="products-list" class="table table-striped table-primary">

              <thead>
              <tr>
                <th>Product</th>
                <th style="text-align: center; width:100px">Price</th>
                <th style="text-align: center; width:100px">Count</th>
                <th style="text-align: center; width:100px">Status</th>
                <th style="text-align: center; width:89px">#</th>
              </tr>
              </thead>
              <tbody>
              @foreach($user_products as $product)
                <tr data-id="{{ $product->id }}">
                  <td>
                    <input type="hidden" value="{{ $product->id }}" class="product-id">
                    {{ $product->name }}
                  </td>
                  <td>
                    <input type="text" value="{{ floatval($product->pivot->price) }}" class="form-control numeric decimal text-center" name="product[{{ $product->id }}][price]">
                  </td>
                  <td>
                    <input type="text" value="{{ intval($product->pivot->count) }}" class="form-control numeric text-center" name="product[{{ $product->id }}][count]">
                  </td>
                  <td>
                    <div class="custom-control custom-switch switch-success">
                      <input id="product_{{ $product->id }}" type="checkbox" value="1" {!! $product->pivot->status? 'checked=""': '' !!} class="custom-control-input"
                             name="product[{{ $product->id }}][status]">
                      <label id="product_{{ $product->id }}" class="custom-control-label"></label>
                    </div>
                  </td>

                  <td>
                    <button type="button" class="btn btn-delete btn-block delete">@lang('Remove')</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default disabled text-right">
              <button class="btn btn-primary">@lang('Save')</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </form>
@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>

    var productsSelect = $('#products');
    var productsListBody = $("#products-list tbody");

    productsSelect
      .select2()
      .change(function () {
        var productOptions = $(this).val();

        if (productOptions == null) {
          productsListBody.empty();
          return;
        }

        productsListBody.find('input[type=hidden]').each(function () {
          let $this = $(this);
          if (productOptions.indexOf($this.val()) == -1) {
            $this.closest('tr').remove();
          }
        });

        productsSelect.find('option:selected').each(function () {
          var $this = $(this);
          if (productsListBody.find('input[value=' + $this.val() + ']').length) {
            return;
          }

          productsListBody.append(
            $('<tr>')
              .data('id', $this.val())
              .append(
                $('<td>')
                  .append($this.html())
                  .append($('<input type="hidden">').val($this.val()))
              )
              .append(
                $('<td>')
                  .append($('<input type="text" class="form-control numeric decimal text-center">').attr({
                    value: 0,
                    name: "product[" + $this.val() + "][price]"
                  }))
              )
              .append(
                $('<td>')
                  .append($('<input type="text" class="form-control numeric text-center">').attr({
                    value: 0,
                    name: "product[" + $this.val() + "][count]"
                  }))
              )
              .append(
                $('<td class="text-center">')
                  .append(
                    $('<div class="custom-control custom-switch switch-success">')

                      .append(
                        $('<input type="checkbox" class="custom-control-input">')
                          .prop('checked', true)
                          .attr({
                            id: "product_" + $this.val(),
                            value: 1,
                            name: "product[" + $this.val() + "][status]"
                          })
                      )
                      .append(
                        $('<label class="custom-control-label">')
                          .attr('for', "product_" + $this.val())
                      )
                  )
              )
              .append(
                $('<td>')
                  .append('<button type="button" class="btn btn-delete btn-block delete">@lang('Remove')</button>')
              )
          );
        });
      });

    $(document).on('click', 'button.delete', function () {
      let $tr = $(this).closest('tr');
      productsSelect.find('option[value=' + $tr.data('id') + ']').prop('selected', false);
      productsSelect.change();
    });

    $(document).on('keypress', '.numeric', function (e) {
      var key = e.which || e.keyCode;
      var char = String.fromCharCode(key);
      var allowChar = '0123456789';
      if ($(this).is('.decimal')) {
        allowChar += '.';
      }

      if (allowChar.indexOf(char) == -1) {
        return false;
      }

      if (String($(this).val()).indexOf('.') > -1 && char == '.') {
        return false;
      }
    });

  </script>
@endsection
