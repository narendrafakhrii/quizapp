<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto">

            {{-- Profile Card --}}
            <div
                class="bg-white shadow rounded-lg p-6 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">

                {{-- Foto Profil dengan tombol edit & hapus --}}
                <div class="relative flex-shrink-0">
                    {{-- Foto Profil --}}
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-avatar.png') }}" alt="Avatar"
                        class="h-36 w-36 rounded-full object-cover border shadow-sm">

                    {{-- Tombol pensil overlay di pojok kanan bawah foto --}}
                    <div class="absolute bottom-0 right-0 mb-1 mr-1">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="bg-white border rounded-full p-3 shadow hover:bg-gray-100 flex items-center justify-center focus:outline-none transition">
                                    <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path>
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                {{-- Edit Photo --}}
                                <form method="POST" action="{{ route('profile.update_photo') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label
                                        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 
                                    hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition 
                                    duration-150 ease-in-out cursor-pointer">
                                        Edit Photo
                                        <input type="file" name="photo" accept="image/*" class="hidden"
                                            onchange="this.form.submit()">
                                    </label>
                                </form>

                                @if (Auth::user()->profile_photo_path)
                                    {{-- Delete Photo --}}
                                    <form method="POST" action="{{ route('profile.delete_photo') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('profile.delete_photo')"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="text-red-600">
                                            Delete Photo
                                        </x-dropdown-link>
                                    </form>
                                @endif
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>


                {{-- Informasi Profil --}}
                <div class="flex-1 w-full space-y-2">
                    <h2 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-500">{{ Auth::user()->username ?? 'username' }}</p>
                    <p class="text-gray-700">
                        {{ Auth::user()->bio ?? 'This is your bio. Update it to let people know more about you.' }}</p>
                </div>
            </div>

            {{-- Sections: Profile Info, Password, Delete --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Profile Information --}}
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>

                {{-- Update Password --}}
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Password</h3>
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Delete User --}}
                <div class="bg-white shadow rounded-lg p-6 md:col-span-2">
                    <h3 class="text-lg font-semibold text-red-600 mb-4">{{ __('Delete Account') }}</h3>
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
