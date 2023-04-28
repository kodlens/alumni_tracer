@extends('layouts.app-admin')

@section('content')
    <employment-page employment='@json($user)'></employment-page>
@endsection