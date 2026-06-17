@extends('layouts.frontend.appinterna')

@section('content')
<section class="tap-page-hero tap-page-hero--about">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="tap-page-eyebrow">Veteran-led security partner</span>
                <h1 class="tap-page-title">About TAP Security</h1>
                <p class="tap-page-copy">
                    TAP Security was founded to challenge the security service industry by proactively placing the client’s needs first.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--red">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9">
                <h2 class="tap-section-title">Built For Clients Who Expect More</h2>
                <p class="tap-section-copy">
                    We are a veteran owned and operated business dedicated to achieving excellence for our clients and their customers.
                    Our clients depend on us to meet challenging standards. Anything less is not an option.
                </p>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-4">
                <article class="tap-value-card">
                    <h3>Dependable</h3>
                    <p>
                        Our company uses innovative technology and active supervision to ensure accountability,
                        prompt response and continuous awareness of your property.
                    </p>
                </article>
            </div>
            <div class="col-lg-4">
                <article class="tap-value-card">
                    <h3>Professional</h3>
                    <p>
                        Our officers are held to high standards of appearance, conduct and discipline,
                        creating a strong visible presence that deters criminal activity.
                    </p>
                </article>
            </div>
            <div class="col-lg-4">
                <article class="tap-value-card">
                    <h3>Passionate</h3>
                    <p>
                        Your site is not just another assignment. It is the foundation of our growth and a responsibility
                        we take seriously every day.
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--light">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-4">
                <div class="tap-founder-portrait">
                    <img src="/images/Fundador-Cambios03.png" alt="Oscar Gonzalez" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tap-founder-panel">
                    <p class="tap-founder-quote">
                        “I believe the success of a business is rooted in the satisfaction of one’s clients.”
                    </p>
                    <p class="tap-founder-meta">Oscar Gonzalez, Founder &amp; President</p>
                    <div class="tap-founder-copy">
                        <p>
                            Oscar was born in San Antonio, Texas and from an early age he was exposed to the security industry.
                            He helped manage his father’s long-running investigations and security business and developed a clear view of the gaps in the market.
                        </p>
                        <p>
                            At age 21, Oscar joined the United States Air Force and served around the world for seven years.
                            That experience shaped his commitment to training, professionalism, pride in work and service before self.
                        </p>
                        <p>
                            After returning as a veteran, Oscar remained focused on raising the standard of private security.
                            TAP Security was founded in July 2017 to deliver the consistency, accountability and client-first culture the market was missing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tap-section tap-section--cta">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h2 class="tap-section-title tap-section-title--dark">Security That Stays Active On Site</h2>
                <p class="tap-section-copy tap-section-copy--dark">
                    TAP Security combines trained personnel, clear chain of command and field accountability to keep your people,
                    property and operations protected.
                </p>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a href="/services" class="tap-button tap-button--primary">Explore Services</a>
                <a href="/contact" class="tap-button tap-button--secondary">Get A Quote</a>
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

.tap-page-hero--about {
    background-image: linear-gradient(135deg, rgba(1, 11, 64, 0.94), rgba(183, 22, 28, 0.84)), url('/images/imagen-video-presentacion-02.jpg');
    background-size: cover;
    background-position: center;
}

.tap-page-eyebrow,
.tap-section-title,
.tap-value-card h3 {
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
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(3rem, 6vw, 5.5rem);
    letter-spacing: .06em;
    margin-bottom: 1rem;
}

.tap-page-copy,
.tap-section-copy,
.tap-founder-copy,
.tap-value-card p {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.8;
    font-size: 1.05rem;
}

.tap-section {
    padding: 88px 0;
}

.tap-section--red {
    background: #b7161c;
    color: #fff;
}

.tap-section--light {
    background: #f5f7fb;
    color: #031059;
}

.tap-section--cta {
    background: #fff;
}

.tap-section-title {
    font-size: clamp(2rem, 4vw, 3.4rem);
    margin-bottom: 1rem;
}

.tap-section-copy {
    margin-bottom: 0;
}

.tap-section-copy--dark,
.tap-section-title--dark {
    color: #031059;
}

.tap-value-card {
    height: 100%;
    padding: 2rem 1.75rem;
    border: 1px solid rgba(255,255,255,.18);
    background: rgba(255,255,255,.08);
}

.tap-value-card h3 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.tap-founder-portrait {
    padding: 2rem 1rem 0;
    background: linear-gradient(180deg, #031059 0%, #0e1f74 100%);
    text-align: center;
}

.tap-founder-panel {
    background: #fff;
    padding: 2rem;
    box-shadow: 0 24px 60px rgba(3,16,89,.12);
}

.tap-founder-quote {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(1.9rem, 4vw, 3rem);
    line-height: 1.05;
    color: #b7161c;
    margin-bottom: .5rem;
}

.tap-founder-meta {
    font-weight: 700;
    color: #031059;
    margin-bottom: 1.5rem;
}

.tap-button {
    display: inline-block;
    margin: .4rem .4rem .4rem 0;
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

.tap-button--secondary {
    background: #031059;
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
