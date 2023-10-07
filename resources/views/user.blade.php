@extends('layouts.app')
@section('user-content')
    <div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user h-100">
                <div class="image">
                    <img src="{{asset('/img/damir-bosnjak.jpg')}}">
                </div>
                <div class="card-body">
                    <div class="author">
                        <img class="avatar border-gray" src="{{ $userData['avatar'] }}" alt="..." style="background:#fff">
                            <h5 class="title">{{ $userData['first_name'] }} {{ $userData['last_name'] }}</h5>
                        <p class="description">
                            {{ $userData['employment']['title'] }}
                        </p>
                    </div>
               </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <p class="description">
                                {{ $userData['employment']['key_skill'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-user h-100">
                <div class="card-header">
                    <h5 class="card-title">Perfil</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Plano</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="{{ $userData['subscription']['plan']}}">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Username" value="{{ $userData['username']}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" disabled="" placeholder="Email" value="{{ $userData['email']}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="{{ $userData['first_name'] }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Sobrenome</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Last Name" value="{{ $userData['last_name'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Home Address" value="{{ $userData['address']['street_address'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" disabled="" placeholder="City" value="{{ $userData['address']['city'] }}">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>País</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Country" value="{{ $userData['address']['country'] }}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Cep</label>
                                    <input type="number" class="form-control" disabled="" placeholder="Cep" value="{{ $userData['address']['zip_code'] }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRFozV0TqAeWp-DmXa4v10ykxSMgSv2JM"></script>
        <div id="map" style="width: 100%; height: 400px; margin-top: 40px; border-radius: 10px; overflow: hidden"></div>
        <script>
            function initMap() {
                var coordinates = {lat:{{ $userData['address']['coordinates']['lat'] }}, lng: {{ $userData['address']['coordinates']['lng'] }}};
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: coordinates,
                    zoom: 6
                });
                var marker = new google.maps.Marker({
                    position: coordinates,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRFozV0TqAeWp-DmXa4v10ykxSMgSv2JM&callback=initMap"></script>
    </div>
</div>
@endsection
