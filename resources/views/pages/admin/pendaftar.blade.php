@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')        
        <section class="content">
          <!-- Default box -->
          <pendaftar-component></pendaftar-component>
          <!-- /.card -->
        </section>
@endsection