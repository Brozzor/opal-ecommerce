<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration de l\'article n° ') }}{{ $article->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div>
                    <h2 class="text-xl font-bold text-gray-900">{{ $article->name }}</h2>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form wire:submit.prevent="updateProfileInformation">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!-- Profile Photo -->

                                        <!-- Name -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="name">
                                                Name
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name" type="text" wire:model.defer="state.name" autocomplete="name">
                                        </div>

                                        <!-- Email -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="email">
                                                Email
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" type="email" wire:model.defer="state.email">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('3lXlw5iPkHPw5pWtl6yw').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;" class="text-sm text-gray-600 mr-3">
                                        Saved.
                                    </div>

                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>