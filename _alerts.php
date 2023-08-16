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

        //report

        if ($currpage == "pending") {
        
            if ($note == "added") {
                echo "
                    <script>
                        toastr.success('Your report has been submitted for review.');
                    </script>
                ";
            } else {
                echo "";
            }

        }

    }
?>