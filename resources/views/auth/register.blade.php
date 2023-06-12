@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row my-2">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="nohp"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No. HP') }}</label>

                                <div class="col-md-6">
                                    <input id="nohp" type="number" min='0'
                                        class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                        value="{{ old('nohp') }}" required autocomplete="nohp" autofocus>

                                    @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row my-2">
                                <label for="sesi_mulai"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sesi Mulai') }}</label>

                                <div class="col-md-6">
                                    <select type="text" class="form-select" id="sesi_mulai" name="sesi_mulai"
                                        aria-label="Default select example" required>
                                        <option value="">Pilih Sesi</option>
                                        {{-- BookingController, Ambil pilihan/option dari table sesi_lists --}}
                                        @foreach ($sesi as $ss)
                                            @if (old('sesi_mulai') == $ss->id)
                                                <option value="{{ $ss->id }}" selected>{{ $ss->nama_sesi }}</option>
                                            @else
                                                <option value="{{ $ss->id }}">{{ $ss->nama_sesi }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('sesi_mulai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="sesi_selesai"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sesi Selesai') }}</label>

                                <div class="col-md-6">
                                    <select type="text" class="form-select" id="sesi_selesai" name="sesi_selesai"
                                        aria-label="Default select example" required>
                                        <option value="">Pilih Sesi</option>
                                        {{-- BookingController, Ambil pilihan/option dari table sesi_lists --}}
                                        @foreach ($sesi as $ss)
                                            @if (old('sesi_selesai') == $ss->id)
                                                <option value="{{ $ss->id }}" selected>{{ $ss->nama_sesi }}</option>
                                            @else
                                                <option value="{{ $ss->id }}">{{ $ss->nama_sesi }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('sesi_selesai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="hari_main"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Hari Main') }}</label>

                                <div class="col-md-6">
                                    <select type="text" class="form-select" id="hari_main" name="hari_main"
                                        aria-label="Default select example" required>
                                        <option value="Senin">Senin</option>
                                        <option value="Selesa">Selesa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>


                                    @error('hari_main')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2 mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var option1 = document.getElementById('sesi_mulai');
            var option2 = document.getElementById('sesi_selesai');


            option2.disabled = true;

            option1.addEventListener('change', function() {
                if (option1.value === '') {
                    option2.disabled = true;
                    option2.value = ''; // Reset nilai opsi kedua jika opsi pertama dipilih ulang
                } else {
                    option2.disabled = false;
                    // Memeriksa apakah nilai opsi pertama lebih besar dari nilai opsi kedua
                    if (parseInt(option1.value) > parseInt(option2.value)) {
                        option2.value = ''; // Reset nilai opsi kedua jika tidak memenuhi syarat
                    }
                }
            });

            option2.addEventListener('change', function() {
                // Memeriksa apakah nilai opsi kedua lebih kecil dari nilai opsi pertama
                if (parseInt(option2.value) < parseInt(option1.value) || parseInt(option2.value) ==
                    parseInt(option1.value)) {
                    option2.value = ''; // Reset nilai opsi kedua jika tidak memenuhi syarat
                }
            });
        });
    </script>
@endsection
