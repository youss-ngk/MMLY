<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Professions') }}
            </h2>
            <a href="{{ route('admin.professions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Ajouter une profession') }}
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
                            @forelse ($professions as $profession)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $profession->name_fr }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $profession->name_ar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $profession->name_en }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $profession->members_count }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.professions.edit', $profession) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            {{ __('Modifier') }}
                                        </a>
                                        <form action="{{ route('admin.professions.destroy', $profession) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette profession?') }}')">
                                                {{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center">
                                        {{ __('Aucune profession trouvée') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $professions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
