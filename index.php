<?php
/*
PORTFOLIO WEBSITE - SETUP INSTRUCTIONS
=====================================
1. Upload all files to your web server (cPanel, Vercel, etc.)
2. Ensure PHP 8+ is enabled
3. Update data arrays below to customize content
4. Replace placeholder assets in /assets/ folders
5. To change colors, edit CSS custom properties in styles.css

CUSTOMIZATION:
- Edit $experiences, $projects, $skills arrays below
- Replace avatar.png, project images, and resume PDF
- Modify color scheme in assets/css/styles.css
*/

// Contact form handling
$message = '';
$messageType = '';

if ($_POST) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $msg = trim($_POST['message'] ?? '');
    $honeypot = trim($_POST['website'] ?? '');
    
    if (!empty($honeypot)) {
        $message = 'There was a problem sending your message.';
        $messageType = 'error';
    } elseif (empty($name) || empty($email) || empty($msg)) {
        $message = 'Please fill in all fields.';
        $messageType = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'error';
    } else {
        // Basic mail function (configure your server's mail settings)
        $to = 'contact@buildwithshivang.site';
        $subject = 'Portfolio Contact: ' . $name;
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$msg";
        $headers = "From: contact@buildwithshivang.site\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        if (mail($to, $subject, $body, $headers)) {
            $message = 'Thank you! Your message has been sent.';
            $messageType = 'success';
        } else {
            $message = 'Sorry, your message could not be sent. Please try again later.';
            $messageType = 'error';
        }
    }
}

// Data Arrays - Customize these for your content
$experiences = [
    [
        'company' => 'Iceptua Technology',
        'role' => 'AI Engineer & Full Stack Developer',
        'period' => 'Aug 2025 – Present',
        'location' => 'Hybrid (Mohali district, India)',
        'bullets' => [
            'Building and deploying AI-powered applications',
            'Developing full stack solutions with scalable architectures',
            'Collaborating on hybrid projects involving AI and web technologies'
        ],
        'tech' => ['Python', 'TensorFlow', 'PyTorch', 'FastAPI', 'React', 'Node.js', 'MySQL', 'Git']
    ],
    [
        'company' => 'Cisco Networking Academy',
        'role' => 'Intern',
        'period' => 'May 2024 – Jul 2024',
        'location' => 'Remote',
        'bullets' => [
            'Completed hands-on networking projects and labs',
            'Configured and troubleshooted routers and switches',
            'Gained practical knowledge in networking fundamentals'
        ],
        'tech' => ['Networking', 'Cisco Packet Tracer', 'Routing & Switching', 'CCNA Fundamentals']
    ]
];


$projects = [
    [
        'title' => 'E-commerce Platform',
        'desc' => 'Full-stack marketplace with payment integration and admin dashboard',
        'tech' => ['PHP', 'MySQL', 'Stripe API', 'Bootstrap', 'jQuery'],
        'code' => 'https://github.com/shivang-26/ecommerce',
        'demo' => 'https://ecommerce-demo.herokuapp.com',
        'img' => '/assets/img/projects/ecommerce.png'
    ],
    [
        'title' => 'Weather Forecast AI',
        'desc' => 'Machine learning model for weather prediction with interactive dashboard',
        'tech' => ['Python', 'Scikit-learn', 'Streamlit', 'Pandas', 'APIs'],
        'code' => 'https://github.com/shivang-26/weather-ai',
        'demo' => 'https://weather-ai.streamlit.app',
        'img' => '/assets/img/projects/weather.png'
    ],
    [
        'title' => '3D Portfolio Site',
        'desc' => 'Interactive 3D portfolio with WebGL animations and particle effects',
        'tech' => ['Three.js', 'GSAP', 'WebGL', 'Blender', 'Vite'],
        'code' => 'https://github.com/shivang-26/3d-portfolio',
        'demo' => 'https://shivang-3d.netlify.app',
        'img' => '/assets/img/projects/3d-portfolio.png'
    ],
    [
        'title' => 'Task Management API',
        'desc' => 'RESTful API with JWT authentication, role-based access, and real-time updates',
        'tech' => ['Node.js', 'Express', 'JWT', 'WebSockets', 'Redis'],
        'code' => 'https://github.com/shivang-26/task-api',
        'demo' => 'https://task-api-docs.vercel.app',
        'img' => '/assets/img/projects/task-api.png'
    ]
];

