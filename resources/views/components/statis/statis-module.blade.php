@props([
    'module' => '',
    'total' => '',
    'active' => '',
    'unactive' => '',
    'draft' => '',
    'publish' => '',
    'draft' => '',
    'pending' => '',
    'processing' => '',
    'shipped' => '',
    'delivered' => '',
    'refund' => ''
])

<div>
    <div class="flex gap-5">
        <div class="flex items-center gap-2">
            <div class="w-[8.5px] h-[8px] rounded-full bg-blue-500"></div>
            <div>
                <span>Tất cả</span>
                <span class="total-{{ $module }}">({{ $total }})</span>
            </div>
        </div>

        @if ($active != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-emerald-500"></div>
                <div>
                    <span>Hoạt động</span>
                    <span class="active-{{ $module }}">({{ $active }})</span>
                </div>
            </div>
        @endif
        
        @if ($unactive != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-red-500"></div>
                <div>
                    <span>Vô hiệu hóa</span>
                    <span class="unactive-{{ $module }}">({{ $unactive }})</span>
                </div>
            </div>
        @endif
        
        @if ($publish != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-emerald-500"></div>
                <div>
                    <span>Công khai</span>
                    <span class="publish-{{ $module }}">({{ $publish }})</span>
                </div>
            </div>
        @endif
       
        @if ($draft != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-gray-500"></div>
                <div>
                    <span>Nháp</span>
                    <span class="draft-{{ $module }}">({{ $draft }})</span>
                </div>
            </div>
        @endif
        
        @if ($pending != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-gray-500"></div>
                <div>
                    <span>Chờ xử lý</span>
                    <span class="pending-{{ $module }}">({{ $pending }})</span>
                </div>
            </div>
        @endif
       
        @if ($processing != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-blue-500"></div>
                <div>
                    <span>Đang xử lý</span>
                    <span class="processing-{{ $module }}">({{ $processing }})</span>
                </div>
            </div>
        @endif
       
        @if ($shipped != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-amber-500"></div>
                <div>
                    <span>Đang giao</span>
                    <span class="shipped-{{ $module }}">({{ $shipped }})</span>
                </div>
            </div>
        @endif
        
        @if ($delivered != '') 
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-emerald-500"></div>
                <div>
                    <span>Đã nhận</span>
                    <span class="delivered-{{ $module }}">({{ $delivered }})</span>
                </div>
            </div>
        @endif
        
        @if ($refund != '')
            <div class="flex items-center gap-2">
                <div class="w-[8.5px] h-[8px] rounded-full bg-pink-500"></div>
                <div>
                    <span>Hoàn trả</span>
                    <span class="refund-{{ $module }}">({{ $refund }})</span>
                </div>
            </div>
        @endif
        
</div>
