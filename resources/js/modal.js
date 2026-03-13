export default function modal(){
    $('.open-modal').on('click',function(){
        let modal_name = $(this).data('modal');
        
        $('.modal-'+modal_name).removeClass('pointer-events-none opacity-0 scale-0')
        $('.modal-'+modal_name+'-is-open').addClass('animate_translate_down');
    })

    $('.cancel-modal').on('click',function(){
        let modal_name = $(this).data('modal');
        
         $('.modal-'+modal_name).addClass('pointer-events-none opacity-0 scale-0')
         $('.modal-'+modal_name+'-is-open').removeClass('animate_translate_down');
         $('.error').hide();
    })
}