<x-app-layout>
    <div class="flex flex-col py-3 px-5 h-full relative">
        <div class=" py-5">
            <h1 class=" font-semibold flex items-center"><span class="text-6xl text-purple-500"><ion-icon name="add-circle-outline"></ion-icon></span>
                <span class="text-4xl text-slate-800 font-extrabold">EDIT PRODUCT FORM</span>
            </h1>
    </div>

       @if(session('success'))
       <script>
        alert("{{session('success')}}")
    </script>

       @endif
        <form method="POST" action="{{route('product.edit', $product->id)}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6">
            @csrf
            @method("PATCH")
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
                <div class="flex flex-col space-y-1">
                    <label for="product_name" class="text-[0.8rem] font-bold text-purple-600">PRODUCT NAME</label>
                    <input required type="text" id="product_name" name="product_name" value={{old('product_name', $product->product_name)}} class="p-2 rounded-sm border border-black/30"/>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="category" class="text-[0.8rem] font-bold text-purple-600">CATEGORY</label>
                    <input required type="text" id="category" name="category"  value={{old('category', $product->category)}} class="p-2 rounded-sm border border-black/30"/>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="price" class="text-[0.8rem] font-bold text-purple-600">PRICE</label>
                    <input required type="number" id="price" name="price" min="1" step="any" value={{old('price', $product->price)}} class="p-2 rounded-sm border border-black/30"/>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="stock_quantity" class="text-[0.8rem] font-bold text-purple-600">STOCK QUANTITY</label>
                    <input required type="number" id="stock_quantity" name="stock_quantity" value={{old('stock_quantity', $product->stock_quantity)}} class="p-2 rounded-sm border border-black/30"/>
                </div>
                <div class="flex flex-col space-y-1 col-span-2">
                    <label for="manufacturer" class="text-[0.8rem] font-bold text-purple-600">MANUFACTURER</label>
                    <input required type="string" id="manufacturer" name="manufacturer"  value={{old('manufacturer', $product->manufacturer)}} class="p-2 rounded-sm border border-black/30"/>
                </div>
                <div class="flex flex-col space-y-1 col-span-2">
                    <label for="description"class="text-[0.8rem] font-bold text-purple-600">DESCRIPTION </label>
                    <textarea required type="text" id="description" name="description" value={{old('description', $product->description)}} class="p-2 rounded-sm border border-black/30 h-[200px] resize-none">{{old('description', $product->description)}}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-between px-2 flex-col md:flex-row-reverse space-y-2 md:space-y-0">
            <button type="submit" class="md:w-1/4 w-full py-2 rounded-md bg-purple-600 text-white font-bold">UPDATE PRODUCT</button>
            <a href={{route('dashboard')}} type="submit" class="md:w-1/4 w-full py-2 rounded-md bg-purple-600 text-white font-bold flex items-center justify-center">BACK</a>
        </div>
        </form>
    </div>
    </x-app-layout>
