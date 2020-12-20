<form
    id="location-search"
    method="POST"
    role="form"
    data-request="<?php echo e($searchEventHandler); ?>"
>
    <div class="input-group postcode-group">
        <input
            type="text"
            id="search-query"
            class="form-control text-center postcode-control"
            name="search_query"
            placeholder="<?php echo app('translator')->get('igniter.local::default.label_search_query'); ?>"
            value="<?php echo e($searchQueryPosition->isValid() ? trim($searchQueryPosition->format()) : ''); ?>"
        >
        <div class="input-group-append">
            <button
                type="button"
                class="btn btn-primary"
                data-control="search-local"
            ><?php echo app('translator')->get('igniter.local::default.text_find'); ?></button>
        </div>
    </div>
</form>
