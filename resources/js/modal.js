export default function modal(){

    // open
    $(document).on('click','.open-modal',function(){
        let modal_name = $(this).data('modal');
        $('.modal-'+modal_name).removeClass('pointer-events-none opacity-0 scale-0')
        $('.modal-'+modal_name+'-is-open').addClass('animate_translate_down');
    })
   
    // close
    $(document).on('click','.cancel-modal',function(){
        let modal_name = $(this).data('modal');
        $('.modal-'+modal_name).find('input').not('[name="_token"], [type="hidden"]').val('');
        $('.modal-'+modal_name).addClass('pointer-events-none opacity-0 scale-0')
        $('.modal-'+modal_name+'-is-open').removeClass('animate_translate_down');
        $('.error').hide();
    })
}