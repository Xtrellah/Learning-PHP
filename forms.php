<?php

declare(strict_types = 1);

if (isset($_POST['submitted'])) {
    echo 'Your username is ' . $_POST['username'] . ' and your password is ' . $_POST['password'];
    echo "<div>
            <h4>Signed in as ". $_POST['username']. "</h4>
            <span>Email: " . $_POST['email'] . "</span>
          </div>";
}

class EmailAddress {
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address');
        }

        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

$address = new EmailAddress('dodgy@dodgy.com');
echo $address->getEmail();

echo "<pre>"

?>

<form method="post">
    <label for="email">Email</label>
    <input type="email" id=$address name="email" />

    <label for="username">Username</label>
    <input type="text" id="username" name="username" />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" />

    <input type="submit" name="submitted" value="Login"/>
</form>