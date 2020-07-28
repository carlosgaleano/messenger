@extends('layouts.app')

@section('content')
 <messenger-component :user-Id="{{ auth()->id() }}" />


@endsection
