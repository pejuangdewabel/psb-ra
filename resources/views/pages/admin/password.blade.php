@extends('layouts/admin',[
  'tahunAjaran' => $tahun
])

@section('content')
    <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">
                <strong>Ubah Password</strong>
              </h3>
            </div>
            <div class="card-body">
              <div class="row">                
                <div class="col-md-12 mt-3">                  
                  <form action="{{ route('change-pass') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table">      
                        <tr>
                            <input
                                type="hidden"
                                class="form-control"
                                id="id"
                                name="id"
                                value="{{ Auth::guard('admin')->user()->id }}"                            
                            />
                        </tr>                 
                      <tr>
                        <td>
                          <label for="">Password Lama</label>
                          <div class="input-group mb-2 mr-sm-2" id="show_hide_passwordOld">
                            
                            <input
                                type="text"
                                class="form-control @error('passwordOld') is-invalid @enderror"
                                id="passwordOld"
                                name="passwordOld"                                                        
                            />                            
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <a href="">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                          </div>  
                          @error('passwordOld')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                 
                        </td>
                        <td>
                            <label for="">Password Baru</label>
                            <div class="input-group mb-2 mr-sm-2" id="show_hide_passwordNew">
                                <input
                                    type="text"
                                    class="form-control @error('passwordNew') is-invalid @enderror"
                                    id="passwordNew"
                                    name="passwordNew"                                                        
                                />                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <a href="">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @error('passwordNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                                                              
                        </td>
                        <td>
                          <label for="">Konfirmasi Password</label>
                          <div class="input-group mb-2 mr-sm-2" id="show_hide_passwordKonfirmasi">
                                <input
                                    type="text"
                                    class="form-control @error('passwordKonfirmasi') is-invalid @enderror"
                                    id="passwordKonfirmasi"
                                    name="passwordKonfirmasi"                                                        
                                />                                
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <a href="">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>                                
                            </div>    
                            @error('passwordKonfirmasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                      
                        </td>
                      </tr>                    
                      <tr>
                        <td colspan="5">
                          <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-save"></i> Ubah Password
                          </button>
                        </td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
@endsection