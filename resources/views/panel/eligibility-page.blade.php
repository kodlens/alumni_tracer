@extends('layouts.app-admin')

@section('content')
<eligibility-page id="{{ $id }}" eligibilities='@json($eligibilities)'></eligibility-page>

@endsection