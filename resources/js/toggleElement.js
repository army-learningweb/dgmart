export default function toggleElement(){
    //============
    // Đóng mở
    //============

    const hiddenClass = 'pointer-events-none opacity-0 translate-y-[10px]'

    // User
    $('.user-avatar').on('click',function(){
        $('.user-menu').toggleClass(hiddenClass)
    })

    // Đóng khi click ngoài
    $('body').on('click',function(e){
        if(!$(e.target).closest('.user-avatar').length){
            $('.user-menu').addClass(hiddenClass)
        }
    })

    // User
    $('.client-avatar').on('click',function(){
        $('.client-menu').toggleClass(hiddenClass)
    })

    // Đóng mở menu
    $(document).on('click','.toggle-menu',function(){
        $('.res-menu').slideToggle(200);
    })
    
}