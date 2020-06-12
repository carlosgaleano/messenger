@extends('layouts.app')

@section('content')
<b-container fluid>
    <b-row>
        <b-col cols="4">
            <b-form-input class="text-center"
            
            type="text"
            required
            placeholder="Buscar contacto ..."
            ></b-form-input> 
            <b-row>
                <b-col cols="3">
                    <b-img v-bind="mainProps"  blank="true"  blankColor='#777'  width =75 height='75'  rounded="circle" alt="img"></b-img>
                </b-col>
                <b-col cols="7"></b-col>
                <b-col cols="2"></b-col>
            </b-row>
        </b-col>
        <b-col cols="8"></b-col>
    </b-row>
</b-container>
@endsection
