@push('styles')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

<x-app-layout>
<div class="content container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="profile-cover mb-3">
                <div class="profile-cover-img-wrapper">
                  <img class="profile-cover-img" src="{{asset('dist')}}/assets/img/1920x400/img2.jpg" alt="Image Description">
                </div>
              </div>

              <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar mb-5" for="editAvatarUploaderModal">
                {{-- @if ($user->getFirstMediaUrl('images'))
                <img id="editAvatarImgModal" class="avatar-img" src="{{$user->getFirstMediaUrl('images')}}" alt="Image Description">
            @else --}}
                    <img id="editAvatarImgModal" class="avatar-img" src="{{asset('dist')}}/assets/img/160x160/img1.jpg" alt="Image Description">
                {{-- @endif --}}

              </label>

            @include('profile.partials.update-password-form')

        </div>
    </div>
</div>
</x-app-layout>
