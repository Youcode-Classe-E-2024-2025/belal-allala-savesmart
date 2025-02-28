@extends('layouts.app')

@section('content')
    @guest
        <!-- Hero Section for Guests -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h1 class="display-4 fw-bold mb-4">Take Control of Your Finances</h1>
                        <p class="lead mb-4">SaveSmart helps you track, optimize, and plan your budget with intelligent recommendations based on the 50/30/20 rule.</p>
                        <div class="d-flex gap-3">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                                Get Started Free
                            </a>
                            <a href="#how-it-works" class="btn btn-outline-primary btn-lg rounded-pill px-4">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <img src="https://placehold.co/600x400/e0f2fe/1e40af?text=SaveSmart+Dashboard&font=poppins" class="img-fluid dashboard-preview" alt="SaveSmart Dashboard Preview">
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-card bg-gradient-primary">
                            <h3>10,000+</h3>
                            <p>Active Users</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-card bg-gradient-success">
                            <h3>$2.5M+</h3>
                            <p>Savings Achieved</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-card bg-gradient-warning">
                            <h3>92%</h3>
                            <p>User Satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5" id="features">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-bold">Smart Features for Better Budgeting</h2>
                    <p class="text-muted">Discover how SaveSmart helps you achieve your financial goals</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 p-4">
                            <div class="feature-icon bg-gradient-primary mx-auto">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <h3 class="h5 text-center mb-3">Budget Optimization</h3>
                            <p class="text-muted">Our 50/30/20 rule algorithm automatically allocates your income to needs, wants, and savings for optimal financial health.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 p-4">
                            <div class="feature-icon bg-gradient-success mx-auto">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h3 class="h5 text-center mb-3">Financial Goals</h3>
                            <p class="text-muted">Set and track progress toward your savings goals, whether it's a vacation, new computer, or emergency fund.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 p-4">
                            <div class="feature-icon bg-gradient-warning mx-auto">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="h5 text-center mb-3">Family Accounts</h3>
                            <p class="text-muted">Manage finances together with shared family accounts, perfect for couples and households.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="py-5 bg-light" id="how-it-works">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-bold">How SaveSmart Works</h2>
                    <p class="text-muted">Three simple steps to financial clarity</p>
                </div>
                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-center mb-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">1</span>
                            </div>
                            <h3 class="h5">Track Your Finances</h3>
                            <p class="text-muted">Enter your income and expenses to get a clear picture of your financial situation.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center mb-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">2</span>
                            </div>
                            <h3 class="h5">Get Smart Recommendations</h3>
                            <p class="text-muted">Our algorithm analyzes your data and suggests optimal budget allocations.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-center mb-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                <span class="text-white fw-bold">3</span>
                            </div>
                            <h3 class="h5">Achieve Your Goals</h3>
                            <p class="text-muted">Follow the plan, track your progress, and watch your savings grow.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4" data-aos="fade-up">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-4">Start Your Journey</a>
                </div>
            </div>
        </section>

        <!-- Budget Visualization Preview -->
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="fw-bold mb-4">Visualize Your Budget</h2>
                        <p class="mb-4">See where your money goes with intuitive charts and graphs. Identify spending patterns and opportunities to save.</p>
                        <ul class="list-unstyled">
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Clear breakdown of expenses by category</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Monthly comparison to track progress</li>
                            <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Goal progress visualization</li>
                        </ul>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Sample Budget Breakdown</h5>
                                <canvas id="budgetChart" width="400" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-bold">What Our Users Say</h2>
                    <p class="text-muted">Join thousands of satisfied users who've improved their financial health</p>
                </div>
                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-card">
                            <div class="quote">"SaveSmart helped me pay off my credit card debt in just 6 months by optimizing my budget. I never realized how much I was spending on non-essentials!"</div>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/60x60/1e40af/ffffff?text=JD&font=poppins" alt="User">
                                <div>
                                    <div class="author">John Doe</div>
                                    <div class="position">Marketing Professional</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="quote">"The family account feature is a game-changer. My husband and I finally got on the same page with our finances and saved enough for our dream vacation."</div>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/60x60/1e40af/ffffff?text=SJ&font=poppins" alt="User">
                                <div>
                                    <div class="author">Sarah Johnson</div>
                                    <div class="position">Teacher</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-card">
                            <div class="quote">"As a freelancer with irregular income, SaveSmart's flexible budgeting tools have been invaluable. I now have a proper emergency fund for the first time!"</div>
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/60x60/1e40af/ffffff?text=MR&font=poppins" alt="User">
                                <div>
                                    <div class="author">Michael Rodriguez</div>
                                    <div class="position">Freelance Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-primary text-white">
            <div class="container text-center" data-aos="fade-up">
                <h2 class="fw-bold mb-4">Ready to Take Control of Your Finances?</h2>
                <p class="lead mb-4">Join thousands of users who are saving more and stressing less with SaveSmart.</p>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill px-5">
                    Sign Up Free
                </a>
            </div>
        </section>
    @else
        <!-- Dashboard for Authenticated Users -->
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="fw-bold">Welcome back, {{ Auth::user()->name }}!</h1>
                    <p class="lead">Here's an overview of your financial health</p>
                </div>
            </div>
            
            <!-- Summary Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Total Income</h5>
                                <i class="fas fa-coins text-primary fs-4"></i>
                            </div>
                            <h3 class="fw-bold">$4,250.00</h3>
                            <p class="text-success mb-0"><i class="fas fa-arrow-up me-1"></i> 12% from last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Total Expenses</h5>
                                <i class="fas fa-receipt text-danger fs-4"></i>
                            </div>
                            <h3 class="fw-bold">$2,840.00</h3>
                            <p class="text-danger mb-0"><i class="fas fa-arrow-up me-1"></i> 5% from last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Savings</h5>
                                <i class="fas fa-piggy-bank text-success fs-4"></i>
                            </div>
                            <h3 class="fw-bold">$1,410.00</h3>
                            <p class="text-success mb-0"><i class="fas fa-arrow-up me-1"></i> 8% from last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Goals Progress</h5>
                                <i class="fas fa-bullseye text-primary fs-4"></i>
                            </div>
                            <h3 class="fw-bold">68%</h3>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Budget Breakdown -->
            <div class="row mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title">Budget Breakdown</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="timeframeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        This Month
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="timeframeDropdown">
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                    </ul>
                                </div>
                            </div>
                            <canvas id="dashboardBudgetChart" width="400" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-4">50/30/20 Rule Analysis</h5>
                            <div class="mb-4">
                                <canvas id="fiftyThirtyTwentyChart" width="200" height="200"></canvas>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="d-flex align-items-center">
                                    <span class="badge bg-primary me-2">&nbsp;</span>
                                    Needs (50%)
                                </span>
                                <span class="fw-bold">$2,125.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="d-flex align-items-center">
                                    <span class="badge bg-success me-2">&nbsp;</span>
                                    Wants (30%)
                                </span>
                                <span class="fw-bold">$1,275.00</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="d-flex align-items-center">
                                    <span class="badge bg-warning me-2">&nbsp;</span>
                                    Savings (20%)
                                </span>
                                <span class="fw-bold">$850.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Transactions & Goals -->
            <div class="row">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title">Recent Transactions</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Feb 25, 2025</td>
                                            <td>Grocery Store</td>
                                            <td><span class="badge bg-primary">Needs</span></td>
                                            <td class="text-danger">-$120.45</td>
                                        </tr>
                                        <tr>
                                            <td>Feb 24, 2025</td>
                                            <td>Monthly Salary</td>
                                            <td><span class="badge bg-success">Income</span></td>
                                            <td class="text-success">+$4,250.00</td>
                                        </tr>
                                        <tr>
                                            <td>Feb 22, 2025</td>
                                            <td>Restaurant Dinner</td>
                                            <td><span class="badge bg-success">Wants</span></td>
                                            <td class="text-danger">-$85.20</td>
                                        </tr>
                                        <tr>
                                            <td>Feb 20, 2025</td>
                                            <td>Electricity Bill</td>
                                            <td><span class="badge bg-primary">Needs</span></td>
                                            <td class="text-danger">-$145.30</td>
                                        </tr>
                                        <tr>
                                            <td>Feb 18, 2025</td>
                                            <td>Movie Tickets</td>
                                            <td><span class="badge bg-success">Wants</span></td>
                                            <td class="text-danger">-$32.50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title">Savings Goals</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">Add Goal</a>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <h6 class="mb-0">Vacation Fund</h6>
                                        <small class="text-muted">$1,200 / $3,000</small>
                                    </div>
                                    <span class="badge bg-success">40%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <h6 class="mb-0">New Laptop</h6>
                                        <small class="text-muted">$800 / $1,200</small>
                                    </div>
                                    <span class="badge bg-success">67%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <h6 class="mb-0">Emergency Fund</h6>
                                        <small class="text-muted">$5,000 / $10,000</small>
                                    </div>
                                    <span class="badge bg-success">50%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection

