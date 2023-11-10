<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="my-4 ">Nota</h1>

        <?php echo htmlspecialchars($note['body']) ?>

        <div class="flex justify-between">
            <div class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>" class="px-3 py-2 bg-gray-500 rounded-md text-sm text-white">Edit</a>
            </div>
        
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-white px-3 py-2 bg-red-500 rounded-md text-sm">Delete</button>
            </form>
        </div>
    </div>
</main>


<?php view('partials/footer.php') ?>