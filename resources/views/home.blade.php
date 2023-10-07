@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title">Lista de Clientes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Nome
                            </th>
                            <th>
                                País
                            </th>
                            <th>
                                Cidade
                            </th>
                            <th >
                                E-mail
                            </th>
                            </thead>
                            <tbody>
                            @foreach ($paginator as $user)
                            <tr>
                                <td>
                                    {{ $user['first_name'] }}
                                </td>
                                <td>
                                    {{ $user['address']['country'] }}

                                </td>
                                <td>
                                    {{ $user['address']['city'] }}
                                </td>
                                <td>
                                    {{ $user['email'] }}
                                </td>

                                <td>

                                    <a href="{{ route('user', ['id' => $user['id']]) }}" class="btn btn-color btn-primary">Ver Cliente</a>

                                </td>

                            </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
