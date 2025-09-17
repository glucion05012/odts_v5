// Christmas Theme JavaScript
(function() {
    'use strict';
    
    // Theme state
    let isChristmasTheme = false;
    
    // Initialize theme on page load
    function initTheme() {
        // Check localStorage for saved theme preference
        const savedTheme = localStorage.getItem('christmasTheme');
        if (savedTheme === 'true') {
            enableChristmasTheme();
        } else {
            disableChristmasTheme();
        }
    }
    
    // Enable Christmas theme
    function enableChristmasTheme() {
        isChristmasTheme = true;
        document.body.classList.add('christmas-theme');
        localStorage.setItem('christmasTheme', 'true');
        
        // Update button icon
        const themeBtn = document.getElementById('themeToggleBtn');
        if (themeBtn) {
            themeBtn.innerHTML = '<i class="fas fa-tree"></i>';
            themeBtn.title = 'Disable Christmas Theme';
        }
        
        // Add Christmas decorations
        addChristmasDecorations();
        
        // Add snowflakes
        createSnowflakes();
        
        // Show Christmas notification
        showChristmasNotification();
    }
    
    // Disable Christmas theme
    function disableChristmasTheme() {
        isChristmasTheme = false;
        document.body.classList.remove('christmas-theme');
        localStorage.setItem('christmasTheme', 'false');
        
        // Update button icon
        const themeBtn = document.getElementById('themeToggleBtn');
        if (themeBtn) {
            themeBtn.innerHTML = '<i class="fas fa-snowflake"></i>';
            themeBtn.title = 'Enable Christmas Theme';
        }
        
        // Remove Christmas decorations
        removeChristmasDecorations();
        
        // Remove snowflakes
        removeSnowflakes();
    }
    
    // Toggle theme
    function toggleTheme() {
        if (isChristmasTheme) {
            disableChristmasTheme();
        } else {
            enableChristmasTheme();
        }
    }
    
    // Add Christmas decorations
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
    
    // Remove Christmas decorations
    function removeChristmasDecorations() {
        const decorations = document.querySelectorAll('.christmas-decoration');
        decorations.forEach(decoration => decoration.remove());
    }
    
    // Create snowflakes
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
        
        // Create snowflakes
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                createSnowflake(snowflakeContainer);
            }, i * 200);
        }
    }
    
    // Create individual snowflake
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
        
        // Remove snowflake after animation
        setTimeout(() => {
            if (snowflake.parentNode) {
                snowflake.parentNode.removeChild(snowflake);
            }
        }, 15000);
    }
    
    // Remove snowflakes
    function removeSnowflakes() {
        const container = document.getElementById('snowflake-container');
        if (container) {
            container.remove();
        }
    }
    
    // Show Christmas notification
    function showChristmasNotification() {
        // Only show once per session
        if (sessionStorage.getItem('christmasNotificationShown') === 'true') {
            return;
        }
        
        setTimeout(() => {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: '🎄 Merry Christmas! 🎄',
                    text: 'Christmas theme has been activated! Enjoy the festive experience!',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false,
                    background: 'linear-gradient(135deg, #1b5e20, #2e7d32)',
                    color: 'white',
                    customClass: {
                        popup: 'christmas-popup'
                    }
                });
            }
            sessionStorage.setItem('christmasNotificationShown', 'true');
        }, 1000);
    }
    
    // Setup theme toggle button event listener
    function setupThemeToggleButton() {
        const themeBtn = document.getElementById('themeToggleBtn');
        if (themeBtn) {
            themeBtn.onclick = toggleTheme;
        }
    }
    
    // Add Christmas styles to SweetAlert
    function addChristmasSweetAlertStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .christmas-popup {
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
        
        // Setup theme toggle button
        setupThemeToggleButton();
        
        // Add Christmas SweetAlert styles
        addChristmasSweetAlertStyles();
        
        // Initialize theme
        initTheme();
        
        // Add some Christmas music (optional - can be enabled by user)
        addChristmasMusicToggle();
    }
    
    // Add Christmas music toggle (optional)
    function addChristmasMusicToggle() {
        // This is a placeholder for Christmas music functionality
        // Can be implemented if needed
        console.log('Christmas theme loaded! 🎄');
    }
    
    // Make functions globally available
    window.ChristmasTheme = {
        enable: enableChristmasTheme,
        disable: disableChristmasTheme,
        toggle: toggleTheme,
        isActive: () => isChristmasTheme
    };
    
    // Initialize
    init();
    
})();
