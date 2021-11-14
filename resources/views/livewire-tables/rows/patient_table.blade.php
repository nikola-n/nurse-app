<x-livewire-tables::table.cell>
    {{ $row->name }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->email }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->phone }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->date_of_birth }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <x-button.link wire:click="showPatient({{ $row }})">
        {{ __('View') }}
    </x-button.link>
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <x-button.secondary wire:click="editPatient({{ $row }})">
        {{ __('Edit') }}
    </x-button.secondary>
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <x-button.danger wire:click="deletePatient({{ $row }})">
        {{ __('Delete') }}
    </x-button.danger>
</x-livewire-tables::table.cell>
