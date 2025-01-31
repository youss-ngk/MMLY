<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Créer une Dépense') }}
            </h2>
            <a href="{{ route('admin.expenses.index') }}" class="text-blue-500 hover:text-blue-700">
                {{ __('Retour aux Dépenses') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.expenses.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Sélectionner le Type') }}</option>
                                <option value="cards" {{ old('type') == 'cards' ? 'selected' : '' }}>{{ __('Cartes') }}</option>
                                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('date') }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('date')" />
                        </div>

                        <div>
                            <x-input-label for="academic_year" :value="__('Année Académique')" />
                            <input type="text" name="academic_year" id="academic_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('academic_year') }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('academic_year')" />
                        </div>

                        <div>
                            <x-input-label for="region_id" :value="__('Région')" />
                            <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Sélectionner une Région') }}</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                        {{ $region->name_fr }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('region_id')" />
                        </div>

                        <div>
                            <x-input-label for="province_id" :value="__('Province')" />
                            <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Sélectionner une Province') }}</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('province_id')" />
                        </div>

                        <div>
                            <x-input-label for="count" :value="__('Nombre')" />
                            <input type="number" name="count" id="count" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('count') }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('count')" />
                        </div>

                        <div>
                            <x-input-label for="amount" :value="__('Montant')" />
                            <input type="number" name="amount" id="amount" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('amount') }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                        </div>

                        <div>
                            <x-input-label for="notes" :value="__('Notes')" />
                            <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('notes')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Créer') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('region_id').addEventListener('change', function() {
            let regionId = this.value;
            let provinceSelect = document.getElementById('province_id');
            
            // Clear current options
            provinceSelect.innerHTML = '<option value="">{{ __("Sélectionner une Province") }}</option>';
            
            if (regionId) {
                fetch(`/provinces/${regionId}`)
                    .then(response => response.json())
                    .then(provinces => {
                        provinces.forEach(province => {
                            let option = document.createElement('option');
                            option.value = province.id;
                            option.textContent = province.name_fr;
                            provinceSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
    @endpush
</x-app-layout>
