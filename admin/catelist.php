<?php 
include "header.php";
include "slider.php";
include "class/caterory_class.php";
?>
    <?php
    $cartegory = new Caterory;
    $show_category = $cartegory -> show_caterory();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="caterory.php">ADD</a>
                    </div>
                    <table>
                        <tr>
                            <th>stt</th>
                            <th>ID</th>
                            <th>Danh Muc</th>
                            <th>Tuy bien</th>
                        </tr>
                        <?php 
                        if($show_category)
                        {
                            $i=0;
                            while( $result = $show_category->fetch_assoc())
                            {$i++;
                        
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $result['id']?></td> 
                            <td><?php echo $result['name']?></td>
                            <td><a href="cateroryupdate.php?caterory_id=<?php echo $result['id'] ?>">Sua</a>|<a href="caterorydelete.php?caterory_id=<?php echo $result['id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>