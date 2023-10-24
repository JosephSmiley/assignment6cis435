<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paginator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th style='width:50px;'>Name</th>
            <th style='width:150px;'>Article</th>
            <th style='width:50px;'>Link</th>
            </tr>
        </thead>
<tbody>

<?php
    include('db.php');
    include('function.php');

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
            }

    $total_records_per_page = 5;

    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $statement = $connection->prepare("SELECT * FROM articles");
    $statement->execute();
    $result = $statement->fetchAll();
    $total_records = $statement->rowCount();
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1

    $statement = $connection->prepare("SELECT * FROM articles LIMIT $offset, $total_records_per_page");
    $statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>".$row['author_name']."</td>
        <td>".substr($row['article_text'], 0, 75)."......</td>
        <td>
        <a href=static/".create_article_title($row['article_text']).".html>Go to Article</a>
        <br>
        <a href=edit_article.php?id=".$row['id'].">Edit Article</a>
        </td>
        </tr>";
        }  

?>

</tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<ul class="pagination">
<?php if($page_no > 1){
echo "<li><a href='?page_no=1'>First Page</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>
    
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>