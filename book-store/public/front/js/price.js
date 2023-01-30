let min=document.querySelector('.price-from')
let max=document.querySelector('.price-to')
max.min = min.value -''+1;
min.max = max.value - 1
min.addEventListener('change',function (){
    max.min = min.value -''+1;
})
max.addEventListener('change',function (){
    min.max = max.value-1;
})


