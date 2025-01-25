document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 800,
        once: true
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

const athleteData = {
    'hidilynModal': {
        title: 'Hidilyn Diaz',
        content: `
            <div class="text-center mb-4">
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158" class="img-fluid mb-3" alt="Hidilyn Diaz">
            </div>
            <div class="athlete-info">
                <h4 class="mb-3">Olympic Achievement</h4>
                <p>Hidilyn Diaz made history by winning the Philippines' first-ever Olympic gold medal 
                in the women's 55kg weightlifting competition at the 2020 Tokyo Olympics.</p>
                <div class="achievement-details mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-trophy text-warning me-2"></i>Medal Details</h5>
                            <ul class="list-unstyled">
                                <li><strong>Sport:</strong> Weightlifting</li>
                                <li><strong>Category:</strong> Women's 55kg</li>
                                <li><strong>Medal:</strong> Gold</li>
                                <li><strong>Olympics:</strong> Tokyo 2020</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-star text-warning me-2"></i>Records</h5>
                            <ul class="list-unstyled">
                                <li>Olympic Record: 127kg</li>
                                <li>Total Lift: 224kg</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        `
    }
};

document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('show.bs.modal', function (event) {
        const modalId = this.id;
        if (athleteData[modalId]) {
            const data = athleteData[modalId];
            this.querySelector('.modal-title').textContent = data.title;
            this.querySelector('.modal-body').innerHTML = data.content;
        }
    });
});

window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.style.padding = '0.5rem 1rem';
    } else {
        navbar.style.padding = '1rem';
    }
});