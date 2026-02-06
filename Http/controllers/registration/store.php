<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];


if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be at least 7 characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$result = $db->query('select * from users where email = :email', [
    ':email' => $email,
])->find();

if ($result) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $auth = new Authenticator();
    $auth->login(['email' => $email]);

    header('location: /');
    exit();
}
