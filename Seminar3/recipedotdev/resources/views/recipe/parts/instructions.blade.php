<section class="col-lg-7 p-3 white-bg" id="instructions">
    <h3>Instructions</h3>

    <hr>

    <ol class="mt-3">
        @foreach($instructions as $instruction)
            <li class="ml-5">{{ $instruction->body  }}</li>
            <hr>
        @endforeach
    </ol>

</section>