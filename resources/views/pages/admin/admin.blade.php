@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')            
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <admin-component></admin-component>
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection