<?php

require_once 'config.php';
require_once 'contact_handler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Hello there, I'm Sajanthiny Lokeshwaran">
    <title>Sajanthiny Lokeshwaran - Contact</title>
    <link rel="icon" type="image/x-icon" href="./dist/assets/favicon.ico" />
    <link rel="stylesheet" href="./dist/output.css" />
    <link rel="stylesheet" href="./dist/contact.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="dark:bg-black bg-white min-h-screen text-black dark:text-white px-5 md:px-20 opacity-0 transition duration-500 relative">

    <!-- Animated Background Particles -->
    <div class="particles">
        <div class="particle" style="width: 100px; height: 100px; top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="width: 80px; height: 80px; top: 20%; right: 15%; animation-delay: 2s;"></div>
        <div class="particle" style="width: 120px; height: 120px; bottom: 20%; left: 20%; animation-delay: 4s;"></div>
        <div class="particle" style="width: 90px; height: 90px; bottom: 30%; right: 10%; animation-delay: 6s;"></div>
    </div>

    <!-- Navbar -->
    <header class="flex w-full overflow-hidden pt-10 pb-1 relative z-10">
        <nav id="nav" x-data="{ open: false }" role="navigation" class="w-full">
            <div class="container mx-auto flex flex-wrap items-center md:flex-no-wrap">
                <div class="mr-4 md:mr-8">
                    <a href="index.php" class="text-2xl font-signika font-bold hover:text-blue-500 transition">Sajanthiny Lokeshwaran</a>
                </div>
                <div class="ml-auto md:hidden flex items-center justify-start">
                    <button onclick="menuToggle()" @click="open = !open"
                        class="tap-highlight-transparent text-black dark:text-white w-5 h-5 relative focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <div class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span aria-hidden="true"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                                :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                            <span aria-hidden="true"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                                :class="{'opacity-0': open }"></span>
                            <span aria-hidden="true"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"
                                :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                        </div>
                    </button>
                </div>
                <div id="menu"
                    class="w-full h-0 transition-all ease-out duration-500 md:transition-none md:w-auto md:flex-grow md:flex md:items-center">
                    <ul id="ulMenu"
                        class="flex flex-col duration-300 ease-out md:space-x-5 sm:transition-none mt-5 md:flex-row md:items-center md:ml-auto md:mt-0 md:pt-0 md:border-0">
                        <li class="group transition duration-300">
                            <a href="index.php" class="font-signika text-2xl">PROJECTS
                                <span class="hidden md:block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-black dark:bg-white"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="home.php" class="font-signika text-2xl">HOME
                                <span class="hidden md:block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-black dark:bg-white"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="about.php" class="font-signika text-2xl">ABOUT
                                <span class="hidden md:block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-black dark:bg-white"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="contact.php" class="font-signika text-2xl">CONTACT
                                <span class="hidden md:block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-black dark:bg-white"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container mx-auto relative z-10">
        <!-- Hero Section -->
        <div class="text-center py-12">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                Get In Touch
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-lg">Let's create something amazing together!</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Form Section -->
            <section class="animate-slide-left">
                <div class="gradient-border p-1 rounded-3xl">
                    <div class="bg-white dark:bg-black rounded-3xl p-8 md:p-12">

                        <?php if ($success): ?>
                            <div class="bg-gradient-to-r from-green-400 to-green-600 text-white px-6 py-4 rounded-xl mb-6 alert-animate shadow-lg">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-bold">Success!</p>
                                        <p class="text-sm"><?php echo htmlspecialchars($success_message); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($error): ?>
                            <div class="bg-gradient-to-r from-red-400 to-red-600 text-white px-6 py-4 rounded-xl mb-6 alert-animate shadow-lg">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-bold">Error!</p>
                                        <p class="text-sm"><?php echo $error_message; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form class="space-y-6" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- CSRF Token -->
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                            <!-- Honeypot field (hidden from users, catches bots) -->
                            <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                            <!-- Name Input -->
                            <div class="input-wrapper">
                                <label for="name" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Your Name
                                </label>
                                <input type="text" id="name" name="name" required maxlength="100"
                                    class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-neutral-900 dark:border-neutral-700 dark:text-white transition duration-300"
                                    placeholder="John Doe"
                                    value="<?php echo isset($form_data['name']) ? htmlspecialchars($form_data['name']) : ''; ?>" />
                                <div class="text-xs text-gray-500 mt-1 text-right">Max 100 characters</div>
                            </div>

                            <!-- Email Input -->
                            <div class="input-wrapper">
                                <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Your Email
                                </label>
                                <input type="email" id="email" name="email" required maxlength="255"
                                    class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-neutral-900 dark:border-neutral-700 dark:text-white transition duration-300"
                                    placeholder="john@example.com"
                                    value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" />
                                <div class="text-xs text-gray-500 mt-1 text-right">We'll never share your email</div>
                            </div>

                            <!-- Field Input -->
                            <div class="input-wrapper">
                                <label for="field" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Field of Interest
                                </label>
                                <input type="text" id="field" name="field" required maxlength="100"
                                    class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-neutral-900 dark:border-neutral-700 dark:text-white transition duration-300"
                                    placeholder="Web Development, Design, etc."
                                    value="<?php echo isset($form_data['field']) ? htmlspecialchars($form_data['field']) : ''; ?>" />
                                <div class="text-xs text-gray-500 mt-1 text-right">Max 100 characters</div>
                            </div>

                            <!-- Message Input -->
                            <div class="input-wrapper">
                                <label for="message" class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                    </svg>
                                    Your Message
                                </label>
                                <textarea id="message" name="message" rows="6" required maxlength="2000"
                                    class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-neutral-900 dark:border-neutral-700 dark:text-white transition duration-300 resize-none"
                                    placeholder="Tell me about your project..."><?php echo isset($form_data['message']) ? htmlspecialchars($form_data['message']) : ''; ?></textarea>
                                <div class="text-xs text-gray-500 mt-1 text-right">Min 10, Max 2000 characters</div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full btn-ripple py-4 px-8 text-lg font-bold text-white rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-2xl">
                                <span class="flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Send Message
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Contact Info & Image Section -->
            <section class="animate-slide-right space-y-8">
                <!-- Logo Card -->
                <div class="card-3d bg-gradient-to-br from-blue-500 to-purple-600 p-1 rounded-3xl shadow-2xl">
                    <div class="bg-white dark:bg-black rounded-3xl p-8 h-full">
                        <img src="./dist/assets/Logo.jpg" alt="Logo" class="w-full h-auto rounded-2xl shadow-lg object-cover" />
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-neutral-900 dark:to-neutral-800 rounded-3xl p-8 shadow-xl">
                    <h3 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                        Contact Information
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 icon-bounce p-4 rounded-xl hover:bg-white dark:hover:bg-neutral-900 transition cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Location</p>
                                <p class="font-semibold">Chavekachcheri, Jaffna</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 icon-bounce p-4 rounded-xl hover:bg-white dark:hover:bg-neutral-900 transition cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Phone</p>
                                <p class="font-semibold">+94 762 397 951</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 icon-bounce p-4 rounded-xl hover:bg-white dark:hover:bg-neutral-900 transition cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                                <p class="font-semibold text-sm">gwu-bhbt-2022-03@gwu.ac.lk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-neutral-900 mt-20 relative z-10">
        <div class="max-w-screen-xl py-16 mx-auto">
            <div class="grid grid-cols-1 gap-8 text-center mx-auto">
                <div>
                    <p class="font-signika text-2xl"><b>Sajanthiny Lokeshwaran</b></p>
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                        CHAVEKACHCHERI,<br />JAFFNA <br> +94762397951
                    </p>
                    <div class="flex mx-auto">
                        <div class="mx-auto space-x-6 flex mt-8 text-gray-600 dark:text-gray-300">
                            <a class="transition duration-300 hover:opacity-75 hover:scale-110 transform" href="https://www.facebook.com/jebarsan.thatcroos.7/" target="_blank" rel="noreferrer">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                                </svg>
                            </a>
                            <a class="transition duration-300 hover:opacity-75 hover:scale-110 transform" href="https://www.instagram.com/lanka_tamizha/?utm_source=qr&igsh=dzd2cHp3endqemJl#" target="_blank" rel="noreferrer">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427C2.013 14.987 2 14.643 2 12c0-2.643.012-2.987.06-4.043.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C9.528 2.013 9.872 2 12.315 2zm0 1.802c-2.36 0-2.645.01-3.577.056-.864.04-1.332.186-1.643.308a3.098 3.098 0 00-1.127.737 3.098 3.098 0 00-.737 1.127c-.122.311-.268.779-.308 1.643-.046.932-.056 1.217-.056 3.577v.08c0 2.36.01 2.645.056 3.577.04.864.186 1.332.308 1.643a3.098 3.098 0 00.737 1.127c.311.122.779.268 1.643.308.932.046 1.217.056 3.577.056h.08c2.36 0 2.645-.01 3.577-.056.864-.04 1.332-.186 1.643-.308a3.098 3.098 0 001.127-.737 3.098 3.098 0 00.737-1.127c.122-.311.268-.779.308-1.643.046-.932.056-1.217.056-3.577v-.08c0-2.36-.01-2.645-.056-3.577-.04-.864-.186-1.332-.308-1.643a3.098 3.098 0 00-.737-1.127 3.098 3.098 0 00-1.127-.737c-.311-.122-.779-.268-1.643-.308-.932-.046-1.217-.056-3.577-.056zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-8 text-xs text-gray-600 dark:text-gray-300 text-center">
                &copy; <?php echo date('Y'); ?> Developed and Designed by
                <a href="mailto:gwu-hict-2021@gwu.ac.lk" class="underline hover:text-blue-500 transition">Sajanthiny Lokeshwaran</a>
            </p>
        </div>
    </footer>

    <script src="fade_in.js"></script>
    <script src="menu.js"></script>
</body>

</html>