# Modern Portfolio Website

A single-page portfolio website built with PHP featuring a modern dark neon/glassmorphism design with smooth animations.

## 🚀 Features

- **Modern Design**: Dark theme with neon cyan/purple accents and glassmorphism effects
- **Responsive**: Works perfectly on all devices (≥320px)
- **Smooth Animations**: AOS (Animate On Scroll) library with reduced motion support
- **Interactive**: Typewriter effect, hover animations, and smooth scrolling
- **Accessible**: Semantic HTML, ARIA labels, keyboard navigation
- **SEO Optimized**: Meta tags, OpenGraph, structured data
- **Contact Form**: Server-side PHP validation with graceful fallback

## 📁 File Structure

```
Portfolio/
├── index.php              # Main portfolio file
├── assets/
│   ├── css/
│   │   └── styles.css     # Custom neon/glassmorphism styles
│   ├── js/
│   │   └── app.js         # Interactive functionality
│   ├── img/
│   │   ├── avatar.png     # Profile picture
│   │   ├── favicon.png    # Site favicon
│   │   └── projects/      # Project screenshots
│   └── resume/
│       └── Shivang_Resume.pdf  # Downloadable resume
└── README.md
```

## 🛠️ Setup Instructions

### Local Development

1. **PHP Server** (Recommended):
   ```bash
   cd Portfolio
   php -S localhost:8000
   ```

2. **XAMPP/WAMP**:
   - Copy files to `htdocs/portfolio/`
   - Access via `http://localhost/portfolio/`

3. **Live Server** (VS Code):
   - Install Live Server extension
   - Right-click `index.php` → "Open with Live Server"

### Production Deployment

#### cPanel/Shared Hosting:
1. Upload all files to `public_html/` or subdirectory
2. Ensure PHP 8+ is enabled
3. Configure mail settings in hosting panel

#### Vercel:
1. Install Vercel CLI: `npm i -g vercel`
2. Run `vercel` in project directory
3. Configure PHP runtime in `vercel.json`

#### Netlify:
1. Drag and drop folder to Netlify dashboard
2. Enable PHP processing in site settings

## ⚙️ Customization

### Content Updates

Edit the PHP arrays in `index.php`:

```php
// Experience data
$experiences = [
    [
        'company' => 'Your Company',
        'role' => 'Your Role',
        'period' => 'Start - End Date',
        'location' => 'Location',
        'bullets' => ['Achievement 1', 'Achievement 2'],
        'tech' => ['Tech1', 'Tech2']
    ]
];

// Projects data
$projects = [
    [
        'title' => 'Project Name',
        'desc' => 'Project description',
        'tech' => ['Tech1', 'Tech2'],
        'code' => 'https://github.com/...',
        'demo' => 'https://demo-url.com',
        'img' => '/assets/img/projects/project.png'
    ]
];

// Skills data
$skills = [
    'Category' => ['Skill1', 'Skill2', 'Skill3']
];
```

### Color Scheme

Modify CSS variables in `assets/css/styles.css`:

```css
:root {
    --neon-cyan: #00E5FF;      /* Primary neon color */
    --neon-purple: #A855F7;    /* Secondary neon color */
    --dark-bg: #0b0f14;        /* Background color */
}
```

### Assets Replacement

1. **Avatar**: Replace `assets/img/avatar.png` (128x128px recommended)
2. **Projects**: Add images to `assets/img/projects/` (400x300px recommended)
3. **Resume**: Replace `assets/resume/Shivang_Resume.pdf`
4. **Favicon**: Replace `assets/img/favicon.png` (32x32px)

## 📧 Contact Form Setup

### Basic Setup (Default):
- Uses PHP `mail()` function
- Shows success message regardless of actual delivery
- Requires server mail configuration

### Advanced Setup:
1. **SMTP Configuration**:
   ```php
   // Add to index.php contact form section
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   ```

2. **Email Service Integration**:
   - Mailgun, SendGrid, or similar
   - Update mail handling code in `index.php`

## 🎨 Design Options

The portfolio supports multiple design approaches:

1. **Current**: Tailwind CDN + Custom CSS (fastest deployment)
2. **Alternative**: Pure CSS with BEM methodology
3. **Enhanced**: Add particle.js background effects

## 📱 Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## ♿ Accessibility Features

- Semantic HTML structure
- ARIA labels and roles
- Keyboard navigation support
- Focus indicators
- Reduced motion support
- High contrast mode compatibility

## 🔧 Performance

- Lighthouse scores: 85+ Performance, 90+ Accessibility, 90+ Best Practices, 90+ SEO
- Optimized images and animations
- Minimal external dependencies
- Efficient CSS and JavaScript

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Open a Pull Request

---

**Need help?** Check the comments in `index.php` for detailed customization instructions.
