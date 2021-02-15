<?php 
/* 게시판 페이징 모듈 작성자 : SofWa 넘겨 받을 데이터 $total_col // 총 게시글 수 $now_page // 현재 페이지 번호 $page_col_num // 한 페이지 게시글 수 $page_block_num // 한 페이지 블럭 수 */

function paging($total_col, $now_page, $page_col_num, $page_block_num) {
    $total=$total_col; // 총 컬럼 수 
    $page=$now_page; // 현재 페이지 
    $page_num=$page_col_num; // 한 페이지 컬럼 수 
    $block_num=$page_block_num; // 한 페이지 블럭 수

    $limit_start=$page_num * $page - $page_num; // limit 시작 위치

    $total_page=ceil($total/$page_num); // 총 페이지 
    $total_black=ceil($total_page/$block_num); // 총 블럭

    $now_block=ceil($page/$block_num); // 현재 페이지의 블럭 
    $start_page=(($now_block*$block_num)-($block_num-1)); // 가져올 페이지의 시작번호 
    $last_page=($now_block*$block_num); // 가져올 마지막 페이지 번호

    $prev_page=($now_block*$block_num)-$block_num; // 이전 블럭 이동시 첫 페이지 
    $next_page=($now_block*$block_num)+1; // 다음 블럭 이동시 첫 페이지

    // 이전 페이지 
    if($now_block > 1){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$prev_page> [◀] </a>"; 
    }
    // echo "이전 페이지 : $prev_page";

    // 페이지 리스트 
    if($last_page < $total_page) { 
        $for_end=$last_page; 
    } else{ 
        $for_end=$total_page; 
    } 
    for($i=$start_page; $i<=$for_end; $i++){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$i> $i </a>"; 
    }

    // 다음 페이지 
    if($now_block < $total_black){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$next_page> [▶] </a>"; 
    } 
    // echo "다음 페이지 : $next_page";

}

    $total=95; // 총 컬럼 수 
    $page; // 현재 페이지
    if($_GET['page'] == '' || $_GET['page'] == null){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    $page_num=10; // 한 페이지 컬럼 수 
    $block_num=5; // 한 페이지 블럭 수

    $limit_start=$page_num * $page - $page_num; // limit 시작 위치

    $total_page=ceil($total/$page_num); // 총 페이지 
    $total_black=ceil($total_page/$block_num); // 총 블럭

    $now_block=ceil($page/$block_num); // 현재 페이지의 블럭 
    $start_page=(($now_block*$block_num)-($block_num-1)); // 가져올 페이지의 시작번호 
    $last_page=($now_block*$block_num); // 가져올 마지막 페이지 번호

    $prev_page=($now_block*$block_num)-$block_num; // 이전 블럭 이동시 첫 페이지 
    $next_page=($now_block*$block_num)+1; // 다음 블럭 이동시 첫 페이지

    // 이전 페이지 
    if($now_block > 1){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$prev_page> [◀] </a>"; 
    }
    // echo "이전 페이지 : $prev_page";

    // 페이지 리스트 
    if($last_page < $total_page) { 
        $for_end=$last_page; 
    } else{ 
        $for_end=$total_page; 
    } 
    for($i=$start_page; $i<=$for_end; $i++){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$i> $i </a>"; 
    }

    // 다음 페이지 
    if($now_block < $total_black){ 
        echo "<a href=$_SERVER[PHP_SELF]?page=$next_page> [▶] </a>"; 
    } 
    // echo "다음 페이지 : $next_page";
?>
