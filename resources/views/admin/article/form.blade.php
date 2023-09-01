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
                            <label class="form-label fw-semibold" for="description">Sub Title</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Tulis Sub Judul..." rows="3">{{ @$article->description }}</textarea>
                            {{-- <input type="text" id="description" class="form-control" name="description"
                                placeholder="Sub Judul Arikel..." value="{{ old('description', @$article->description) }}" required> --}}
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="category">Category</label>
                            <select name="articel_category_id" class="form-select" aria-label="Select by Category"
                                required>
                                <option>Pilih Kategori</option>
                                @foreach ($articel_categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('articel_category_id', @$article->articel_category_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if (@$article)
                            <div class="form-label fw-semibold mb-1">Old Cover Image</div>
                            <img class="mb-4" src=" {{ $article->getFirstMediaUrl('image') }}"
                                style="max-width: 200px; height: auto">
                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">{{ @$article ? 'New' : 'Choose' }}
                                Cover Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                value="{{ @$article ? old('image', @$article->getFirstMediaUrl('image')) : '' }}"
                                {{ @$article ? '' : 'required' }}>
                        </div>



                        <div class="mb-4">
                            <img src="#" id="preview-image" style="display:none; width:200px;">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="content">Content</label>

                            <textarea id="editor" name="content" class="form-control" placeholder="Tulis Content..." rows="4">{{ @$article->content }}</textarea>

                        </div>

                        <div class="col" style="float: right">
                            <a class="btn btn-outline-info me-1" href="{{ route('admin.article.index') }}">Cancel
                            </a>
                            <button type="submit" class="btn btn-info">{{ @$article ? 'Save' : 'Submit' }}</button>
                        </div>


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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('admin.ckeditor.upload') }}'
                },
            })
            .then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return new MyUploadAdapter(loader);
                };
            })
            .catch(error => {
                console.error(error);
            });

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file.then(file => new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append('upload', file);

                    axios.post('{{ route('admin.ckeditor.upload') }}', formData).then(response => {
                        resolve({
                            default: response.data.url
                        });
                    }).catch(error => {
                        reject(error);
                    });
                }));
            }

            // upload() {
            //     // Tunggu hingga form disubmit
            //     return this.loader.file.then(file => new Promise((resolve, reject) => {
            //         const submitButton = document.querySelector('button[type="submit"]');
            //         submitButton.addEventListener('click', () => {
            //             const formData = new FormData();
            //             formData.append('upload', file);

            //             axios.post('{{ route('admin.ckeditor.upload') }}', formData).then(response => {
            //                 resolve({
            //                     default: response.data.url
            //                 });
            //             }).catch(error => {
            //                 reject(error);
            //             });
            //         });
            //     }));
            // }

        }
    </script>



    {{-- <script>
    function delaySubmit() {
        var submitButton = document.querySelector('.btn-info');
        submitButton.disabled = true; // Menonaktifkan tombol submit
        submitButton.textContent = 'Submitting...'; // Mengganti teks tombol

        setTimeout(function() {
            submitButton.disabled = false; // Mengaktifkan tombol kembali setelah penundaan
            submitButton.textContent = '{{ @$article ? 'Save' : 'Submit' }}'; // Mengembalikan teks tombol
            document.getElementById('myForm').submit(); // Menjalankan form submission
        }, 2000); // Penundaan dalam milidetik (di sini 2000ms atau 2 detik)
    }
</script> --}}



</x-app-layout>
