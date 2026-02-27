<!-- Mobile Menu Toggle Script -->
<script>
    (function() {
        const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
        const mobileMenu = document.querySelector(".mobile-menu");
        const mobileMenuClose = document.querySelector(".mobile-menu-close");
        const mobileMenuOverlay = document.querySelector(
            ".mobile-menu-overlay"
        );
        const body = document.body;

        function openMenu() {
            if (mobileMenu) {
                mobileMenu.classList.add("show");
            }
            if (mobileMenuOverlay) {
                mobileMenuOverlay.classList.add("show");
            }
            if (body) {
                body.style.overflow = "hidden";
            }
        }

        function closeMenu() {
            if (mobileMenu) {
                mobileMenu.classList.remove("show");
            }
            if (mobileMenuOverlay) {
                mobileMenuOverlay.classList.remove("show");
            }
            if (body) {
                body.style.overflow = "";
            }
            // Close all dropdowns when closing menu
            const openDropdowns = mobileMenu.querySelectorAll(
                ".dropdown-menu.show"
            );
            openDropdowns.forEach((dropdown) => {
                dropdown.classList.remove("show");
            });
        }

        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                openMenu();
            });
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeMenu();
            });
        }

        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener("click", function() {
                closeMenu();
            });
        }

        // Close menu when clicking on a non-dropdown link
        if (mobileMenu) {
            const mobileMenuLinks = mobileMenu.querySelectorAll(
                ".nav-link:not(.dropdown-toggle), .dropdown-item"
            );
            mobileMenuLinks.forEach((link) => {
                link.addEventListener("click", function(e) {
                    // Only close if it's not a dropdown toggle
                    if (!this.classList.contains("dropdown-toggle")) {
                        setTimeout(closeMenu, 300);
                    }
                });
            });
        }

        // Close menu on window resize if it's larger than mobile
        window.addEventListener("resize", function() {
            if (window.innerWidth > 991) {
                closeMenu();
            }
        });

        // Close menu on ESC key
        document.addEventListener("keydown", function(e) {
            if (
                e.key === "Escape" &&
                mobileMenu &&
                mobileMenu.classList.contains("show")
            ) {
                closeMenu();
            }
        });
    })();
</script>
</body>

</html>