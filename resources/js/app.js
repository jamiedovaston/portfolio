import './bootstrap';

import 'flowbite';

document.addEventListener("DOMContentLoaded", function () {
    // Force dark mode on all devices
    document.documentElement.classList.add("dark");

    // Remove theme toggle button if it exists
    var themeToggleBtn = document.getElementById("theme-toggle");
    if (themeToggleBtn) {
        themeToggleBtn.style.display = "none";
    }

    // Ensure script runs after Livewire updates
    Livewire.hook("message.processed", () => {
        document.documentElement.classList.add("dark");
        if (themeToggleBtn) {
            themeToggleBtn.style.display = "none";
        }
    });
});

