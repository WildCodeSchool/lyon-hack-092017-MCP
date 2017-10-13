

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <title>Formulaire d'ajout</title>
</head>
<header>
    <h1 class="center">Choisissez vos critères!</h1>
</header>
<body>

<form>

    <!--Choice of fonction -->
    <div class="container">
        <div class="row">
            <form method="post" action="index.php" role="form">
                <p class="center-align">
                    <input name="followers" type="checkbox" id="followers"/>
                    <label for="followers">Followers</label>
                    <input name="gists" type="checkbox" id="gists"/>
                    <label for="gists">Gists</label>
                    <input name="repositories" type="checkbox" id="repositories"/>
                    <label for="repositories">Repositories</label>
                </p>
        </div>
        <!--submit button -->
        <div class="center-align">
        <button data-target="verif" class=" btn waves-effect waves-light btn modal-trigger" type="submit" name="action">
            Submit
            <i class="material-icons right">send</i>
        </button>
        </div>
</form><!--end of contact form -->


<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();});
</script>
</body>
</html>