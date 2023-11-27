<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>

<main class="min-h-screen bg-slate-900 text-slate-300">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="mb-5 text-center"><b>Edit note</b></h1>
        
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">The body you wrote</label>
                            <div class="mt-2">
                                <textarea 
                                    placeholder="Please insert a note"
                                    id="body" 
                                    name="body" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?></textarea>
                            </div>

                            <?php if(isset($errors['body'])) : ?>
                                <?php dd ($errors['body']) ?>
                            <?php endif ?>
                            <p class="mt-3 text-sm leading-6 text-white">Here you can edit your note and update it.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/note?id=<?= $note['id'] ?>" class="px-3 py-2 bg-gray-500 rounded-md text-sm text-white">
                    Cancel
                </a>
                
                <button type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>

    </div>
</main>

<?php view('partials/footer.php') ?>