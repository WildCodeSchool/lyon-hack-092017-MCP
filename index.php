<?php
require "vendor/autoload.php";
require "GitHubConnection.php";


$github = new \Wilder\GitHubConnection();
$resultRepos = $github->setUrl($github::URLREPOS);
$resultUrl = $github->setUrl($github::URL);
$tableauGitRepos = $github->jsonToArray($resultRepos);
$tableauGitUrl = $github->jsonToArray($resultUrl);



foreach ($tableauGitRepos as $key => $part) {
    $sort[$key] = strtotime($part['pushed_at']);
}
array_multisort($sort, SORT_DESC, $tableauGitRepos);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <title>Mysnipet</title>
</head>
<body>

<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title center"><a href="<?php print_r($tableauGitUrl['html_url']); ?>"><?php print_r($tableauGitUrl['login']); ?></a></span>
                <img src="<?php print_r($tableauGitUrl['avatar_url']); ?>">
            </div>
            <div class="card-action">
<p>Mes derniers dépots</p>
                <a href="<?php print_r($tableauGitRepos[0]['html_url']); ?>"><?php print_r($tableauGitRepos[0]['name']); ?></a>
                <a href="<?php print_r($tableauGitRepos[1]['html_url']); ?>"><?php print_r($tableauGitRepos[1]['name']); ?></a>
                <a href="<?php print_r($tableauGitRepos[2]['html_url']); ?>"><?php print_r($tableauGitRepos[2]['name']); ?></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

