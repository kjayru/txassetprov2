@extends('layouts.frontend.appinterna')

@section('content')
<section class="tap-page-hero tap-page-hero--services">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="tap-page-eyebrow">Layered protection, active accountability</span>
                <h1 class="tap-page-title">Security Services</h1>
                <p class="tap-page-copy">
                    TAP Security delivers professional officers, site-specific procedures and visible field accountability for every client we serve.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--navy">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <article class="tap-service-chip">Armed / Unarmed Security</article>
            </div>
            <div class="col-lg-4">
                <article class="tap-service-chip">Access Control</article>
            </div>
            <div class="col-lg-4">
                <article class="tap-service-chip">Security Patrol</article>
            </div>
            <div class="col-lg-6">
                <article class="tap-service-chip">Personal Protection Officers</article>
            </div>
            <div class="col-lg-6">
                <article class="tap-service-chip">Off-Duty Police Security And Traffic Control</article>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--white">
    <div class="container">
        <div class="row align-items-start g-5">
            <div class="col-lg-6">
                <h2 class="tap-section-title tap-section-title--dark">We solve the problems clients experience with weak providers</h2>
                <ul class="tap-check-list">
                    <li>No visibility into patrol activity or officer movement</li>
                    <li>Difficulty reaching officers when response is needed</li>
                    <li>Unprofessional conduct, language or excessive phone use</li>
                    <li>Poor appearance and lack of active site engagement</li>
                    <li>Weak reporting, weak accountability and poor chain of command</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h2 class="tap-section-title tap-section-title--dark">Our approach is built around your site, your rules and your exposure</h2>
                <ul class="tap-check-list">
                    <li>Protection of personnel, tenants and property</li>
                    <li>Controlled access and deterrence of unauthorized entry</li>
                    <li>Real-time accountability through tour tracking and geofencing</li>
                    <li>Professional coordination with site management and law enforcement</li>
                    <li>Detailed daily reporting with documented site activity</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="industries" class="tap-section tap-section--muted">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="tap-section-title tap-section-title--dark">Industries We Serve</h2>
                <p class="tap-section-copy tap-section-copy--dark">
                    TAP Security supports high-visibility environments where professionalism, responsiveness and clear control standards matter.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <a href="/industry/commercial-security" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Commercial Security</h3>
                    <p>Coverage for commercial facilities that need reliable presence, active patrol and professional reporting.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/industry/diplomatic-mission" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Diplomatic Mission</h3>
                    <p>Security support for environments where protocol, discretion and controlled access are critical.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/industry/hospitality-security" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Hospitality Security</h3>
                    <p>Visible security that protects guests, staff and property without disrupting the client experience.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/industry/industrial-security" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Industrial Security</h3>
                    <p>Layered site protection for industrial operations, access points and facility perimeter controls.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/industry/medical-security" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Medical Security</h3>
                    <p>Professional on-site officers for healthcare spaces where calm response and controlled access matter.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="/industry/residential-security" class="tap-industry-card">
                    <span class="tap-industry-kicker">Industry</span>
                    <h3>Residential Security</h3>
                    <p>Community-focused protection that supports residents, visitors and property management standards.</p>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="tap-section-title tap-section-title--dark">Ready to define the right security coverage for your site?</h2>
                <p class="tap-section-copy tap-section-copy--dark">
                    We can scope guard coverage, patrol expectations, reporting and access control around your actual risks and site operations.
                </p>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a href="/contact" class="tap-button tap-button--primary">Get A Quote</a>
            </div>
        </div>
    </div>
</section>

<style>
.tap-page-hero {
    padding: 120px 0 96px;
    background: linear-gradient(135deg, rgba(1, 11, 64, 0.94), rgba(183, 22, 28, 0.84));
    color: #fff;
}

.tap-page-hero--services {
    background-image: linear-gradient(135deg, rgba(1, 11, 64, 0.94), rgba(183, 22, 28, 0.84)), url('/images/opp-industries.png');
    background-size: cover;
    background-position: center;
}

.tap-page-eyebrow,
.tap-page-title,
.tap-section-title,
.tap-service-chip,
.tap-industry-card h3 {
    font-family: 'Bebas Neue', sans-serif;
    letter-spacing: .08em;
}

.tap-page-eyebrow {
    display: inline-block;
    margin-bottom: 1rem;
    font-size: 1rem;
    text-transform: uppercase;
}

.tap-page-title {
    font-size: clamp(3rem, 6vw, 5.5rem);
    margin-bottom: 1rem;
}

.tap-page-copy,
.tap-section-copy,
.tap-check-list li,
.tap-industry-card p {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.8;
    font-size: 1.02rem;
}

.tap-section {
    padding: 88px 0;
}

.tap-section--navy {
    background: #031059;
}

.tap-section--white {
    background: #fff;
}

.tap-section--muted {
    background: #f4f6fb;
}

.tap-section-title {
    font-size: clamp(2rem, 4vw, 3.4rem);
    margin-bottom: 1rem;
}

.tap-section-title--dark,
.tap-section-copy--dark {
    color: #031059;
}

.tap-service-chip {
    height: 100%;
    padding: 1.25rem 1.5rem;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.14);
    color: #fff;
    font-size: 1.6rem;
}

.tap-check-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tap-check-list li {
    position: relative;
    padding-left: 1.75rem;
    margin-bottom: 1rem;
    color: #031059;
}

.tap-check-list li:before {
    content: '';
    position: absolute;
    left: 0;
    top: .5rem;
    width: .8rem;
    height: .8rem;
    border-radius: 50%;
    background: #e01f26;
}

.tap-industry-card {
    display: block;
    height: 100%;
    padding: 2rem 1.75rem;
    text-decoration: none;
    background: linear-gradient(180deg, #ffffff 0%, #eef2fb 100%);
    box-shadow: 0 20px 50px rgba(3,16,89,.08);
}

.tap-industry-kicker {
    display: inline-block;
    margin-bottom: .9rem;
    color: #b7161c;
    font-size: .85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
}

.tap-industry-card h3 {
    font-size: 2rem;
    color: #031059;
    margin-bottom: .75rem;
}

.tap-industry-card p {
    color: #314168;
    margin: 0;
}

.tap-button {
    display: inline-block;
    margin-top: .4rem;
    padding: .95rem 1.4rem;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
}

.tap-button--primary {
    background: #e01f26;
    color: #fff;
}

@media (max-width: 991px) {
    .tap-page-hero {
        padding: 96px 0 72px;
    }

    .tap-section {
        padding: 72px 0;
    }
}
</style>
@endsection
