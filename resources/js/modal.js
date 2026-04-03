export default function modal(){

    // ============NORMAL MODAL=======================
    // open
    $(document).on('click','.open-modal',function(){
        let modal_name = $(this).data('modal');
        $('.modal-'+modal_name).removeClass('pointer-events-none opacity-0 scale-0')
        $('.modal-'+modal_name+'-is-open').addClass('animate_translate_down');
        $('.modal-'+modal_name).find('img').attr('src','').addClass('hidden');
        $('.modal-'+modal_name).find('.remove-file').attr('src','').addClass('hidden');
        $('.modal-'+modal_name).find('.fake-remove-file').attr('src','').addClass('hidden');
    })
   
    // close
    $(document).on('click','.cancel-modal',function(){
        let modal_name = $(this).data('modal');
        const modal = $('.modal-'+modal_name);
        $('.modal-element').each(function(){
            $(this).find('input').not('[name="_token"], [type="hidden"], [type="checkbox"]').val('').attr('value','');
            $(this).find('input[type=checkbox]').prop('checked',false); 
            $(this).find('select[name=parent_category]').val('');
            $(this).find('select[name=category_id]').val('');
            $(this).find('textarea').val('');
            $(this).find('.error').html(``);
            $(this).find('img').attr('src','').addClass('hidden');
        })
        $('div.error').html(``); 
        modal.addClass('pointer-events-none opacity-0 scale-0');
        $('.modal-'+modal_name+'-is-open').removeClass('animate_translate_down');
    })
}