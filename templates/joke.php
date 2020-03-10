<div class="row">
    <div class="col-12">
        <?php $joke = (new \Joke\Base)->getJokes(); ?>
        <h1><?= $joke['setup'] ?></h1>
        <h2><?= $joke['punchline'] ?></h2>
    </div>
</div>