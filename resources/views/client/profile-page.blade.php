@extends('layouts.app-client')

@section('content')
    <profile-page data-programs='@json($programs)'></profile-page>
@endsection