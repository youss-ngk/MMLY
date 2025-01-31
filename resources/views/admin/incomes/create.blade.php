<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter un revenu') }}
            </h2>
            <a href="{{ route('admin.incomes.index') }}" class="text-blue-500 hover:text-blue-700">
                {{ __('Retour aux revenus') }}
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
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

            <form action="{{ route('admin.incomes.store') }}" method="POST" class="bg-white shadow-sm rounded-lg p-6">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">{{ __('Type') }}</label>
                        <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">{{ __('Sélectionner le type') }}</option>
                            <option value="cards" {{ old('type') == 'cards' ? 'selected' : '' }}>{{ __('Cartes') }}</option>
                            <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">{{ __('Date') }}</label>
                        <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('date') }}" required>
                    </div>

                    <div>
                        <label for="academic_year" class="block text-sm font-medium text-gray-700">{{ __('Année académique') }}</label>
                        <input type="text" name="academic_year" id="academic_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('academic_year') }}" required>
                    </div>

                    <div>
                        <label for="region_id" class="block text-sm font-medium text-gray-700">{{ __('Region') }}</label>
                        <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">{{ __('Select Region') }}</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                    {{ $region->name_ar }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="province_id" class="block text-sm font-medium text-gray-700">{{ __('Province') }}</label>
                        <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">{{ __('Select Province') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="count" class="block text-sm font-medium text-gray-700">{{ __('Count') }}</label>
                        <input type="number" name="count" id="count" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('count') }}" required>
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">{{ __('Amount') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="number" step="0.01" name="amount" id="amount" class="block w-full pr-12 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('amount') }}" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">{{ __('MAD') }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">{{ __('Notes') }}</label>
                        <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Créer un revenu') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const regionSelect = document.getElementById('region_id');
        const provinceSelect = document.getElementById('province_id');
        
        // Function to update provinces based on selected region
        function updateProvinces() {
            const regionId = regionSelect.value;
            if (regionId) {
                fetch(`/api/regions/${regionId}/provinces`)
                    .then(response => response.json())
                    .then(provinces => {
                        provinceSelect.innerHTML = `<option value="">{{ __('Select Province') }}</option>`;
                        provinces.forEach(province => {
                            provinceSelect.innerHTML += `<option value="${province.id}">${province.name_ar}</option>`;
                        });
                    });
            } else {
                provinceSelect.innerHTML = `<option value="">{{ __('Select Province') }}</option>`;
            }
        }

        // Update provinces when region changes
        regionSelect.addEventListener('change', updateProvinces);
    });
    </script>
    @endpush
</x-app-layout>
