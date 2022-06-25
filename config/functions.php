<?php
    function newsRead($id)
    {
        require "config/connect.php";
        $news = mysqli_query($connect, "SELECT * FROM `news` WHERE id_title in ($id)");
        $news = mysqli_fetch_all($news);
        for ($i = 0; $i < count($news); $i++)
                    {
                    ?>
                    <div style="display: flex; margin-left: 5%; margin-right: 5%; margin-bottom: 5%;">
                        <div style="display: inline-block; width: 50%; margin-right: 5px;">
                            <?=$news[$i][2]?>
                        </div>
                        <picture style="width: 50%; height: auto;">
                            <?php
                            echo '<img src="images/'.$id.'-'.($i+1).'.jpg" style="width: 100%; height: auto; border: 2px solid black; border-radius: 15px;" alt="">'
                            ?>
                        </picture>
                    </div>
                    <?php
                    }
    }
?>