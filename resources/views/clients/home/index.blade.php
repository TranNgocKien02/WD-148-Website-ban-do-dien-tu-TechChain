@extends('clients.layouts.master')

@section('main-content')
      @include('clients.home.slider-banner');
      @include('clients.home.product');
      @include('clients.home.banner');
      @include('clients.home.laptop-product');
      @include('clients.home.tv-audio-product');
      @include('clients.home.static');
      @include('clients.home.trending-product');
@endsection