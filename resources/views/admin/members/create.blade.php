<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter un membre') }}
            </h2>
            <a href="{{ route('admin.members.index') }}" class="text-blue-500 hover:text-blue-700">
                {{ __('Retour aux membres') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="{{ route('admin.members.store') }}" method="POST" class="p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700">{{ __('Prénom') }}</label>
                                <input type="text" name="first_name" id="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('first_name') }}" required>
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('Nom de famille') }}</label>
                                <input type="text" name="last_name" id="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('last_name') }}" required>
                            </div>

                            <div>
                                <label for="region_id" class="block text-sm font-medium text-gray-700">{{ __('Région') }}</label>
                                <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Sélectionner une région') }}</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="province_id" class="block text-sm font-medium text-gray-700">{{ __('Province') }}</label>
                                <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Sélectionner une province') }}</option>
                                </select>
                            </div>

                            <div>
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">{{ __('Date de naissance') }}</label>
                                <input type="date" name="birth_date" id="birth_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('birth_date') }}" required>
                            </div>

                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('Genre') }}</label>
                                <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="male">{{ __('Homme') }}</option>
                                    <option value="female">{{ __('Femme') }}</option>
                                </select>
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Téléphone') }}</label>
                                <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('phone') }}" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('email') }}">
                            </div>

                            <div>
                                <label for="profession_id" class="block text-sm font-medium text-gray-700">{{ __('Profession') }}</label>
                                <select name="profession_id" id="profession_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Select Profession') }}</option>
                                    @foreach($professions as $profession)
                                        <option value="{{ $profession->id }}" {{ old('profession_id') == $profession->id ? 'selected' : '' }}>
                                            {{ $profession->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="specialization_id" class="block text-sm font-medium text-gray-700">{{ __('Specialization') }}</label>
                                <select name="specialization_id" id="specialization_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Select Specialization') }}</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>
                                            {{ $specialization->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="education_level_id" class="block text-sm font-medium text-gray-700">{{ __('Education Level') }}</label>
                                <select name="education_level_id" id="education_level_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Select Education Level') }}</option>
                                    @foreach($educationLevels as $level)
                                        <option value="{{ $level->id }}" {{ old('education_level_id') == $level->id ? 'selected' : '' }}>
                                            {{ $level->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="branch" class="block text-sm font-medium text-gray-700">{{ __('Branch') }} ({{ __('Optional') }})</label>
                                <input type="text" name="branch" id="branch" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('branch') }}">
                            </div>

                            <div>
                                <label for="structure_position_id" class="block text-sm font-medium text-gray-700">{{ __('Structure Position') }}</label>
                                <select name="structure_position_id" id="structure_position_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">{{ __('Select Structure Position') }}</option>
                                    @foreach($structurePositions as $position)
                                        <option value="{{ $position->id }}" {{ old('structure_position_id') == $position->id ? 'selected' : '' }}>
                                            {{ $position->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="academic_year" class="block text-sm font-medium text-gray-700">{{ __('Academic Year') }}</label>
                                <input type="text" name="academic_year" id="academic_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('academic_year') }}" required>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full bg-black hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Créer un membre') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const regionSelect = document.getElementById('region_id');
        const provinceSelect = document.getElementById('province_id');

        regionSelect.addEventListener('change', function() {
            const regionId = this.value;
            provinceSelect.innerHTML = '<option value="">{{ __('Sélectionner une province') }}</option>';

            if (regionId) {
                fetch(`/api/provinces/${regionId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(province => {
                            provinceSelect.innerHTML += `<option value="${province.id}">${province.name_ar}</option>`;
                        });
                    });
            }
        });
    });
    </script>
</x-app-layout>
