 <h1 class="font-semibold text-[16px]">Theo loại</h1>
 <ul class="mt-3">
     <li class="group">
         <label for="type-product-all" class="flex items-center justify-between py-2 cursor-pointer">
             <div class="group-hover:text-blue-600">
                 Tất cả
             </div>
             <input type="radio" name="type-product-filter" id="type-product-all" value="all"
                 class="type-product-filter border-gray-500/50" checked>
         </label>
     </li>
     @foreach ($type_products as $item)
         <li class="group">
             <label for="type-product-{{ $item->id }}"
                 class="flex items-center justify-between py-2 cursor-pointer">
                 <div class="group-hover:text-blue-600">
                     {{ $item->name }}
                 </div>
                 <input type="radio" name="type-product-filter" id="type-product-{{ $item->id }}"
                     value="{{ $item->id }}" class="type-product-filter border-gray-500/50">
             </label>
         </li>
     @endforeach
 </ul>
 <hr class="my-3">
