<?php include "connect.php"?>

<html>
<head><meta charset="utf-8"></head>
<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");          

        if (!empty($_REQUEST)){
            $value = '%'. $_REQUEST["keyword"]. '%';        //ดึงค่าที่ส่งมากำหนดให้กับตัวแปรเงื่อนไข
        }
        $stmt->bindParam(1, $value);    //กำหนดตัวแปรเงื่อนไขที่จุดกำหนด ? ไว้
        $stmt->execute();   //เริ่มค้าหา
    ?>  
        
    <?php while($row = $stmt->fetch()){  ?>
        ชื่อสมาชิก: <?=$row["name"]?><br>
        ที่อยู่: <?=$row["address"]?><br>
        อีเมล: <?=$row["email"]?><br>    
        <div>
            <img src='member_photo/<?=$row["username"]?>.jpg'><br>
        </div> <hr>            
    <?php } ?>
    
</body>
</html>