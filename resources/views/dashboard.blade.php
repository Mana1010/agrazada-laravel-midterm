<x-app-layout>
<div class="flex flex-col py-3 px-5 h-full relative">
    <div class=" py-5">
    <h1 class=" font-semibold flex items-center"><span class="text-6xl text-purple-500"><ion-icon name="add-circle-outline"></ion-icon></span>
        <span class="text-4xl text-slate-800 font-extrabold">ADD PRODUCT FORM</span>
    </h1>
</div>

   @if(session('success'))
   <script>
    alert("{{session('success')}}")
</script>

   @endif
    <form method="POST" action="{{route('product.store')}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6 border-purple-600 border rounded-md">
        @csrf
        <h1 class=" font-semibold flex items-center space-x-1">
            <span class="text-lg text-slate-800 font-extrabold">FILL UP THE FORM</span>
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
            <div class="flex flex-col space-y-1">
                <label for="product_name" class="text-[0.8rem] font-bold text-purple-600">PRODUCT NAME</label>
                <input required type="text" id="product_name" name="product_name" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="category" class="text-[0.8rem] font-bold text-purple-600">PRODUCT CATEGORY</label>
                <input required type="text" id="category" name="category" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="price" class="text-[0.8rem] font-bold text-purple-600">PRICE</label>
                <input required type="number" id="price" name="price" min="1" step="any" value={{1.1}} class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="stock_quantity" class="text-[0.8rem] font-bold text-purple-600">STOCK QUANTITY</label>
                <input required type="number" id="stock_quantity" name="stock_quantity" value={{1}} class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1 col-span-2">
                <label for="manufacturer" class="text-[0.8rem] font-bold text-purple-600">MANUFACTURER</label>
                <input required type="string" id="manufacturer" name="manufacturer" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1  col-span-2">
                <label for="description" class="text-[0.8rem] font-bold text-purple-600">PRODUCT DESCRIPTION </label>
                <textarea required type="text" id="description" name="description" class="p-2 rounded-sm border border-black/30 h-[200px] resize-none text-slate-900">YOUR PRODUCT DESCRIPTION HERE!</textarea>
            </div>
        </div>
        <button type="submit" class="md:w-1/4 w-full self-center md:self-end py-2 rounded-md bg-purple-600 hover:shadow hover:shadow-purple-600 text-white font-extrabold">ADD PRODUCT</button>
    </form>
    <div class="pt-5">
    <h1 class="text-purple-600 font-extrabold text-3xl text-start pb-3">LIST OF PRODUCTS</h1>
    <table class="w-full border border-slate-900/50 pt-2">
        <thead>
        <tr>
            <th class="p-3 border border-slate-900/50">#</th>
            <th class="p-3 border border-slate-900/50">Product Name</th>
            <th class="p-3 border border-slate-900/50">Category</th>
            <th class="p-3 border border-slate-900/50">Price</th>
            <th class="p-3 border border-slate-900/50">Stock Quantity</th>
            <th class="p-3 border border-slate-900/50">Description</th>
            <th class="p-3 border border-slate-900/50">Manufacturer</th>
            <th class="p-3 border border-slate-900/50">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr class="text-center">
                <td class="p-3 border border-slate-900/50">{{$key + 1}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->product_name}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->category}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->price}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->stock_quantity}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->description}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->manufacturer}}</td>
                <td class="border border-slate-900/50">
                    <div class="w-full flex space-x-1 items-center justify-center">
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white text-sm flex items-center justify-center rounded-md p-2 bg-purple-600">
                        <ion-icon name="trash-bin"></ion-icon>
                    </button>
                </form>

                    <a href={{route('product.edit', $product->id)}} type="submit" type="submit" class=" bg-purple-600 text-sm flex items-center justify-center rounded-md p-2 text-white">
                        <ion-icon name="create"></ion-icon>
                    </a>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</x-app-layout>
