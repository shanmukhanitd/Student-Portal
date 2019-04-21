# Student-Portal

   # About Project
We have created a student Information Service for college students. Any student can create a profile in this website and store his/her information on our database. The student first has to fill a registration form with his details and submit it for verification. This registration request will be sent to the Administrator, and he/she shall verify it and decide if the student is fit to be accepted in the Database. After being registered successfully, the student can Log Into his account. The student can thereafter view his/her profile, update the details if necessary. 

Our Website is user friendly, if any student has any complaints regarding anything, he/she can feel free to write about it in feedback, the Administration will get back to you. 

FRONT END:         HTML, CSS, JavaScript, jQuery
BACK END:           PHP, MySQL
SERVER USED:    XAMPP

# HOME PAGE
(home.php)
We have a Navigation Bar at the top, through which user can navigate to different web pages of the web site. 
The admin/student will first have to Login/register into their account.
The navbar will show different fields before and after registration.
We did this by checking the sessions that is anyone logged in or not. If logged then whether it is student or administrator like below code sample.

      if(isset($_SESSION['username'])){
              echo '<a href="student.php">Profile</a>
              <a href="request.php">Request</a>
              <a href="student_feedback.php">Feedback</a>
              <a href="about/Aboutus.php">About Us</a>

              <a href="logout.php" style="float: right; margin-right: 10px;">Logout</a>';
            }

# REGISTRATION SYSTEM
(registerPage.php)
New Users can register by filling the registration form and submitting it.
While filling the details he/she will get the instructions/errors there itself. If he/she will neglect the errors and enter the Submit button then the cursor will move to the filed where there is a error. So without rectifying the errors he/she can’t submit the form.We used inline validation to verify the data.
When the user types the username/RollNo/RegistrationNo then it will check in the database whether the data is already exists or not. If exists it will show the error.
Sample code:

	   $.post('verify.php',{'user':user},function(data,status,xhr){
                    if(data=="yes")
                        document.getElementById("userspan").innerHTML = "Username already exist, please use another one";
                    else
                        document.getElementById("userspan").innerHTML="";
                });

Once the entered fields are correct then he can submit his registration. On successful submition his/her registration will go to administrator for verification.  After accepting the user can Login into his Account.

# LOGIN SYSTEM
(loginpage.php)
A registered user has to fill the username and password and enter submit to Log into his account. The entered username/password combination will be matched with the database, and if a match is found, the user is Logged in Successfully.If not then a particular error will be displayed to him/her whether it is incorrect/registration pending/registration is rejected by checking the status of the registration.
After logging the session is created and he/she will be directed to Student Profile page.

# FORGOT PASSWORD
(forgot_password.php)
If any user forgots his/her account password they can change their password through their registered email account. First of all the user has to enter his username. After entering the username he/she will receive an OTP to the registered email account. On successful OTP he/she can enter new password. To send the OTP we used PHPMAILER and created a gmail account to send the mails.

# STUDENT PROFILE
(student.php)
After Logging in for the very first time, the user will be asked to upload his/her profile picture and fill details about his marks in a form and the user can only either enter the details or logout. The files with ext .jpg .jpeg .png are accepted.The photos with be saved with his/her RollNo. Once the user selects the Semester then fields will be showed to enter the marks.
                          
After submitting this form, the user will be shown his Profile. He/She can Edit his profile if necessary by clicking Edit Profile button he will be forwared to Edit Profile page. He can check his academics details. On clicking academics the semester details are showed. He can take the Print out of the Grade Card. We calculated CGPA as per our college criteria.

# EDIT PROFILE
(EditProfile.php)
The only fields that can be edited by the user are username, password, mobile no, address. Here a set of Check boxes will appear and the user has to select which fields to edit once he continues then there will be the text fields to enter the new data. Here also we used inline validation and also checked for username existence. After successful update it will check whether the username/password are changed or not. If changed then the user’s session will be destroyed and he/she will be forwarded to login page or else to his Profile page.

# UPDATE PROFILE REQUEST
(request.php)
Registered Users can update their profile by filling update profile form.It is same as edit profile and the fields are other than that user can edit by himself.
This update request will be dealt by the administrator, it can either be accepted or rejected by the administrator. The user will be notified about this via Email.

# FEEDBACK
(student_feedback.php)
The user can ask any question to the admin. On the top he will be provided with a field to ask a question. Below that there are the questions that were already answered by the admin. At a time he can check only one answer by clicking on the question. After submitting the question the question will go to the administration to answer. Please check the previously asked questions before asking a question.

# ADMIN LOGIN SYSTEM
(adminLogin.php)
It is same as student login page where it checks whether the entered details are correct or not and shows error if occurs. After successful login the admin will be forwarded to Admin Page. Details are checked in login.php file.

# ADMIN PAGE
(admin.php)
On the top of it there will be a navbar which contains home,updateRequest, Accept, Reject, Pending, Feedback, About us, Logout.
The fields updateRequest, Accept, Reject, Pending works on AJAX. While loading the page Pending option is hidden and list of new student are showed. On clicking any of these options the respective option will be hidden and relative data will be showed.
UpdateRequest – displays list of students who are requested to update.
Accept – display list of accepted students.
Reject – displays list of rejected students.
Pending – displays list of pending students.

We stored the username of each entry in input of ‘hidden’ type. On clicking View Details/Show Request it is forwarded to accept_reject.php page where the whole details of that user will be displayed.

# VIEW DETAILS
(accept_reject.php)
It works for both update/reject the request and accept/reject the profile.
For update/reject the request there will be the data of the user that want to update. He will be provided to 2 options update and reject. On clicking update option the details will be update and the specified user will be specified through the registered email. Similar case to the reject option.             
The admin can check the complete details of the user by clicking on Complete Details option.
For accept/reject list admin will be provided with Accept and Reject options at the bottom. On clicking accept then that user can access his account else he can’t.

# Feedback
(admin_faq.php)
It contains same styles as student feedback page. Here the admin will get the questions asked by the students that are not yet answered. On clicking on the question a text box is opened along with submit button. Admin can either answers it or leave it. After answering the question the students can see the answer of that question.

# LOGOUT
(logout.php)
Here the session will be unset through session_unset() method and user can logout. On clicking logout option in his account then he will be forwarded to home page where he will be notified with You were Successfully Logged out on the top of the home page for 4 seconds.
Sample Code :
            if(isset($_GET['logout'])){
                echo '<div style="width: 100%; background-color: green; margin-top:-20px; margin-bottom:-20px; text-align: center;">
                          <h2 id="success"></h2>
                      </div>
                      <script>
                          setTimeout(function () {
                              document.getElementById("success").innerHTML = "";
                              window.location.href="home.php";
                          }, 4000);
                          document.getElementById("success").innerHTML="You were Successfully Logged out.";
                      </script>'; 
            }
