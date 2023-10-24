<html>
<head>
    <meta charset="utf-8">
    <title>Article thingy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <div class="container">
            <h1>Our super cool article site!</h1>
            <a id="add_button" data-toggle="modal" data-target="#userModal"
               class="btn btn-info btn-lg" href="create_article.php">
                Create Article
            </a>
        </div>
    </div>
</div>

<div class="container box">
            <?php
            include('pagination.php');
            ?>
    </table>
</div> <!-- class="container box"-->

<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
</body>
</html>
