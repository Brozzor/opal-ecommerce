<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration de l\'utilisateur n° ') }}{{ $user->id }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a type="button" href="/admin/users" class=" mb-1 px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
                Retour
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-8">
                                            <label class="block font-medium text-sm text-gray-700" for="name">
                                                Nom
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="name" value="{{ $user->name }}">
                                        </div>

                                        <div class="col-span-8">
                                            <label class="block font-medium text-sm text-gray-700" for="text">
                                                Mail
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="email" value="{{ $user->email }}">
                                        </div>

                                        <div class="col-span-8">
                                            <label class="block font-medium text-sm text-gray-700" for="text">
                                                Rang
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="number" name="rank" value="{{ $user->rank }}">
                                        </div>


                                        <div class="col-span-8">
                                            <label class="block font-medium text-sm text-gray-700" for="text">
                                                Date de création
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full opacity-50" type="text" disabled="disabled" value="{{ $user->created_at }}">
                                        </div>

                                        <div class="col-span-8">
                                            <label class="block font-medium text-sm text-gray-700" for="text">
                                                Dernière mise à jour
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full opacity-50" type="text" disabled="disabled" value="{{ $user->updated_at }}">
                                        </div>

                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a type="button" href="/admin/users" class="inline-flex items-center mr-1 px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
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