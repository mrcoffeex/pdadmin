<?php  
    //pagination
        
    $getPaginate=dbconnect()->prepare("SELECT 
                                    COUNT(user_uid) 
                                    From 
                                    users 
                                    Where
                                    user_uid != :user_uid 
                                    AND
                                    CONCAT
                                    (
                                        user_username,
                                        user_fullname
                                    )
                                    LIKE :searchText
                                    Order By 
                                    user_fullname 
                                    ASC");
    $getPaginate->execute([
        'user_uid' => 1,
        'searchText' => "%$searchText%"
    ]);
    $paginates=$getPaginate->fetch(PDO::FETCH_BOTH);

    $page_rows = 15;
    $last = ceil($paginates[0]/$page_rows);
    
    if($last < 1){
        $last = 1;
    }
    
    $pagenum = 1;
    
    if(isset($_GET['pn'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }
    
    if ($pagenum < 1) { 
        $pagenum = 1; 
    } else if ($pagenum > $last) { 
        $pagenum = $last; 
    }
    
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    
    $paginate=dbconnect()->prepare("SELECT 
                                    * 
                                    From 
                                    users 
                                    Where
                                    user_uid != :user_uid
                                    AND
                                    CONCAT
                                    (
                                        user_username,
                                        user_fullname
                                    )
                                    LIKE :searchText
                                    Order By 
                                    user_fullname 
                                    ASC $limit");
    $paginate->execute([
        'user_uid' => 1,
        'searchText' => "%$searchText%"
    ]);
    
    $paginationCtrls = '';

    if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'&searchText='.$searchText.'" ><i class="fa fa-angle-left"></i></a></li>';
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&searchText='.$searchText.'" >'.$i.'</a></li>';
                }
            }
        }

        $paginationCtrls .= '<li class="page-item active"><a class="page-link">'.$pagenum.'</a></li>';
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'&searchText='.$searchText.'" >'.$i.'</a></li>';
            if($i >= $pagenum+4){
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'&searchText='.$searchText.'" ><i class="fa fa-angle-right"></i></a></li>';
        }
    }
?>