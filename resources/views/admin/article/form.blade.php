@push('styles')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    </style>
@endpush
<x-app-layout>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Article</h1>
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

        <div>
            <h4 class="mb-4 card-title">{{ @$article ? 'Edit' : 'Create' }} Article</h4>
            <div class="card">
                <div class="card-body shadow">

                    <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                        @if (@$article)
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title"
                                placeholder="Judul Arikel..." value="{{ old('title', @$article->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="category">Category</label>
                            <select name="articel_category_id" class="form-select" aria-label="Select by Category" required>
                                <option>Pilih Kategori</option>
                                @foreach ($articel_categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('articel_category_id', @$article->articel_category_id) == $item->id ? 'selected' : '' }}
                                    > {{ $item->name }}
                                </option>

                                @endforeach
                            </select>
                        </div>

                        @if (@$article)
                            <div class="form-label fw-semibold mb-1">Old Image</div>
                            <img class="mb-4" src=" {{ $article->getFirstMediaUrl('image') }}"
                            style="max-width: 200px; height: auto">

                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">{{ @$article ? 'New' : 'Choose'}} Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="{{@$article ? old('images', @$article->getFirstMediaUrl('image')) : ''}}" required>
                        </div>



                        <div class="mb-4">
                            <img src="#" id="preview-image" style="display:none; width:200px;">
                        </div>

                        <div class="mb-4" >
                            <label class="form-label fw-semibold" for="content">Content</label>
                                <textarea id="editor" name="content" class="form-control" placeholder="Tulis Content..." rows="4">{{ @$article->content}}</textarea>

                            </div>

                        <button type="submit" class="btn btn-info" style="float: right">{{ @$article ? 'Save' : 'Submit' }}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content -->

    <script>
        // Mendeteksi perubahan pada input file dan menampilkan preview gambar
        document.getElementById("image").addEventListener("change", function(event) {
            // Mendapatkan file yang dipilih
            const file = event.target.files[0];

            // Membuat FileReader object
            const reader = new FileReader();

            // Setelah file terbaca, tampilkan preview gambar
            reader.onload = function(e) {
                document.getElementById("preview-image").src = e.target.result;
                document.getElementById("preview-image").style.display = "block";
            }

            // Membaca file sebagai URL
            reader.readAsDataURL(file);
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                ckfinder: {
                    // uploadUrl: ''?_token='.csrf_token()}}',
                }
            })
            .catch( error => {

            } );
    </script> --}}

</x-app-layout>
