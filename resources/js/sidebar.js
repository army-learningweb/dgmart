export default function sidebar(){
    $('#main-menu li a').on('click',function(){
        $(this).next().slideToggle(250)
    })
}