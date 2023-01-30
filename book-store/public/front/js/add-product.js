

$('.add-product').click(function (){
    let id = $(this).attr('product')
    fetch(`./cart/add/${id}`).then((response) => response.json())
        .then(

        );
})

$('.control-remove').click(function (){
    let id = $(this).attr('product')
    let agree = confirm('Bạn có muốn xóa sản phẩm này không?')
    if(agree){
        fetch(`./cart/delete/${id}`).then((response) => response.json())
            .then((data) => {
                if(data==1){
                    let thTotal = document.querySelectorAll('.th-total-item').length-1
                    let cartTarget = $(this).parents('.tr-product').remove();
                    totalCart()
                    document.querySelector('.title-border').innerHTML='Cart(' + thTotal +')'
                }
            });
    }
})
totalCart()
function totalCart(){
    let total = 0
    let thTotal = document.querySelectorAll('.th-total-item')
    if(thTotal.length){
        thTotal.forEach(el=>{
            let itemTotal = el.innerHTML.replace('$','').replace(/ /g,'')
            total+=(itemTotal-'')
        })
        document.querySelector('.tfoot-total').textContent = '$'+total
        document.querySelector('.price-new').textContent ='$'+total
        document.querySelector('.price-old').textContent ='$'+total
    }else {
        if(document.querySelector('.table-mycart')){
            document.querySelector('.price-new').textContent ='$'+0
            document.querySelector('.price-old').textContent ='$'+0
            $('.table-products').remove()
            document.querySelector('.mycart-content').innerHTML =  `<p>Chưa có sản phẩm</p>`
            $('.mycart-footer').remove()
        }

    }




}
