@extends('layouts.layout')
@section('title', $recipe->title . ' Recipe')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('recipe.parts.header')
        @include('recipe.parts.summary')

        <div class="row mt-3">
            @include('recipe.parts.ingredients')
            @include('recipe.parts.instructions')
        </div>

        @include('recipe.parts.comments.show')
    </div>
@endsection