
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="AddTranslator.css?v=<?php echo time(); ?>">
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
        selector: '#tTranslatorBio',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classTranslator.php")
    ?>
    <form name="form1" method="post" action="AddTranslatorHandle.php" enctype="multipart/form-data">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Tên dịch giả</td>
                <td width="300"><input type="text" name="tTranslatorName" id="tTranslatorName"></td>
            </tr>

            <tr>
                <td width="155">Tiểu sử</td>
                <td width="300"><input type="text" name="tTranslatorBio" id="tTranslatorBio"></td>
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
