<?php

function GET_DATA_cURL($url, $token = null, $data = null, $pin = null){
    $header[] = "Host: api.elsevier.com";
    $header[] = "User-Agent: okhttp/3.12.1";
    $header[] = "Accept: application/json";
    $header[] = "Accept-Language: en-ID";
    $header[] = "Content-Type: application/json; charset=UTF-8";
    if ($pin):
    $header[] = "pin: $pin";
        endif;
    if ($token):
    $header[] = "X-ELS-APIKey: $token";
    endif;
    $c = curl_init("http://api.elsevier.com/content/search/scopus".$data);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        // if ($data):
        // curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($c, CURLOPT_POST, true);
        // endif;
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_HEADER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        $response = curl_exec($c);
        $httpcode = curl_getinfo($c);
        if (!$httpcode)
            return false;
        else {
            $header = substr($response, 0, curl_getinfo($c, CURLINFO_HEADER_SIZE));
            $body   = substr($response, curl_getinfo($c, CURLINFO_HEADER_SIZE));
        }
        $json = json_decode($body, true);
        return $json;
    }
    $keyword = isset($_GET['keyword'])?$_GET['keyword']:"";
    $data = GET_DATA_cURL("","706c898b0948885c5f082c477cb0972f","?count=10&query=$keyword");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Cari Jurnal</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#"> CARI JURNAL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Citation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="<?=$_SERVER['PHP_SELF']?>">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="row mt-3">
            <div class="col">
                <h1>All Article</h1>
            </div>
        </div>
        <div class="row">
            <?php 
                if(isset($data["search-results"]["entry"])):
            foreach ($data["search-results"]["entry"] as $row) : ?>
                <div class="col-md-12 mb-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title"><?=$row["dc:title"]?></h5>
                            <p class="card-text"><?=$row["dc:creator"]?></p>
                            <p class="card-text"><?=$row["prism:aggregationType"]?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
                else: ?>
                <?php endif; ?>
        </div>

        <div class="row">
            <?php 
                if(isset($url["link"]["entry"])):
            foreach ($url["link"]["entry"] as $row) : ?>
                <div class="col-md-12 mb-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title"><?=$row["dc:title"]?></h5>
                            <p class="card-text"><?=$row["dc:creator"]?></p>
                            <p class="card-text"><?=$row["prism:aggregationType"]?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
                else: ?>
                <?php endif; ?>
        </div>

    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>