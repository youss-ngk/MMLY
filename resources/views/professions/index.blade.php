<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Professions') }}
            </h2>
            <x-button href="{{ route('professions.create') }}" color="primary">
                {{ __('Add New Profession') }}
            </x-button>
        </div>
    </x-slot>

    <x-table>
        <x-slot name="header">
            <tr>
                <th scope="col" class="py-3 px-6">{{ __('Name (Arabic)') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('Name (English)') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('Members Count') }}</th>
                <th scope="col" class="py-3 px-6">{{ __('Actions') }}</th>
            </tr>
        </x-slot>

        @forelse($professions as $profession)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="py-4 px-6">{{ $profession->name_ar }}</td>
                <td class="py-4 px-6">{{ $profession->name_en }}</td>
                <td class="py-4 px-6">{{ $profession->members_count }}</td>
                <td class="py-4 px-6 flex space-x-2">
                    <x-button href="{{ route('professions.edit', $profession) }}" color="secondary">
                        {{ __('Edit') }}
                    </x-button>
                    <form action="{{ route('professions.destroy', $profession) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" color="danger" onclick="return confirm('{{ __('Are you sure you want to delete this profession?') }}')">
                            {{ __('Delete') }}
                        </x-button>
                    </form>
                </td>
            </tr>
        @empty
            <tr class="bg-white border-b">
                <td colspan="4" class="py-4 px-6 text-center text-gray-500">
                    {{ __('No professions found') }}
                </td>
            </tr>
        @endforelse
    </x-table>

    <div class="mt-4">
        {{ $professions->links() }}
    </div>
</x-app-layout>
