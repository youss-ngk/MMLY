<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Spécialisations') }}
            </h2>
            <a href="{{ route('admin.specializations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Ajouter une spécialisation') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nom en français') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nom en arabe') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nom en anglais') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Nombre de membres') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($specializations as $specialization)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $specialization->name_fr }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $specialization->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $specialization->name_en }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $specialization->members_count }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.specializations.edit', $specialization) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            {{ __('Modifier') }}
                                        </a>
                                        <form action="{{ route('admin.specializations.destroy', $specialization) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette spécialisation?') }}')">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center">
                                        {{ __('Aucune spécialisation trouvée') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $specializations->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
