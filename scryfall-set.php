<!doctype html>
<html lang="en">
  <head>
    <title>Sets</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .cont {
            text-align: center;
            padding-top: 80px;
        }    

        .set {
            padding-top: 20px;
            box-shadow: 0px 0px 10px #888888;
            transition: .3s;
        }

        .set:hover {
            box-shadow: 10px 10px 30px #888888;
            transition: .3s;
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navtop" aria-controls="navtop"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navtop">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navdrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="navdrop">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
        <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icone</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cartas</th>
                        <th scope="col">Data</th>
                        <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            $url = "https://api.scryfall.com/sets/";
                    $json = file_get_contents($url);
                    $obj = json_decode($json, TRUE);

                    for ($i=0; $i < count($obj['data']); $i++) { 
            ?>
                
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><img src="<?=$obj['data'][$i]['icon_svg_uri']?>" alt="" width=30 height=30></td>
                            <td><?=$obj['data'][$i]['name']?></td>
                            <td><?=$obj['data'][$i]['card_count']?></td>
                            <td><?=@$obj['data'][$i]['released_at']?></td>
                            <td><a href="<?=$obj['data'][$i]['scryfall_uri']?>" class="btn btn-primary btn-sm">Ver Cards -></a></td>
                        </tr>

            <?php
                    }
            ?>
            
                </tbody>
            </table>    
        </div><!-- /.row -->
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>