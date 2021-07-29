@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')    
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <kelas-component></kelas-component>
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection