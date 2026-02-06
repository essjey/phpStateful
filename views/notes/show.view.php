<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">go back...</a>
        </p>
        <p class="mb-6">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit Note</a>

        <!-- <form method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete Note</button>
        </form> -->

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>ßß