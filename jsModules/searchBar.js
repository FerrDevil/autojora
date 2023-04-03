let searchInputDOM = document.querySelector('.searchInput');
let searchResultsDOM = document.querySelector('.searchResults');


const search = (products) => {
    searchResultsDOM.style.display = 'flex';
    document.querySelector('.noResults')?.remove();
    document.querySelectorAll('.removeOption').forEach(option => {option?.remove()})
    if (searchInputDOM.value == ''){
        searchResultsDOM.style.display = 'none';
        return
    }

    let options = products.filter(product => product.name.toLowerCase().includes(searchInputDOM.value.toLowerCase()));
    if(options.length == 0){
        let noResults = document.createElement('p');
        noResults.className = 'noResults';
        noResults.innerHTML = 'По данному запросу ничего не найдено';
        searchResultsDOM.appendChild(noResults);
    }
    else{
    options.forEach(option => {
        let productDOM = document.querySelector('#optionsTemplate')?.content.cloneNode(true).querySelector('.option');
        productDOM.classList.add('removeOption');
        productDOM.href = 'http://localhost/AutoJora/product/?id=' + option.id;
        productDOM.querySelector('.optionImg').src = 'http://localhost/AutoJora/' + option.img;
        productDOM.querySelector('.optionName').innerHTML = option.name;
        searchResultsDOM.appendChild(productDOM);
    })
    } 
}


searchInputDOM.addEventListener('input', () => {
    getData('http://localhost/AutoJora/products/', search)
})


searchInputDOM.addEventListener('focus', () => {
    
    searchResultsDOM.style.display = searchInputDOM.value != '' ? 'flex': 'none';
    document.querySelector('.searchShadow').style.display ='block';
})


document.querySelector('.searchShadow').addEventListener('click', () => {
    searchResultsDOM.style.display = 'none';
    document.querySelector('.searchShadow').style.display ='none';
})


document.querySelector('.search').addEventListener('click', () => {
    if (searchInputDOM.value == '' || document.querySelector('.removeOption') == undefined) return;
    document.location = `http://localhost/AutoJora/searchResults/?search=${searchInputDOM.value.toLowerCase()}`
})