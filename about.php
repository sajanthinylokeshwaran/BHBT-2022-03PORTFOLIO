<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sajanthiny Lokeshwaran - About Me</title>
    <meta name="description" content="Hello there, I'm Sajanthiny Lokeshwaran – an intrepid explorer through the lens, on a relentless quest to capture the world's boundless wonders.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="./dist/assets/favicon.ico" />
    <link rel="stylesheet" href="./dist/about.css" />
</head>

<body class="dark:bg-black bg-white min-h-screen text-black dark:text-white px-5 md:px-20 opacity-0 animate-fade-in transition duration-500">

    <!-- Navbar -->
    <header class="flex w-full overflow-hidden pt-10 pb-1">
        <nav id="nav" role="navigation" class="w-full">
            <div class="container mx-auto flex flex-wrap items-center md:flex-no-wrap">
                <div class="mr-4 md:mr-8">
                    <a href="#" class="text-2xl font-signika font-bold">Sajanthiny Lokeshwaran</a>
                </div>
                <div class="ml-auto md:hidden flex items-center justify-start">
                    <button onclick="toggleMenu()" id="menuButton"
                        class="text-black dark:text-white w-5 h-5 relative focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <div class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span aria-hidden="true" id="line1"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out -translate-y-1.5"></span>
                            <span aria-hidden="true" id="line2"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out"></span>
                            <span aria-hidden="true" id="line3"
                                class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out translate-y-1.5"></span>
                        </div>
                    </button>
                </div>
                <div id="menu"
                    class="w-full h-0 overflow-hidden transition-all ease-out duration-500 md:transition-none md:h-auto md:w-auto md:flex-grow md:flex md:items-center">
                    <ul id="ulMenu"
                        class="flex flex-col duration-300 ease-out md:space-x-5 sm:transition-none mt-5 md:flex-row md:items-center md:ml-auto md:mt-0 md:pt-0 md:border-0">
                        <li class="group transition duration-300">
                            <a href="./index.php" class="font-signika text-2xl">PROJECTS
                                <span class="nav-underline hidden md:block"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="./home.php" class="font-signika text-2xl">HOME
                                <span class="nav-underline hidden md:block"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="./about.php" class="font-signika text-2xl">ABOUT
                                <span class="nav-underline hidden md:block"></span>
                            </a>
                        </li>
                        <li class="group transition duration-300">
                            <a href="./contact.php" class="font-signika text-2xl">CONTACT
                                <span class="nav-underline hidden md:block"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main>
        <!-- Profile Hero Section -->
        <section class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Profile Image with Floating Effect -->
                <div class="flex flex-col items-center justify-center">
                    <div class="relative float-animation">
                        <div class="profile-ring"></div>
                        <div class="w-64 h-64 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center border-4 border-blue-500 shadow-2xl relative z-10">
                            <img src="./dist/assets/my.jpeg" alt="profile" srcset=" " class="w-60 h-60 rounded-full object-cover border-4 border-white shadow-lg" />

                        </div>
                    </div>
                    <div class="mt-8 text-center glass-card rounded-2xl p-6 backdrop-blur-md">
                        <h2 class="text-2xl font-bold mb-2">Sajanthiny Lokeshwaran</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-1">Web Developer & Analytics</p>
                        <p class="text-sm text-gray-500 dark:text-gray-500">📍 Chavekachcheri, Jaffna</p>
                    </div>
                </div>

                <!-- About Me Content -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-5xl font-bold mb-4 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                            About Me
                        </h1>
                        <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-6"></div>
                    </div>

                    <div class="space-y-4 text-lg">
                        <div class="flex items-start space-x-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 transition">
                            <span class="text-2xl">👨‍💻</span>
                            <div>
                                <span class="font-bold text-blue-500">Profile:</span>
                                <span class="ml-2">Web Developer & Analytics</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 transition">
                            <span class="text-2xl">🎓</span>
                            <div>
                                <span class="font-bold text-blue-500">Education:</span>
                                <span class="ml-2">BHSc (Hons) in Health Information Technology</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 transition">
                            <span class="text-2xl">🗣️</span>
                            <div>
                                <span class="font-bold text-blue-500">Languages:</span>
                                <span class="ml-2">English, Tamil</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 transition">
                            <span class="text-2xl">🛠️</span>
                            <div>
                                <span class="font-bold text-blue-500">Other Skills:</span>
                                <span class="ml-2">Word, Photoshop, Excel, Git, SEO</span>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-900 transition">
                            <span class="text-2xl">❤️</span>
                            <div>
                                <span class="font-bold text-blue-500">Interests:</span>
                                <span class="ml-2">Traveling, Photography, Teaching</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section with Pie Charts -->
        <section class="max-w-7xl mx-auto px-6 py-16 bg-gray-50 dark:bg-neutral-900 rounded-3xl my-12">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Technical Skills</h2>
                <p class="text-gray-600 dark:text-gray-400">Proficiency levels in various technologies</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Java -->
                <div class="flex flex-col items-center skill-category transition duration-300 p-4 rounded-xl">
                    <div class="pie-chart pie-chart-animate" style="--percentage: 342deg;" data-percentage="95">
                        <span class="pie-chart-label">95%</span>
                    </div>
                    <p class="mt-4 font-semibold text-lg">Java</p>
                </div>

                <!-- Tailwind CSS -->
                <div class="flex flex-col items-center skill-category transition duration-300 p-4 rounded-xl">
                    <div class="pie-chart pie-chart-animate" style="--percentage: 306deg;" data-percentage="85">
                        <span class="pie-chart-label">85%</span>
                    </div>
                    <p class="mt-4 font-semibold text-lg">Tailwind CSS</p>
                </div>

                <!-- TypeScript -->
                <div class="flex flex-col items-center skill-category transition duration-300 p-4 rounded-xl">
                    <div class="pie-chart pie-chart-animate" style="--percentage: 324deg;" data-percentage="90">
                        <span class="pie-chart-label">90%</span>
                    </div>
                    <p class="mt-4 font-semibold text-lg">TypeScript</p>
                </div>

                <!-- Statistical Analysis -->
                <div class="flex flex-col items-center skill-category transition duration-300 p-4 rounded-xl">
                    <div class="pie-chart pie-chart-animate" style="--percentage: 306deg;" data-percentage="85">
                        <span class="pie-chart-label">85%</span>
                    </div>
                    <p class="mt-4 font-semibold text-lg text-center">Statistical Analysis</p>
                </div>

                <!-- SQL -->
                <div class="flex flex-col items-center skill-category transition duration-300 p-4 rounded-xl">
                    <div class="pie-chart pie-chart-animate" style="--percentage: 288deg;" data-percentage="80">
                        <span class="pie-chart-label">80%</span>
                    </div>
                    <p class="mt-4 font-semibold text-lg">SQL</p>
                </div>
            </div>
        </section>

        <!-- Education Timeline Section -->
        <section class="max-w-6xl mx-auto px-6 py-16">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Education Journey</h2>
                <p class="text-gray-600 dark:text-gray-400">My academic background and achievements</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 timeline-connector relative">
                <!-- University -->
                <div class="group">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-1 rounded-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="bg-white dark:bg-black rounded-2xl p-8 h-full">
                            <div class="flex items-center mb-4">
                                <span class="text-4xl mr-3">🎓</span>
                                <span class="text-sm font-bold text-blue-500 bg-blue-100 dark:bg-blue-900 px-3 py-1 rounded-full">
                                    2023-2027
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold mb-3">BHSc (Hons) in Health Information Technology</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Gampaha Wickramarachchi University of Indigenous Medicine
                            </p>
                            <div class="flex items-center space-x-2">
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full" style="width: 60%;"></div>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- High School -->
                <div class="group">
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-1 rounded-2xl transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="bg-white dark:bg-black rounded-2xl p-8 h-full">
                            <div class="flex items-center mb-4">
                                <span class="text-4xl mr-3">📚</span>
                                <span class="text-sm font-bold text-purple-500 bg-purple-100 dark:bg-purple-900 px-3 py-1 rounded-full">
                                    2018-2021
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold mb-3">GCE Advanced Level</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Mn/St. Fatima M.M.V, Pesalai, Mannar
                            </p>
                            <div class="inline-flex items-center space-x-2 bg-green-100 dark:bg-green-900 px-4 py-2 rounded-full">
                                <span class="text-green-600 dark:text-green-400 font-bold">✓</span>
                                <span class="text-green-600 dark:text-green-400 font-semibold">Result: A2C</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download CV Button -->
            <div class="text-center mt-16">
                <a href="#" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white rounded-full overflow-hidden bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <span class="relative flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download CV
                    </span>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-neutral-900 mt-20">
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
                                    <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-8 text-xs text-gray-600 dark:text-gray-300 text-center">
                © 2026 Developed and Designed by
                <a href="mailto:gwu-hict-2021@gwu.ac.lk" class="underline hover:text-blue-500 transition">Sajanthiny Lokeshwaran</a>
            </p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        let menuOpen = false;

        function toggleMenu() {
            menuOpen = !menuOpen;
            const menu = document.getElementById('menu');
            const line1 = document.getElementById('line1');
            const line2 = document.getElementById('line2');
            const line3 = document.getElementById('line3');

            if (menuOpen) {
                menu.style.height = 'auto';
                line1.style.transform = 'rotate(45deg) translateY(0)';
                line2.style.opacity = '0';
                line3.style.transform = 'rotate(-45deg) translateY(0)';
            } else {
                menu.style.height = '0';
                line1.style.transform = 'translateY(-6px)';
                line2.style.opacity = '1';
                line3.style.transform = 'translateY(6px)';
            }
        }

        // Intersection Observer for animating elements when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationDelay = '0.1s';
                        entry.target.classList.add('pie-chart-animate');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.pie-chart').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>