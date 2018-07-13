@extends('layouts.master')
@section('navig')
@include('partials.nav')
@endsection
@section('content')
@include('partials.sidebar')
<div class="col-md-9">
  <div class="row">
    @if (count($sh['products']))
    @foreach ($sh['products'] as $product)

    @include('shop.product')

    @endforeach
    @endif
</div>
</div>
@endsection
@section('footer')
@include('partials.footer')
@endsection
