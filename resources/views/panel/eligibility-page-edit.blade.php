@extends('layouts.app-admin')

@section('content')

    
    <eligibility-page-edit eligibilities='@json($eligibilities)'></eligibility-page-edit>
@endsection