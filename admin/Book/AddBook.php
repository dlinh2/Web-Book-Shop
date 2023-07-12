
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="AddBook.css?v=<?php echo time(); ?>">
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
        selector: '#tDescription',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        function checkForm() {
            author = document.getElementById("sAuthor");
            publisher = document.getElementById("sPublisher");
            if (author.value == "") {
                alert("Hãy chọn tác giả");
                return false;
            }
            if (publisher.value == "") {
                alert("Hãy chọn nhà xuất bản");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classAuthor.php");
        require_once("../../models/classPublisher.php");
        require_once("../../models/classTranslator.php");
        require_once("../../models/classCategory.php");
        
        $authorObj = new Author();
        $result = $authorObj->getAuthorList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $authors = $authorObj->data;
        unset($authorObj);

        $publisherObj = new Publisher();
        $result = $publisherObj->getPublisherList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $publishers = $publisherObj->data;
        unset($publisherObj);

        $translatorObj = new Translator();
        $result = $translatorObj->getTranslatorList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $translators = $translatorObj->data;
        unset($translatorObj);

        $categoryObj = new Category();
        $result = $categoryObj->getCategoryList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $categories = $categoryObj->data;
        unset($translatorObj);
    ?>
    <form name="form1" method="post" action="AddBookHandle.php" enctype="multipart/form-data">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Tên sách</td>
                <td width="300"><input type="text" name="tBookName" id="tBookName" required></td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                    <select name="sAuthor" id="sAuthor">
                        <option value="">Select author</option>
                        <?php foreach ($authors as $author) { ?>
                        <option value="<?=$author["author_id"] ?>"><?=$author["author_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>
                    <select name="sPublisher" id="sPublisher">
                        <option value="">Select publisher</option>
                        <?php foreach ($publishers as $publisher) { ?>
                        <option value="<?=$publisher["publisher_id"] ?>"><?=$publisher["publisher_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Dịch giả</td>
                <td>
                    <select name="sTranslator" id="sTranslator">
                        <option value="">Select translator</option>
                        <?php foreach ($translators as $translator) { ?>
                        <option value="<?=$translator["translator_id"] ?>"><?=$translator["translator_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nhóm</td>
                <td>
                    <select name="sCategory" id="sCategory">
                        <option value="">Select category</option>
                        <?php foreach ($categories as $category) { ?>
                        <option value="<?=$category["category_id"] ?>"><?=$category["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <label for="r1">Có</label>
                    <input type="radio" name="rStatus" id="r1" value="1" checked>
                    <label for="r2">Không</label>
                    <input type="radio" name="rStatus" id="r2" value="0">
                </td>
            </tr>
            <tr>
                <td>Số trang</td>
                <td><input type="text" name="tPages" id="tPages"></td>
            </tr>
            <tr>
                <td>Kích thước</td>
                <td><input type="text" name="tSizes" id="tSizes"></td>
            </tr>
            <tr>
                <td>Ngày xuất bản</td>
                <td><input type="date" name="dPublishDate" id="dPublishDate" required></td>
            </tr>
            <tr>
                <td>Giá tiền</td>
                <td><input type="text" name="tPrice" id="tPrice"></td>
            </tr>
            <tr>
                <td>Ảnh bìa</td>
                <td><input type="file" name="fCover" id="fCover"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="tDescription" id="tDescription"></td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="b1" id="b1" value="Đồng ý" onclick="return checkForm()">
                    &nbsp;&nbsp;
                    <input type="reset" name="b2" id="b2" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
