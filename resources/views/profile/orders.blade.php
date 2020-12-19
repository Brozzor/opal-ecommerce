<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration des orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <center>
      <a type="button" href="/admin/order/add" class=" mb-1 px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
                Ajouter un order
            </a></center>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div>
                    <table class="min-w-full table-auto">
                      <thead class="justify-between">
                        <tr class="bg-gray-800">
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Nom</span>
                          </th>
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Couleur</span>
                          </th>
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Genre</span>
                          </th>
              
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Marque</span>
                          </th>
              
                          <th class="px-8 py-2">
                            <span class="text-gray-300">Crée le</span>
                          </th>

                          <th class="px-8 py-2">
                            <span class="text-gray-300"></span>
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
                            <span class="text-center ml-2 font-semibold">{{ $order->name }}</span>
                          </td>
                          <td class="px-8 py-2">
                            <span class="text-center ml-2 font-semibold">{{ $order->color }}</span>
                          </td>
                          <td class="px-8 py-2">
                            <span>{{ $order->genre }}</span>
                          </td>
                          <td class="px-8 py-2">
                            <span>{{ $order->brand }}</span>
                          </td>
              
                          <td class="px-8 py-2">
                            <span>{{ $order->created_at }}</span>
                          </td>

                          <td class="px-8 py-2">
                            <a href="{{ route('orders.edit', $order->id) }}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                éditer
                            </a>
                          </td>

                          <td class="px-8 py-2">
                            <form action="{{ route('orders.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-red-500 hover:text-black ">
                               supprimer
                            </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                   
                  </div>
            </div>
            <div class="mt-3">
              {{ $orders->links() }}
            </div>
            
        </div>
    </div>
</x-app-layout>