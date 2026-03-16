export default function toggleElement(){
    //============
    // Đóng mở
    //============

    // User
    $('.user-avatar').on('click',function(){
        $('.user-menu').toggleClass('pointer-events-none opacity-0 scale-0')
    })

    // Đóng khi click ngoài
    $('body').on('click',function(e){

        if(!$(e.target).closest('.user-avatar, .filter-status, .select-status').length){
            
            $('.user-menu').addClass('pointer-events-none opacity-0 scale-0')
            $('.filter-status-option').addClass('pointer-events-none opacity-0 scale-0');
            $('.select-status-option').addClass('pointer-events-none opacity-0 scale-0');

        }

    })
    
}