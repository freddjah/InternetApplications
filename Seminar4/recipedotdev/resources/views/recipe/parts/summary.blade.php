<section class="row mt-3 p-3 pb-4 default-bg" id="summary">
    <ul>
        <h3>Summary</h3>

        <hr>

        <li>
            <strong>Preparation time:</strong> {{ $recipe->preptime }} minutes
        </li>

        <li>
            <strong>Cooking time:</strong> {{ $recipe->cooktime }} minutes
        </li>

        <li>
            <strong>Servings:</strong> {{ $recipe->servings }} servings
        </li>
    </ul>
</section>