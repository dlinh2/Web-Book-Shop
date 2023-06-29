<html>
    <head>
        <link rel="stylesheet" href="AddBook.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classBook.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }

        function UploadFile($inputName, $Folder)
        {
            $filename="";//tên tệp upload sẽ lưu trên máy chủ
            $temptFile="";//đường dẫn tệp tạm đã upload trên máy chủ
            $errors =  array();//mảng chứa thông báo lỗi
            if(isset($_FILES[$inputName])&&$_FILES[$inputName]["error"]==0)
            {
                $filename = $_FILES[$inputName]["name"];//lấy tên của file ảnh gốc
                $temptFile = $_FILES[$inputName]["tmp_name"];//lấy đường dẫn file ảnh đã upload trên thư mục tạm
                //kiểm tra kích thước tệp không quá 1MB
                $file_size = $_FILES[$inputName]["size"];//kích thước tệp
                if($file_size > 1048576)
                {
                    $errors[] = "<p>Lỗi upload ảnh do vượt quá kích thước</p>";
                }
                //kiểm tra kiểu file
                $arr = explode('.',$filename);//tách tên file thành mảng các chuỗi cách nhau bởi dấu chấm
                $duoitep=strtolower(end($arr));//lấy phần đuôi tệp và chuyển thành chữ thường
                $hople = array("jpg","png","gif","jped");
                if(in_array($duoitep,$hople)==false)//nếu đuôi tệp không nằm trong danh sách hợp lệ
                {
                    $errors[] = "<p>Lỗi upload ảnh do sai loại tệp</p>";
                }
                //kiểm tra và báo lỗi
                if(empty($errors)==true)//nếu không có lỗi
                    move_uploaded_file($temptFile,"$Folder/$filename");
                else
                {
                    print_r($errors);
                    die("<p> LỖI UPLOAD ẢNH</p>");
                }
            }
            return $filename;
        }

        $bookName = $_POST["tBookName"];
        $authorId = $_POST["sAuthor"];
        $publisherId = $_POST["sPublisher"];
        $translatorId = isset($_POST["sTranslator"]) ? $_POST["sTranslator"] : NULL;
        $categoryId = isset($_POST["sCategory"]) ? $_POST["sCategory"] : NULL;
        $status = $_POST["rStatus"];
        $pages = $_POST["tPages"];
        $sizes = $_POST["tSizes"];
        $publishDate = $_POST["dPublishDate"];
        $price = $_POST["tPrice"];
        $cover = UploadFile("fCover", "img");
        $description = $_POST["tDescription"];

        $book = new Book();
        $result = $book->addBook($bookName, $categoryId, $authorId, $translatorId, $publisherId, 
                                 $status, $pages, $sizes, $publishDate, $description, $price, $cover);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='BookList.php';</script>";
            //header('Location: BookList.php');
            die();
        } else {
            echo "<h1> Lỗi thêm dữ liệu</h1>";
        }
        ?>
        <h1><a href="BookList.php">Danh sách</a></h1>
    </body>
</html>
