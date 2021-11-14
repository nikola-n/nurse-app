<x-app-layout>
    <x-slot name="title">
        {{ __('Patients') }}
    </x-slot>

    <div class="flex justify-between mb-3">
        <livewire:patients.patient-export />
        <x-button.primary href="{{ route('patients.create') }}">
            <x-icon.plus />
            {{ __('Add Patient') }}
        </x-button.primary>
    </div>
    <livewire:patient-table />
</x-app-layout>
