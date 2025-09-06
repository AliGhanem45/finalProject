<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ url('CSS/styles.css') }}">
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>{{__('Joblink.Empowering Innovation, Creating Change.')}}</h1>
            <p>{{__('Joblink.Join us on our mission to revolutionize the tech industry.')}}</p>
            <button>{{__('Joblink.Learn More')}}</button>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="section">
        <h2>{{__('Joblink.What We Do')}}</h2>
        <div class="content">
            <div class="card">
                <h3>{{__('Joblink.Our Mission')}}</h3>
                <p>{{__('Joblink.Be the bridge that makes people reach professional success')}} </p>
            </div>
            <div class="card">
                <h3>{{__('Joblink.Our Vision')}}</h3>
                <p>{{__('Joblink.To be the leading innovator in tech solutions, changing how the world interacts with technology.')}}</p>
            </div>
            <div class="card">
                <h3>{{__('Joblink.Core Values')}}</h3>
                <ul>
                    <li>{{__('Joblink.Innovation')}}</li>
                    <li>{{__('Joblink.Integrity')}}</li>
                    <li>{{__('Joblink.Collaboration')}}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="section">
        <h2>{{__('Joblink.Our Story')}}</h2>
        <p style="margin-left:80px;">{{__('Joblink.Founded in 2025, we started with a simple goal: to innovate. From a small team in a garage to a global leader in tech solutions, our journey has been one of perseverance and vision.')}}</p>
    </section>

    <!-- Leadership Section -->
    <section class="section">
        <h2>{{__('Joblink.Our Leadership')}}</h2>
        <div class="team">
            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="CEO">
                <h3>Sulafa Suleiman</h3>
                <p>CEO - Leading the charge in innovation.</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="CTO">
                <h3>Ali Ghanem</h3>
                <p>CTO - Tech solutions for a sustainable future.</p>
            </div>
            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="CTO">
                <h3>Rand Soubh</h3>
                <p>HR - Human resources.</p>
            </div>
        </div>
    </section>

    <!-- Company Culture Section -->
    <section class="section">
        <h2>{{__('Joblink.Company Culture')}}</h2>
        <p style="margin-left:30px;margin-right:30px;">{{__('Joblink.At JobBridge, we believe in fostering a creative and collaborative work environment. Whether in the office or working remotely, we make sure every employee has the tools and resources they need to succeed.')}}</p>
        <blockquote>“{{__('Joblink.I love working here because I am constantly challenged and supported by a talented team.”')}} – Rand</blockquote>
    </section>

</body>
</html>