$skills = [
    'Frontend' => ['HTML', 'CSS', 'JavaScript', 'React', 'Vue.js', 'Three.js', 'Tailwind CSS', 'SASS'],
    'Backend' => ['Node.js', 'Express.js', 'PHP', 'FastAPI', 'Django', 'MySQL', 'MongoDB', 'PostgreSQL'],
    'Data/AI' => ['Python', 'PyTorch', 'TensorFlow', 'Scikit-learn', 'Pandas', 'NumPy', 'OpenCV', 'MLOps'],
    'Tools' => ['Git', 'Docker', 'AWS', 'Vercel', 'Postman', 'VS Code', 'Linux', 'Agile/Scrum']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shivang - AI/ML & Full-Stack Developer</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Shivang - AI/ML Engineer & Full-Stack Developer. Specializing in machine learning, web development, and innovative tech solutions.">
    <meta name="keywords" content="AI, ML, Full-Stack Developer, Machine Learning, Web Development, Python, JavaScript, React, PHP">
    <meta name="author" content="Shivang">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Shivang - AI/ML & Full-Stack Developer">
    <meta property="og:description" content="AI/ML Engineer & Full-Stack Developer specializing in innovative tech solutions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://buildwithshivang.site">
    <meta property="og:image" content="assets/img/avatar.jpeg">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Shivang",
        "jobTitle": "AI/ML Engineer & Full-Stack Developer",
        "url": "https://buildwithshivang.site",
        "sameAs": [
            "https://github.com/shivang-26-26",
            "https://linkedin.com/in/shivang-133a982b9"
        ]
    }
    </script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'neon-cyan': '#00E5FF',
                        'neon-purple': '#A855F7',
                        'dark-bg': '#0b0f14'
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/assets/css/styles.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg">
</head>
<body class="bg-dark-bg text-white overflow-x-hidden">
    

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-40 bg-dark-bg/80 backdrop-blur-md border-b border-white/10" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Animated Logo -->
                <div class="flex-shrink-0">
                    <a href="#home" class="flex items-center group">
                        <span class="text-xl font-bold neon-text group-hover:text-neon-cyan transition-colors duration-300">BuildwithShivang</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#home" class="nav-link active">Home</a>
                        <a href="#experience" class="nav-link">Experience</a>
                        <a href="#projects" class="nav-link">Projects</a>
                        <a href="#skills" class="nav-link">Skills</a>
                        <a href="#certifications" class="nav-link">Certifications</a>
                        <a href="#contact" class="nav-link">Contact</a>
                    </div>
                </div>
                
                <!-- Resume Button & Theme Toggle -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="assets/resume/Shivang_Resume.pdf" download class="btn-primary">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        Download Resume
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-btn" id="mobile-menu-btn">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="md:hidden mobile-menu" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-dark-bg/95 backdrop-blur-md">
                <a href="#home" class="nav-link-mobile">Home</a>
                <a href="#experience" class="nav-link-mobile">Experience</a>
                <a href="#projects" class="nav-link-mobile">Projects</a>
                <a href="#skills" class="nav-link-mobile">Skills</a>
                <a href="#certifications" class="nav-link-mobile">Certifications</a>
                <a href="#contact" class="nav-link-mobile">Contact</a>
                <a href="/assets/resume/Shivang_Resume.pdf" download class="neon-button w-full mt-4">
                    <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                    Download Resume
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-neon-cyan/5 to-neon-purple/5"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Avatar with Neon Ring -->
                <div class="relative inline-block mb-8" data-aos="fade-up">
                    <div class="neon-ring"></div>
                    <img src="/assets/img/avatar.jpeg" alt="Shivang" class="w-32 h-32 rounded-full mx-auto relative z-10 glass-card">
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold mb-6 neon-text" data-aos="fade-up" data-aos-delay="200">
                    Hi, I'm <span class="text-neon-cyan">Shivang</span>
                </h1>
                
                <div class="text-xl md:text-2xl text-gray-300 mb-8 min-h-[60px] flex items-center justify-center" data-aos="fade-up" data-aos-delay="400">
                    <span id="typewriter" class="border-r-2 border-neon-cyan animate-pulse"></span>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="600">
                    <a href="#projects" class="neon-button">
                        <i data-lucide="code" class="w-5 h-5 mr-2"></i>
                        View Projects
                    </a>
                    <a href="/assets/resume/Shivang_Resume.pdf" download class="neon-button-secondary">
                        <i data-lucide="download" class="w-5 h-5 mr-2"></i>
                        Download CV
                    </a>
                    <a href="#contact" class="glass-button">
                        <i data-lucide="mail" class="w-5 h-5 mr-2"></i>
                        Contact Me
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i data-lucide="chevron-down" class="w-6 h-6 text-neon-cyan"></i>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-20 relative">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 neon-text" data-aos="fade-up">
                Experience
            </h2>
            
            <div class="max-w-4xl mx-auto">
                <div class="timeline">
                    <?php foreach ($experiences as $index => $exp): ?>
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="<?= $index * 200 ?>">
                        <div class="timeline-marker-animated">
                            <div class="timeline-dot"></div>
                            <div class="timeline-pulse"></div>
                        </div>
                        <div class="timeline-content glass-card hover-glow hover-expand">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <div class="company-logo">
                                        <span class="text-lg font-bold text-neon-purple"><?= substr($exp['company'], 0, 1) ?></span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-neon-cyan"><?= htmlspecialchars($exp['role']) ?></h3>
                                        <h4 class="text-lg text-white"><?= htmlspecialchars($exp['company']) ?></h4>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-400 mt-2 md:mt-0">
                                    <div><?= htmlspecialchars($exp['period']) ?></div>
                                    <div><?= htmlspecialchars($exp['location']) ?></div>
                                </div>
                            </div>
                            
                            <ul class="space-y-2 mb-4">
                                <?php foreach ($exp['bullets'] as $bullet): ?>
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-4 h-4 text-neon-cyan mt-1 mr-2 flex-shrink-0"></i>
                                    <span class="text-gray-300"><?= htmlspecialchars($bullet) ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($exp['tech'] as $tech): ?>
                                <span class="tech-chip"><?= htmlspecialchars($tech) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 neon-text">Featured Projects</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">A showcase of my recent work spanning web development, AI/ML, and full-stack applications</p>
            </div>
            
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                    <?php foreach (array_slice($projects, 0, 2) as $index => $project): ?>
                    <div class="project-card-featured" data-aos="fade-up" data-aos-delay="<?= $index * 200 ?>">
                        <div class="project-image-featured">
                            <img src="<?= htmlspecialchars($project['img']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="w-full h-64 object-cover">
                            <div class="project-gradient-overlay"></div>
                        </div>
                        
                        <div class="project-content-featured">
                            <h3 class="text-2xl font-bold text-white mb-3"><?= htmlspecialchars($project['title']) ?></h3>
                            <p class="text-gray-300 mb-6 leading-relaxed"><?= htmlspecialchars($project['desc']) ?></p>
                            
                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php foreach (array_slice($project['tech'], 0, 4) as $tech): ?>
                                <span class="tech-badge"><?= htmlspecialchars($tech) ?></span>
                                <?php endforeach; ?>
                                <?php if (count($project['tech']) > 4): ?>
                                <span class="tech-badge-more">+<?= count($project['tech']) - 4 ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="flex gap-4">
                                <a href="<?= htmlspecialchars($project['code']) ?>" target="_blank" class="project-btn-primary">
                                    <i data-lucide="github" class="w-5 h-5 mr-2"></i>
                                    View Code
                                </a>
                                <a href="<?= htmlspecialchars($project['demo']) ?>" target="_blank" class="project-btn-secondary">
                                    <i data-lucide="external-link" class="w-5 h-5 mr-2"></i>
                                    Live Demo
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach (array_slice($projects, 2) as $index => $project): ?>
                    <div class="project-card-compact" data-aos="fade-up" data-aos-delay="<?= ($index + 2) * 100 ?>">
                        <div class="project-image-compact">
                            <img src="<?= htmlspecialchars($project['img']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="w-full h-40 object-cover">
                            <div class="project-overlay-compact">
                                <div class="project-actions">
                                    <a href="<?= htmlspecialchars($project['code']) ?>" target="_blank" class="project-action-btn">
                                        <i data-lucide="github" class="w-5 h-5"></i>
                                    </a>
                                    <a href="<?= htmlspecialchars($project['demo']) ?>" target="_blank" class="project-action-btn">
                                        <i data-lucide="external-link" class="w-5 h-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="project-content-compact">
                            <h4 class="text-lg font-bold text-white mb-2"><?= htmlspecialchars($project['title']) ?></h4>
                            <p class="text-gray-400 text-sm mb-3 line-clamp-2"><?= htmlspecialchars($project['desc']) ?></p>
                            
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach (array_slice($project['tech'], 0, 3) as $tech): ?>
                                <span class="tech-badge"><?= htmlspecialchars($tech) ?></span>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="flex gap-2">
                                <a href="<?= htmlspecialchars($project['code']) ?>" target="_blank" class="project-btn-compact-primary">
                                    <i data-lucide="github" class="w-4 h-4 mr-1"></i>
                                    View Code
                                </a>
                                <a href="<?= htmlspecialchars($project['demo']) ?>" target="_blank" class="project-btn-compact-secondary">
                                    <i data-lucide="external-link" class="w-4 h-4 mr-1"></i>
                                    Live Demo
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="text-center mt-12" data-aos="fade-up">
                    <a href="https://github.com/shivang-26" target="_blank" class="view-all-btn">
                        <i data-lucide="arrow-right" class="w-5 h-5 mr-2"></i>
                        View All Projects on GitHub
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 neon-text">Skills & Expertise</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Technologies and tools I work with to bring ideas to life</p>
            </div>
            
            <div class="max-w-6xl mx-auto">
                <!-- All Skills Grid -->
                <div class="grid grid-cols-1 gap-8">
                    <?php 
                    $allSkillCategories = [
                        'Frontend Development' => [
                            'icon' => 'monitor',
                            'color' => 'from-blue-500 to-cyan-400',
                            'skills' => $skills['Frontend']
                        ],
                        'Backend Development' => [
                            'icon' => 'server', 
                            'color' => 'from-green-500 to-emerald-400',
                            'skills' => $skills['Backend']
                        ],
                        'AI/ML & Data Science' => [
                            'icon' => 'brain',
                            'color' => 'from-purple-500 to-pink-400',
                            'skills' => $skills['Data/AI']
                        ],
                        'Tools & Technologies' => [
                            'icon' => 'wrench',
                            'color' => 'from-orange-500 to-red-400', 
                            'skills' => $skills['Tools']
                        ]
                    ];
                    ?>
                    <?php foreach ($allSkillCategories as $category => $data): ?>
                    <div class="skill-category-secondary" data-aos="fade-up" data-aos-delay="<?= array_search($category, array_keys($allSkillCategories)) * 200 ?>">
                        <div class="skill-header-secondary">
                            <h4 class="text-xl font-bold text-white"><?= $category ?></h4>
                        </div>
                        
                        <div class="skill-tags">
                            <?php foreach ($data['skills'] as $skill): ?>
                            <span class="skill-tag"><?= htmlspecialchars($skill) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

   <!-- Certifications Section -->
