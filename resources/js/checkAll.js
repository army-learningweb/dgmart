export default function checkAll(){

    // list
    $(document).on('click','.check_all',function(){
        let checked = $(this).prop('checked')
        $('.check_single').prop('checked',checked);
    });

    //permission
    $(document).on('click','.check_all_permission',function(){
        let checked = $(this).prop('checked')
        $(this).parents('.parent_check_all').next().find('input').prop('checked',checked);
    })
}