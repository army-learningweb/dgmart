export default function modal(){

    // ============NORMAL MODAL=======================
    // open
    $(document).on('click','.open-modal',function(){
        let modal_name = $(this).data('modal');
        $('.modal-'+modal_name).removeClass('pointer-events-none opacity-0 scale-0')
        $('.modal-'+modal_name+'-is-open').addClass('animate_translate_down');
    })
   
    // close
    $(document).on('click','.cancel-modal',function(){
        let modal_name = $(this).data('modal');
        const modal = $('.modal-'+modal_name);
        modal.find('.error').html(``);
        modal.find('input[type=checkbox]').prop('checked',false);
        modal.find('input').not('[name="_token"], [type="hidden"], [type="checkbox"]').val('');
        modal.addClass('pointer-events-none opacity-0 scale-0')

        $('.modal-'+modal_name+'-is-open').removeClass('animate_translate_down');
        $('div.error').html(``); 
    })
}