# 🎨 Theme System for ODTS v5

## Overview
A comprehensive theme system has been added to the Online Document Tracking System (ODTS) v5. Users can cycle through three themes: Default, Halloween, and Christmas with a single click.

## Features

### 🎨 Theme Cycle Button
- **Location**: Next to the user ID in the navbar (upper right)
- **Display**: Shows current theme (Default, Halloween, Christmas)
- **Functionality**: Click to cycle through all three themes
- **Persistence**: Theme preference is saved in localStorage

### 🎨 Christmas Theme Elements

#### Visual Design
- **Color Scheme**: Red, green, gold, and white Christmas colors
- **Background**: Festive gradient with subtle pattern overlay
- **Cards**: Enhanced with Christmas borders and subtle decorations
- **Buttons**: Christmas-themed gradients and hover effects
- **Tables**: Festive headers and hover animations

#### Animations
- **Snowflakes**: Animated falling snowflakes (❄️)
- **Floating Decorations**: Christmas emojis that float around the page
- **Hover Effects**: Smooth transitions and scale effects
- **Loading Screen**: Enhanced with Christmas decorations

#### Interactive Elements
- **SweetAlert Notifications**: Christmas-themed popup styling
- **Form Controls**: Christmas-colored borders and focus effects
- **Modal Dialogs**: Festive headers and styling
- **Navigation**: Christmas-themed sidebar and navbar

## Files Added/Modified

### New Files
1. **`/assets/css/christmas-theme.css`** - Complete Christmas theme styling
2. **`/assets/js/christmas-theme.js`** - Theme switching functionality
3. **`/assets/CHRISTMAS_THEME_README.md`** - This documentation

### Modified Files
1. **`/application/views/templates/header.php`** - Added theme CSS/JS includes and enhanced loading screen

## Usage

### For Users
1. Look for the theme toggle button (❄️) next to your user ID in the navbar
2. Click the button to switch between normal and Christmas themes
3. Your preference will be remembered for future visits

### For Developers
The Christmas theme can be controlled programmatically:

```javascript
// Enable Christmas theme
ChristmasTheme.enable();

// Disable Christmas theme
ChristmasTheme.disable();

// Toggle theme
ChristmasTheme.toggle();

// Check if Christmas theme is active
if (ChristmasTheme.isActive()) {
    console.log('Christmas theme is active!');
}
```

## Technical Details

### CSS Variables
The theme uses CSS custom properties for easy customization:
- `--christmas-red`: #d32f2f
- `--christmas-green`: #2e7d32
- `--christmas-gold`: #ffa000
- `--christmas-silver`: #90a4ae
- `--christmas-white`: #ffffff

### JavaScript Features
- **localStorage**: Saves user theme preference
- **sessionStorage**: Prevents repeated notifications
- **Dynamic Elements**: Creates snowflakes and decorations dynamically
- **Event Handling**: Smooth theme transitions
- **Responsive Design**: Works on all screen sizes

### Browser Compatibility
- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile responsive design
- Graceful degradation for older browsers

## Customization

### Adding New Christmas Elements
1. Add CSS rules to `christmas-theme.css`
2. Use the `.christmas-theme` class as a parent selector
3. Follow the existing color scheme and animation patterns

### Modifying Colors
Update the CSS variables in `christmas-theme.css`:
```css
:root {
  --christmas-red: #your-red-color;
  --christmas-green: #your-green-color;
  /* ... other variables */
}
```

### Adding New Animations
Create new keyframe animations and apply them to Christmas elements:
```css
@keyframes your-animation {
  /* animation keyframes */
}

.christmas-theme .your-element {
  animation: your-animation 2s ease-in-out infinite;
}
```

## Performance Considerations
- CSS animations use `transform` and `opacity` for optimal performance
- Snowflakes are limited to 50 instances to prevent performance issues
- Theme switching is instant with CSS class toggling
- localStorage operations are minimal and non-blocking

## Future Enhancements
- Christmas music toggle (optional)
- More seasonal themes (Halloween, Easter, etc.)
- User-customizable decoration positions
- Christmas-themed data visualizations
- Animated Christmas cards in the dashboard

## Support
For issues or questions regarding the Christmas theme, please contact the development team or create an issue in the project repository.

---

**Merry Christmas! 🎄🎁❄️**
