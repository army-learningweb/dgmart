export default function toggleShortCutMenu(){
    $('.shortcut').on('click',function(){
        $('.shortcut-menu').toggleClass('pointer-events-none opacity-0 scale-0');
    })
}