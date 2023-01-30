$(document).ready(function() {
    $('.wrap-book .flipbook').each(function () {
        $(this).turn({
            width:120*2,
            height:160,
            autoCenter: true,
            duration: 1000,
        })
    })

    $('.view-full').click(function () {
        let img  = $(this).parent().find('.img')
        img.click()
    })

    $('.product-img > img').click(function(){
        let viewFull = $(this).parents('.product-img').find('.view-full')
        viewFull.hide()
        $(this).css({
            opacity:0
        })
        let wrapBook = $(this).parents('.product-img').find('.wrap-book')
        let flipbook = wrapBook.find('.flipbook')
        let startLeft = $(this).get(0).getBoundingClientRect().x - $(this).width()
        let startTop = $(this).get(0).getBoundingClientRect().y
        let width = $(this).width()
        let height = $(this).height()

        wrapBook.show()

        let book = wrapBook.find('.book')
        let widthHtml = wrapBook.width()
        let heightHtml = wrapBook.height()

        let zoom  = widthHtml*0.3 / width
        flipbook.turn('next')


        book.css({
            left : startLeft,
            top : startTop,
            width : width*2*zoom,
            height : height*zoom
        })



        book.animate({
            left : widthHtml/2 -  width*zoom,
            top : heightHtml/2 - height*zoom/2
        },750)

        flipbook.animate({
            zoom : zoom
        },750,function(){
            flipbook.css('zoom',1)
            flipbook.turn('zoom',zoom)
            book.css({
                top : '50%',
                left : '50%',
                transform: 'translate(-50%,-50%)'
            })
            flipbook.turn('peel', 'tr')

        })
    })

    $('.wrap-book').mouseup(function(e) {
        if(!e.target.closest('.flipbook div')){
            let img = $(this).parents('.product-img').find('.img')
            let book = $(this).find('.book')
            let flipbook = $(this).find('.flipbook')
            let width = img.width()
            let height = img.height()
            let top = img.get(0).getBoundingClientRect().y
            let left = img.get(0).getBoundingClientRect().x
            let widthBook = book.width()
            let zoom = 2*width/widthBook
            flipbook.turn('page',1)
            book.animate({
                left: left + width/2,
                top: top + height/2,
                width : width*2,
                height : height,
            },800)

            let wrap = $(this)
            wrap.css("background","transparent")

            flipbook.animate({
                zoom : zoom
            },800,function(){
                flipbook.css('zoom',1)
                flipbook.turn('zoom',1)
                wrap.hide()
                $(wrap).attr('style','')
                $(book).attr('style','')
                $(img).attr('style','')
                let viewFull = $('')
                $('.view-full').attr('style','')
            })
        }
    })


    $('.product-content').click(function(e) {
        let addCart = e.target.closest('.add-product')
        if(addCart){
            $(addCart).removeClass('add-product')
            let pOld = document.querySelector('.price-old').textContent.replace('$','')-''
            let price = $(this).find('.product-content-price').html().replace('$','')-''
            let numToFixed = Number.parseFloat(price+pOld).toFixed(1)
            $('.price-new').html('$'+numToFixed)
            let imgBook = $(this).parents('.product').find('.img')
            let top = imgBook.get(0).getBoundingClientRect().y
            let left = imgBook.get(0).getBoundingClientRect().x
            src = imgBook.get(0).src
            let imgEl = document.createElement('img')
            imgEl.src = src
            $(imgEl).css({
                position : 'fixed',
                top : top,
                left : left,
                width : 120,
                height : 160,
                'z-index': '100',
                zoom : 1,
            })
            $('body').append(imgEl)

            let cartTop = $('.header-select-showcart svg')

            let moveLeft = cartTop.get(0).getBoundingClientRect().x
            let moveTop = cartTop.get(0).getBoundingClientRect().y
            let priceNew =  $('.price-new')
            let priceOld = $('.price-old')

            priceNew.animate({
                top: '0'
            },800)

            priceOld.animate({
                opacity :0
            },400)

            $(imgEl).animate({
                top : moveTop+12,
                left : moveLeft+12,
                opacity : 0,
                width : 5,
                height : 5,
            },800,function(){
                imgEl.remove()
                priceNew.attr('style','')
                priceOld.attr('style','')
                $('.price-old').html('$'+numToFixed)
                priceOld.toggleClass('price-new price-old')
                priceNew.toggleClass('price-new price-old')
                priceOld.toggleClass('price-new price-old')
                priceNew.toggleClass('price-new price-old')
                $(addCart).addClass('add-product')
            })
        }

    })



})





