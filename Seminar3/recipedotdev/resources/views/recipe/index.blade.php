@extends('layouts.layout')
@section('title', 'Our recipes')
@section('content')
    <div class="container mb-5">
        <div class="row mt-5">
            <h2 class="ml-1">Recently added recipes</h2>
            <div class="card-deck">
                @foreach($recentlyAddedRecipes as $recipe)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/recipe/' . $recipe->image_url) }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $recipe->title }}</h4>
                            <a href="/recipe/{{ $recipe->id }}" class="btn btn-default default-bg text-white" role="button">Go to recipe</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Uploaded {{ $recipe->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row mt-5">
            <h2 class="ml-1">All recipes</h2>
            <div class="container container-fluid white-bg rounded pt-2">
                <table class="table table-striped ">

                    <thead>
                        <tr>
                            <th scope="col">
                                <strong>Recipe</strong>
                            </th>
                            <th scope="col">
                                <strong>Time</strong>
                            </th>
                            <th scope="col">
                                <strong>Ingredients</strong>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($allRecipes as $recipe)
                        <tr>
                            <td><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></td>
                            <td>{{ $recipe->preptime + $recipe->cooktime }} minutes</td>
                            <td>{{ $recipe->ingredients->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection()