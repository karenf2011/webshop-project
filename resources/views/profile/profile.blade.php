@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h1 class="mb-4">Welkom {{ $user->first_name }}!</h1>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-light active" id="info">Persoonlijke Informatie</button>
                <button type="button" class="btn btn-light" id="orders">Geplaatste Orders</button>
                <button type="button" class="btn btn-light" id="favorites">Favorieten</button>
            </div>
        </div>
        <div class="content-section col-8">
            <div class="row">
                <div class="col-3">
                    <p>Voornaam:</p>
                    <p>Achternaam:</p>
                    <p>Emailadres:</p>
                    <p>Telefoonnummer:</p>
                @if (!empty($user->addresses[0]))
                    <p>Adres:</p>
                    <p>Postcode:</p>
                    <p>Plaats:</p>
                    <p>Land:</p>
                @endif
                </div>
                <div class="col-4">
                    <p>{{ $user->first_name }}</p>
                    <p>{{ $user->last_name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ isset($user->phone_number) ? $user->phone_number : "-" }}</p>
                    @if (!empty($user->addresses[0]))
                        <p>{{ $user->addresses[0]->street_address }}</p>
                        <p>{{ $user->addresses[0]->postal_code }}</p>
                        <p>{{ $user->addresses[0]->city }}</p>
                        <p>{{ $user->addresses[0]->country }}</p>
                    @endif
                </div>
                <div class="col-4">
                    <a href="#" class="btn btn-light">Bewerk Info</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-light" id="logout">Logout</button>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).on('click', '#info', function (event) {
            let section = $(this).attr('id')
            
            axios({
                method: 'POST',
                url: '{{ route("profile.info") }}',
                data: {
                    section: section,
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('.active').removeClass('active')
                    $('.btn#info').addClass('active')
                    $('.content-section').html(response.data.html).replace()
                }
            }).catch(function (error) {

            })
        })
    </script>

    <script>
        $(document).on('click', '#orders', function (event) {
            axios({
                method: 'POST',
                url: '{{ route("profile.orders") }}',
                data: {
                    
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('.btn#info').removeClass('active')
                    $('.btn#orders').addClass('active')
                    $('.content-section').html(response.data.html).replace()
                }
            }).catch(function (error) {

            })
        })
    </script>
@endpush