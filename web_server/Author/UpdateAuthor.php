
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="AddAuthor.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/s1sa2i3odteu3pqmlf3qu5yb8g9qvxsyt3casw19doazxv49/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
        tinymce.init({
        selector: '#tAuthorBio',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
</head>
<body>
    <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<p>Chưa chọn tác giả</p>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classAuthor.php");
        $authorObj = new Author();
        $result = $authorObj->getAuthorById($id);
        if (!$result) {
            die("<h3> Lỗi lấy dữ liệu từ database");
        }
        $author = $authorObj->data;
    ?>
    <form name="form1" method="post" action="UpdateAuthorHandle.php" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$author["author_id"]?>">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">ID tác giả</td>
                <td width="300"><p><?=$author["author_id"]?></p></td>
            </tr>
            <tr>
                <td width="155">Tên tác giả</td>
                <td width="300"><input type="text" name="tAuthorName" id="tAuthorName" value="<?=$author["author_name"]?>"></td>
            </tr>

            <tr>
                <td width="155">Tiểu sử</td>
                <td width="300"><input type="text" name="tAuthorBio" id="tAuthorBio" value="<?=$author["author_bio"]?>"></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="b1" id="b1" value="Đồng ý">
                    &nbsp;&nbsp;
                    <input type="reset" name="b2" id="b2" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
