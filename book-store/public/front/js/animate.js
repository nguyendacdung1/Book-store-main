const tggSidebar =  $('.toggle-sidebar')
const showCart = $('.header-select-showcart')
const searchIcon =  $('#search-icon')
const searchBox = $('#search-box')
const btnSearch = $('.header-select-search')
const label = document.querySelector('#form-search').querySelector('label')


$(window).on('load', function(event) {
    $('.loading').hide()
    if($('.toggle-form-login').length){
        $('.toggle-form-login').click()
        if(document.querySelector('.login-register').getAttribute('register')==1){
            $('.show-register').click()
        }
    }
});

function showInputSearch() {
    $('.menu-options').removeClass('hide')
    $('.product-search').removeClass('show')
}

function hideInputSearch() {
    $('.menu-options').addClass('hide')
    $('.product-search').addClass('show')
}


tggSidebar.click((e) => {
    tggSidebar.toggleClass('open')
    tggSidebar.toggleClass('border')
    showCart.toggleClass('border')
    let menutWrap = $('.menu-wrap')
    menutWrap.fadeToggle(400)
})


btnSearch.click(() =>{
    tggSidebar.toggleClass('open')
    tggSidebar.toggleClass('border')
    showCart.toggleClass('border')
    let menutWrap = $('.menu-wrap')
    menutWrap.fadeToggle(400)

    searchBox.addClass('show-input')
    searchBox.removeClass('hide-input')
    hideInputSearch()
})

searchBox.focus(() =>{
    searchBox.addClass('show-input')
    searchBox.removeClass('hide-input')
    $('#form-search label').attr("for","search-submit")
    hideInputSearch()
})

// //Xóa mặc định form không load lại trang


$('.header-content').click((e) =>{
    let isShow =!(e.target.closest('.menu-content-layout')) &&
                !e.target.closest('.open') &&
                !e.target.closest('.header-select-search') &&
                !e.target.closest('.product-search')
    if(isShow){
        searchBox.addClass('hide-input')
        searchBox.removeClass('show-input')
        let label = $('#form-search label')
        label.attr("for","search-box")
       showInputSearch()
    }
})


$('.toggle-link').click(function(){
    $(this).find('.menu-link').toggleClass('active')
    $(this).find('.icon-rotate').toggleClass('rotate-180')
    $(this).find('.menu-toggle-sub').slideToggle()
})


$('.slide-link').each(function (index){
    $(this).attr('slide',index+1)
    if(index==0){
        $('.control-bottom').append(`<button class="slide-current" forSlide="${index+1}"></button>`)
    }
    else{
        $('.control-bottom').append(`<button forSlide="${index+1}"></button>`)
    }

})

setInterval(function(){
    $('.slide-next').click()
},10000)

$('.slide-next').click(function(){
    $('.slide-link').attr('style','')
    let count = $('.slide-link').length
    let currentSlide = $(this).parents('.slide-banner').find('.slide-active')
    let currentIndex = currentSlide.attr('slide')
    let nextIndex = currentIndex == count ? 1 : currentIndex -''+1
    let nextSlide = $(`.slide-link[slide=${nextIndex}]`)
    $('.slide-link').removeClass('slide-active')
    nextSlide.addClass('slide-active')
    nextSlide.css('opacity',0.8)
    nextSlide.animate({
        opacity: 1
    },1000)

    $(`.control-bottom button`).removeClass('slide-current')

    $(`.control-bottom button[forslide=${nextIndex}]`).addClass('slide-current')
})

$('.slide-prev').click(function(){
    $('.slide-link').attr('style','')
    let count = $('.slide-link').length
    let currentSlide = $(this).parents('.slide-banner').find('.slide-active')
    let currentIndex = currentSlide.attr('slide')
    let nextIndex = currentIndex == 1 ? count : currentIndex -''- 1
    let nextSlide = $(`.slide-link[slide=${nextIndex}]`)
    $('.slide-link').removeClass('slide-active')
    nextSlide.addClass('slide-active')
    nextSlide.css('opacity',0.8)
    nextSlide.animate({
        opacity: 1
    },1000)

    $(`.control-bottom button`).removeClass('slide-current')

    $(`.control-bottom button[forslide=${nextIndex}]`).addClass('slide-current')
})

$('.control-bottom button').click(function(){
    let moveIndex = $(this).attr('forslide')
    $('.slide-link').attr('style','')
    let nextIndex = moveIndex
    let nextSlide = $(`.slide-link[slide=${nextIndex}]`)
    $('.slide-link').removeClass('slide-active')
    nextSlide.addClass('slide-active')
    nextSlide.css('opacity',0.8)
    nextSlide.animate({
        opacity: 1
    },1000)

    $(`.control-bottom button`).removeClass('slide-current')

    $(`.control-bottom button[forslide=${nextIndex}]`).addClass('slide-current')
})

$('.filter-item').click(function(e){
    if(!e.target.closest('.change-filter')){
        $(this).find('.filter-wrap').toggle()
        $(this).find('.change-filter').slideToggle(200)
    }
})


const filterWidth = $('.list-product-filter').width()
$('.list-product-filter').css('width', '46px')
const wrapWidth = $('.wrap-list-filter').width()
$('.wrap-list-filter').css('width', wrapWidth)

$('.toggle-filter').click(function(){

    if($('.list-product-filter').width()==46){
        $('.list-filter').animate({
            width: 0
        },500)

        $('.list-product-filter').animate({
            width : filterWidth + 20
        },500,function(){
            $('.list-product-filter').animate({
                width : filterWidth
            },200)
        })
    }else{
        $('.list-product-filter').animate({
            width : filterWidth + 20
        },200,function(){
            $('.list-filter').animate({
                width: wrapWidth
            },500)

            $('.list-product-filter').animate({
                width : 46
            },500)

        })

    }

})

$('.toggle-form-login').click(function (){
    $('.login-register').css('display','flex')
    $('.wrap-login').show()
    $('.wrap-register').hide()
    $('.wrap-register').css('top','-250px')

    $('.wrap-login').animate({
        opacity : 1,
        top: 0
    },500)
})

$('.login-register').click(function(e){
    if(e.target.closest('.btn-close-m') || !e.target.closest('.wrap-login') &&  !e.target.closest('.wrap-register')){
        $('.wrap-login').animate({
            opacity : 0,
            top: -250
        },500)
        $('.login-register').fadeToggle(500)
    }
})

$('.show-register').click(function (){
    $('.wrap-login').animate({
        opacity : 0
    },500,function (){
        $('.wrap-login').css('top','-250px')
        $('.wrap-login').hide()
        $('.wrap-register').show()
        $('.wrap-register').animate({
            opacity : 1,
            top: 0
        },500)
    })
})

$('.show-login').click(function (){
    $('.wrap-register').animate({
        opacity : 0
    },500,function (){
        $('.wrap-register').css('top','-250px')
        $('.wrap-register').hide()
        $('.wrap-login').show()
        $('.wrap-login').animate({
            opacity : 1,
            top: 0
        },500)
    })
})



