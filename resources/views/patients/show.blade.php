<x-app-layout>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Patient Information
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Personal details and diagnosis.
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Full name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $patient->name }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Email address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $patient->email }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Phone
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $patient->phone }}
                    </dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">
                        About
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-3">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-3">
                Blood Pressure History
            </h3>
            <div class="float-right ml-2">
                <x-button.primary href="{{ route('patients.readings.create', $patient) }}">
                    <x-icon.plus />
                    {{ __('Add Reading') }}
                </x-button.primary>
            </div>
            <livewire:blood-pressure-reading-table :patient="$patient" />
        </div>
    </div>
</x-app-layout>
