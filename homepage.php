<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MakeMyDay - Welcome , Please Login or Register</title>
        <link href="styles/stylesheet.css" rel="stylesheet" type="text/css"/>
         <link href="styles/forms.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="welcomePage_header">
            <div class="welcomePage_headerWrap">
                <div class="welcomePage_logo"><a href="index.php"><img src="images/logoBig.png" alt="logo" width="242" height="32"/></a> </div>
                <div class="welcomePage_login">
                    <form name="welcomePage_horizontalLoginForm" action="login.php" method="post">
                        <input type="text" id="welcomePage_email" name="loginEmail" value="krisje.temmerman@gmail.com"/>
                        <input type="password" id="welcomePage_password" name="loginPassword" value="lala"/>
                        <input type="submit" id="welcomePage_submit" value="Login"/>
                        <div id="status"></div>
                    </form>
                </div>
            </div>
        </div>

       <div class="welcomePage_Container">
           <h1> Want to become a regular member? </h1>
           <div class="welcomePage_registerMember">
               <div class="plus">
                   <img src="images/add1-48.png" width="48" height="48" alt="Add Member" />
               </div>
               <div class="divwrap">
               <form name="welcomePage_Member" method="post" action="regMemberTwo.php">
                   <label>
                       <span> First Name: </span>
                       <input type="text" class="input-text" name="fName" id="firstName"/>
                   </label>
                   <label>
                       <span> Last Name: </span>
                       <input type="text" class="input-text" name="lName" id="firstName"/>
                   </label>
                   <label>
                   <span> Gender: </span>

                   <select name="mGender" class="tb" id="mGender">
                          <option value="0">Select Gender</option>
                          <option value="Man">Man</option>
                          <option value="Woman">Woman</option>
            		</select>
                   </label>
               </form>
                   <div class="spacer"><a href="javascript:submitMember()" onClick="" class="green">Continue to step 2</a> </div>
               </div>
           </div>


           <div class="welcomePage_registerAdvert">

               <div class="plus">
                   <img src="images/add1-48.png" width="48" height="48" alt="Add Member" />
               </div>
               <div class="divwrap">

               <form name="welcomePage_Advertiser" method="post" action="regMemberTwo.php">
                   <label>
                       <span> Name: </span>
                       <input type="text" class="input-text" name="fName" id="firstName"/>
                   </label>
                   <label>
                       <span> Store Name: </span>
                       <input type="text" class="input-text" name="lName" id="firstName"/>
                   </label>
                   <label>
                       <span> email: </span>
                       <input type="text" class="input-text" name="lName" id="firstName"/>
                   </label>
                   <label>
                       <span> password: </span>
                       <input type="password" class="input-text" name="lName" id="firstName"/>
                   </label>

               </form>
               <div class="spacer"><a href="#" onClick="" class="green">Continue to step 2</a> </div>
               </div>
           </div>

       </div>

        <script language="javascript" type="text/javascript">
            $(document).ready(function(){
                $("#welcomePage_login").submit(function(){
                   var emailval = $("#welcomePage_email").val();
                   var pwordval = $("#welcomePage_password").val();
                   $.post("login.php",{loginEmail: emailval, loginPassword: pwordval},
                    function(data){
                        $("#status p").html(data);
                    });
                });
            });
        function submitMember(){
            document.forms["welcomePage_Member"].submit();
        }
        </script>


    </body>
</html> 