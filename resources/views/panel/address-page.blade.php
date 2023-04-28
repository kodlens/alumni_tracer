@extends('layouts.app-admin')

@section('content')

    
    <address-page addresses='@json($user)'></address-page>
@endsection