<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Total Members -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Members') }}</h3>
                            <p class="text-3xl font-bold mt-2">{{ \App\Models\Member::count() }}</p>
                        </div>

                        <!-- Total Professions -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Professions') }}</h3>
                            <p class="text-3xl font-bold mt-2">{{ \App\Models\Profession::count() }}</p>
                        </div>

                        <!-- Total Income -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Income') }}</h3>
                            <p class="text-3xl font-bold mt-2 text-green-600">{{ number_format(\App\Models\Income::sum('amount'), 2) }} DH</p>
                        </div>

                        <!-- Total Expenses -->
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-700">{{ __('Total Expenses') }}</h3>
                            <p class="text-3xl font-bold mt-2 text-red-600">{{ number_format(\App\Models\Expense::sum('amount'), 2) }} DH</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Quick Actions') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="{{ route('admin.members.create') }}" class="block p-6 bg-white rounded-lg shadow hover:bg-gray-50">
                                <h4 class="font-semibold">{{ __('Add New Member') }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ __('Register a new member in the system') }}</p>
                            </a>
                            <a href="{{ route('admin.expenses.create') }}" class="block p-6 bg-white rounded-lg shadow hover:bg-gray-50">
                                <h4 class="font-semibold">{{ __('Record Expense') }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ __('Record a new expense transaction') }}</p>
                            </a>
                            <a href="{{ route('admin.incomes.create') }}" class="block p-6 bg-white rounded-lg shadow hover:bg-gray-50">
                                <h4 class="font-semibold">{{ __('Record Income') }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ __('Record a new income transaction') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
