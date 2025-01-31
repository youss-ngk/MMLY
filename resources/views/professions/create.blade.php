<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Profession') }}
        </h2>
    </x-slot>

    <form action="{{ route('professions.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <x-label for="name_ar" :value="__('Name (Arabic)')" />
            <x-input id="name_ar" type="text" name="name_ar" :value="old('name_ar')" required autofocus
                class="mt-1 block w-full" :error="$errors->has('name_ar')" />
            @error('name_ar')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <x-label for="name_en" :value="__('Name (English)')" />
            <x-input id="name_en" type="text" name="name_en" :value="old('name_en')"
                class="mt-1 block w-full" :error="$errors->has('name_en')" />
            @error('name_en')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-button type="submit">
                {{ __('Create Profession') }}
            </x-button>
            <x-button type="button" href="{{ route('professions.index') }}" color="secondary">
                {{ __('Cancel') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
