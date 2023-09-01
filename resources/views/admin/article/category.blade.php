<x-app-layout>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Article Categories</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-soft-info" href="{{ route('admin.article.index') }}">
                        <i class="bi-arrow-left"></i>
                    </a>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi-plus-lg me-1"></i>New Category
                    </button>
                    @include('admin.article.category_store')

                    {{-- <a class="btn btn-info" href="{{ route('admin.article.create') }}">
                        <i class="bi-plus-lg me-1"></i> Create
                    </a> --}}

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->



        <div class="card mb-3">
            <div class="card p-3">
              <!-- Form -->
          <form>
            <div class="row gx-2 gx-md-5 col-sm-divider">




              <div class="col-md-11">

                <!-- Form -->
                <div class="input-group input-group-merge input-group-sm">
                  {{-- <span class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </span>
                  <input type="search" class="form-control form-control-lg" id="search" name="search" value="{{@$_GET['search'] }}" placeholder="Cari Project" aria-label="Search job"> --}}
                  <div class="input-group input-group-merge">

                    <input type="search" class="form-control" placeholder="Search for Category name ..." aria-label="Search" name="search" value="{{ @$_GET['search'] }}">
                    {{-- <button class="btn btn-warning"><i class="bi-search"><a href="{{ @$_GET['search'] }}"></a></i></button> --}}
                  </div>

                </div>
                <!-- End Form -->
              </div>
              <!-- End Col -->

              <div class="col-md-1">
                <button class="btn btn-soft-info"><i class="bi-search"><a href="{{ @$_GET['search'] }}"></a></i></button>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </form>
          <!-- End Form -->
            </div>
          </div>

        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Data Categories</h4>
                <div class="table-responsive">
                    <table class="table table-thead-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-align-middle">
                            @forelse ($articel_category as $category)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $category->name}}</td>
                                    <td>
                                        <button class="btn btn-xs btn-outline-primary rounded-5" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $category->id }}">
                                            <i class="bi-pen"></i>
                                        </button>
                                        @include('admin.article.category_update', ['category' => $category])

                                    <form action="{{ route('admin.article.category_destroy', $category) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-xs delete-btn rounded-5"><i class="bi-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="55" class="text-center pt-5">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            {{ $articel_category->withQueryString()->links()}}
    </div>
    <!-- End Content -->

    @include('scripts.delete')
</x-app-layout>
