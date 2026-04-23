<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Savamed') }} - {{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Savamed" />
        <link rel="manifest" href="/site.webmanifest" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            * {
                font-family: 'Inter', sans-serif;
            }
            
            .accent-mint {
                color: #6ee7d8;
            }
            
            .bg-accent-mint {
                background-color: #6ee7d8;
            }
            
            .text-charcoal {
                color: #1a1a1a;
            }
            
            .text-slate {
                color: #64748b;
            }
            
            .border-accent {
                border-color: #6ee7d8;
            }
            
            .hover-accent:hover {
                color: #6ee7d8;
                border-color: #6ee7d8;
            }
        </style>
    </head>
    <body class="bg-white text-charcoal" style="font-family: 'Inter', sans-serif;">
        <!-- Navigation -->
        {{-- <nav class="fixed w-full bg-white z-50 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="text-2xl font-700 tracking-tight text-charcoal">
                    <x-app-logo-icon />SAVAMED
                </div>
                <div class="flex gap-8 items-center">
                    <a href="{{ route('login') }}" class="text-slate hover:accent-mint transition-colors text-sm font-500">Login</a>
                    <a href="{{ route('home') }}" class="bg-accent-mint text-charcoal px-6 py-2 rounded text-sm font-600 hover:opacity-90 transition-opacity">Get Started</a>
                </div>
            </div>
        </nav> --}}
        <x-header/>

        <main class="bg-white">
            <!-- Hero Section -->
            <section class="min-h-screen pt-32 pb-24 px-6 flex items-center">
                <div class="max-w-7xl mx-auto w-full">

                    <!-- Headline -->
                    <h1 class="text-6xl md:text-7xl font-700 leading-tight text-charcoal mb-8 max-w-3xl" style="letter-spacing: -0.02em;">
                        Efficient Pharmacy Organization with Savamed
                    </h1>

                    <!-- Subheading -->
                    <p class="text-lg md:text-xl text-slate max-w-2xl mb-12 font-400 leading-relaxed">
                        Optimize your inventory with data-driven precision. Streamline operations, reduce errors, and maximize efficiency.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="{{ route('login') }}" class="bg-accent-mint text-charcoal px-8 py-3 rounded font-600 text-center hover:opacity-90 transition-opacity">
                            Start Free Demo
                        </a>
                        <a href="{{ route('home') }}" class="border-2 border-charcoal text-charcoal px-8 py-3 rounded font-600 text-center hover:bg-gray-50 transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>
            </section>

            <!-- Features Grid Section -->
            <section class="py-24 px-6 bg-white">
                <div class="max-w-7xl mx-auto">
                    <!-- Section Header -->
                    <div class="mb-20">
                        <p class="text-sm font-600 accent-mint uppercase tracking-wide mb-4">Why Savamed</p>
                        <h2 class="text-4xl md:text-5xl font-700 text-charcoal max-w-2xl leading-tight" style="letter-spacing: -0.02em;">
                            Pharmacy Management Redefined
                        </h2>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Smart Tracking</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Monitor pharmaceutical inventory from warehouse to patient, with real-time visibility and precision.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.3-1.54c-.4-.48-1.03-.48-1.43 0-.4.48-.4 1.26 0 1.74l2 2.39c.4.48 1.03.48 1.43 0l3.96-4.83c.4-.48.4-1.26 0-1.74-.4-.48-1.03-.48-1.43 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Instant Reporting</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Generate comprehensive reports and analyze trends in a single click. Data-driven decision making simplified.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.72-7 8.77V12H5V6.3l7-3.11v8.8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Cloud Security</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Enterprise-grade encryption and security. Your pharmacy data is protected and accessible anytime, anywhere.
                            </p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M15.5 1h-8C6.12 1 5 2.12 5 3.5v17C5 21.88 6.12 23 7.5 23h8c1.38 0 2.5-1.12 2.5-2.5v-17C18 2.12 16.88 1 15.5 1zm-4 21c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4.5-4H7V4h9v14z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Intuitive Interface</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Designed for pharmacy staff. Minimal training required. Clean, logical interface that works intuitively.
                            </p>
                        </div>

                        <!-- Feature 5 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Expiry Management</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Automated early warnings for approaching expiration dates. Never miss critical stock rotation alerts.
                            </p>
                        </div>

                        <!-- Feature 6 -->
                        <div class="p-8 border border-gray-200 rounded hover:border-accent-mint transition-colors">
                            <div class="w-12 h-12 bg-gray-100 rounded mb-6 flex items-center justify-center">
                                <svg class="w-6 h-6 accent-mint" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-700 text-charcoal mb-3">Scheduled Sync</h3>
                            <p class="text-slate font-400 leading-relaxed">
                                Automatic inventory synchronization across all locations. Keep every pharmacy unit perfectly aligned.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works Section -->
            <section class="py-24 px-6 bg-white">
                <div class="max-w-7xl mx-auto">
                    <p class="text-sm font-600 accent-mint uppercase tracking-wide mb-4">Simple Process</p>
                    <h2 class="text-4xl md:text-5xl font-700 text-charcoal max-w-2xl leading-tight mb-16" style="letter-spacing: -0.02em;">
                        Get Started in Three Steps
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <!-- Step 1 -->
                        <div class="relative">
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent-mint text-charcoal font-700 text-xl mb-8">01</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Connect</h3>
                            <p class="text-slate leading-relaxed">Link your current inventory data and existing pharmacy management systems to Savamed effortlessly.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative">
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent-mint text-charcoal font-700 text-xl mb-8">02</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Organize</h3>
                            <p class="text-slate leading-relaxed">Manage inventory digitally with our intuitive interface. Update stock, track movements, and maintain accuracy.</p>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative">
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-accent-mint text-charcoal font-700 text-xl mb-8">03</div>
                            <h3 class="text-2xl font-700 text-charcoal mb-4">Optimize</h3>
                            <p class="text-slate leading-relaxed">Access actionable insights and analytics to make data-driven decisions that reduce costs and improve efficiency.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="py-24 px-6 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-16 text-center">
                        <div>
                            <div class="text-5xl font-700 accent-mint mb-3">500+</div>
                            <p class="text-slate text-lg">Pharmacies Optimized</p>
                        </div>
                        <div>
                            <div class="text-5xl font-700 accent-mint mb-3">70%</div>
                            <p class="text-slate text-lg">Time Saved on Operations</p>
                        </div>
                        <div>
                            <div class="text-5xl font-700 accent-mint mb-3">99.9%</div>
                            <p class="text-slate text-lg">System Uptime Guarantee</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA Section -->
            <section class="py-24 px-6 bg-white">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-5xl md:text-6xl font-700 text-charcoal mb-8 leading-tight" style="letter-spacing: -0.02em;">
                        Ready to Transform Your Pharmacy?
                    </h2>
                    <p class="text-xl text-slate mb-12 max-w-2xl mx-auto leading-relaxed">
                        Join hundreds of pharmacies already optimizing their operations with Savamed. Schedule your personalized demo today.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <a href="{{ route('login') }}" class="bg-accent-mint text-charcoal px-10 py-4 rounded font-700 text-center hover:opacity-90 transition-opacity text-lg">
                            Schedule Demo
                        </a>
                        <a href="{{ route('home') }}" class="border-2 border-charcoal text-charcoal px-10 py-4 rounded font-700 text-center hover:bg-gray-50 transition-colors text-lg">
                            Contact Sales
                        </a>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="py-12 px-6 bg-charcoal text-white border-t border-gray-200">
                <div class="max-w-7xl mx-auto flex justify-between items-center">
                    <div class="text-lg font-700 tracking-tight">
                        SAVAMED
                    </div>
                    <p class="text-sm text-gray-400">
                        © 2026 Savamed. All rights reserved. Efficient pharmacy management for modern pharmacies.
                    </p>
                </div>
            </footer>
        </main>
    </body>
</html>
