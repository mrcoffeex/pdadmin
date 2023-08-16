<?php  
    //put alerts here
    $currpage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

    $note = @$_GET['note'];


    if ($note == "error") {
        echo "
            <script>
                toastr.error('Error');
            </script>
        ";
    } else {

        //index
        
        if ($currpage == "index" || $currpage == "" || $currpage == "login") {
        
            if ($note == "noexist") {
                echo "
                    <script>
                        toastr.error('Either username or password is incorrect');
                    </script>
                ";
            } else if ($note == "suspended") {
                echo "
                    <script>
                        toastr.error('Account is suspended');
                    </script>
                ";
            } else if ($note == "captcha_error") {
                echo "
                    <script>
                        toastr.error('Captcha error');
                    </script>
                ";
            } else {
                echo "";
            }

        }
        
        // users
        
        if ($currpage == "users" || $currpage == "user_search") {
            
            if ($note == "user_added") {
                echo "
                    <script>
                        toastr.success('User has been added');
                    </script>
                ";
            } else if ($note == "user_updated") {
                echo "
                    <script>
                        toastr.success('User has been updated');
                    </script>
                ";
            } else if ($note == "user_remove") {
                echo "
                    <script>
                        toastr.success('User has been removed');
                    </script>
                ";
            } else if ($note == "char_exceed") {
                echo "
                    <script>
                        toastr.error('Email must be NOT greater than 50 characters');
                    </script>
                ";
            } else if ($note == "pass_exceed") {
                echo "
                    <script>
                        toastr.error('Password must be NOT greater than 16 characters');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        if ($currpage == "profile") {

            if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Profile Updated!');
                    </script>
                ";
            }else if ($note == "requested") {
                echo "
                    <script>
                        toastr.success('Request Submitted!');
                    </script>
                ";
            }else if ($note == "nomatch") {
                echo "
                    <script>
                        toastr.danger('incorrect old password!');
                    </script>
                ";
            }else if ($note == "password_update") {
                echo "
                    <script>
                        toastr.success('Password Updated!');
                    </script>
                ";
            }else{
                echo "";
            }

        }

        if ($currpage == "reports") {

            if ($note == "report_updated") {
                echo "
                    <script>
                        toastr.success('Changes saved!');
                    </script>
                ";
            }else if ($note == "report_removed") {
                echo "
                    <script>
                        toastr.success('Report has been removed!');
                    </script>
                ";
            }else{
                echo "";
            }

        }
        

    }
    

    if ($note == "not_string" && $currpage == "error") {
        echo "
            <script>
                toastr.error('Input is not a string');
            </script>
        ";
    }else if ($note == "not_post_email" && $currpage == "error") {
        echo "
            <script>
                toastr.error('Input is not a POST email');
            </script>
        ";
    }else if ($note == "not_get_email" && $currpage == "error") {
        echo "
            <script>
                toastr.error('Input is not a GET email');
            </script>
        ";
    }else if ($note == "not_post_int" && $currpage == "error") {
        echo "
            <script>
                toastr.error('Input is not a POST integer');
            </script>
        ";
    }else if ($note == "not_get_int" && $currpage == "error") {
        echo "
            <script>
                toastr.error('Input is not a GET integer');
            </script>
        ";
    }else{
        echo "";
    }
?>