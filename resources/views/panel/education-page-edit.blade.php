@extends('layouts.app-admin')

@section('content')

    
    <education-page-edit educations='@json($educations)'></education-page-edit>
@endsection