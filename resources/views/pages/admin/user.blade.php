@extends('layouts.admin',[
  'tahunAjaran' => $tahun
])

@section('content')
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->  
          <user-component></user-component>        
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection