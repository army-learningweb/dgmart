export default function toggleUserMenu(){
    $('.user-avatar').on('click',function(){
        $('.user-menu').toggleClass('pointer-events-none opacity-0 scale-0')
    })
}