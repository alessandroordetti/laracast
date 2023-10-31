<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <h1 class="my-4 ">Hello, Welcome to the <b>notes</b> page.</h1>
            
            <p>
                <a href="/notes/create" class="text-white hover:underline p-1 bg-blue-700 rounded">Create Note</a>
            </p>
        </div>


        
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li class="my-8">
                    <a href="/note?id=<?php echo $note['id'] ?>">
                        <?php echo htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>


    </div>
</main>

<?php require('partials/footer.php') ?>