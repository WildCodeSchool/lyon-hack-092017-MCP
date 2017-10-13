<?php
require 'gitConnect.php';

$github = new \Wilder\gitConnect();

$resultRepos = $github->setUrl($github->getReposDarin(), $github->getTokenDarin());
$resultUser = $github->setUrl($github->getUserDarin(), $github->getTokenDarin());
$resultGists = $github->setUrl($github->getGistsDarin(), $github->getTokenDarin());
$resultFollow = $github->setUrl($github->getFollowDarin(), $github->getTokenDarin());


$tableRepos = $github->getArray($resultRepos);
$tableUser = $github->getArray($resultUser);
$tableGist = $github->getArray($resultGists);
$tableFollow = $github->getArray($resultFollow);

foreach ($tableRepos as $key => $part) {
	$sort[$key] = strtotime($part['pushed_at']);
}
array_multisort($sort, SORT_DESC, $tableRepos);

foreach ($tableRepos as $repos){
	echo $repos ['pushed_at'] . PHP_EOL;
	echo $repos ['name'];
}

foreach ($tableRepos as $repos){
	echo $repos ['id'] . PHP_EOL;
}

foreach ($tableFollow as $follow){
	echo $follow ['followers_url'] . PHP_EOL;
}

print_r($tableUser['login'] . PHP_EOL);
print_r($tableRepos . PHP_EOL);
print_r($tableFollow);


?>

!<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<title>Document</title>
</head>
<header>
	<h1 class="center">Hackathon #1 Lyon</h1>
</header>
<body>
<div class="container ">
	<div class="row center-align">
		<div class="col s12 m6">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<span class="card-title center"><a href="https://github.com/mateevd" target="_blank"><?php print_r($tableUser['login']) ?></a></span>
					<img src="<?php print_r ($tableUser['avatar_url']) ?>">
				</div>
				<!--
				<form method="post">
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
					<a href="<?php print_r($tableFollow['followers_url']); ?>" target="_blank">Followers - <?php print_r($tableFollow = count($tableFollow)); ?></a>

						<a href="<?php print_r($tableRepos['repos_url']); ?>" target="_blank">Repos - <?php print_r($tableRepos = count($tableRepos)); ?></a>

					<a href="<?php print_r($tableGist['gists_url']); ?>" target="_blank">Gists - <?php print_r($tableGist = count($tableGist)); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>
</html>
