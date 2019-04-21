<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: loginpage.php");
    }
    if(isset($_POST['submitq'])){
        include_once 'connect.php';
        $question=$_POST['question'];
        $sql="INSERT into faq(question) values('".$question."');";
        if($con->query($sql)){
            echo '<script> alert("Thanks for asking your doubts, We will get to you back soon."); 
            window.location.href="student_feedback.php"; </script>';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>faq</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">
    <style>
        /*FAQS*/
        body{
            background-image: url("2.jpg");
            
            opacity: 0.7;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

        }
        #submit{
            margin-left:760px;
            padding: 6px;
            border: 1.2px solid #666;
        }
        input[type=text] {
           width:60%;
           padding:20px;
           border: 2px solid #555;
          border-radius: 4px;
     }
     .faq{
         
         border-bottom: 1px solid #555;
     }
        
        .faq_question {
            margin: 0px;
            padding: 0px 0px 5px 0px;
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
        }
        
        .faq_answer_container {
            padding-left: 25px;
            display: none;
        }
    </style>
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
</head>

<body>
    <div class="navbar">
            <a href="home.php">Home</a>
            <a href="student.php">Profile</a>
            <a href="request.php">Update Request</a>
            <a href="about/Aboutus.php">About Us</a>
            <a href="logout.php" style="float: right; margin-right: 5%;">Logout</a>
    </div>
    <h2>FAQ</23>
    <br>
    <h4>Ask a Question :</h4>
    <form action="student_feedback.php" method="POST">
        <input type="text" name="question" id="question"><br><br>
        <input type="submit" name="submitq" id="submit">
    </form>
    <br><br>

    <div class="faq_container" >
        <?php 
            include_once 'connect.php';
            $sql="SELECT * from faq where answer is not NULL;";
            $result=$con->query($sql);
            if($result->num_rows>0){
                while ($row=mysqli_fetch_assoc($result)) {
                    echo '<div class="faq"><div class="faq_question open">'.$row['question'].'</div>';
                    echo '<div class="faq_answer_container"><div class="faq_answer">'.$row["answer"].'<br></div></div></div><br>';
                }
            }
        ?>

</body>

</html>