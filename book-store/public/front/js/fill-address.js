let elCity = document.querySelector('#city')
if(elCity){
    elCity.innerHTML = ''
    elCityHTML = '<option value="0">Chọn tỉnh thành phố</option>'
}

let elDistrict = document.querySelector('#district')
if(elDistrict){
    elDistrict.innerHTML = '<option value="0">Chọn quận huyện</option>'
}
let elRegion = document.querySelector('#region')
if(elRegion){
    elRegion.innerHTML = '<option value="0">Chọn phường/xã</option>'
}



fetch('https://raw.githubusercontent.com/madnh/hanhchinhvn/master/dist/tree.json')
  .then((response) => response.json())
  .then((data) => {
    if(elCity){
        for (const key in data) {
            let itemCity = data[key]
            let elItemCity = `<option value="${key}">${itemCity['name_with_type']}</option>`
            elCityHTML += elItemCity;
        }
        elCity.innerHTML = elCityHTML
        elCity.addEventListener('change', function(){
            elDistrictHTML = '<option value="0">Chọn quận huyện</option>'
            let codeDistrict = elCity.value
            let listDistrict = data[codeDistrict]['quan-huyen']
            for (const key in listDistrict) {
                let districtName =  listDistrict[key]['name_with_type']
                let elItemDistrict = `<option value="${key}">${districtName}</option>`
                elDistrictHTML+=elItemDistrict
            }
            elDistrict.innerHTML = elDistrictHTML
        })
        elDistrict.addEventListener('change',function(){
            elRegionHTML='<option value="0">Chọn phường/xã</option>'

            let codeCity = elCity.value
            let codeDistrict = elDistrict.value
            let listRegion = data[codeCity]['quan-huyen'][codeDistrict]['xa-phuong']
            for (const key in listRegion) {
                let regionName = listRegion[key]['name_with_type']
                let elItemRegion = `<option value="${key}">${regionName}</option>`
                elRegionHTML+=elItemRegion
            }
            elRegion.innerHTML = elRegionHTML
        })
    }

    let itemAddresses = document.querySelectorAll('.address-item')
    if(itemAddresses.length){
        itemAddresses.forEach(el=>{
            let cityID = el.getAttribute('city')
            let districtID = el.getAttribute('district')
            let regionID = el.getAttribute('region')
            let city = data[cityID]['name']
            let district = data[cityID]['quan-huyen'][districtID]['name_with_type']
            let region = data[cityID]['quan-huyen'][districtID]['xa-phuong'][regionID]['name_with_type']
            let content = city+','+district+','+region
            $(el).find('.m-address').text(content)
        })

    }


});




