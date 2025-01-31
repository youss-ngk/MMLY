<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier le Rapport de Cartes') }}
            </h2>
            <a href="{{ route('admin.card-reports.index') }}" class="text-blue-500 hover:text-blue-700">
                {{ __('Retour aux Rapports') }}
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
                    <form method="POST" action="{{ route('admin.card-reports.update', $cardReport) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="academic_year" :value="__('Année Académique')" />
                            <x-text-input id="academic_year" name="academic_year" type="text" class="mt-1 block w-full" :value="old('academic_year', $cardReport->academic_year)" required />
                            <x-input-error :messages="$errors->get('academic_year')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="region_id" :value="__('Région')" />
                            <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Sélectionner une Région') }}</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $cardReport->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->name_fr }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('region_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="province_id" :value="__('Province')" />
                            <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Sélectionner une Province') }}</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old('province_id', $cardReport->province_id) == $province->id ? 'selected' : '' }}>
                                        {{ $province->name_fr }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="notes" :value="__('Notes')" />
                            <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes', $cardReport->notes) }}</textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Mettre à jour') }}
                            </x-primary-button>
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
