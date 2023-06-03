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
        <input type="text" name="name" placeholder="enter name " >
    </div>

    <div>
        <label for="phone">phone: </label>
        <input type="text" name="phone" placeholder="enter phone " >
    </div>

    <h3>Marks:</h3>

    <div>
        <label for="math">math: </label>
        <input type="text" name="math" placeholder="enter math" >
    </div>

    <div>
        <label for="science">science: </label>
        <input type="text" name="science" placeholder="enter science" >
    </div>

    <div>
        <label for="english">english: </label>
        <input type="text" name="english" placeholder="enter english" >
    </div>

    <div>
        <label for="social">social: </label>
        <input type="text" name="social" placeholder="enter social" >
    </div>

    <div>
        <label for="nepali">nepali: </label>
        <input type="text" name="nepali" placeholder="enter nepali" >
    </div>


    <button>Save</button>
</form>