@include('layouts.header')
@include('layouts.navbar')

<main class="main-content">
    @yield('content')
</main>

@include('layouts.footer')

<style>
    .main-content {
        min-height: calc(100vh - 120px);
        padding: 100px 0 40px;
        position: relative;
        z-index: 1;
    }

    /* Page Transition */
    .main-content {
        animation: fadeIn 0.6s var(--transition-smooth);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Container Spacing */
    .container {
        max-width: 1200px;
        padding: 0 20px;
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 1rem;
        color: var(--color-text);
    }

    .section-header p {
        color: var(--color-text-muted);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-content {
            padding: 80px 0 30px;
        }
        
        .section-header h2 {
            font-size: 1.8rem;
        }
        
        .section-header p {
            font-size: 1rem;
        }
    }
</style>