<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="mb-5">Create a Note</h1>

        <form method="POST">
            <textarea name="body" class="bg-zinc-400 rounded mb-5"></textarea>

            <p>
                <button class="rounded p-1 bg-blue-500" type="submit">
                    Create
                </button>
            </p>
        </form>
    </div>
</main>

<?php require('partials/footer.php') ?>