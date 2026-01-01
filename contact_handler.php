<?php

// Initialize variables
$success = false;
$error = false;
$success_message = "";
$error_message = "";
$form_data = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check for honeypot field (bot detection)
    if (!empty($_POST['website'])) {
        // Bot detected, silently fail
        $success = true;
        $success_message = "Your message has been sent successfully!";
    } else {
        // Validate CSRF token
        if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
            $error = true;
            $error_message = "Security token validation failed. Please refresh the page and try again.";
        } else {
            // Check rate limiting
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

            if (!checkRateLimit($ip_address)) {
                $error = true;
                $error_message = "You have submitted too many messages. Please try again later.";
            } else {
                // Sanitize and validate input
                $name = sanitizeInput($_POST['name'] ?? '');
                $email = sanitizeInput($_POST['email'] ?? '', 'email');
                $field = sanitizeInput($_POST['field'] ?? '');
                $message = sanitizeInput($_POST['message'] ?? '');

                // Store form data for repopulation on error
                $form_data = compact('name', 'email', 'field', 'message');

                // Validation rules
                $errors = [];

                // Name validation
                if (empty($name)) {
                    $errors[] = "Name is required.";
                } elseif (strlen($name) < 2) {
                    $errors[] = "Name must be at least 2 characters.";
                } elseif (strlen($name) > 100) {
                    $errors[] = "Name must be less than 100 characters.";
                } elseif (!preg_match("/^[a-zA-Z\s'-]+$/u", $name)) {
                    $errors[] = "Name contains invalid characters.";
                }

                // Email validation
                if (empty($email)) {
                    $errors[] = "Email is required.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Please enter a valid email address.";
                } elseif (strlen($email) > 255) {
                    $errors[] = "Email must be less than 255 characters.";
                }

                // Field validation
                if (empty($field)) {
                    $errors[] = "Field of interest is required.";
                } elseif (strlen($field) > 100) {
                    $errors[] = "Field must be less than 100 characters.";
                }

                // Message validation
                if (empty($message)) {
                    $errors[] = "Message is required.";
                } elseif (strlen($message) < 10) {
                    $errors[] = "Message must be at least 10 characters.";
                } elseif (strlen($message) > 2000) {
                    $errors[] = "Message must be less than 2000 characters.";
                }

                // If no validation errors, proceed with database insertion
                if (empty($errors)) {
                    $pdo = getDatabaseConnection();

                    if ($pdo) {
                        try {
                            // Prepare SQL statement
                            $sql = "INSERT INTO contacts (name, email, field, message, created_at, ip_address, user_agent) 
                                    VALUES (:name, :email, :field, :message, NOW(), :ip_address, :user_agent)";

                            $stmt = $pdo->prepare($sql);

                            // Bind parameters
                            $stmt->execute([
                                ':name' => $name,
                                ':email' => $email,
                                ':field' => $field,
                                ':message' => $message,
                                ':ip_address' => $ip_address,
                                ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
                            ]);

                            // Check if insertion was successful
                            if ($stmt->rowCount() > 0) {
                                // Send email notifications
                                $email_sent = sendEmailNotification($name, $email, $field, $message);
                                $auto_reply_sent = sendAutoReply($name, $email);

                                $success = true;
                                $success_message = "Your message has been sent successfully! I'll get back to you soon.";

                                // Log email status if in debug mode
                                if (DEBUG_MODE) {
                                    if (!$email_sent) {
                                        error_log("Failed to send admin notification email");
                                    }
                                    if (!$auto_reply_sent) {
                                        error_log("Failed to send auto-reply email");
                                    }
                                }

                                // Clear form data and generate new CSRF token
                                $form_data = [];
                                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                                // Optional: Redirect to prevent form resubmission
                                // header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                                // exit();
                            } else {
                                throw new Exception("Failed to insert record.");
                            }
                        } catch (PDOException $e) {
                            error_log("Database error: " . $e->getMessage());
                            $error = true;
                            $error_message = "An error occurred while processing your request. Please try again later.";

                            if (DEBUG_MODE) {
                                $error_message .= "<br><small>Debug: " . $e->getMessage() . "</small>";
                            }
                        } catch (Exception $e) {
                            error_log("General error: " . $e->getMessage());
                            $error = true;
                            $error_message = "An unexpected error occurred. Please try again.";
                        }
                    } else {
                        $error = true;
                        $error_message = "Database connection failed. Please try again later.";
                    }
                } else {
                    // Display validation errors
                    $error = true;
                    $error_message = implode("<br>", $errors);
                }
            }
        }
    }
}

// Handle success parameter from redirect (optional)
if (isset($_GET['success']) && $_GET['success'] == '1') {
    $success = true;
    $success_message = "Your message has been sent successfully! I'll get back to you soon.";
}
