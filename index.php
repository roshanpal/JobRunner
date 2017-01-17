<?php require("include/common.php") ?>
<!doctype html>
<html>
<head>
    <title>JobRunner</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="row">

            <section class="content">
                <h1>DataEngine</h1>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <input type="radio" name="rdoServer" id="radio1" value="http://preprod/" checked>
                                <label for="radio1">
                                    Pre-Prod
                                </label>
                                &nbsp;
                                <input type="radio" name="rdoServer" id="radio2" value="http://localhost/">
                                <label for="radio1">
                                    Local
                                </label>
                                &nbsp;
                                <input type="radio" name="rdoServer" id="radio3" value="http://prod/">
                                <label for="radio1">
                                    Prod
                                </label>
                            </div>
                            <div class="pull-left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary run-all">Run All</button>
                                    <button type="button" class="btn btn-primary run-selected">Run Selected</button>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-filter" data-target="successful">Successful</button>
                                    <button type="button" class="btn btn-warning btn-filter" data-target="pending">Pending</button>
                                    <button type="button" class="btn btn-danger btn-filter" data-target="failed">Failed</button>
                                    <button type="button" class="btn btn-default btn-filter" data-target="all">All</button>
                                </div>
                            </div>
                            <div class="table-container">
                                <table class="table table-filter">
                                    <tbody>
                                    <?php foreach($files as $key => $file): ?>
                                        <tr class="job<?= $key ?>">
                                            <td>
                                                <div class="ckbox">
                                                    <input type="checkbox" class="checkbox" id="checkbox<?= $key ?>" data-id="<?= $key ?>">
                                                    <label for="checkbox<?= $key ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-b">
                                                        <span class="media-meta time<?= $key ?> pull-right"></span>
                                                        <h4 class="title">
                                                            <?= $file ?>
                                                            <span class="pull-right status<?= $key ?> successful"></span>
                                                        </h4>
                                                        <p class="summary link<?= $key ?>" data-id="<?= $key ?>"><?= $file ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>