@section('scripts')
<script>
    // Budget Chart for Guest Preview
    const budgetCtx = document.getElementById('budgetChart');
    if (budgetCtx) {
        new Chart(budgetCtx, {
            type: 'doughnut',
            data: {
                labels: ['Housing', 'Food', 'Transportation', 'Utilities', 'Entertainment', 'Savings'],
                datasets: [{
                    data: [30, 15, 10, 10, 15, 20],
                    backgroundColor: [
                        '#2563eb', // primary
                        '#10b981', // secondary
                        '#f59e0b', // warning
                        '#6366f1', // indigo
                        '#ec4899', // pink
                        '#22c55e'  // success
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Dashboard Budget Chart for Authenticated Users
    const dashboardBudgetCtx = document.getElementById('dashboardBudgetChart');
    if (dashboardBudgetCtx) {
        new Chart(dashboardBudgetCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Income',
                        data: [3800, 4100, 3950, 4200, 4050, 4250],
                        backgroundColor: '#2563eb',
                        borderRadius: 4
                    },
                    {
                        label: 'Expenses',
                        data: [2900, 3100, 2800, 3000, 2750, 2840],
                        backgroundColor: '#ef4444',
                        borderRadius: 4
                    },
                    {
                        label: 'Savings',
                        data: [900, 1000, 1150, 1200, 1300, 1410],
                        backgroundColor: '#10b981',
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // 50/30/20 Rule Chart
    const fiftyThirtyTwentyCtx = document.getElementById('fiftyThirtyTwentyChart');
    if (fiftyThirtyTwentyCtx) {
        new Chart(fiftyThirtyTwentyCtx, {
            type: 'doughnut',
            data: {
                labels: ['Needs (50%)', 'Wants (30%)', 'Savings (20%)'],
                datasets: [{
                    data: [50, 30, 20],
                    backgroundColor: [
                        '#2563eb', // primary
                        '#10b981', // success
                        '#f59e0b'  // warning
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }
</script>
@endsection