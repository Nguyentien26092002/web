const header = document.getElementsByTagName('header');
const bodyweb = document.querySelector(".body_webup_pic")

window.addEventListener("scroll",function()
{
x=window.pageYOffset
if(x>0)
{
header.classList.add('stic');
}
else
{
  header.classList.remove('stic');
}
});
const imgPositinon = document.querySelectorAll(".aspect-ratio-169 img");
const imgContainer = document.querySelector('.aspect-ratio-169');
const dotItem = document.querySelectorAll(".dot")
let imgNumber = imgPositinon.length
let index = 0
let lastIndex = imgNumber - 1;
imgPositinon.forEach(function (image, index) {
image.style.left = index * 100 + "%";
dotItem[index].addEventListener("click",function(){
  Slider(index)
})
})  
function imgSlide() {
index++;
if (index >= imgNumber) {  index=0}
  Slider(index) 
}
function Slider(index)
{
  imgContainer.style.left = "-" + index * 100 + "%";
  const dotactive = document.querySelector('.active')
  dotactive.classList.remove('active') 
  dotItem[index].classList.add("active")
}
setInterval(imgSlide, 5000);

function fadeInOnScroll() {
var imageContainers = document.querySelectorAll('.body_webup_pic');

imageContainers.forEach(function(imageContainer) {
  var position = imageContainer.getBoundingClientRect().top;
  var windowHeight = window.innerHeight;

  if (position < windowHeight) {
    imageContainer.style.opacity = 1;
  }
});
}
window.addEventListener('scroll', fadeInOnScroll);
