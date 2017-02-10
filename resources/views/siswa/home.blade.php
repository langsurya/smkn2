@extends('layouts.header')
@section('title', 'SMK NEGERI 2 KOTA TANGERANG')

@section('content')
  <!-- Custom style for this template -->
  {!!Html::style('css/dashboard.css')!!}
  <!-- Custom styles for this template -->
  {!!Html::style('css/carousel.css')!!}
</head>
<body>
    @include('navbar')

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            {{-- Wrapper for slides --}}
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="{{URL::asset('/images/header.jpg')}}" alt="..." />
              </div>
              <marquee>SELAMAT DATANG DI APLIKASI PENCARIAN DATA SISWA SMK N 2 KOTA TANGERANG</marquee>
            </div>

          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <form action="index.html" method="GET">
                  <input type="hidden" name="module" value="home">
                  <input type="hidden" name="search" value="cari_siswa">
                  <select class="btn btn-success" name="field">
                    <option value="nama_siswa">NAMA SISWA</option>
                    <option value="nomor_peserta">NOMOR PESERTA</option>
                    <option value="nomor_ijazah">NOMOR IJAZAH</option>
                  </select>

                  <div class="pull-right col-md-9">
                      <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari berdasarkan NIM, Nama atau Ijazah..">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                          </button>
                        </span>
                      </div>
                  </div>
                </form>

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>NIS</th>
                      <th>Nomor Ijazah</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Lulus Tahun</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=$siswa->firstItem()-1; ?>
                    @foreach ($siswa as $data)
                    <?php $no++; ?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->nis}}</td>
                      <td>{{$data->nomor_ijazah}}</td>
                      <td>{{$data->nama_siswa}}</td>
                      <td>{{$data->nama_jurusan}}</td>
                      <td>{{$data->tahun_lulus}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        {!! str_replace('/?','?',$siswa->render())!!}
                      </div>
                    </td>
                  </tr>
                </table>
                {!! "Jumlah Data : <font color='red'>". $data."</font> Siswa"!!}

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </head>

@endsection
