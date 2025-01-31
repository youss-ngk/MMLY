<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails du Membre') }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('admin.members.edit', $member) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Modifier') }}
                </a>
                <a href="{{ route('admin.members.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Retour') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Informations Personnelles') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Nom Complet') }}</label>
                                    <p class="mt-1 text-lg">{{ $member->first_name }} {{ $member->last_name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Date de Naissance') }}</label>
                                    <p class="mt-1">{{ $member->birth_date }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Genre') }}</label>
                                    <p class="mt-1">{{ $member->gender === 'male' ? __('Homme') : __('Femme') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Email') }}</label>
                                    <p class="mt-1">{{ $member->email ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Téléphone') }}</label>
                                    <p class="mt-1">{{ $member->phone }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Localisation') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Région') }}</label>
                                    <p class="mt-1">{{ $member->region->name_ar }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Province') }}</label>
                                    <p class="mt-1">{{ $member->province->name_ar }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Professional Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Informations Professionnelles') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Profession') }}</label>
                                    <p class="mt-1">{{ $member->profession->name_ar }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Spécialisation') }}</label>
                                    <p class="mt-1">{{ $member->specialization->name_ar }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Niveau d\'éducation') }}</label>
                                    <p class="mt-1">{{ $member->educationLevel->name_ar }}</p>
                                </div>
                                @if($member->branch)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Branche') }}</label>
                                    <p class="mt-1">{{ $member->branch }}</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Organization Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Informations Organisationnelles') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Position Structurelle') }}</label>
                                    <p class="mt-1">{{ $member->structurePosition->name_ar }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500">{{ __('Année Académique') }}</label>
                                    <p class="mt-1">{{ $member->academic_year }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
