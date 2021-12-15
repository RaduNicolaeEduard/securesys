<?php

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if (!$token || $token != $_SESSION['token']) {
    // show an error message
    echo '<p class="error">Error: invalid form submission</p>';
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
}






// Validate amount
$amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT);
$inputs['amount'] = $amount;

if ($amount) {
    $amount = filter_var(
        $amount,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 5000]]
    );

    if (!$amount) {
        $errors['amount'] = 'Please enter a valid amount (from $1 to $5000)';
    }
} else {
    $errors['amount'] = 'Please enter the transfered amount.';
}

// validate account (simple)
$recipient_account = filter_input(INPUT_POST, 'recipient_account', FILTER_SANITIZE_NUMBER_INT);

$inputs['recipient_account'] = $recipient_account;

if ($recipient_account) {
    $recipient_account = filter_var($recipient_account, FILTER_VALIDATE_INT);

    if (!$recipient_account) {
        $errors['recipient_account'] = 'Please enter a valid recipient account';
    }else{
        $cookie = $_COOKIE['user'];
        $query = mysqli_query($db, "SELECT * FROM `csrfprotected` WHERE userid = '$recipient_account';");
        if (mysqli_num_rows($query)==0) { 
            $errors['recipient_account'] = 'Please enter a valid recipient account';
         }else{
            foreach($query as $row) {
                 $row['balance'];
                 $updated_balance= $row['balance'] + $amount;
                 mysqli_query($db, "UPDATE `csrfprotected` SET BALANCE = '$updated_balance' WHERE userid = $recipient_account;");
                 $query1 = mysqli_query($db, "SELECT * FROM `csrfprotected` WHERE userid = '$cookie';");
                 foreach($query1 as $row) {
                    $updated_balance= $row['balance'] - $amount;
                    mysqli_query($db, "UPDATE `csrfprotected` SET BALANCE = '$updated_balance' WHERE userid = $cookie;");
                 }
            }
         }
    }
    // validate the recipient account against the database
    // ...
} else {
    $errors['recipient_account'] = 'Please enter the recipient account.';
}
?>

<?php if (!$errors) : ?>
	<section>
		<div class="circle">
			<div class="check"></div>
		</div>

		<h1 class="message">You've transfered</h1>
		<h2 class="amount">$<?= $amount ?></h2>

		<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" rel="prev">Done</a>
	</section>
<?php 

include 'dbcon.php';

endif ?>