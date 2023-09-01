<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <form action="{{ $url }}" method="post">
                    @csrf
                    <div class="form-group row mb-1 align-tems-center">
                        <label class="col-sm-2 col-form-label text-end">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name[]" value="{{ old('name', @$category->name) }}"
                                placeholder="Enter Category Name..." required>
                        </div>
                    </div>

                    <div class="jobdesk"></div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-sm-10 text-end">
                            <a href="javascript:;" class="addJobdesk form-link mb-2"><i class="bi-plus-circle me-2"></i>More Category</a>
                        </div>
                    </div>
                    @include('scripts.jobmodal')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>

            </div>
        </div>
    </div>
</div>
