import './bootstrap';

import 'flowbite';

document.addEventListener("DOMContentLoaded", function () {
    function applyTheme() {
        if (
            localStorage.getItem("color-theme") === "dark" ||
            (!localStorage.getItem("color-theme") && window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    }

    function updateIcons() {
        var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
        var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

        if (!themeToggleDarkIcon || !themeToggleLightIcon) return;

        if (
            localStorage.getItem("color-theme") === "dark" ||
            (!localStorage.getItem("color-theme") && window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            themeToggleLightIcon.classList.remove("hidden");
            themeToggleDarkIcon.classList.add("hidden");
        } else {
            themeToggleDarkIcon.classList.remove("hidden");
            themeToggleLightIcon.classList.add("hidden");
        }
    }

    function setupThemeToggle() {
        var themeToggleBtn = document.getElementById("theme-toggle");
        if (!themeToggleBtn) return;

        themeToggleBtn.addEventListener("click", function () {
            var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
            var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

            if (!themeToggleDarkIcon || !themeToggleLightIcon) return;

            // Toggle the icons inside the button
            themeToggleDarkIcon.classList.toggle("hidden");
            themeToggleLightIcon.classList.toggle("hidden");

            // Change theme and update localStorage
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        });
    }

    // Initial setup
    applyTheme();
    updateIcons();
    setupThemeToggle();

    // Ensure the script runs after Livewire updates
    Livewire.hook("message.processed", (message, component) => {
        applyTheme();
        updateIcons();
        setupThemeToggle();
    });
});

