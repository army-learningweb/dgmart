export default function toggleElement(){
    //============
    // Đóng mở
    //============

    // select status options
    $('.select-status').on('click',function(){
        $('.select-status-option').toggleClass('pointer-events-none opacity-0 scale-0');
    })

    // filter status options
    $('.filter-status').on('click',function(){
        $('.filter-status-option').toggleClass('pointer-events-none opacity-0 scale-0');
    })

    // Shortcut
    $('.shortcut').on('click',function(){
        $('.shortcut-menu').toggleClass('pointer-events-none opacity-0 scale-0');
    })

    // User
    $('.user-avatar').on('click',function(){
        $('.user-menu').toggleClass('pointer-events-none opacity-0 scale-0')
    })

    // Đóng khi click ngoài
    $('body').on('click',function(e){

        if(!$(e.target).closest('.shortcut, .user-avatar, .filter-status, .select-status').length){
            
            $('.user-menu').addClass('pointer-events-none opacity-0 scale-0')
            $('.shortcut-menu').addClass('pointer-events-none opacity-0 scale-0');
            $('.filter-status-option').addClass('pointer-events-none opacity-0 scale-0');
            $('.select-status-option').addClass('pointer-events-none opacity-0 scale-0');

        }

    })
    
}