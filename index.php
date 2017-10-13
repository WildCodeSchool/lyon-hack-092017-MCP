
    <?php require 'Github.php';
    $gitHub = new GitHub;
    $result = $gitHub->get_info_user($gitHub::URL);
    $result2 = $gitHub->get_info_user($gitHub::URL2);
//    print_r($result['login']['avatar_url']);


        foreach ($result2 as $key => $repo) {
            $sort[$key] = strtotime($repo['pushed_at']);
        }
        array_multisort($sort, SORT_DESC, $result2);

        foreach ($result2 as $repos) {
        echo $repos ['pushed_at'] . PHP_EOL;
        }

        foreach ($result2 as $repos) {
        echo $repos ['id'] . PHP_EOL;
        }

    print_r($result2);



    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Mysnipet</title>
</head>
<body>
    <header>
        <h1 class="center">Hackathon #1 Lyon</h1>
    </header>
<div class="container"></div>

<div class="row center-align">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1" id="card">
            <div class="card-content white-text">

                <span class="card-title center" id="login"><a href=<?php print_r($result['html_url']); ?>><?php print_r($result['login']); ?></a></span>
                <img src="<?php print_r($result['avatar_url']); ?>">
           <!--     <form method="post">
                    <button class="btn waves-effect waves-light" type="submit" id="Darin" name="Darin" value="Darin">Darin
                        <i class="material-icons right"></i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" id="Pierrick" name="Pierrick" value="Pierrick">Pierrick
                        <i class="material-icons right"></i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="Severine">Severine
                        <i class="material-icons right"></i>
                    </button>
                </form>-->


                <div class="card-action">
                <p>Mes derniers dépots</p>
                <a href="<?php print_r($result2[0]['html_url']); ?>"><?php print_r($result2[0]['name']); ?></a>
                <a href="<?php print_r($result2[1]['html_url']); ?>"><?php print_r($result2[1]['name']); ?></a>
                <a href="<?php print_r($result2[2]['html_url']); ?>"><?php print_r($result2[2]['name']); ?></a>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

