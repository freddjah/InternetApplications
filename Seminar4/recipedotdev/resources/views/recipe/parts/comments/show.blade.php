<section class="row default-bg mt-3 p-3" id="comments">

    <comment-component user-id="{{ Auth::id() }}" comments-url="{{ route('comments', $recipe->id) }}"></comment-component>

</section>