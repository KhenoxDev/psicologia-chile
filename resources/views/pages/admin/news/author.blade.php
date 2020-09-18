<div class="news-container shadow-sm">
    <h3>Si tu autor no aparece en la lista, crealo acá.</h3>
    <form action="{{ route('admin.store.author') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="author">{{ __('Autor *') }}</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>

        <div class="form-group">
            <label for="author_image">{{ __('Imagen autor *') }}</label>
            <input type="file" class="form-control" id="author_image" name="author_image">
        </div>

        <hr>
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>


    </form>
</div>
