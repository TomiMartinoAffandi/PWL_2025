@extends('layouts.template')

@section('content')
    <div class="d-flex justify-content-center row row-cols-2 my-3 mx-3">
        <div class="card card-primary card-outline mr-lg-3 col-lg-3'">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img id="foto-profil" class="profile-user-img img-fluid img-circle"
                        src="{{ auth()->user()->profile_url ? asset('storage/profile_photos/' . auth()->user()->profile_url) : asset('storage/profile_pict/blank_profile.jpg') }}"
                        alt="User profile picture" style="max-width: 100px; max-height: 100px; object-fit: cover">
                </div>

                <h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>

                <p class="text-muted text-center">{{ Auth::user()->level->level_nama }}</p>

                <!-- Sebuah tombol untuk memanggil script js modal, url adalah parameter yang dikirim ke script -->
                <!-- Setelah modal di load akan ditampilkan kedalam #... yang merujuk ke id #myModal yaitu div setelah endsection -->
                <a onclick="modalAction('{{ url('profil/upload_ajax') }}')" class="btn btn-primary btn-block"><b>Upload
                        Profil</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

<!-- Sebuah div untuk template/tempat modal yang ditampilkan -->
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
    data-keyboard="false" data-width="75%" aria-hidden="true"></div>

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush