<?php
    session_start(); 
    if(!isset($_SESSION['adminusername'])){
        header("Location: adminLogin.php");
    }
    if(isset($_SESSION['username'])){
        header("Location: student.php");
    }
?>
<?php 
    if(isset($_POST['submita'])){
        include_once 'connect.php';
        $question=$_POST['question'];
        $answer=$_POST['answer'];
        $sql='UPDATE faq SET answer="'.$answer.'" WHERE question="'.$question.'";';
        $con->query($sql);
        header("Location: admin_faq.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <title>Feedback</title>
    <style>
         body{
             background-image: url("2.jpg");
             font-family: "Trebuchet MS";
         }
         .ans{
             margin-left: 50px; 
             padding: 5.5px;
             border:1px solid #555;
             margin-top:8%;
             background-color: rgb(236, 152, 152);

         }
         #ques{
             margin:20px;
         }
         textarea{
             width:60%;
             border: 2px solid #555;
              border-radius: 4px;
             margin-top:20px;
             margin-left:20px;
             padding: 40px;
         }
         .submit{
             padding: 6px;
             border: 1px solid #555;
             margin-left:50px;
             margin-top:20px;
             background-color: rgb(236, 152, 152);
         }
         input[type="submit"]:hover
            {
                cursor: pointer;
                background: #345434;
            }
        .faq{
             border-bottom: 1px solid #555;
             margin: 10px;
         }
            
            .faq_question {
                margin: 0px;
                padding: 0px 0px 5px 0px;
                display: inline-block;
                cursor: pointer;
                font-weight: bold;
            }
            
            .faq_answer_container {
                display: none;
            }
    </style>
</head>
<body>
    <div class="navbar">
            <a href="home.php">Home</a>
            <a href="admin.php">AdminPage</a>
            <a href="about/Aboutus.php">About Us</a>
            <a href="logout.php" style="float: right; margin-right: 5%;">Logout</a>
    </div>

     <div id="ques">
        <?php 
            include_once 'connect.php';
            $sql="select question from faq where answer is NULL;";
            $result=$con->query($sql);
            if($result->num_rows>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo '<div class="faq"><div class="faq_question"> Q. '.$row["question"].' </div>';
                    echo '<br><div class="faq_answer_container">
                        <form action="admin_faq.php" method="POST">

                             <input type="hidden" name="question" value="'.$row["question"].'"> <br>
                             <textarea rows="5" cols="50" name="answer" required>
                                 
                             </textarea><br>
                            <input type="submit" class="submit" name="submita" value="Submit"><br><br><br>
                        </form>
                     </div> </div>';
                }             
            }
        ?>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.faq_question').click(function() {
                if ($(this).parent().is('.open')) {
                    $(this).closest('.faq').find('.faq_answer_container').slideUp();
                    $(this).closest('.faq').removeClass('open');
                } else {
                    $('.faq_answer_container').slideUp();
                    $('.faq').removeClass('open');
                    $(this).closest('.faq').find('.faq_answer_container').slideDown();
                    $(this).closest('.faq').addClass('open');
                }
            });
        });
    </script>
</body>
</html>