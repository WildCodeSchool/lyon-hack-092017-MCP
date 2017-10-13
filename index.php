<?php
require 'gitConnect.php';
$key = include 'configIgnored.php';
$github = new \Wilder\gitConnect();

$resultRepos = $github->setUrl($github->getReposDarin(), $key['DarinKey']);
$resultUser = $github->setUrl($github->getUserDarin(), $key['DarinKey']);
$resultGists = $github->setUrl($github->getGistsDarin(), $key['DarinKey']);
$resultFollow = $github->setUrl($github->getFollowDarin(), $key['DarinKey']);


$tableRepos = $github->getArray($resultRepos);
$tableUser = $github->getArray($resultUser);
$tableGist = $github->getArray($resultGists);
$tableFollow = $github->getArray($resultFollow);

foreach ($tableRepos as $key => $part) {
    $sort[$key] = strtotime($part['pushed_at']);
}
array_multisort($sort, SORT_DESC, $tableRepos);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <title>Mon Snippet</title>
</head>
<header>
    <h1 class="center">Hackathon #1 Lyon<a href="form.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons-search">+</i></a></h1>
</header>
<body>
<div class="container ">
    <div class="col s6 offset- m6">

    <div class="row center-align">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title center"><a href="https://github.com/mateevd"
                                                       target="_blank"><?php print_r($tableUser['login']) ?></a></span>
                    <img src="<?php print_r($tableUser['avatar_url']) ?>">
                </div>
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li id="<?php if(isset($_POST['followers'])){
                        echo "followers";
                    }else
                    {
                      echo "notFollowers";
                    }
                    ?>">
                        <div class="collapsible-header">Followers
                            - <?php print_r(count($tableFollow)); ?>
                        </div>
                        <div class="collapsible-body"><span><?php print_r($tableFollow[0]['login']); ?></span></div>

                    </li>

                    <li id="<?php if(isset($_POST['repositories'])){
                        echo "repositories";
                    }else
                    {
                        echo "notRepositories";
                    }
                    ?>">
                        <div class="collapsible-header">Repos
                            - <?php print_r(count($tableRepos)); ?></div>

                        <div class="collapsible-body"><div>
                                <?php for ($i = 0; $i <= 2; $i++) {
                                    echo "<p><a href= '". $tableRepos[$i]['html_url']  ." 'target=\"_blank\">";
                                    print_r($tableRepos[$i]['name']);
                                    echo " ";
                                    print_r($tableRepos[$i]['pushed_at']);
                                    echo PHP_EOL;
                                    echo "</p></a>";
                                } ?>
                            </div></div>
                    </li>

                    <li id="<?php if(isset($_POST['gists'])){
                        echo "gists";
                    }else
                    {
                        echo "notGists";
                    }
                    ?>">
                        <div class="collapsible-header">Gists - <?php print_r(count($tableGist)); ?></div>
                        <div class="collapsible-body"><div>
                                <?php for ($i = 0; $i <= 2; $i++) {
                                    echo "<p><a href= '". $tableGist[$i]['html_url']  ." 'target=\"_blank\">";
                                    print_r($tableGist[$i]['description']);
                                    echo " ";
                                    print_r($tableGist[$i]['created_at']);
                                    echo PHP_EOL;
                                    echo "</p></a>";
                                } ?>
                            </div></div>
                    </li>
                </ul>
                <br>
            </div>
        </div>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.collapsible').collapsible();
    });
</script>
</body>
</html>