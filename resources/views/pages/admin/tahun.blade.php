@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')        
        <section class="content">
          <!-- Default box -->
          <tahun-component></tahun-component>
          <!-- /.card -->
        </section>
@endsection