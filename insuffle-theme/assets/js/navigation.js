/**
 * Navigation Script
 *
 * Handles mobile menu toggle and navigation functionality
 *
 * @package Insuffle
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {

        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.main-navigation');

        if (menuToggle && navigation) {
            menuToggle.addEventListener('click', function() {
                navigation.classList.toggle('toggled');
                const expanded = navigation.classList.contains('toggled');
                menuToggle.setAttribute('aria-expanded', expanded);

                // Change button text
                if (expanded) {
                    menuToggle.innerHTML = '<span class="toggle-text">Fermer</span>';
                    document.body.style.overflow = 'hidden'; // Prevent scroll when menu open
                } else {
                    menuToggle.innerHTML = '<span class="toggle-text">Menu</span>';
                    document.body.style.overflow = '';
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!navigation.contains(event.target) && !menuToggle.contains(event.target)) {
                    if (navigation.classList.contains('toggled')) {
                        navigation.classList.remove('toggled');
                        menuToggle.setAttribute('aria-expanded', 'false');
                        menuToggle.innerHTML = '<span class="toggle-text">Menu</span>';
                        document.body.style.overflow = '';
                    }
                }
            });

            // Close menu on ESC key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && navigation.classList.contains('toggled')) {
                    navigation.classList.remove('toggled');
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.innerHTML = '<span class="toggle-text">Menu</span>';
                    document.body.style.overflow = '';
                }
            });
        }

        // Add active class to current menu item
        const currentUrl = window.location.href;
        const menuLinks = document.querySelectorAll('.main-navigation a');

        menuLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                link.classList.add('current');
                const parentLi = link.closest('li');
                if (parentLi) {
                    parentLi.classList.add('current-menu-item');
                }
            }
        });

        // Dropdown menu toggle on mobile (click to expand)
        const menuItemsWithChildren = document.querySelectorAll('.main-navigation .menu-item-has-children');

        menuItemsWithChildren.forEach(function(menuItem) {
            const link = menuItem.querySelector('a');
            const submenu = menuItem.querySelector('ul');

            if (link && submenu) {
                link.addEventListener('click', function(e) {
                    // Only prevent default on mobile (when menu is toggled)
                    if (navigation && navigation.classList.contains('toggled')) {
                        e.preventDefault();

                        // Toggle submenu visibility
                        const isVisible = submenu.style.display === 'flex';
                        submenu.style.display = isVisible ? 'none' : 'flex';
                    }
                });
            }
        });

        // Sticky header on scroll
        const header = document.querySelector('.site-header');
        let lastScroll = 0;

        if (header) {
            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset;

                if (currentScroll > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }

                lastScroll = currentScroll;
            });
        }

    });

})();
