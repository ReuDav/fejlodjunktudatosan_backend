<header>
        <nav class="bg-white dark:bg-gray-800 shadow" aria-label="Fő navigáció">
            <div class="container mx-auto px-8 max-w-7xl flex items-center justify-between h-20">
                <a class="flex-shrink-0" href="/" aria-label="Fejlődjünk tudatosan! - Kezdőlap">
                    <img class="w-16 h-16" src="{{ asset('assets/icons/logo.svg') }}" alt="Fejlődjünk tudatosan! logó" />
                </a>
                <div class="hidden md:block">
                    <ul class="flex items-baseline ml-10 space-x-4">
                        <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-md font-medium" href="#kezdolap">Kezdőlap</a></li>
                        <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-md font-medium" href="#projektek">Projektek</a></li>
                        <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-md font-medium" href="#keszsegek">Készségek</a></li>
                        <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-md font-medium" href="#kapcsolat">Kapcsolat</a></li>
                    </ul>
                </div>
                <button type="button" name="Hamburger menü" id="menu-toggle" aria-expanded="false" aria-controls="mobile-menu"">
                    <span class="bg-black rounded-lg block h-1 w-8 mb-1"></span>
                    <span class="bg-black rounded-lg block h-1 w-8 mb-1"></span>
                    <span class="bg-black rounded-lg block h-1 w-8"></span>
                </button>
            </div>
            <!-- Mobile menu -->
            <div id="mobile-menu" class="grid grid-template-rows-0fr transition-all duration-500 md:hidden absolute top-20 left-0 w-full">
                <ul class="grid-inner space-y-1 sm:px-3">
                    <div class="px-2 pt-2 pb-3">
                    <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="#kezdolap">Kezdőlap</a></li>
                    <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="#projektek">Projektek</a></li>
                    <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="#keszsegek">Készségek</a></li>
                    <li><a class="nav-link text-gray-300 hover:text-gray-800 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium" href="#kapcsolat">Kapcsolat</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </header>

    <script>
        // JavaScript to toggle the mobile menu
        const menuToggle = document.getElementById("menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");

        menuToggle.addEventListener("click", function () {
            mobileMenu.classList.toggle("open");
            this.setAttribute(
                "aria-expanded",
                this.getAttribute("aria-expanded") === "true" ? "false" : "true"
            );
        });

        // JavaScript for Active Link
        const links = document.querySelectorAll(".nav-link");

        function setActiveLink() {
            const currentHash = window.location.hash || "#kezdolap";

            links.forEach(link => {
                if (link.getAttribute("href") === currentHash) {
                    link.classList.add("active-link");
                } else {
                    link.classList.remove("active-link");
                }
            });
        }

        setActiveLink();
        window.addEventListener("hashchange", setActiveLink);
    </script>

    <style>
        .active-link {
            color: #1d4ed8;
            font-weight: bold;
        }
        /* Mobile Menu CSS */
        .grid {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 0.5s ease-in-out;
        }
        .grid.open {
            grid-template-rows: 1fr;
        }
        .grid-inner {
            overflow: hidden;
        }
        #menu-toggle {
            aspect-ratio: 1/1 !important;
            & span {
                min-width: 100%;
                margin-block: 5px;
                height: 3px;
                background: black;
                border-radius: 10px;
            }
        }
    </style>