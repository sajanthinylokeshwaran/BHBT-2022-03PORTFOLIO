<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hello there, I'm Sajanthiny Lokeshwaran">
    <title>Sajanthiny Lokeshwaran - PROJECTS</title>
    <link rel="icon" type="image/x-icon" href="./dist/assets/favicon.ico" />
    <link rel="stylesheet" href="./dist/output.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Removed Tailwind CDN script -->
</head>

<body class="dark:bg-black bg-white h-screen text-black dark:text-white px-5 md:px-20 opacity-0 transition duration-500">

    <!-- Navbar -->
    <header class="flex w-full overflow-hidden pt-10 pb-1">
        <nav id="nav" x-data="{ open: false }" role="navigation" class="w-full">
            <div class="container mx-auto flex flex-wrap items-center md:flex-no-wrap">
                <div class="mr-4 md:mr-8">
                    <a href="index.php" class="text-2xl font-signika font-bold">Sajanthiny Lokeshwaran</a>
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

    <!-- Main Content -->
    <div class="container mx-auto">
        <h1 class="text-4xl pt-10 pb-8 font-bold">PROJECTS</h1>

        <div class="flex flex-wrap justify-between mt-md-3">

            <!-- Project 1 -->
            <div class="w-full md:w-1/3 p-1">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="./dist/assets/Project_2.jpg" alt="Project-1" class="block w-full object-cover hover:scale-110 transition-transform duration-500" />
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">
                            <a href="https://github.com/jebarsanthatcroos/portfolio.git" target="_blank" class="hover:text-blue-500 transition-colors">Web Development Portfolio</a>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Built a personal portfolio website using modern web development technologies.</p>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="w-full md:w-1/3 p-1">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="./dist//assets/Project_1.webp" alt="Project_2" class="block w-full object-cover hover:scale-110 transition-transform duration-500" />
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">
                            <a href="#" class="hover:text-blue-500 transition-colors">Data Analysis using minitap</a>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Performed exploratory data analysis on thai pongal day periods data to improve customer experience.</p>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="w-full md:w-1/3 p-1">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="./dist//assets/Project_3.jpg" alt="Project_3" class="block w-full object-cover hover:scale-110 transition-transform duration-500" />
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">
                            <a href="https://thingspeak.mathworks.com/channels/2788309" target="_blank" class="hover:text-blue-500 transition-colors">IOT Project</a>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Developed a predictive model for lectures churn using arduino.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="max-w-screen-xl py-16 mx-auto">
            <div class="grid grid-cols-1 gap-8 text-center mx-auto">
                <div>
                    <p class="font-signika"><b>Sajanthiny Lokeshwaran</b></p>
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                        CHAVEKACHCHERI,<br />JAFFNA <br> +94762397951
                    </p>
                    <div class="flex mx-auto">
                        <div class="mx-auto space-x-6 flex mt-8 text-gray-600 dark:text-gray-300">
                            <a class="transition duration-300 hover:opacity-75 hover:text-blue-600" href="https://www.facebook.com/jebarsan.thatcroos.7/" target="_blank" rel="noreferrer">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                                </svg>
                            </a>
                            <a class="transition duration-300 hover:opacity-75 hover:text-pink-600" href="https://www.instagram.com/lanka_tamizha/?utm_source=qr&igsh=dzd2cHp3endqemJl#" target="_blank" rel="noreferrer">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-8 text-xs text-gray-600 dark:text-gray-300 text-center">
                &copy; <?php echo date('Y'); ?> Developed and Designed by
                <a href="mailto:gwu-hict-2021@gwu.ac.lk" class="underline hover:text-blue-500 transition-colors">Sajanthiny Lokeshwaran</a>
            </p>
        </div>
    </footer>

    <script src="fade_in.js"></script>
    <script src="menu.js"></script>
</body>

</html>