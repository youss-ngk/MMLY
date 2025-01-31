<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Liste des Membres') }}
            </h2>
            <a href="{{ route('admin.members.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Ajouter un Membre') }}
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
                    <form method="GET" action="{{ route('admin.members.index') }}" class="space-y-4">
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

                            <div>
                                <x-input-label for="profession_id" :value="__('Profession')" />
                                <select name="profession_id" id="profession_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Professions') }}</option>
                                    @foreach($professions as $profession)
                                        <option value="{{ $profession->id }}" {{ request('profession_id') == $profession->id ? 'selected' : '' }}>
                                            {{ $profession->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="specialization_id" :value="__('Spécialisation')" />
                                <select name="specialization_id" id="specialization_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Spécialisations') }}</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" {{ request('specialization_id') == $specialization->id ? 'selected' : '' }}>
                                            {{ $specialization->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="structure_position_id" :value="__('Position Structurelle')" />
                                <select name="structure_position_id" id="structure_position_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Toutes les Positions') }}</option>
                                    @foreach($structurePositions as $position)
                                        <option value="{{ $position->id }}" {{ request('structure_position_id') == $position->id ? 'selected' : '' }}>
                                            {{ $position->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="gender" :value="__('Genre')" />
                                <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Tous les Genres') }}</option>
                                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>{{ __('Homme') }}</option>
                                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>{{ __('Femme') }}</option>
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

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Total des Membres') }}</div>
                        <div class="mt-1 text-2xl font-semibold">{{ number_format($stats['total_members']) }}</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Distribution par Genre') }}</div>
                        <div class="mt-1">
                            <div class="flex items-center justify-between">
                                <span>{{ __('Hommes') }}:</span>
                                <span class="font-semibold">{{ number_format($stats['gender_distribution']['male'] ?? 0) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>{{ __('Femmes') }}:</span>
                                <span class="font-semibold">{{ number_format($stats['gender_distribution']['female'] ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Top Régions') }}</div>
                        <div class="mt-1 space-y-1">
                            @foreach($stats['by_region']->take(3) as $region => $count)
                                <div class="flex items-center justify-between">
                                    <span>{{ $region }}</span>
                                    <span class="font-semibold">{{ number_format($count) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <div class="text-sm font-medium text-gray-500">{{ __('Top Professions') }}</div>
                        <div class="mt-1 space-y-1">
                            @foreach($stats['by_profession']->take(3) as $profession => $count)
                                <div class="flex items-center justify-between">
                                    <span>{{ $profession }}</span>
                                    <span class="font-semibold">{{ number_format($count) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Members Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nom Complet') }}
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Région') }}
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Province') }}
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Profession') }}
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Position') }}
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($members as $member)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $member->first_name }} {{ $member->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $member->region->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $member->province->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $member->profession->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ $member->structurePosition->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.members.show', $member) }}" class="text-blue-500 hover:text-blue-700 ml-2">
                                            {{ __('Voir') }}
                                        </a>
                                        <a href="{{ route('admin.members.edit', $member) }}" class="text-blue-500 hover:text-blue-700 ml-2">
                                            {{ __('Modifier') }}
                                        </a>
                                        <form action="{{ route('admin.members.destroy', $member) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce membre ?') }}')">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $members->links() }}
                    </div>
                </div>
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

                fetch(`/admin/api/regions/${regionId}/provinces`)
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
