@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col></b-col>
        <b-col cols="8">
        <b-card header-text-variant="white" class="my-3" header-tag="header" header-bg-variant="dark" title="Registro">
                <b-card-text>
                    <b-alert show>Por favor Ingrese sus datos</b-alert>

                    @if ($errors->any()) 
                        <b-alert show variant="danger">
                            <ul class="mb-0">
                                   @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                @endforeach    
                            </ul>
                        </b-alert>
                    @endif 
                    <b-form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <b-form-group   label="Nombre" label-for="name" >
                            <b-form-input type="text" id="name"  name="name" 
                            value="{{ old('name') }}" required  autofocus 
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group  description="Nunca compartiremos tu correo. Está seguro con nosotros." label="Correo Electronico" label-for="email" >
                            <b-form-input type="email" id="email"  name="email" 
                            value="{{ old('email') }}" required   autocomplete="email"
                            placeholder="example@dominio.com" ></b-form-input>
                        </b-form-group>

                        <b-form-group  label="Contraseña" label-for="password" > 
                            <b-form-input type="password" id="password"  name="password" 
                            required 
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group  label="Confimar contraseña" label-for="password_confirmation" > 
                            <b-form-input type="password" id="password_confirmation"  name="password_confirmation" 
                            required 
                            ></b-form-input>
                        </b-form-group>


                    
                      
                  
                        <b-button type="submit" variant="primary">Confirmar Registro</b-button>
                        <b-button href="{{ route('login') }}"variant="link">¿Ya te has registrado?</b-button>


                    </b-form>


                </b-card-text>
            </b-card>

               
                </b-col>
        <b-col></b-col>
    </b-row>
    </b-container>       
@endsection