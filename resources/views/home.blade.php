@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                
                    

                    <a href="/create" class="btn btn-primary">Crear usuario</a>
                    <table class="table">
                        <thead>
                          <tr>
                        
                            <th scope="col">primer nombre</th>
                            <th scope="col">segundo apellido</th>
                            <th scope="col">tipo documento</th>
                            <th scope="col">documento</th>
                            <th scope="col">email</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                <th >{{$user->primer_nombre}}</th>
                                <td>{{$user->segundo_apellido}}</td>
                                <td>{{$user->tipo_documento}}</td>
                                <td>{{$user->documento}}</td>
                                <td>{{$user->email}}</td>
                              </tr>
                             
                            @endforeach
                         
                        </tbody>
                      </table>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
