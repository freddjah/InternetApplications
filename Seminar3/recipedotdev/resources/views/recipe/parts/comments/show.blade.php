<section class="row default-bg mt-3 p-3" id="comments">

    <div class="col-lg-12">

        <h3 class="text-center text-white">Comments</h3>

        <hr>

        <div class="container">
            @foreach($comments as $comment)
                @include('recipe.parts.comments.parts.comment')
            @endforeach
        </div>

        @include('recipe.parts.comments.parts.form')
    </div>
</section>