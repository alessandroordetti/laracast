
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/98dzmxfmxy6cg6swhubrsx032ylyipeomz0m5lh1flne73cv/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "#body",
            width: 600,
            height: 300,
            toolbar: "bold italic",
            statusbar: false,
            menubar: false
        })
    </script>
    <title>Mail us</title>
</head>
<body>
    <?php view('partials/head.php') ?>
    <?php view('partials/nav.php') ?>

    <main class="min-h-screen bg-slate-900 text-slate-300">
        <div class="flex justify-end py-4">
            <?php if(isset($message)) : ?>
                <?php echo "<h1 class='text-emerald-600 font-extrabold w-32'>{$message}</h1>" ?>
            <?php endif; ?>
        </div>

        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mb-5">Any suggestion? Fill the form below and get in touch with us!</h1>

            <form class="w-full max-w-lg mb-5" method="post" enctype="multipart/form-data" action="/send-email">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        First Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="firstname" id="grid-first-name" type="text" placeholder="Jane">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Last Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="lastname" id="grid-last-name" type="text" placeholder="Doe">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <textarea id="body" name="body" required placeholder="Write your request here">

                    </textarea>
                </div>

                <label class="block mb-2 text-sm font-medium text-white-900 dark:text-white-300" for="file_input">Upload file</label>
                <input class="block mb-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="file" id="file_input" type="file">

            
                <!-- component -->
                <button class="group relative h-12 w-28 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white" type="submit">
                    Send email
                    <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                </button>

            </form>
        </div>
    </main>

    
    
    <?php view('partials/footer.php') ?>
</body>
</html>

