@extends('layouts.app')

@section('content')
    {!! Form::model($official, ['route' => ['officials.update', $official->id]]) !!}
    {!! Form::close() !!}
@endsection