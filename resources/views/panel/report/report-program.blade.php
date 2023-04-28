@extends('layouts.app-admin')

@section('content')

    <report-program programs='@json($programs)'></report-program>
@endsection
