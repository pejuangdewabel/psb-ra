@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <kelulusan-component></kelulusan-component>                                  
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection