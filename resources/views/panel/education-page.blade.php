@extends('layouts.app-admin')

@section('content')
<education-page id="{{ $id }}" educations='@json($educations)'></education-page>

@endsection