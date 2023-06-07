<?Php
include"header.php";
?>
<style>
header{
    background-color: black;
}
</style>

<div class="About_us">
        <div class="About_us_container">
            <h1>Về Chúng Tôi</h1>
        </div>
       <div class="About_us_footer">
        <div class="About_us_title ">
          <img class="fade" src="Picture/Aboutus3.jpg">
            <ul class="About_us_title_first">
                <li>Ngày 14 tháng 02 năm 2012, Minh Long Motor  Siêu thị xe máy Minh Long đã được thành lập. Chỉ sau hơn 7 năm hoạt động, Minh Long Motor đã có:</li>
                <li>13 chính nhánh trải dài khắp các tỉnh thành</li>
                <li>Là đại lý ủy quyền chính hãng của: Yamaha, Suzuki, Zontes, HonDa</li>
                <li>Với Ông Lương Văn Long đại diện cho chuổi GPX Racing Thái Lan và phân phối tại Việt Nam</li>
                <li>Ông Hoàng Trọng Khánh đại diện chuỗi hệ Thống bán lẻ và Marketing</li>
                <li>Bộ phận nhân viên được đào tạo với trình độ kỹ thuật và chuyên môn cao.</li>
                <li>Đội ngũ IT marketing dày dặn kinh nghiệm, truyền thông, tổ chức sự kiện ( social ….)</li>
            </ul>
        </div>
        <div class="About_us_title">
           <div class="About_us_title_second">
            <p>&#8226; Minh Long Motor là đại lý được ủy quyền bởi Yamaha Việt Nam. Với thời gian cộng tác lâu dài, Yamaha Town Minh Long là một trong những số ít các đại lý được cấp phép kinh doanh các mẫu xe máy PKL lớn của Yamaha như: R3, MT03,…</p>
            <p>&#8226; Khi mua các mẫu xe máy Yamaha chính hãng tại Minh Long Motor, khách hàng sẽ được áp dụng hàng ngàn chương trình khuyến mãi từ Yamaha Việt Nam. Chính sách bảo hành chính hãng với sổ bảo hành theo dõi tiến trình bảo hành nghiêm ngặt.</p>
           </div>
            <img class="fade" src="Picture/Aboutus2.jpg">
        </div>

        <div class="About_us_title">
          <img class="fade" src="Picture/Aboutus1.jpg">
           <div class="About_us_title_second">
            <p>&#8226; Minh Long Motor là đại lý chính hãng của GPX Thái lan. Độc quyền nhập khẩu và phân phối các dòng xe GPX như: Demon GR200R, Demon 150GR, Demon 150 GN, Demon X, Legend 150S, Legend Gentleman, Legend 200,…</p>
            <p>&#8226; Bất kỳ dòng xe GPX nào được phân phối tại Việt Nam, khách hàng sẽ đều có thể tìm được tại Minh Long Motor với chất lượng tốt và giá cả hợp lý nhất.</p>
            <p>&#8226; Chưa hết, tại Minh Long Motor chúng tôi có phụ kiện GPX chính hãng và các kỹ sư được đào tạo theo quy trình từ GPX Thái Lan.Đến với Minh Long Motor để mẫu xe GPX bạn đạt chất lượng tốt nhất và tiết kiệm nhất.</p>
           </div>

        </div>

       </div>

      <div class="About_us_store">
        <h1>Các Đại lý Của Minh Long</h1>
         <div class="About_us_store_table">
          <table >
            <tr>
                <th class="aboutus1">Chi Nhánh</th>
                <th class="aboutus2" >Địa Chỉ</th>
                <th class="aboutus3" >Số Điện Thoại</th>
            </tr>
            <?php
$list = new Promotion;
$lis_agency = $list->list_agency();
if($lis_agency)
{
    while($result=$lis_agency->fetch_assoc())
    {
        ?>

            <tr>
                <td class="aboutus1" ><?php echo $result['agency_provine']?></td>
                <td class="aboutus2" ><?php echo $result['agency_adress']?></td>
                <td class="aboutus3" >0<?php echo $formattedNumber = number_format($result['agency_phone'], 0, '.', '.') ?></td>
            </tr>
            <?php
    }
}
            ?>
        </table>
         </div>
      </div>
      </div>
      <script>
          function fadeInOnScroll() {
    var imageContainers = document.querySelectorAll('.fade');

    imageContainers.forEach(function(imageContainer) {
      var position = element.getBoundingClientRect().top;
      var windowHeight = window.innerHeight;

      if (position < windowHeight) {
        imageContainer.style.opacity = 1;
      }

    });
  }
  window.addEventListener('scroll', fadeInOnScroll);
  </script> 
      <?php
      include"footer.php";
      ?>