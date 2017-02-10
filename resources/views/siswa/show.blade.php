@extends('layouts.header')
@section('title', 'SMK NEGERI 2 KOTA TANGERANG')

@section('content')
  <head>
    @include('navbar')

    @foreach ($siswa as $data)
      {{$data->nomor_ijazah}}
    @endforeach
  </head>

@endsection
