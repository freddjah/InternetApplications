<section class="row default-bg mt-3 p-3" id="comments">

    <div class="col-lg-12">

        <h3 class="text-center text-white">Comments</h3>

        <hr>

        <comment-show-component recipe-id="{{ $recipe->id }}" current-user="{{ auth()->id() }}" route-connection="{{ route('comments', ['recipeId' => $recipe->id]) }}"></comment-show-component>

        <comment-post-component is-logged-in="true" route-connection="{{ route('comments', ['recipeId' => $recipe->id]) }}"></comment-post-component>
    </div>
</section>