<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="{{ route('admin.article.category')}}" method="post">
                    {{-- @if (@$jobdesk)
                        @method('PUT')
                    @endif --}}
                    @csrf
                    {{-- <div class="mb-3">
                        <label for="name" class="form-label">Job Name</label>
                        <a href="javascript:;" class="addGainer form-link mb-2"><i class="bi-plus-circle me-1"></i>Add Gainer</a>

                        <input type="text" name="name" id="name" value="{{old('name', @$jobdesk->name)}}" class="form-control">
                        <a href="javascript:;" class="addGainer form-link mb-2"><i class="bi-plus-circle me-1"></i>Add Gainer</a>

                    </div> --}}
                    {{-- <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-sm-10 text-end">
                            <a href="javascript:;" class="addJobdesk form-link mb-2"><i class="bi-plus-circle me-2"></i>Add Job</a>
                        </div>
                    </div> --}}



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

                    {{-- <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label text-end">From</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="from[]" value="{{old('from', @$achievement->gainer->from)}}"
                                placeholder="From..., Ex: Jakarta" required>
                        </div>

                    </div> --}}

                    {{-- <div class="jobdesk"></div> --}}
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
