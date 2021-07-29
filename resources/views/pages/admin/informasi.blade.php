@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')        
        <section class="content">
          <!-- Default box -->
          <informasi-component></informasi-component>
          <!-- /.card -->
        </section>
@endsection