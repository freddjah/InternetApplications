<div class="row mt-5">
    <h2 class="ml-1">Most commented recipes</h2>
    <div class="card-deck">
        @foreach($mostCommentedRecipes as $recipe)
            <div class="card">
                <img class="card-img-top" src="{{ asset($recipe->picture_url) }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ $recipe->title }}</h4>
                    <span class="btn bg-dark text-white">
                                Comments <span class="badge badge-light">{{ $recipe->comments->count() }}</span>
                                <span class="sr-only">comments</span>
                            </span>
                    <a href="/recipe/{{ $recipe->id }}" class="btn btn-default default-bg text-white" role="button">Go to recipe</a>
                </div>
            </div>
        @endforeach
    </div>
</div>