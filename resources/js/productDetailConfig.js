export default function productDetailConfig(){
    $(document).on('click','.show-config',function(){
        $('.product-details-config').toggleClass('hidden');
    })
}