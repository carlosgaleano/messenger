@extends('layouts.app')

@section('content')
<b-container fluid style="height: calc(100vh - 57px); ">
    <b-row class="h-100" no-gutters>
        <b-col class="h-100" >

         
         
           <contact-list-component></contact-list-component> 
                 
        </b-col>
        <b-col cols="8"  class="h-100" >
        <active-conversation-component></active-conversation-component>

        </b-col>
    </b-row>
</b-container>
@endsection
