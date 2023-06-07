
    <style>  
    .cate-left_li ul {
        display: none;
    }

    </style>
    <section class="admin_content">

        <div class="admin_content_left">
            <h1>Quản lý</h1>
            <ul>
                <li class="cate-left_li">&#187;<a href="#">Danh Mục menu</a>
                    <ul>
                        <li><a href="caterory.php">Thêm danh mục</a></li>
                        <li><a href="catelist.php">Danh sách danh mục</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Danh mục con</a>
                    <ul>
                        <li><a href="brandadd.php">Thêm danh mục</a></li>
                        <li><a href="brandlist.php">Danh sách danh mục</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Yêu cầu tư vấn</a>
                    <ul>
                        <li><a href="customer_inf.php">Danh Sách đợi</a></li>
                        <li><a href="customer_infed.php">Danh sách bình luận</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Danh sách đơn hàng</a>
                    <ul>
                        <li><a href="receipt.php">Danh Sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Sản Phẩm</a>
                    <ul>
                        <li><a href="productadd.php">Thêm sản phẩm</a></li>
                        <li><a href="productlist.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>   
                <li class="cate-left_li">&#187;<a href="#">Sản phẩm theo đại lý</a>
                    <ul>
                        <li><a href="hasadd.php">Thêm sản phẩm</a></li>
                        <li><a href="haslist.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Tin tức</a>
                    <ul>
                        <li><a href="promotionadd.php">Thêm tin tức</a></li>
                        <li><a href="promotionlist.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li class="cate-left_li">&#187;<a href="#">Bảng Màu</a>
                    <ul>
                        <li><a href="addcolor.php">Thêm Màu Xe</a></li>
                        <li><a href="colorlist.php">Danh sách màu xe</a></li>
                    </ul>
                </li> 
                <li class="cate-left_li">&#187;<a href="#">Đại lý</a>
                    <ul>
                        <li><a href="add.php">Thêm đại lý</a></li>
                        <li><a href="list.php">Danh sách đại lý</a></li>
                    </ul>
                </li> 
                <li style="border-bottom: 1px solid white;" class="cate-left_li ad">&#187;<a href="#">Tài Khoản</a>
                    <ul>
                        <li><a href="addacount.php">Thêm Tài Khoản</a></li>
                        <li><a href="adminlist.php">Danh sách tài khoản</a></li>
                    </ul>
                </li> 
                <li class="log-out">
                <i class="fa fa-right-from-bracket"></i>


                <form method="post" action="login.php" >
                        <button  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất')"  style="border: none; width:100px; height:40px; background-color: aqua;" >Đăng xuất</button>
                </form>
                   
                </li>
            </ul>
        </div>









    <script>

                const itemlider = document.querySelectorAll(".cate-left_li")
                itemlider.forEach(function(menu,index)
                {
                        menu.addEventListener("click",function()
                        {
                            const subMenu = menu.querySelector("ul");
                            if (subMenu.style.display === "block") {
                                subMenu.style.display = "none";
                            } else {
                                subMenu.style.display = "block";
                            }
                        })
                })
    </script>
