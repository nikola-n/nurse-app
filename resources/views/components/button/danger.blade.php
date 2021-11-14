<button
    {{ $attributes->merge([
      'type' => 'button',
    'class' => "border-red-300 inline-flex items-center px-4 py-2 bg-red-800 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-red-50 active:text-red-800 hover:text-red-500"]) }}
>
    {{ $slot }}
</button>
