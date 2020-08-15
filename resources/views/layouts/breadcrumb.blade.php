<div class="col">
  <h4 class="page-title">{{ ucfirst($title??'') }}</h4>
  <ol class="breadcrumb">
    @foreach($breadcrumb??[] as $row)
    <li class="breadcrumb-item"><a href="{{ $row['link']?? 'javascript:void(0);' }}">{{ ucfirst($row['title']) }}</a></li>
    @endforeach
    <li class="breadcrumb-item active">{{ ucfirst($title??'') }}</li>
  </ol>
</div>