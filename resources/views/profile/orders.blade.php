<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div>
                    <table class="min-w-full table-auto">
                      <thead class="justify-between">
                        <tr class="bg-gray-800">
                          <th class="px-8 py-2">
                            <span class="text-gray-300">commande n°</span>
                          </th>
              
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Crée le</span>
                          </th>

                          <th class="px-8 py-2">
                            <span class="text-gray-300">Prix</span>
                          </th>

                          <th class="px-8 py-2">
                            <span class="text-gray-300">Status</span>
                          </th>

                          <th class="px-8 py-2">
                            <span class="text-gray-300"></span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-gray-200">
                        @foreach($orders as $order) 
                        <tr class="bg-white border-b border-gray-200">
                          <td>
                            <span class="text-center ml-2 font-semibold">{{ $order->id }}</span>
                          </td>

                          <td class="px-8 py-2">
                            <span>{{ $order->created_at }}</span>
                          </td>

                          <td class="px-8 py-2">
                            <span>{{ $order->price }}€</span>
                          </td>

                          <td class="px-8 py-2">
                            <span>{{ $order->status }}</span>
                          </td>

                          <td class="px-8 py-2">
                            <a href="" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                voir
                            </a>
                          </td>

                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                   
                  </div>
            </div>
            <div class="mt-3">
              
            </div>
            
        </div>
    </div>
</x-app-layout>