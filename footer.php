
  <div class=" link-container">
    <div class="inf">
      <h2>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ
        XE MÁY MINH LONG</h2>
        <ul>
          <li>Email: minhlongmoto@gmail.com</li>
          <li>Hotline: 0786.0000.36</li>
          <li>Xử lý khiếu nại: 0967.974.125</li>
          <li>GPĐKKD: 0311537615</li>
          <li>Đăng ký lần đầu: 14/02/2012</li>
          <li>Nơi cấp: Sở kế hoạch và đầu tư TP. Hồ Chí Minh</li>
        </ul>
  </div>


  
  <div class="link-face">
    <a  href="https://www.tiktok.com/@minhlongmoto"><img src="Picture/minhlong_tiktok.jpg"></a>   
    <a  href="https://www.facebook.com/minhlongmoto"><i class="fab fa-facebook"> Facebook Minh Long Motor</i></a>   
  <a  href="https://www.instagram.com/minhlongmoto/"> <i class="fab fa-instagram-square"> Instagram Minh Long Motor</i></a>
  <a href="https://www.youtube.com/channel/UC7wv7KQ5QW3F0Zc_SBlhIUA"><i class="fab fa-youtube"> Youtube Minh Long Motor</i></a>
  <img class="pic_protect"src="Picture/logoSaleNoti.png">
  <img class="pic_protect"src="Picture/dmca_protected_sml_120m.png">
    </div>  
  </div>
  </body>  \



  <script>
    const header = document.querySelector("header")
    const mobile = document.querySelector(".mobile")
    const mobile_menu = document.querySelector(".mobile_menu")
    const bodyweb = document.querySelector(".body_webup_pic")

  window.addEventListener("scroll",function()
  {
    x=window.pageYOffset
    if(x>0)
    {
  header.classList.add("stic")
  mobile.classList.add("stic")
  mobile_menu.classList.add("stic")
    }
    else
    {
      header.classList.remove("stic")
      mobile.classList.remove("stic")
      mobile_menu.classList.remove("stic")
    }
  })







  
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
      else
      {
        imageContainer.style.opacity = 0;
      }
    });
  }
  window.addEventListener('scroll', fadeInOnScroll);



  </script> 
  </html>   