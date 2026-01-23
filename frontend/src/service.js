// service
document.getElementById('ContentService').innerHTML = `
        <!-- Hero Section -->
        <section class="herocont">
            <div class="container">
                <div class="hero-content">
                    <h1>Empowering Your Business with <span>Digital Excellence</span></h1>
                    <p>We provide comprehensive technology services designed to scale your growth, secure your data, and optimize your workflow.</p>
                    <div class="hero-buttons">
                        <a href="#services" class="btn btn-primary">Our Services</a>
                        <a href="#features" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section -->
        <section id="services" class="section-padding">
            <div class="container">
                <div class="heading-group">
                    <h2>Our Core Services</h2>
                    <p>Tailored solutions to meet the unique demands of your industry.</p>
                </div>

                <div class="services-grid">
                    <!-- Service 1 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-code"></i>
                        </div>
                        <h3>Web Development</h3>
                        <p>Custom, high-performance websites built with modern technologies. We ensure your site is fast, responsive, and secure.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>

                    <!-- Service 2 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3>Digital Marketing</h3>
                        <p>Data-driven strategies including SEO, PPC, and content marketing to boost your visibility and convert leads.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>

                    <!-- Service 3 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-cloud"></i>
                        </div>
                        <h3>Cloud Solutions</h3>
                        <p>Seamless migration and management of cloud infrastructure on AWS, Azure, or Google Cloud to enhance scalability.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>

                    <!-- Service 4 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3>Cyber Security</h3>
                        <p>Comprehensive audits and real-time monitoring to protect your sensitive data from evolving cyber threats.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>

                    <!-- Service 5 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-mobile-screen"></i>
                        </div>
                        <h3>App Development</h3>
                        <p>Native and cross-platform mobile applications designed for optimal user experience on iOS and Android.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>

                    <!-- Service 6 -->
                    <article class="service-card">
                        <div class="service-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h3>IT Consultancy</h3>
                        <p>Expert advice to align your IT strategy with your business goals, ensuring efficient tech utilization.</p>
                        <a href="#" class="learn-more">View Details <i class="fa-solid fa-arrow-right"></i></a>
                    </article>
                </div>
            </div>
        </section>
        <!-- Why Choose Us Section -->
        <section id="features" class="section-padding why-us">
            <div class="container">
                <div class="features-container">
                    <div class="features-image">
                        <!-- Placeholder image representing teamwork/strategy -->
                        <img src="https://picsum.photos/seed/techstrategy/600/400" alt="Team working on strategy">
                    </div>
                    <div class="features-content">
                        <div class="heading-group" style="text-align: left; margin-bottom: 30px;">
                            <h2>Why Choose Nigty Rex Got NEO?</h2>
                            <p>We combine technical expertise with business acumen to deliver results that matter.</p>
                        </div>

                        <div class="feature-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <h4>Proven Track Record</h4>
                                <p>Over 10 years of experience delivering successful projects for startups and Fortune 500 companies.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <i class="fa-solid fa-user-group"></i>
                            <div>
                                <h4>Dedicated Support</h4>
                                <p>24/7 customer support with a dedicated account manager to ensure smooth communication.</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <i class="fa-solid fa-rocket"></i>
                            <div>
                                <h4>Fast Delivery</h4>
                                <p>Agile methodology ensures we deliver high-quality results within tight deadlines without cutting corners.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Section -->
        <section id="pricing" class="section-padding">
            <div class="container">
                <div class="heading-group">
                    <h2>Transparent Pricing</h2>
                    <p>Choose the plan that fits your business needs. No hidden fees.</p>
                </div>

                <div class="pricing-grid">
                    <!-- Basic Plan -->
                    <div class="pricing-card">
                        <h3>Starter</h3>
                        <div class="price">$499<span>/mo</span></div>
                        <p>Perfect for small businesses</p>
                        <ul class="features-list">
                            <li><i class="fa-solid fa-check"></i> 5 Page Website</li>
                            <li><i class="fa-solid fa-check"></i> Basic SEO Setup</li>
                            <li><i class="fa-solid fa-check"></i> Email Support</li>
                            <li class="disabled"><i class="fa-solid fa-xmark"></i> Marketing Analytics</li>
                            <li class="disabled"><i class="fa-solid fa-xmark"></i> 24/7 Priority Support</li>
                        </ul>
                        <a href="#contact" class="btn btn-outline" style="width: 80%">Choose Starter</a>
                    </div>

                    <!-- Pro Plan -->
                    <div class="pricing-card popular">
                        <div class="badge">Most Popular</div>
                        <h3>Professional</h3>
                        <div class="price">$999<span>/mo</span></div>
                        <p>For growing companies</p>
                        <ul class="features-list">
                            <li><i class="fa-solid fa-check"></i> 15 Page Website</li>
                            <li><i class="fa-solid fa-check"></i> Advanced SEO & Content</li>
                            <li><i class="fa-solid fa-check"></i> Priority Email Support</li>
                            <li><i class="fa-solid fa-check"></i> Marketing Analytics</li>
                            <li class="disabled"><i class="fa-solid fa-xmark"></i> 24/7 Priority Support</li>
                        </ul>
                        <a href="#contact" class="btn btn-primary" style="width: 80%">Choose Pro</a>
                    </div>

                    <!-- Enterprise Plan -->
                    <div class="pricing-card">
                        <h3>Enterprise</h3>
                        <div class="price">$2499<span>/month</span></div>
                        <p>Full-scale solutions</p>
                        <ul class="features-list">
                            <li><i class="fa-solid fa-check"></i> Unlimited Pages</li>
                            <li><i class="fa-solid fa-check"></i> Full Marketing Suite</li>
                            <li><i class="fa-solid fa-check"></i> 24/7 Phone & Email</li>
                            <li><i class="fa-solid fa-check"></i> Custom Integrations</li>
                            <li><i class="fa-solid fa-check"></i> Dedicated Manager</li>
                        </ul>
                        <a href="#contact" class="btn btn-outline" style="width: 80%">Contact Sales</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact" class="section-padding" style="background-color: var(--bg-color);">
            <div class="container">
                <div class="heading-group">
                    <h2>Ready to Get Started?</h2>
                    <p>Contact us today for a free consultation and quote.</p>
                </div>
                <div style="max-width: 600px; margin: 0 auto; background: #000000; color: #ffffff;padding: 40px; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
                    <form onsubmit="event.preventDefault(); alert('Thank you! This is a demo form.');">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Full Name</label>
                            <input type="text" placeholder="Nighty Rex Got NEO" required style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 4px;">
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Email Address</label>
                            <input type="email" placeholder="nightyrexgotneo@example.com" required style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 4px;">
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Service Interested In</label>
                            <select style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 4px; background: white;">
                                <option>Web Development</option>
                                <option>Digital Marketing</option>
                                <option>Cloud Solutions</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Message</label>
                            <textarea rows="4" placeholder="Tell us about your project..." style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 4px; font-family: inherit;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
        

`;