<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div class="card">
        <div>
            <p class="title">Avilable Balance: 

            <?php 
                $cookie = $_COOKIE['user'];
                $query = mysqli_query($db, "SELECT * FROM `csrfprotected` WHERE userid = '$cookie';");

                    foreach($query as $row) {
                        echo $row['balance'];
                    }
            
            ?>
            </p>
            <p>User ID: <?php echo($_COOKIE['user']);?></p>
        </div>
    </div>
    <header>
        <h1>Fund Transfer</h1>
    </header>
    <div>
        <label for="amount">Amount (between $1-$5000):</label>
        <input type="number" name="amount" value="<?= $inputs['amount'] ?? '' ?>" id="amount" placeholder="Enter the transfered amount">
        <small><?= $errors['amount'] ?? '' ?></small>
    </div>

    <div>
        <label for="recipient_account">Recipient Account:</label>
        <input type="number" name="recipient_account" value="<?= $inputs['recipient_account'] ?? '' ?>" id="recipient_account" placeholder="Enter the recipient account">
        <small><?= $errors['recipient_account'] ?? '' ?></small>
    </div>

    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
    <button type="submit">Transfer Now</button>
</form>

<style>
    .card{
        display:flex;
        padding:1rem;
    }
</style>