<x-app-layout>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Articles</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <button class="btn btn-soft-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi-plus-lg me-1"></i>New Category
                    </button>
                    @include('admin.article.category')
                    <a class="btn btn-info" href="{{ route('admin.article.create') }}">
                        <i class="bi-plus-lg me-1"></i> Create
                    </a>

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


              <div class="col-sm-6 col-md-3">
                <!-- Select -->
                <select name="articel_category" class="form-select" onchange="form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($articel_category as $item)
                        <option value="{{ $item->slug }}"
                            {{ @$_GET['articel_category'] == $item->slug ? 'selected' : ''}}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                <!-- End Select -->

              </div>
              <!-- End Col -->

              <div class="col-sm-6 col-md-8 ">

                <!-- Form -->
                <div class="input-group input-group-merge input-group-sm">
                  {{-- <span class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </span>
                  <input type="search" class="form-control form-control-lg" id="search" name="search" value="{{@$_GET['search'] }}" placeholder="Cari Project" aria-label="Search job"> --}}
                  <div class="input-group input-group-merge">

                    <input type="text" class="form-control" placeholder="Search for Title ..." aria-label="Search" name="search" value="{{ @$_GET['search'] }}">
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
                <h4 class="card-title">Data Articles</h4>
                <div class="table-responsive">
                    <table class="table table-thead-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Publish</th>
                                <th>Action</th>



                            </tr>
                        </thead>
                        <tbody class="table-align-middle">
                            @forelse ($articles as $article)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $article->title}}</td>
                                    <td>{{ $article->articel_category->name }}</td>
                                    <td>{{ $article->user->name}}</td>


                                    {{-- <td class="bg-dark"> --}}
                                        {{-- <form class="publishForm" action="{{ route('admin.achievement.publish', $achievement->id) }}" method="POST"> --}}
                                        {{-- <form class="publishForm" action="" method="POST">

                                            @csrf
                                            <div class="form-check form-switch">
                                                <input class="form-check-input publishSwitch" type="checkbox" name="is_published" {{ $achievement->is_published ? 'checked' : '' }}>
                                                <label class="form-check-label" for="publishSwitch">{{ $achievement->is_published ? '' : '' }}</label>
                                            </div>
                                        </form> --}}
                                    {{-- </td> --}}
                                    <td>Test</td>
                                    <td>

                                        <a name="" id="" class="btn btn-xs btn-outline-primary rounded-5"
                                        href="{{ route('admin.article.edit', $article) }}"><i class="bi-pen"></i></a>
                                    <a name="" id="" class="btn btn-xs btn-outline-info rounded-5"
                                        href=""><i class="bi-eye"></i></a>
                                    <form action="{{ route('admin.article.destroy', $article) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-xs delete-btn rounded-5"><i class="bi-trash"></i></button>
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
            {{ $articles->withQueryString()->links()}}
    </div>
    <!-- End Content -->

    @include('scripts.delete')
</x-app-layout>
