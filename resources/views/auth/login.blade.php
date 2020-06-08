@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col></b-col>
        <b-col cols="8">

            <b-card header-text-variant="white" header-tag="header" header-bg-variant="dark" title="Inicio de Sesión">
                <b-card-text>
                    <b-alert show>Por favor Ingrese sus datos</b-alert>
                    <b-form method="POST" action="{{ route('login') }}">
                        @csrf
                        

                        <b-form-group  description="Nunca compartiremos tu correo. Está seguro con nosotros." label="Correo Electronico" label-for="email" >
                            <b-form-input type="email" id="email"  name="email "
                            value="{{ old('email') }}" required  autofocus
                            placeholder="example@dominio.com" ></b-form-input>
                        </b-form-group>

                        <b-form-group  label="Contraseña" label-for="password" >
                            <b-form-input type="password" id="password"  name="password "
                            value="{{ old('password') }}" required 
                            ></b-form-input>
                        </b-form-group>

                        <b-form-goup>
                             <b-form-checkbox name="remember"  {{ old('remember') ? 'checked=true' : '' }}>
                            Recordar sesión 
                        </b-form-checkbox> 
                        </b-form-goup>
                      
                  
                        <b-button type="dubmit" variant="outline-primary">Ingresar</b-button>
                        <b-button href="{{ route('password.request') }}"variant="link">Olvidaste tu contraseña</b-button>


                    </b-form>

                </b-card-text>
            </b-card>


        </b-col>
        <b-col></b-col>
    </b-row>
    </ b-container>
    @endsection