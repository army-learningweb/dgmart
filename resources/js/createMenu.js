export default function createMenu(){

    const categoriesProduct = $('select[name=categories-product]');
    const categoriesPost = $('select[name=categories-post]');
    const inputName = $('input[name=link-name]');

    inputName.on('input',function(){
        if($(this).val() === ''){            
            categoriesProduct.prop('disabled',false)
            categoriesPost.prop('disabled',false)
        }else{
            categoriesProduct.prop('disabled',true)
            categoriesPost.prop('disabled',true)
        }
    })

    categoriesProduct.on('change',function(){
        if($(this).val() === ''){
            categoriesPost.prop('disabled',false)
            inputName.removeClass('opacity-25 pointer-events-none')
        }else{
            categoriesPost.prop('disabled',true)
            inputName.addClass('opacity-25 pointer-events-none')
        }
    })

    categoriesPost.on('change',function(){
        if($(this).val() === ''){
            categoriesProduct.prop('disabled',false)
            inputName.removeClass('opacity-25 pointer-events-none')
        }else{
            categoriesProduct.prop('disabled',true)
            inputName.addClass('opacity-25 pointer-events-none')
        }
    })

}