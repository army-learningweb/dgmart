export default function toggleElement(){
    //============
    // Đóng mở
    //============

    const hiddenClass = 'pointer-events-none opacity-0 scale-0'

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

    // Category
    $('.parent-category').on('click',function(){
        $(this).parents('tr').nextUntil('.not-children-category').toggleClass('hidden')
    })
    
}