$('.control-qty').click(function(e){
    let valueSpan = $(this).find('span')
    let saveQty = $(this).find('.save-qty')
    if(e.target.closest('.control-reduce')){
        if( valueSpan.text()>1){
            valueSpan.text(valueSpan.text()-1)
            saveQty.attr('value',valueSpan.text())
            $(this).find('form').submit()
        }else{
            $(this).find('.control-remove').click()
        }

    }
    if(e.target.closest('.control-increase')){
        valueSpan.text(valueSpan.text()-0+1)
        saveQty.attr('value',valueSpan.text())
        token = $(this).find('input[name="_token"]').val()
        $(this).find('form').submit()
    }
})
