<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'portfolio_db');

// Admin email for notifications
define('ADMIN_EMAIL', 'gwu-bhbt-2022-03@gwu.ac.lk');
define('ADMIN_NAME', 'Sajanthiny Lokeshwaran');

// Error reporting (Set to 0 in production)
define('DEBUG_MODE', 1);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone
date_default_timezone_set('Asia/Colombo');

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Rate limiting settings
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_TIME', 300); // 5 minutes in seconds
define('RATE_LIMIT_MAX_ATTEMPTS', 3); // Max submissions per time window

/**
 * Create database connection with PDO
 * @return PDO|null Database connection or null on failure
 */
function getDatabaseConnection()
{
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        return null;
    }
}

/**
 * Sanitize and validate input
 * @param mixed $data Input data to sanitize
 * @param string $type Type of sanitization (string, email)
 * @return string Sanitized data
 */
function sanitizeInput($data, $type = 'string')
{
    if (empty($data)) return '';

    $data = trim($data);
    $data = stripslashes($data);

    switch ($type) {
        case 'email':
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            break;
        case 'string':
        default:
            $data = htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            break;
    }

    return $data;
}

/**
 * Validate CSRF token
 * @param string $token Token to validate
 * @return bool True if valid, false otherwise
 */
function validateCsrfToken($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Check rate limiting
 * @param string $ip IP address to check
 * @return bool True if allowed, false if rate limited
 */
function checkRateLimit($ip)
{
    if (!RATE_LIMIT_ENABLED) {
        return true;
    }

    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return true; // Allow if DB is down
    }

    try {
        $time_limit = date('Y-m-d H:i:s', time() - RATE_LIMIT_TIME);

        $sql = "SELECT COUNT(*) as count FROM contacts 
                WHERE ip_address = :ip AND created_at > :time_limit";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':ip' => $ip,
            ':time_limit' => $time_limit
        ]);

        $result = $stmt->fetch();
        return $result['count'] < RATE_LIMIT_MAX_ATTEMPTS;
    } catch (PDOException $e) {
        error_log("Rate limit check failed: " . $e->getMessage());
        return true; // Allow if check fails
    }
}

/**
 * Send email notification
 * @param string $name Sender name
 * @param string $email Sender email
 * @param string $field Field of interest
 * @param string $message Message content
 * @return bool True if sent successfully
 */
function sendEmailNotification($name, $email, $field, $message)
{
    $to = ADMIN_EMAIL;
    $subject = "New Contact Form Submission - Portfolio";

    $email_body = "You have received a new message from your portfolio contact form.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Field of Interest: " . $field . "\n\n";
    $email_body .= "Message:\n" . $message . "\n\n";
    $email_body .= "---\n";
    $email_body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
    $email_body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($to, $subject, $email_body, $headers);
}

/**
 * Send auto-reply to form submitter
 * @param string $name Recipient name
 * @param string $email Recipient email
 * @return bool True if sent successfully
 */
function sendAutoReply($name, $email)
{
    $to = $email;
    $subject = "Thank you for contacting me!";

    $email_body = "Dear " . $name . ",\n\n";
    $email_body .= "Thank you for reaching out! I have received your message and will get back to you as soon as possible.\n\n";
    $email_body .= "Best regards,\n";
    $email_body .= ADMIN_NAME . "\n\n";
    $email_body .= "---\n";
    $email_body .= "This is an automated message. Please do not reply to this email.";

    $headers = "From: " . ADMIN_EMAIL . "\r\n";
    $headers .= "Reply-To: " . ADMIN_EMAIL . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($to, $subject, $email_body, $headers);
}