<section id="certifications" class="py-20 relative">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 neon-text">Certifications</h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Professional certifications and achievements</p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Fundamentals of Deep Learning – Nvidia -->
                <div class="glass-card p-6 text-center hover:border-neon-cyan transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="mb-6">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-neon-cyan to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="cpu" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Fundamentals of Deep Learning</h3>
                        <p class="text-gray-400 text-sm mb-2">NVIDIA</p>
                        <p class="text-neon-cyan font-semibold">2024</p>
                    </div>
                    <a href="https://learn.nvidia.com/certificates?id=ikFMU0FIR2WXp09T3uE0Kw" target="_blank" class="inline-flex items-center text-neon-cyan hover:text-white transition-colors duration-300">
                        View Certificate
                        <i data-lucide="external-link" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>

                <!-- IBM Machine Learning – Coursera -->
                <div class="glass-card p-6 text-center hover:border-neon-cyan transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="mb-6">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-neon-cyan to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="brain" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Machine Learning</h3>
                        <p class="text-gray-400 text-sm mb-2">IBM (Coursera)</p>
                        <p class="text-neon-cyan font-semibold">2024</p>
                    </div>
                    <a href="https://coursera.org/share/98389e636238ecdbe5286fd4bb5358f1" target="_blank" class="inline-flex items-center text-neon-cyan hover:text-white transition-colors duration-300">
                        View Certificate
                        <i data-lucide="external-link" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>

                <!-- Python Essentials 1 – Cisco Networking Academy -->
                <div class="glass-card p-6 text-center hover:border-neon-cyan transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="mb-6">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-neon-cyan to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="code" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Python Essentials 1</h3>
                        <p class="text-gray-400 text-sm mb-2">Cisco Networking Academy</p>
                        <p class="text-neon-cyan font-semibold">2025</p>
                    </div>
                    <a href="https://www.credly.com/badges/4e1b9662-384a-4af0-9489-f3a58da34ea8/public_url" target="_blank" class="inline-flex items-center text-neon-cyan hover:text-white transition-colors duration-300">
                        Show Credential
                        <i data-lucide="external-link" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 neon-text" data-aos="fade-up">
                Get In Touch
            </h2>
            
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div data-aos="fade-right">
                        <div class="glass-card p-8">
                            <?php if ($message): ?>
                            <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-500/20 border border-green-500/50 text-green-300' : 'bg-red-500/20 border border-red-500/50 text-red-300' ?>">
                                <?= htmlspecialchars($message) ?>
                            </div>
                            <?php endif; ?>
                            
                            <form method="POST" class="space-y-6">
                                <div class="hidden">
                                    <label for="website" class="sr-only">Website</label>
                                    <input type="text" id="website" name="website" class="form-input" autocomplete="off" tabindex="-1">
                                </div>
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                                    <input type="text" id="name" name="name" required class="form-input">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                    <input type="email" id="email" name="email" required class="form-input">
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                                    <textarea id="message" name="message" rows="5" required class="form-input"></textarea>
                                </div>
                                
                                <button type="submit" class="neon-button w-full">
                                    <i data-lucide="send" class="w-4 h-4 mr-2"></i>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div data-aos="fade-left">
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-2xl font-bold text-neon-cyan mb-6">Let's Connect</h3>
                                <p class="text-gray-300 text-lg leading-relaxed">
                                    I'm always interested in new opportunities and exciting projects. 
                                    Whether you have a question or just want to say hi, feel free to reach out!
                                </p>
                            </div>
                            
                            <div class="flex space-x-6">
                                <a href="https://github.com/shivang-26" target="_blank" class="social-link-enhanced github-glow">
                                    <i data-lucide="github" class="w-6 h-6"></i>
                                    <span class="social-tooltip">GitHub</span>
                                </a>
                                <a href="https://linkedin.com/in/shivang-133a982b9" target="_blank" class="social-link-enhanced linkedin-glow">
                                    <i data-lucide="linkedin" class="w-6 h-6"></i>
                                    <span class="social-tooltip">LinkedIn</span>
                                </a>
                                <a href="mailto:contact@buildwithshivang.site" class="social-link-enhanced email-glow">
                                    <i data-lucide="mail" class="w-6 h-6"></i>
                                    <span class="social-tooltip">Email</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top">
        <i data-lucide="arrow-up" class="w-5 h-5"></i>
    </button>

    
    <!-- Footer -->
    <footer class="bg-dark-bg border-t border-white/10 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-white">Shivang</h3>
                    <p class="text-gray-400 mt-3">AI Engineer & Full-Stack Developer driven to design smart, scalable, and human-centered solutions.</p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#experience" class="text-gray-300 hover:text-white transition-colors">Experience</a></li>
                        <li><a href="#projects" class="text-gray-300 hover:text-white transition-colors">Projects</a></li>
                        <li><a href="#skills" class="text-gray-300 hover:text-white transition-colors">Skills</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Get in Touch</h4>
                    <div class="space-y-3 text-gray-300">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                            <a href="mailto:contact@buildwithshivang.site" class="hover:text-white transition-colors">vats.jshivang@gmail.com</a>
                        </div>
                        <div>Bennett University, Greater Noida</div>
                        <div class="flex items-center space-x-3 pt-2">
                            <a href="https://github.com/shivang-26" class="p-2 rounded-md bg-white/5 hover:bg-white/10 transition" aria-label="GitHub">
                                <i data-lucide="github" class="w-5 h-5"></i>
                            </a>
                            <a href="https://linkedin.com/in/shivang-133a982b9" class="p-2 rounded-md bg-white/5 hover:bg-white/10 transition" aria-label="LinkedIn">
                                <i data-lucide="linkedin" class="w-5 h-5"></i>
                            </a>
                            <a href="https://buildwithshivang.site" class="p-2 rounded-md bg-white/5 hover:bg-white/10 transition" aria-label="Portfolio">
                                <i data-lucide="external-link" class="w-5 h-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-white/10 my-8">
            <div class="text-gray-400 text-sm">© 2025 Shivang. All rights reserved.</div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
