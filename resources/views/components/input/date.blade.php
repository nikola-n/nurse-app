@props(['error' => false])

<div class="mt-1 flex rounded-md shadow-sm">
    <input type="date" {{ $attributes->merge(['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md']) }}>
</div>

@if ($error)
    <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
@endif
