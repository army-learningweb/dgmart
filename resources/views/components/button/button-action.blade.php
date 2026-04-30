@props(['form' => '']) 
 <button
     {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center items-center gap-1 md:py-[5px] text-gray-900 bg-gradient-to-r from-violet-600 to-violet-900 hover:brightness-110 rounded-md text-sm px-3 py-[7px] text-white']) }}
     form="{{ $form != '' ? $form : '' }}">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
         class="size-5">
         <path stroke-linecap="round" stroke-linejoin="round"
             d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
     </svg>
     <span>Hành động</span>
 </button>
