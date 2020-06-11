@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col></b-col>
        <b-col cols="8">

            <b-card header-text-variant="white" class="my-3" header-tag="header" header-bg-variant="dark" title="Inicio de Sesión">
                <b-card-text>
                    <b-alert show>Por favor Ingrese sus datos2</b-alert>
                   
                    @if ($errors->any()) 
                        <b-alert show variant="danger">
                            <ul class="mb-0">
                                   @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                @endforeach    
                            </ul>
                        </b-alert>
                    @endif 
                      
                    <b-form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                    
                        <b-form-group   label="Correo Electronico" label-for="email" >
                            <b-form-input type="email" id="email"  name="email" 
                            value="{{ old('email') }}" required  autofocus autocomplete="email"
                            placeholder="example@dominio.com" ></b-form-input>
                        </b-form-group>

                        <b-form-group  label="Contraseña" label-for="password" > 
                            <b-form-input type="password" id="password"  name="password" 
                             required 
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group>
                             <b-form-checkbox name="remember"  {{ old('remember') ? 'checked=true' : '' }}>
                            Recordar sesión 
                            </b-form-checkbox> 
                        </b-form-goup>
                      
                  
                        <b-button type="submit" variant="primary">Ingresar</b-button>
                        <b-button href="{{ route('password.request') }}"variant="link">Olvidaste tu contraseña</b-button>


                    </b-form>


                </b-card-text>
            </b-card>


        </b-col>
        <b-col></b-col>
    </b-row>
    </b-container>
    @endsection