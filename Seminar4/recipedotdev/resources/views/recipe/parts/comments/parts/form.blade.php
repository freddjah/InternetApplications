<form class="mt-3" method="POST" action="/recipe/{{ $recipe->id }}/comment">
    {{ csrf_field() }}
    <h4 class="text-center text-white">Write a comment:</h4>

    <hr>

    @guest
        <div class="form-group">
            <textarea class="form-control" rows="5" name="body" placeholder="Please log in to write a comment" required disabled></textarea>
        </div>
        <button class="btn btn-light" type="submit" name="submit" disabled>Add comment</button>
    @else
        <div class="form-group">
            <textarea class="form-control" rows="5" name="message" placeholder="Write a message (up to 250 characters)..." required></textarea>
        </div>
        <button class="btn btn-light" type="submit" name="submit">Add comment</button>
    @endguest

            @if ($errors->has('message'))
                <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
</form>