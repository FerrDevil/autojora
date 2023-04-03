const getSearchResult = (products) => {
    let searchCase = decodeURI(document.location.search.replace('?search=', ''))
    document.querySelector('.searchPanelInput').value = searchCase;
    let result = products.filter(product => product.name.toLowerCase().includes(searchCase.toLowerCase()))
    document.querySelectorAll('.categoriesInput').forEach(input => {
        input.checked = true;
    })
    generateProduct(result);
}

const inputFilter = (products) =>{
    document.querySelectorAll('.product').forEach(product => {product?.remove();})
    document.querySelector('.noResults')?.remove();
    result = products.filter(product => product.name.toLowerCase().includes(document.querySelector('.searchPanelInput').value.toLowerCase()))
    if(result.length == 0){
        let noResults = document.createElement('p');
        noResults.className = 'noResults';
        noResults.innerHTML = 'По данному запросу ничего не найдено';
        document.querySelector('.results').appendChild(noResults);
    }
    else{
        getData('http://localhost/AutoJora/products/', updateFilters)
    }
}

document.querySelector('.searchPanelInput').addEventListener('input',  () => {getData('http://localhost/AutoJora/products/', inputFilter)})

let firstRange = document.querySelector('.firstRange');
    let secondRange = document.querySelector('.secondRange');
    let rangeFrom = document.querySelector('.rangeFrom').querySelector('.rangeValueInput');
    let rangeTo = document.querySelector('.rangeTo').querySelector('.rangeValueInput');

    const drawLine = () => {
        let max = parseInt(secondRange.max) -100;
        let curRange = document.querySelector('.curRange');
        let percent1 = firstRange.value/max * 100;
        let percent2 = secondRange.value / max * 100;
        curRange.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #4169E1 ${percent1}%, #4169E1 ${percent2}%, #dadae5 ${percent2}%)`
    }


    firstRange.addEventListener('input', (e) => {
        let gap = 1000;
        if(parseInt(secondRange.value) - parseInt(firstRange.value) <= gap){
            firstRange.value = parseInt(secondRange.value) - gap
            return;
        } 
        drawLine()
        
        rangeFrom.value = parseInt(firstRange.value);
        getData('http://localhost/AutoJora/products/', updateFilters)
    })

    secondRange.addEventListener('input', (e) => {
        let gap = 1000;
        if(parseInt(secondRange.value) - parseInt(firstRange.value) <= gap){
            secondRange.value = parseInt(firstRange.value) + gap
            return;
        } 
        drawLine()
        rangeTo.value = parseInt(secondRange.value);
        getData('http://localhost/AutoJora/products/', updateFilters)
        
    })
    const updateFilters = (filter) => {
        document.querySelectorAll('.product').forEach(product => {product?.remove();})
        document.querySelector('.noResults')?.remove();
        filter = filter.filter(product => product.name.toLowerCase().includes(document.querySelector('.searchPanelInput').value.toLowerCase()))
        filter = filter.filter(res => Number(rangeFrom.value) < Number(res.cost.replace('&#8381;', '')) && Number(res.cost.replace('&#8381;', '')) < Number(rangeTo.value))
        let categories = [...document.querySelectorAll('.categoriesInput')].filter(input => input.checked).map(input => input.value);
        filter = filter.filter(res => categories.includes(res.categoryId))
        generateProduct(filter);
    }

    rangeFrom.addEventListener('input', () => {
        if(rangeTo.value > rangeFrom.value){
            rangeFrom.value= firstRange.value
            return;
        }
        firstRange.value = rangeFrom.value})
    rangeTo.addEventListener('input', () => {
        if(rangeTo.value < rangeFrom.value){
            rangeTo.value = secondRange.value;
            return;
        }
        secondRange.value = rangeTo.value
    })


    const getCategoriesResult = (products) => {
        let searchCase = decodeURI(document.location.search.replace('?category=', ''));
        document.querySelector('#checkbox' + searchCase).checked = true;
        let result = products.filter(product => product.id == searchCase)
        generateProduct(result);
    }

if (decodeURI(document.location.search).includes('?search')){
    getData('http://localhost/AutoJora/products/', getSearchResult)
}
else if (decodeURI(document.location.search).includes('?category')){
    getData('http://localhost/AutoJora/products/', getCategoriesResult)
}

document.querySelectorAll('.categoriesInput').forEach(input => {
    input.addEventListener('input', (e) => {
        getData('http://localhost/AutoJora/products/', updateFilters)
    })
})

