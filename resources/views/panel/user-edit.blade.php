@extends('layouts.app-admin')

@section('content')

    <!-- {{$user}} -->
    <user-edit user='@json($user)' data-programs='@json($programs)' ></user-edit>
@endsection