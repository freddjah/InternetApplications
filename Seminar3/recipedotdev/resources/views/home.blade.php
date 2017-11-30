@extends('layouts.layout')
@section('title', 'Start')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <a href="{{ route('calendar') }}">
                <div class="card mb-3">

                    <img class="card-img" src="{{ asset('images/calendar.jpg') }}" alt="Recipe Calendar">

                    <div class="card-img-overlay text-white">
                        <h4 class="card-title">Visit our Recipe Calendar</h4>
                    </div>

                </div>
            </a>
        </div>

        <div class="row">
            <div class="card-deck">
                @foreach($recentlyAddedRecipes as $recipe)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/recipe/' . $recipe->image_url) }}" alt="{{ $recipe->title }} Image">

                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $recipe->title }} Recipe</h4>
                            <a href="/recipe/{{ $recipe->id }}" class="btn btn-default default-bg text-white" role="button">Go to recipe</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
