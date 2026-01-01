<?php

require_once 'config.php';

$admin_password = '12345678';

// Check if logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Handle login
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
        if ($_POST['password'] === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $login_error = "Invalid password!";
        }
    }

    // Show login form
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="icon" type="image/x-icon" href="./dist/assets/favicon.ico" />
        <link rel="stylesheet" href="./dist/output.css" />

    </head>

    <body class="bg-gray-100 dark:bg-black min-h-screen flex items-center justify-center">
        <div class="bg-white dark:bg-neutral-900 p-8 rounded-xl shadow-lg max-w-md w-full">
            <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>
            <?php if (isset($login_error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php echo $login_error; ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Enter Password"
                    class="w-full p-3 border rounded mb-4" required>
                <button type="submit"
                    class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
                    Login
                </button>
            </form>
        </div>
    </body>

    </html>
<?php
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    unset($_SESSION['admin_logged_in']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $id = (int)$_POST['contact_id'];
    $status = $_POST['status'];

    $pdo = getDatabaseConnection();
    if ($pdo) {
        try {
            $sql = "UPDATE contacts SET status = :status WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':status' => $status, ':id' => $id]);
            $update_message = "Status updated successfully!";
        } catch (PDOException $e) {
            $update_error = "Failed to update status: " . $e->getMessage();
        }
    }
}

// Handle delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_contact'])) {
    $id = (int)$_POST['contact_id'];

    $pdo = getDatabaseConnection();
    if ($pdo) {
        try {
            $sql = "DELETE FROM contacts WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            $delete_message = "Contact deleted successfully!";
        } catch (PDOException $e) {
            $delete_error = "Failed to delete contact: " . $e->getMessage();
        }
    }
}

// Fetch all contacts
$pdo = getDatabaseConnection();
$contacts = [];
$stats = [];

if ($pdo) {
    try {
        // Get statistics
        $sql = "SELECT 
                COUNT(*) as total,
                SUM(CASE WHEN status = 'new' THEN 1 ELSE 0 END) as new_count,
                SUM(CASE WHEN status = 'read' THEN 1 ELSE 0 END) as read_count,
                SUM(CASE WHEN status = 'replied' THEN 1 ELSE 0 END) as replied_count
                FROM contacts";
        $stmt = $pdo->query($sql);
        $stats = $stmt->fetch();

        // Get all contacts
        $sql = "SELECT * FROM contacts ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        $contacts = $stmt->fetchAll();
    } catch (PDOException $e) {
        $fetch_error = "Failed to fetch contacts: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Contact Submissions</title>
    <link rel="stylesheet" href="./dist/output.css" />
    <style>
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-new {
            background-color: #3b82f6;
            color: white;
        }

        .status-read {
            background-color: #10b981;
            color: white;
        }

        .status-replied {
            background-color: #8b5cf6;
            color: white;
        }

        .status-archived {
            background-color: #6b7280;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-black min-h-screen p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-lg p-6 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Contact Submissions</h1>
                <a href="?logout=1" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </a>
            </div>
        </div>

        <!-- Messages -->
        <?php if (isset($update_message)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $update_message; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($delete_message)): ?>
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                <?php echo $delete_message; ?>
            </div>
        <?php endif; ?>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
                <h3 class="text-gray-500 text-sm font-semibold">Total</h3>
                <p class="text-3xl font-bold mt-2"><?php echo $stats['total'] ?? 0; ?></p>
            </div>
            <div class="bg-blue-500 text-white rounded-xl shadow p-6">
                <h3 class="text-blue-100 text-sm font-semibold">New</h3>
                <p class="text-3xl font-bold mt-2"><?php echo $stats['new_count'] ?? 0; ?></p>
            </div>
            <div class="bg-green-500 text-white rounded-xl shadow p-6">
                <h3 class="text-green-100 text-sm font-semibold">Read</h3>
                <p class="text-3xl font-bold mt-2"><?php echo $stats['read_count'] ?? 0; ?></p>
            </div>
            <div class="bg-purple-500 text-white rounded-xl shadow p-6">
                <h3 class="text-purple-100 text-sm font-semibold">Replied</h3>
                <p class="text-3xl font-bold mt-2"><?php echo $stats['replied_count'] ?? 0; ?></p>
            </div>
        </div>

        <!-- Contacts Table -->
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        <?php if (empty($contacts)): ?>
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                    No contacts yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($contacts as $contact): ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-neutral-800">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <?php echo $contact['id']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium"><?php echo htmlspecialchars($contact['name']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>"
                                            class="text-blue-500 hover:underline text-sm">
                                            <?php echo htmlspecialchars($contact['email']); ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <?php echo htmlspecialchars($contact['field']); ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm max-w-xs">
                                        <div class="truncate" title="<?php echo htmlspecialchars($contact['message']); ?>">
                                            <?php echo htmlspecialchars(substr($contact['message'], 0, 50)) . '...'; ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <?php echo date('M d, Y H:i', strtotime($contact['created_at'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-<?php echo $contact['status']; ?>">
                                            <?php echo ucfirst($contact['status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                                            <select name="status" class="border rounded px-2 py-1 text-xs mr-2"
                                                onchange="this.form.submit()">
                                                <option value="new" <?php echo $contact['status'] === 'new' ? 'selected' : ''; ?>>New</option>
                                                <option value="read" <?php echo $contact['status'] === 'read' ? 'selected' : ''; ?>>Read</option>
                                                <option value="replied" <?php echo $contact['status'] === 'replied' ? 'selected' : ''; ?>>Replied</option>
                                                <option value="archived" <?php echo $contact['status'] === 'archived' ? 'selected' : ''; ?>>Archived</option>
                                            </select>
                                            <input type="hidden" name="update_status" value="1">
                                        </form>
                                        <button onclick="viewContact(<?php echo $contact['id']; ?>)"
                                            class="text-blue-500 hover:text-blue-700 mr-2">View</button>
                                        <form method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                            <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                                            <input type="hidden" name="delete_contact" value="1">
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for viewing full message -->
    <div id="messageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-2xl max-w-2xl w-full m-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-2xl font-bold">Contact Details</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div id="modalContent"></div>
            </div>
        </div>
    </div>

    <script>
        function viewContact(id) {
            <?php
            $contacts_json = json_encode($contacts);
            echo "const contacts = " . $contacts_json . ";";
            ?>

            const contact = contacts.find(c => c.id == id);
            if (!contact) return;

            const content = `
                <div class="space-y-4">
                    <div>
                        <label class="font-semibold text-gray-600">Name:</label>
                        <p class="mt-1">${contact.name}</p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-600">Email:</label>
                        <p class="mt-1"><a href="mailto:${contact.email}" class="text-blue-500">${contact.email}</a></p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-600">Field of Interest:</label>
                        <p class="mt-1">${contact.field}</p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-600">Message:</label>
                        <p class="mt-1 whitespace-pre-wrap">${contact.message}</p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-600">Submitted:</label>
                        <p class="mt-1">${new Date(contact.created_at).toLocaleString()}</p>
                    </div>
                    <div>
                        <label class="font-semibold text-gray-600">IP Address:</label>
                        <p class="mt-1">${contact.ip_address}</p>
                    </div>
                </div>
            `;

            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('messageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('messageModal').classList.add('hidden');
        }

        // Close modal on outside click
        document.getElementById('messageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>

</html>