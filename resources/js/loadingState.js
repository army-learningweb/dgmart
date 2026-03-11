export default function loadingState(){
    $('button[type=submit]').on('click',function(){
        $(this).html(`Đang xử lý...`)
    })
}