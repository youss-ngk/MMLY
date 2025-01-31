<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Rapport des Cartes') }}
            </h2>
            <a href="{{ route('admin.card-reports.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Créer un Rapport') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filters -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('admin.card-reports.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <x-input-label for="academic_year" :value="__('Année Académique')" />
                                <select name="academic_year" id="academic_year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Années') }}</option>
                                    @foreach($academicYears as $year)
                                        <option value="{{ $year }}" {{ request('academic_year') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="region_id" :value="__('Région')" />
                                <select name="region_id" id="region_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Régions') }}</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ request('region_id') == $region->id ? 'selected' : '' }}>
                                            {{ $region->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="province_id" :value="__('Province')" />
                                <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Provinces') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>
                                {{ __('Filtrer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Total Cartes') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($totals->total_cards) }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Montant Total') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($totals->total_amount, 2) }} {{ __('MAD') }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Part Bureau (50%)') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($totals->total_office_share, 2) }} {{ __('MAD') }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Part Région (20%)') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($totals->total_region_share, 2) }} {{ __('MAD') }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Part Province (30%)') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($totals->total_province_share, 2) }} {{ __('MAD') }}</div>
                    </div>
                </div>
            </div>

            <!-- Detailed Report -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Année Académique') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Région') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Province') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nombre de Cartes') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Montant Total') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Part Bureau') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Part Région') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Part Province') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reports as $report)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->academic_year }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->region->name_fr }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->province->name_fr }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($report->card_count) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($report->total_amount, 2) }} {{ __('MAD') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($report->office_share, 2) }} {{ __('MAD') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($report->region_share, 2) }} {{ __('MAD') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($report->province_share, 2) }} {{ __('MAD') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $reports->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regionSelect = document.getElementById('region_id');
            const provinceSelect = document.getElementById('province_id');
            
            // Function to update provinces
            function updateProvinces(regionId) {
                if (!regionId) {
                    provinceSelect.innerHTML = '<option value="">{{ __("Toutes les Provinces") }}</option>';
                    return;
                }

                fetch(`/api/provinces/${regionId}`)
                    .then(response => response.json())
                    .then(provinces => {
                        provinceSelect.innerHTML = '<option value="">{{ __("Toutes les Provinces") }}</option>';
                        provinces.forEach(province => {
                            let option = document.createElement('option');
                            option.value = province.id;
                            option.textContent = province.name_ar;
                            if (province.id == '{{ request('province_id') }}') {
                                option.selected = true;
                            }
                            provinceSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Initialize provinces if region is selected
            if (regionSelect.value) {
                updateProvinces(regionSelect.value);
            }

            // Update provinces when region changes
            regionSelect.addEventListener('change', function() {
                updateProvinces(this.value);
            });
        });
    </script>
</x-app-layout>
