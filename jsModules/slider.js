const sliderImgs = ['imgs/temp/slider.png', 'imgs/temp/slider.png', 'imgs/temp/slider.png'];
let sliderImgsDOM = document.querySelector('.sliderImgs');
sliderImgs.forEach((img) => {
    let imgDOM = document.createElement('img');
    imgDOM.className = 'sliderImg';
    imgDOM.src = img;
    sliderImgsDOM.appendChild(imgDOM);
})
let currentImg = 0;

const sliderIntervalFunc = () =>{
    currentImg = currentImg + 1 >= sliderImgs.length? 0 : currentImg + 1;  
    sliderImgsDOM.style.marginLeft = `-${100 * currentImg}%`;
}
let sliderInterval = setInterval(sliderIntervalFunc, 3000);
let enableSliderInterval;
document.querySelectorAll('.arrow').forEach(arrow => {
    arrow.addEventListener('click', () => {
    if (arrow.classList.contains('rightArrow')){
        currentImg = currentImg + 1 >= sliderImgs.length? 0 : currentImg + 1;  
    }
    else{
        currentImg = currentImg - 1 < 0 ? sliderImgs.length-1 : currentImg - 1;
    }
    clearInterval(sliderInterval)
                
    clearInterval(enableSliderInterval)
    enableSliderInterval = setTimeout(() => {
        sliderInterval = setInterval(sliderIntervalFunc, 3000);
        } , 2000)
    sliderImgsDOM.style.marginLeft = `-${100 * currentImg}%`;
    });
});