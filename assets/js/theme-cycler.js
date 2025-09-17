// Theme Cycler JavaScript - Cycles through Default, Halloween, Christmas
(function() {
    'use strict';
    
    // Theme states
    const THEMES = {
        DEFAULT: 'default',
        HALLOWEEN: 'halloween',
        CHRISTMAS: 'christmas'
    };
    
    const THEME_ORDER = [THEMES.DEFAULT, THEMES.HALLOWEEN, THEMES.CHRISTMAS];
    
    let currentThemeIndex = 0;
    let currentTheme = THEMES.DEFAULT;
    
    // Initialize theme on page load
    function initTheme() {
        // Check if this is a print page (df.php or ar.php) - force default theme
        const currentUrl = window.location.href;
        const isPrintPage = currentUrl.includes('/df/') || currentUrl.includes('/ar/');
        
        if (isPrintPage) {
            // Force default theme for print pages
            currentTheme = THEMES.DEFAULT;
            currentThemeIndex = 0;
        } else {
            // Check localStorage for saved theme preference
            const savedTheme = localStorage.getItem('currentTheme');
            if (savedTheme && THEME_ORDER.includes(savedTheme)) {
                currentTheme = savedTheme;
                currentThemeIndex = THEME_ORDER.indexOf(savedTheme);
            } else {
                currentTheme = THEMES.DEFAULT;
                currentThemeIndex = 0;
            }
        }
        
        applyTheme(currentTheme);
    }
    
    // Apply theme
    function applyTheme(theme) {
        // Remove all theme classes
        document.body.classList.remove('christmas-theme', 'halloween-theme');
        
        // Apply new theme
        if (theme === THEMES.CHRISTMAS) {
            document.body.classList.add('christmas-theme');
        } else if (theme === THEMES.HALLOWEEN) {
            document.body.classList.add('halloween-theme');
        }
        
        // Update button
        updateThemeButton(theme);
        
        // Update loading GIF
        updateLoadingGif(theme);
        
        // Save theme preference
        localStorage.setItem('currentTheme', theme);
        
        // Apply theme-specific effects
        if (theme === THEMES.CHRISTMAS) {
            addChristmasEffects();
        } else if (theme === THEMES.HALLOWEEN) {
            addHalloweenEffects();
        } else {
            removeAllEffects();
        }
    }
    
    // Update theme button
    function updateThemeButton(theme) {
        const themeBtn = document.getElementById('themeDropdownBtn');
        const themeText = document.getElementById('currentThemeText');
        
        if (themeBtn && themeText) {
            let icon, text, title;
            
            switch(theme) {
                case THEMES.DEFAULT:
                    icon = 'fas fa-palette';
                    text = 'Theme: Default';
                    title = 'Current: Default | Click to select theme';
                    break;
                case THEMES.HALLOWEEN:
                    icon = 'fas fa-ghost';
                    text = 'Theme: Halloween';
                    title = 'Current: Halloween | Click to select theme';
                    break;
                case THEMES.CHRISTMAS:
                    icon = 'fas fa-tree';
                    text = 'Theme: Christmas';
                    title = 'Current: Christmas | Click to select theme';
                    break;
            }
            
            // Update the icon in the button
            const iconElement = themeBtn.querySelector('i');
            if (iconElement) {
                iconElement.className = icon;
            }
            
            // Update the text
            themeText.textContent = text;
            themeBtn.title = title;
        }
    }
    
    // Update loading GIF based on theme
    function updateLoadingGif(theme) {
        const loadingImage = document.getElementById('loading-image');
        const loadingContainer = document.getElementById('loading');
        
        if (loadingImage && loadingContainer) {
            // Check if this is a print page - force default loading
            const currentUrl = window.location.href;
            const isPrintPage = currentUrl.includes('/df/') || currentUrl.includes('/ar/');
            
            // If it's a print page, don't change the loading GIF - it's already set correctly in PHP
            if (isPrintPage) {
                return; // Exit early, don't modify loading on print pages
            }
            
            let gifPath, loadingText, decorations;
            
            // Use theme-based loading for other pages
            switch(theme) {
                case THEMES.DEFAULT:
                    gifPath = 'loading.gif';
                    loadingText = 'DENR NCR';
                    decorations = '';
                    break;
                case THEMES.HALLOWEEN:
                    gifPath = 'loading-holloween.gif';
                    loadingText = 'DENR NCR';
                    decorations = `
                        <div id="halloween-loading-decorations" style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); font-size: 30px; color: #ff6b35;">
                            <span style="animation: float 2s ease-in-out infinite;">🎃</span>
                            <span style="animation: float 2s ease-in-out infinite 0.5s; margin: 0 20px;">👻</span>
                            <span style="animation: float 2s ease-in-out infinite 1s;">🦇</span>
                        </div>
                    `;
                    break;
                case THEMES.CHRISTMAS:
                    gifPath = 'loading-christmas.gif';
                    loadingText = 'DENR NCR';
                    decorations = `
                        <div id="christmas-loading-decorations" style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); font-size: 30px; color: #ffa000;">
                            <span style="animation: float 2s ease-in-out infinite;">🎄</span>
                            <span style="animation: float 2s ease-in-out infinite 0.5s; margin: 0 20px;">🎁</span>
                            <span style="animation: float 2s ease-in-out infinite 1s;">❄️</span>
                        </div>
                    `;
                    break;
            }
            
            // Update the src attribute
            const baseUrl = window.location.origin + window.location.pathname.replace(/\/[^\/]*$/, '') + '/assets/';
            loadingImage.src = baseUrl + gifPath;
            
            // Update loading text
            const loadingTextElement = document.getElementById('loading-text');
            if (loadingTextElement) {
                loadingTextElement.textContent = loadingText;
            }
            
            // Remove existing decorations
            const existingDecorations = loadingContainer.querySelectorAll('#christmas-loading-decorations, #halloween-loading-decorations');
            existingDecorations.forEach(decoration => decoration.remove());
            
            // Add new decorations
            if (decorations) {
                loadingContainer.insertAdjacentHTML('beforeend', decorations);
            }
        }
    }
    
    // Cycle to next theme
    function cycleTheme() {
        currentThemeIndex = (currentThemeIndex + 1) % THEME_ORDER.length;
        currentTheme = THEME_ORDER[currentThemeIndex];
        applyTheme(currentTheme);
        
        // Show theme change notification
        showThemeNotification(currentTheme);
    }
    
    // Christmas effects
    function addChristmasEffects() {
        // Add Christmas decorations
        addChristmasDecorations();
        
        // Add snowflakes
        createSnowflakes();
    }
    
    // Halloween effects
    function addHalloweenEffects() {
        // Add Halloween decorations
        addHalloweenDecorations();
        
        // Add spiders
        createSpiders();
    }
    
    // Remove all effects
    function removeAllEffects() {
        removeChristmasDecorations();
        removeSnowflakes();
        removeHalloweenDecorations();
        removeSpiders();
    }
    
    // Christmas decorations
    function addChristmasDecorations() {
        const decorations = [
            { emoji: '🎄', class: 'top-left' },
            { emoji: '🎁', class: 'top-right' },
            { emoji: '❄️', class: 'bottom-left' },
            { emoji: '🌟', class: 'bottom-right' }
        ];
        
        decorations.forEach(decoration => {
            const element = document.createElement('div');
            element.className = `christmas-decoration ${decoration.class}`;
            element.innerHTML = decoration.emoji;
            element.id = `decoration-${decoration.class}`;
            document.body.appendChild(element);
        });
    }
    
    function removeChristmasDecorations() {
        const decorations = document.querySelectorAll('.christmas-decoration');
        decorations.forEach(decoration => decoration.remove());
    }
    
    // Halloween decorations
    function addHalloweenDecorations() {
        const decorations = [
            { emoji: '🎃', class: 'top-left' },
            { emoji: '👻', class: 'top-right' },
            { emoji: '🦇', class: 'bottom-left' },
            { emoji: '👻', class: 'bottom-right' }
        ];
        
        decorations.forEach(decoration => {
            const element = document.createElement('div');
            element.className = `halloween-decoration ${decoration.class}`;
            element.innerHTML = decoration.emoji;
            element.id = `decoration-${decoration.class}`;
            document.body.appendChild(element);
        });
    }
    
    function removeHalloweenDecorations() {
        const decorations = document.querySelectorAll('.halloween-decoration');
        decorations.forEach(decoration => decoration.remove());
    }
    
    // Snowflakes
    function createSnowflakes() {
        const snowflakeContainer = document.createElement('div');
        snowflakeContainer.id = 'snowflake-container';
        snowflakeContainer.style.position = 'fixed';
        snowflakeContainer.style.top = '0';
        snowflakeContainer.style.left = '0';
        snowflakeContainer.style.width = '100%';
        snowflakeContainer.style.height = '100%';
        snowflakeContainer.style.pointerEvents = 'none';
        snowflakeContainer.style.zIndex = '1000';
        document.body.appendChild(snowflakeContainer);
        
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                createSnowflake(snowflakeContainer);
            }, i * 200);
        }
    }
    
    function createSnowflake(container) {
        const snowflake = document.createElement('div');
        snowflake.className = 'snowflake';
        snowflake.innerHTML = '❄';
        snowflake.style.left = Math.random() * 100 + '%';
        snowflake.style.animationDelay = Math.random() * 10 + 's';
        snowflake.style.animationDuration = (Math.random() * 10 + 5) + 's';
        snowflake.style.fontSize = (Math.random() * 10 + 10) + 'px';
        snowflake.style.opacity = Math.random() * 0.7 + 0.3;
        
        container.appendChild(snowflake);
        
        setTimeout(() => {
            if (snowflake.parentNode) {
                snowflake.parentNode.removeChild(snowflake);
            }
        }, 15000);
    }
    
    function removeSnowflakes() {
        const container = document.getElementById('snowflake-container');
        if (container) {
            container.remove();
        }
    }
    
    // Spiders
    function createSpiders() {
        console.log('Creating spiders...');
        const spiderContainer = document.createElement('div');
        spiderContainer.id = 'spider-container';
        spiderContainer.style.position = 'fixed';
        spiderContainer.style.top = '0';
        spiderContainer.style.left = '0';
        spiderContainer.style.width = '100%';
        spiderContainer.style.height = '100%';
        spiderContainer.style.pointerEvents = 'none';
        spiderContainer.style.zIndex = '1000';
        document.body.appendChild(spiderContainer);
        
        for (let i = 0; i < 25; i++) {
            setTimeout(() => {
                createSpider(spiderContainer);
            }, i * 400);
        }
    }
    
    function createSpider(container) {
        console.log('Creating individual spider...');
        const spider = document.createElement('div');
        spider.className = 'spider';
        spider.innerHTML = '🕷️';
        spider.style.left = Math.random() * 100 + '%';
        spider.style.animationDelay = Math.random() * 10 + 's';
        spider.style.animationDuration = (Math.random() * 8 + 6) + 's';
        spider.style.fontSize = (Math.random() * 6 + 10) + 'px';
        spider.style.opacity = Math.random() * 0.7 + 0.3;
        
        container.appendChild(spider);
        console.log('Spider added to container');
        
        setTimeout(() => {
            if (spider.parentNode) {
                spider.parentNode.removeChild(spider);
            }
        }, 12000);
    }
    
    function removeSpiders() {
        const container = document.getElementById('spider-container');
        if (container) {
            container.remove();
        }
    }
    
    // Show theme notification
    function showThemeNotification(theme) {
        // Only show once per session per theme
        const notificationKey = `themeNotificationShown_${theme}`;
        if (sessionStorage.getItem(notificationKey) === 'true') {
            return;
        }
        
        setTimeout(() => {
            if (typeof Swal !== 'undefined') {
                let title, text, icon;
                
                switch(theme) {
                    case THEMES.DEFAULT:
                        title = '🎨 Default Theme';
                        text = 'Switched to the default theme!';
                        icon = 'info';
                        break;
                    case THEMES.HALLOWEEN:
                        title = '🎃 Spooky Halloween!';
                        text = 'Halloween theme activated! Enjoy the spooky experience!';
                        icon = 'warning';
                        break;
                    case THEMES.CHRISTMAS:
                        title = '🎄 Merry Christmas!';
                        text = 'Christmas theme activated! Enjoy the festive experience!';
                        icon = 'success';
                        break;
                }
                
                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    timer: 3000,
                    showConfirmButton: false,
                    background: theme === THEMES.HALLOWEEN ? 'linear-gradient(135deg, #1a1a1a, #424242)' : 
                               theme === THEMES.CHRISTMAS ? 'linear-gradient(135deg, #1b5e20, #2e7d32)' : 
                               'white',
                    color: theme === THEMES.DEFAULT ? 'black' : 'white',
                    customClass: {
                        popup: 'theme-popup'
                    }
                });
            }
            sessionStorage.setItem(notificationKey, 'true');
        }, 1000);
    }
    
    // Setup theme dropdown event listeners
    function setupThemeDropdown() {
        // Remove existing event listeners to prevent duplicates
        const existingOptions = document.querySelectorAll('.theme-option');
        existingOptions.forEach(option => {
            option.removeEventListener('click', handleThemeOptionClick);
        });
        
        // Add event listeners using event delegation
        document.addEventListener('click', function(e) {
            if (e.target.closest('.theme-option')) {
                e.preventDefault();
                e.stopPropagation();
                
                const option = e.target.closest('.theme-option');
                const selectedTheme = option.getAttribute('data-theme');
                
                if (selectedTheme) {
                    setTheme(selectedTheme);
                    
                    // Update active state
                    const allOptions = document.querySelectorAll('.theme-option');
                    allOptions.forEach(opt => opt.classList.remove('active'));
                    option.classList.add('active');
                    
                    // Close dropdown
                    const dropdown = option.closest('.dropdown');
                    if (dropdown) {
                        const dropdownMenu = dropdown.querySelector('.dropdown-menu');
                        if (dropdownMenu) {
                            dropdownMenu.classList.remove('show');
                        }
                        const button = dropdown.querySelector('[data-toggle="dropdown"]');
                        if (button) {
                            button.setAttribute('aria-expanded', 'false');
                        }
                    }
                }
            }
        });
        
        // Initialize dropdown manually
        const themeDropdownBtn = document.getElementById('themeDropdownBtn');
        if (themeDropdownBtn) {
            // Remove existing click listeners
            themeDropdownBtn.removeEventListener('click', handleDropdownToggle);
            
            // Add click listener for dropdown toggle
            themeDropdownBtn.addEventListener('click', handleDropdownToggle);
        }
    }
    
    // Handle dropdown toggle
    function handleDropdownToggle(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const dropdown = this.closest('.dropdown');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');
        const isOpen = dropdownMenu.classList.contains('show');
        
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });
        document.querySelectorAll('[data-toggle="dropdown"][aria-expanded="true"]').forEach(btn => {
            btn.setAttribute('aria-expanded', 'false');
        });
        
        // Toggle current dropdown
        if (!isOpen) {
            dropdownMenu.classList.add('show');
            this.setAttribute('aria-expanded', 'true');
        } else {
            dropdownMenu.classList.remove('show');
            this.setAttribute('aria-expanded', 'false');
        }
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
            document.querySelectorAll('[data-toggle="dropdown"][aria-expanded="true"]').forEach(btn => {
                btn.setAttribute('aria-expanded', 'false');
            });
        }
    });
    
    // Handle theme option click (kept for reference but not used)
    function handleThemeOptionClick(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const selectedTheme = this.getAttribute('data-theme');
        setTheme(selectedTheme);
        
        // Update active state
        const themeOptions = document.querySelectorAll('.theme-option');
        themeOptions.forEach(opt => opt.classList.remove('active'));
        this.classList.add('active');
        
        // Close dropdown
        const dropdown = this.closest('.dropdown');
        if (dropdown) {
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.remove('show');
            }
            const button = dropdown.querySelector('[data-toggle="dropdown"]');
            if (button) {
                button.setAttribute('aria-expanded', 'false');
            }
        }
    }
    
    // Set specific theme
    function setTheme(theme) {
        // Check if this is a print page - prevent theme changes
        const currentUrl = window.location.href;
        const isPrintPage = currentUrl.includes('/df/') || currentUrl.includes('/ar/');
        
        if (isPrintPage) {
            // Force default theme for print pages, ignore theme changes
            currentTheme = THEMES.DEFAULT;
            currentThemeIndex = 0;
            applyTheme(currentTheme);
            return;
        }
        
        if (THEME_ORDER.includes(theme)) {
            currentTheme = theme;
            currentThemeIndex = THEME_ORDER.indexOf(theme);
            applyTheme(currentTheme);
            showThemeNotification(currentTheme);
            
            // Re-setup dropdown after theme change
            setTimeout(() => {
                setupThemeDropdown();
            }, 100);
        }
    }
    
    // Add theme styles to SweetAlert
    function addThemeSweetAlertStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .theme-popup {
                border: 3px solid #ffa000 !important;
                border-radius: 15px !important;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
            }
        `;
        document.head.appendChild(style);
    }
    
    // Initialize everything when DOM is ready
    function init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
            return;
        }
        
        // Setup theme dropdown
        setupThemeDropdown();
        
        // Add theme SweetAlert styles
        addThemeSweetAlertStyles();
        
        // Initialize theme
        initTheme();
        
        // Set active state for current theme
        setTimeout(() => {
            const themeOptions = document.querySelectorAll('.theme-option');
            themeOptions.forEach(option => {
                if (option.getAttribute('data-theme') === currentTheme) {
                    option.classList.add('active');
                }
            });
        }, 100);
        
        console.log('Theme dropdown loaded! 🎨');
    }
    
    // Make functions globally available
    window.ThemeCycler = {
        setTheme: setTheme,
        applyTheme: applyTheme,
        cycleTheme: cycleTheme,
        getCurrentTheme: () => currentTheme,
        getAvailableThemes: () => THEME_ORDER
    };
    
    // Initialize
    init();
    
})();
