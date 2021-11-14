<div>
    <x-button.primary type="button" wire:click="export">
        <x-icon.download />
        {{ __('Export') }}
    </x-button.primary>

    @if($exporting && ! $exportFinished)
        <div class="inline" wire:poll="updateExportProgress">Exporting... please wait.</div>
    @endif

    @if($exportFinished)
        Done. Download file <a class="text-blue-900 underline font-extrabold" wire:click="downloadExport">here</a>
    @endif
</div>

