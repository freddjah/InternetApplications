<section class="col-lg-5 default-bg p-3" id="ingredients">
    <h3 class="text-center">Ingredients</h3>

    <hr>

    <ul class="text-center mt-3">
        @foreach($ingredients as $ingredient)
            <li class="d-inline-flex p-3 white-bg rounded mt-1">{{ $ingredient->body }}</li>
        @endforeach
    </ul>

</section>