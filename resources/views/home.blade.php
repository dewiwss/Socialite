@extends('layouts.master')

@section('title','Dashboard')

@section('nama_halaman','Dashboard')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                <a href="#">
                    <img src="{{Auth::user()->avatar}}" class="rounded-circle">
                </a>
                </div>
            </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
            <div class="row">
                <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                    </div>
                    <div>
                    <span class="heading">10</span>
                    <span class="description">Photos</span>
                    </div>
                    <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                    </div>
                </div>
                </div>
            </div>
            <div class="text-center">
                <h3>
                    {{Auth::user()->name}}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                Bergabung pada <br> {{Auth::user()->created_at}}
                </div>
                <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>{{Auth::user()->email}} 
                </div>
                <div>
                <i class="ni education_hat mr-2"></i>Web Service
                </div>
                <hr class="my-4" />
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-8 order-xl-1">            
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">{{Auth::user()->name}} 's Profile Detail</h3>
                </div>
                <div class="col-4 text-right">
                <a href="#" class="btn btn-sm btn-primary">Edit Profil</a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <form>
                <h6 class="heading-small text-muted mb-4">USER INFORMATION</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-nama">Nama Lengkap</label>
                            <input type="text" id="input-nama" name="nama" class="form-control form-control-alternative" placeholder="Nama lengkap" value="{{Auth::user()->name}} " disabled>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- About -->
                <h6 class="heading-small text-muted mb-4">About</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-tempat-lahir">Tempat Lahir</label>
                    <input type="text" id="input-tempat-lahir" name="tmp_lahir" class="form-control form-control-alternative" placeholder="Ciamis" value="" disabled>
                    </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-tanggal-lahir">Tanggal Lahir</label>
                    <input class="form-control datepicker" name="tgl_lahir" placeholder="1999-08-27" type="text" value="" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Alamat</label>
                    <input rows="4" name="alamat" class="form-control form-control-alternative" placeholder="Dusun Nagrog Desa Sukasenang RT 06 RW 02 Kecamatan Sindangkasih Kabupaten Ciamis Provinsi Jawa Barat" value="" disabled>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Email</label>
                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="email@email.com" value="{{Auth::user()->email}}" disabled>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-hp">No Handphone</label>
                    <input type="text" name="no_telp" id="input-hp" class="form-control form-control-alternative" placeholder="085327231231" value="" disabled>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            
        </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

{{-- <script src="https://apis.google.com/js/api.js"></script>
<script>
    // auth2 is initialized with gapi.auth2.init() and a user is signed in.
    
    gapi.auth2.init();

if (auth2.isSignedIn.get()) {
  var profile = auth2.currentUser.get().getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}
</script> --}}

@endsection
