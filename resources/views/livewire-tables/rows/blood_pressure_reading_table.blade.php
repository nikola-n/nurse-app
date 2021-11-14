<x-livewire-tables::table.cell>
    {{ $row->systolic_blood_pressure }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->diastolic_blood_pressure }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium leading-4 bg-{{ explode('-',$row->status_color)[0] }}-100 text-{{ $row->status_color }} capitalize">
        {{ $row->status }}
    </span>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->measured_at }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <x-button.secondary wire:click="editBloodPressure({{ $row }})">
        {{ __('Edit') }}
    </x-button.secondary>
</x-livewire-tables::table.cell>
