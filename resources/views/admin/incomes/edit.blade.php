<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Income') }}
            </h2>
            <a href="{{ route('admin.incomes.index') }}" class="text-blue-500 hover:text-blue-700">
                {{ __('Back to Incomes') }}
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
                    <form method="POST" action="{{ route('admin.incomes.update', $income) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Select Type') }}</option>
                                <option value="cards" {{ old('type', $income->type) == 'cards' ? 'selected' : '' }}>{{ __('Cards') }}</option>
                                <option value="other" {{ old('type', $income->type) == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $income->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('date', $income->date) }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('date')" />
                        </div>

                        <div>
                            <x-input-label for="academic_year" :value="__('Academic Year')" />
                            <input type="text" name="academic_year" id="academic_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('academic_year', $income->academic_year) }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('academic_year')" />
                        </div>

                        <div>
                            <x-input-label for="region_id" :value="__('Region')" />
                            <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Select Region') }}</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region_id', $income->region_id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('region_id')" />
                        </div>

                        <div>
                            <x-input-label for="province_id" :value="__('Province')" />
                            <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="">{{ __('Select Province') }}</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old('province_id', $income->province_id) == $province->id ? 'selected' : '' }}>
                                        {{ $province->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('province_id')" />
                        </div>

                        <div>
                            <x-input-label for="count" :value="__('Count')" />
                            <input type="number" name="count" id="count" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('count', $income->count) }}" required>
                            <x-input-error class="mt-2" :messages="$errors->get('count')" />
                        </div>

                        <div>
                            <x-input-label for="amount" :value="__('Amount')" />
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="number" step="0.01" name="amount" id="amount" class="block w-full pr-12 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('amount', $income->amount) }}" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">{{ __('MAD') }}</span>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                        </div>

                        <div>
                            <x-input-label for="notes" :value="__('Notes')" />
                            <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes', $income->notes) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('notes')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Update Income') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    const currentProvinceId = "{{ old('province_id', $income->province_id) }}";
                    provinceSelect.innerHTML = `<option value="">{{ __('Select Province') }}</option>`;
                    provinces.forEach(province => {
                        const selected = province.id == currentProvinceId ? 'selected' : '';
                        provinceSelect.innerHTML += `<option value="${province.id}" ${selected}>${province.name_ar}</option>`;
                    });
                });
        } else {
            provinceSelect.innerHTML = `<option value="">{{ __('Select Province') }}</option>`;
        }
    }

    // Update provinces when region changes
    regionSelect.addEventListener('change', updateProvinces);
    
    // Initial load of provinces
    if (regionSelect.value) {
        updateProvinces();
    }
});
</script>
@endpush
