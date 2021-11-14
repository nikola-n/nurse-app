<div>
    <div class="mt-5 md:mt-0 max-w-lg mx-auto">
        <form wire:submit.prevent="save">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    @if ($successMessage)
                        <div class="rounded-md bg-green-50 p-4 mt-8">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-medium text-green-800">
                                        {{ $successMessage }}
                                    </p>
                                </div>
                                <div class="ml-auto pl-3">
                                    <div class="-mx-1.5 -my-1.5">
                                        <button type="button" wire:click="$set('successMessage', null)"
                                                class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                                aria-label="Dismiss">
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="diastolic_pressure" class="block text-sm font-medium text-gray-700">
                                {{ __('Diastolic Pressure') }}
                            </label>
                            <x-input.text wire:model="diastolic_pressure" type="number" name="diastolic_pressure" id="diastolic_pressure" :error="$errors->first('diastolic_pressure')" leadingAddOn="mm Hg"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="systolic_pressure" class="block text-sm font-medium text-gray-700">
                                {{ __('Systolic Pressure') }}
                            </label>
                            <x-input.text wire:model="systolic_pressure" type="number" name="systolic_pressure" id="systolic_pressure" :error="$errors->first('systolic_pressure')" leadingAddOn="mm Hg"/>
                        </div>
                    </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="status" class="block text-sm font-medium text-gray-700">
                                    {{ __('Status') }}
                                </label>
                                <x-input.select wire:model="status" id="status" name="status">
                                    @foreach (statusOptions() as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                            </div>
                        </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="measured_at" class="block text-sm font-medium text-gray-700">
                                {{ __('Measured On') }}
                            </label>
                            <x-input.date wire:model="measured_at" name="measured_at" id="measured_at"  :error="$errors->first('measured_at')" />

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 flex justify-between sm:px-6">
                        <button type="button" wire:click="back()" class="inline-flex justify-start py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            {{ __('Back') }}
                        </button>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

