<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}




// Return Website Base Url
function site_base_url(): string
{
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $path = dirname($scriptName);

    if (strpos($path, '/admin') !== false) {
        $path = preg_replace('#/admin.*$#', '', $path);
    }

    return rtrim($path, '/');
}






// Redirect User 
function redirect_to(string $path): void
{
    header('Location: ' . site_base_url() . $path);
    exit();
}








// Check user is Login or Not 
function is_logged_in(): bool
{
    return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;
}





// Check user is Admi or Not 
function is_admin(): bool
{
    return is_logged_in() && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true;
}


// Redirect IF user is Login
function redirect_if_logged_in(): void
{
    if (!is_logged_in()) {
        return;
    }

    if (is_admin()) {
        redirect_to('/admin/index.php');
    }

    redirect_to('/index.php');
}









// require login for access private pages
function require_login(): void
{
    if (!is_logged_in()) {
        redirect_to('/login.php');
    }
}


// require login for accessa admin pages
function require_admin(): void
{
    if (!is_admin()) {
        redirect_to('/login.php');
    }
}



// store user session in sessions
function login_user(array $user): void
{
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['isAdmin'] = ($user['isAdmin'] === 'admin');
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'] ?? '';
}
