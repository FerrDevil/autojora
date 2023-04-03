document.querySelector('.categoriesButton').onclick = () => {
    document.querySelector('.categoriesList').style.display = document.querySelector('.categoriesList').style.display == 'flex' ? 'none': 'flex';
}

const getCategories = (categories) => {
    categories.forEach(category => {
        let categoryDOM = document.querySelector('#category').content.cloneNode(true).querySelector('.category');
        categoryDOM.href = 'http://localhost/AutoJora/searchResults/?category=' + category.id;
        categoryDOM.querySelector('.categoryName').innerHTML = category.name;
        document.querySelector('.categoriesList').appendChild(categoryDOM);
    })
    
}

getData('http://localhost/AutoJora/categories', getCategories)