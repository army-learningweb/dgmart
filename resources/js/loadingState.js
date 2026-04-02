export default function loadingState(){
    $('button[type=submit]').not('button.table-delete').on('click',function(){
        $(this).html(`Đang xử lý...`)
    })
}