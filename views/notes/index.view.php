
<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>

<main class="min-h-screen bg-slate-900 text-slate-300">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <h1 class="my-4 ">Hello, Welcome to the <b>notes</b> page.</h1>
            
            <?php if(isset($_SESSION['auth'])) : ?>
                <p>
                    <a href="/notes/create" class="text-white hover:underline p-1 bg-blue-700 rounded">Create Note</a>
                </p>
            <?php endif; ?>
        </div>

        <ul>
            <?php foreach ($notes as $note) : ?>
                <li class="my-8">
                    <div class="flex justify-between">
                        <?php if (isset($_SESSION['auth']) && $_SESSION['auth']['id'] == $note['user_id']) { ?>
                            <!-- Link to edit the note if the user is the owner -->
                            <a href="/note/edit?id=<?php echo $note['id'] ?>">
                                <?php echo htmlspecialchars($note['body']) ?>
                            </a>
                        <?php } else { ?>
                            <!-- Just display the note if the user is not the owner -->
                            <p><?php echo htmlspecialchars($note['body']) ?></p>
                        <?php } ?>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>


    </div>
</main>

<?php view('partials/footer.php') ?>