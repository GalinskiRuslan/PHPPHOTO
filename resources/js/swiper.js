const productContainer = document.getElementById('productContainer');
const mainContainer = 1200;
const stepCount = Math.round(productContainer.clientWidth / mainContainer);
let step = 1;
const stepHandler = () => {
    if (step >= stepCount) {
        step = 1;
        productContainer.style.left = `0px`

    } else {
        productContainer.style.left = `-${step * mainContainer}px`
        step++;
    }
}
const arrowRight = document.getElementById("arrowRight");
arrowRight.addEventListener('click', stepHandler)
// setTimeout(stepHandler, 5000)
setInterval(stepHandler, 5000)
console.log(productContainer, mainContainer, stepCount);

