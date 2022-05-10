<?php

if (isset($_POST['page'])) {
    $query = "SELECT COUNT(*) as num from produit";

    $total_pages = mysqli_fetch_array(mysqli_query($link, $query));
    $total_pages1 = $total_pages['num'];

    $total_pages = $total_pages1;

    $limit = 40;


    $page = ($_POST['page']);





//first item to display on this page
    if ($page)
        $start = ($page - 1) * $limit;
    else
        $start = 40;


    /* Setup page vars for display. */
    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1


    /*
      Now we apply our rules and draw the pagination object.
      We're actually saving the code to a variable in case we want to draw it more than once.
     */
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<nav><ul class='pagination pull-right' >";
        //previous button
        if ($page > 1)
            $pagination .= "<li><a href='javascript:recherche_startup($prev)' class='previous' > <i class='fa fa-angle-left'></i> </a></li>";
        else
            $pagination .= "<li class='disabledlist hidden previous'><a> <i class='fa fa-angle-left'></i></a> </li>";

        //pages
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li class='active'><a>$counter</a></li>";
                else
                    $pagination .= "<li><a href='javascript:recherche_startup($counter)' >$counter</a></li>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a>$counter</a></li>";
                    else
                        $pagination .= "<li><a href='javascript:recherche_startup($counter)' >$counter</a></li>";
                }
                $pagination .= "<li><span>...</span></li>";
                $pagination .= "<li><a href='javascript:recherche_startup($lpm1)' >$lpm1</a></li>";
                $pagination .= "<li><a href='javascript:recherche_startup($lastpage)' >$lastpage</a></li>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<li><a href='javascript:recherche_startup(1)' >1</a></li>";
                $pagination .= "<li><a href='javascript:recherche_startup(2)' >2</a></li>";
                $pagination .= "<li><span>...</span></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a>$counter</a></li>";
                    else
                        $pagination .= "<li><a href='javascript:recherche_startup($counter)' >$counter</a></li>";
                }
                $pagination .= "<li><span>...</span></li>";
                $pagination .= "<li><a href='javascript:recherche_startup($lpm1)' >$lpm1</a></li>";
                $pagination .= "<li><a href='javascript:recherche_startup($lastpage)' >$lastpage</a></li>";
            }
            //close to end; only hide early pages
            else {
                $pagination .= "<li><a href='javascript:recherche_startup(1)' >1</a></li>";
                $pagination .= "<li><a href='javascript:recherche_startup(2)' >2</a></li>";
                $pagination .= "<li><span>...</span></li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a>$counter</a></li>";
                    else
                        $pagination .= "<li><a href='javascript:recherche_startup($counter)' >$counter</a></li>";
                }
            }
        }

        //next button
        if ($page < $counter - 1)
            $pagination .= "<li><a href='javascript:recherche_startup($next)' class='next' > <i class='fa fa-angle-right'></i> </a></li>";
        else
            $pagination .= "<li class='disabledlist hidden next'> <a><i class='fa fa-angle-right'></i></a> </li>";

        $pagination .= "</ul><div class='clear'> </div></nav>";
    }
}
