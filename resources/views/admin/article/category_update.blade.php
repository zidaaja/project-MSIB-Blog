<div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <form action="{{ route('admin.article.category_update', $category) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-1 align-tems-center">
                        <label class="col-sm-2 col-form-label text-end">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name', @$category->name) }}"
                                placeholder="Enter Category Name..." required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-info">Save</button>
            </form>

            </div>
        </div>
    </div>
</div>
