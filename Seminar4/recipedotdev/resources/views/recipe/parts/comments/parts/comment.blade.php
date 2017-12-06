<div class="row mt-3">
    <div class="card col-lg-12">

        <div class="card-header">
            <strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->diffForHumans() }}.
        </div>

        <div class="card-body">
            <p class="card-text">{{ $comment->message }}</p>

            @if(auth()->id() == $comment->user_id)
                <form action="/recipe/{{ $recipe->id }}/comment/{{ $comment->id }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete Comment</button>
                </form>
            @endif
        </div>

    </div>
</div>