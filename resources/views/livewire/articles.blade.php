<div class="p-2 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl">
        <div>Articles</div>
        {{$query}}
    </div>
    <div class="mt3">
        <div class="flex justify-between">
            <div>
                <input wire:model.debounce.500ms="q"  type="search" placeholder="BUscar" class="shadow appareance-none border rounded w-full 
                py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-blue-400">
            </div>
            <div class="mr-2">
                <input type="checkbox" class="mr-2 leading-tight" name="" wire:model="active"> ¿Solos Activos?
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Id</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">description</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">price</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">quantity</div>
                    </th>
                    <th class="px-4 py-2">
                        Status
                    </th>
                    <th class="px-4 py-2">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$article->id}}</td>
                        <td class="rounded border px-4 py-2">{{$article->name}}</td>
                        <td class="rounded border px-4 py-2">{{number_format($article->price)}}</td>
                        <td class="rounded border px-4 py-2">{{$article->quantity}}</td>
                        <td class="rounded border px-4 py-2">{{$article->status? 'Active' : 'Inactive'}}</td>
                        <td class="rounded border px-4 py-2">{{$article->quantity}}</td>
                        <td class="rounded border px-4 py-2">Editar / Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$articles->links()}}
    </div>
</div>