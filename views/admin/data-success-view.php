
<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <div>
            <h1 class="my-4 ">Data have been successfully uploaded!</h1>
            <ul>
                <?php foreach($datas as $data) : ?>
                    <li><?php echo $data['body'] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</main>

<?php view('partials/footer.php') ?>