<x-app-layout>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Detail Article</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-soft-info" href="{{ route('admin.article.index') }}">
                        <i class="bi-arrow-left"></i>
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="card">
            <div class="card-body">

                <h1 class="card-title">{{ $article->title }}</h1>
                <p class="card-subtitle mb-3">
                    {{ $article->articel_category->name }}
                </p>
                <div class="profile-cover mb-5">
                    <div class="profile-cover-img-wrapper">
                      <img class="profile-cover-img" src="{{ $article->getFirstMediaUrl('image') }}" alt="Image Description">
                    </div>
                  </div>
                <h1 class="card-text">{{ $article->description }}</h1>
                <div class="">
                    {!! $article->content !!}
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
