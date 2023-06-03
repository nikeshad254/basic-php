<?php if (!empty($error)) : ?>
    <ul>
        <?php foreach ($error as $err) : ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" placeholder="enter name " value="<?= htmlspecialchars($name); ?>" >
    </div>

    <div>
        <label for="phone">phone: </label>
        <input type="text" name="phone" placeholder="enter phone " value="<?= htmlspecialchars($phone); ?>">
    </div>

    <h3>Marks:</h3>

    <div>
        <label for="math">math: </label>
        <input type="number" name="math" placeholder="enter math" value="<?= htmlspecialchars($math); ?>">
    </div>

    <div>
        <label for="science">science: </label>
        <input type="number" name="science" placeholder="enter science" value="<?= htmlspecialchars($science); ?>">
    </div>

    <div>
        <label for="english">english: </label>
        <input type="number" name="english" placeholder="enter english" value="<?= htmlspecialchars($english); ?>">
    </div>

    <div>
        <label for="social">social: </label>
        <input type="number" name="social" placeholder="enter social" value="<?= htmlspecialchars($social); ?>">
    </div>

    <div>
        <label for="nepali">nepali: </label>
        <input type="number" name="nepali" placeholder="enter nepali" value="<?= htmlspecialchars($nepali); ?>">
    </div>


    <button>Save</button>
</form>