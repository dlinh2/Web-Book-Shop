
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
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
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

        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn sách</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classBook.php");
        require_once("../../models/classAuthor.php");
        require_once("../../models/classPublisher.php");
        require_once("../../models/classTranslator.php");
        require_once("../../models/classCategory.php");

        $bookObj = new Book();
        $result = $bookObj->getBookById($id);
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $book = $bookObj->data;

        $authorObj = new Author();
        $result = $authorObj->getAuthorList();
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $authors = $authorObj->data;
        $result = $authorObj->getAuthorById($book["book_author_id"]);
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $book_author = $authorObj->data;
        unset($authorObj);

        $publisherObj = new Publisher();
        $result = $publisherObj->getPublisherList();
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $publishers = $publisherObj->data;
        $result = $publisherObj->getPublisherById($book["book_publisher_id"]);
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $book_publisher = $publisherObj->data;
        unset($publisherObj);

        $translatorObj = new Translator();
        $result = $translatorObj->getTranslatorList();
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $translators = $translatorObj->data;
        $result = $translatorObj->getTranslatorById($book["book_translator_id"]);
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $book_translator = $translatorObj->data;
        unset($translatorObj);

        $categoryObj = new Category();
        $result = $categoryObj->getCategoryList();
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $categories = $categoryObj->data;
        $result = $categoryObj->getCategoryById($book["book_category_id"]);
        if (!$result)
            die("<p>Trouble connecting to database</p>");
        $book_category = $categoryObj->data;
        unset($translatorObj);
    ?>
    <form name="form1" method="post" action="UpdateBookHandle.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$book["book_id"]?>">
        <input type="hidden" name="cover" value="<?=$book["book_cover"]?>">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Tên sách</td>
                <td width="300"><input type="text" name="tBookName" id="tBookName" value="<?=$book["book_name"] ?>" required></td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                    <select name="sAuthor" id="sAuthor">
                        <option value="<?=$book_author["author_id"] ?>"><?=$book_author["author_name"] ?></option>
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
                        <option value="<?=$book_publisher["publisher_id"]?>"><?=$book_publisher["publisher_name"]?></option>
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
                        <option value="<?=($book_translator == NULL) ? "" : $book_translator["translator_id"]?>"><?=($book_translator == NULL) ? "Select translator" : $book_translator["translator_name"]?></option>
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
                        <option value="<?=($book_category == NULL) ? "" : $book_category["category_id"]?>"><?=($book_category == NULL) ? "Select category" : $book_category["category_name"]?></option>
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
                    <input type="radio" name="rStatus" id="r1" value="1" <?php if($book["book_status"]) echo "checked"?>>
                    <label for="r2">Không</label>
                    <input type="radio" name="rStatus" id="r2" value="0" <?php if(!$book["book_status"]) echo "checked"?>>
                </td>
            </tr>
            <tr>
                <td>Số trang</td>
                <td><input type="text" name="tPages" id="tPages" value="<?=$book["book_pages"]?>"></td>
            </tr>
            <tr>
                <td>Kích thước</td>
                <td><input type="text" name="tSizes" id="tSizes" value="<?=$book["book_sizes"]?>"></td>
            </tr>
            <tr>
                <td>Ngày xuất bản</td>
                <td><input type="date" name="dPublishDate" id="dPublishDate" value="<?=$book["book_publish_date"]?>" required></td>
            </tr>
            <tr>
                <td>Giá tiền</td>
                <td><input type="text" name="tPrice" id="tPrice" value="<?=$book["book_price"]?>"></td>
            </tr>
            <tr>
                <td>Ảnh bìa</td>
                <td><input type="file" name="fCover" id="fCover"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="tDescription" id="tDescription" value="<?=$book["book_description"]?>"></td>
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
