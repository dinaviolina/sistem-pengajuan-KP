@extends('layouts.main')
@section('container')
<section class="section profile">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @if(DB::table('kerja_prakteks')->where('mahasiswa_id', $mhs->id)->exists())
            <div class="card" style="min-height: 450px">
                <div class="card-body">

                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="false" disabled>Home</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false" disabled>Profile</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false" disabled>Contact</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content pt-2" id="myTabjustifiedContent">
                        <div class="tab-pane fade " id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                            AAAAAAAA
                        </div>
                        <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                            BBBBBBB
                        </div>
                        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                            CCCCCC
                        </div>
                    </div><!-- End Default Tabs -->

                </div>
            </div>
        @else
            <div class="card" style="min-height: 250px; display: flex; justify-content: center; align-items: center;">
                <div style="text-align: center;">
                    <h2 style="color: red;">Anda belum mengajukan KP</h2>
                    <a href="/permohonan_kp" type="button" class="btn btn-outline-success">Ajukan</a>
                </div>
            </div>        
        @endif
    </div>
</section>
@endsection
