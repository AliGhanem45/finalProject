<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form enctype="multipart/form-data" method="post" action="{{ route('profile.update',Auth::user()->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Name:')" />
            <x-text-input id="name" name="name" type="text" class="my-3 block w-full" :value="old('name', $user->name)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div> 

        <div>
            <x-input-label for="email" :value="__('Email:')" />
            <x-text-input id="email" name="email" type="email" class="my-3 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="profilePic" :value="__('Choose profile Pic:')"/>
            <input id="profilePic" name="profilePic" type="file" class="my-3 inline-flex items-center px-4 py-2 bg-white border-black border-rounded-md font-semibold text-xs text-black uppercase tracking-widest shadow-sm hover:text-xs hover:bg-gray-700 hover:border-black-700 border hover:file-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"/>
            <x-input-error class="mt-2" :messages="$errors->get('profilePic')" />
        </div>
         <div>
            <x-input-label for="coverPic" :value="__('Choose Cover Pic:')"/>
            <input id="coverPic" name="coverPic" type="file" class=" my-3 inline-flex items-center px-4 py-2 bg-white border-black border rounded-md font-semibold text-xs text-black uppercase tracking-widest shadow-sm hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"/>
            <x-input-error class="mt-2" :messages="$errors->get('coverPic')" />
        </div>
         <div>
            <x-input-label for="bio" :value="__('Write a bio:')"/>
            <x-textarea-input :value="old('bio', $user->bio)" id="bio" name="bio"></x-textarea-input>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>
        <div>
            <x-input-label for="location" :value="__('Your location:')" />
            <x-text-input :value="old('location', $user->location)" id="location" name="location" type="text" class="my-3 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>
        <div>
            <x-input-label for="profession" :value="__('Your Profession:')" />
            <x-text-input :value="old('profession', $user->profession)" id="profession" name="profession" type="text" class="my-3 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('profession')" />
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" form="delete-profile-pic" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Delete profile pic') }}</button>
            <button type="submit" form="delete-cover-pic" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Delete cover pic') }}</button>

        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <div>
        <form id="delete-profile-pic" action="{{ route('delete.profile.pic', Auth::user()->id)}}" method="POST">
        @csrf
        @method('delete')
    </form>
    </div>
    <div><form id = "delete-cover-pic" action = "{{ route('delete.cover.pic', Auth::user()->id)}}" method = "POST">
        @csrf
        @method('delete')
    </form>
</div>    
</section>
