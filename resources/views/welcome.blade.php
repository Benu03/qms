<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QMS</title>

     <link rel="icon" type="image/png" href="{{ asset('img/qms_logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Poppins', sans-serif; line-height:1.6; color:#333; background: linear-gradient(135deg, #f54b64, #5563de); min-height:100vh; }

        .container { max-width:1200px; margin:0 auto; padding:20px; }

        .profile-card { background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); border-radius:25px; box-shadow:0 25px 50px rgba(0,0,0,0.15); overflow:hidden; margin-bottom:40px; transition: all 0.4s ease; }
        .profile-card:hover { transform: translateY(-8px) scale(1.02); box-shadow:0 30px 60px rgba(0,0,0,0.2); }

        /* Header */
        .header { background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?fit=crop&w=1200&q=80') center/cover no-repeat; color:white; padding:60px 20px; text-align:center; position:relative; border-radius:25px 25px 0 0; }
        .header::after { content:''; position:absolute; inset:0; background: rgba(0,0,0,0.4); border-radius:25px 25px 0 0; }
        .header img { position: relative; width:140px; height:140px; border-radius:50%; border:5px solid white; z-index:1; animation: logoBounce 1s ease infinite alternate; }
        @keyframes logoBounce { 0%{transform:translateY(0);} 100%{transform:translateY(-15px);} }

        /* Button Login */
        .login-btn { position:absolute; top:20px; right:20px; padding:10px 20px; background: linear-gradient(135deg, #ff758c, #d72f4b); color:white; border:none; border-radius:25px; cursor:pointer; font-weight:600; z-index:2; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .login-btn:hover { transform: scale(1.1); box-shadow:0 8px 20px rgba(0,0,0,0.2); }

        .section { padding:40px; border-bottom:1px solid #eee; }
        .section:last-child { border-bottom:none; }

        .section-title { font-size:2rem; font-weight:700; margin-bottom:25px; position:relative; display:inline-block; background: linear-gradient(90deg, #d72f4b, #d72f4b); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }

        .about-text { font-size:1.1rem; line-height:1.8; color:#555; text-align:justify; }

        /* Vision & Mission */
        .vision-mission { display:grid; grid-template-columns:1fr 1fr; gap:30px; margin-top:20px; }
        .vm-card { background: linear-gradient(135deg, #d72f4b, #d72f4b); color:white; padding:35px 25px; border-radius:20px; text-align:center; transition: all 0.4s ease; }
        .vm-card:hover { transform: translateY(-10px) scale(1.05); }
        .vm-card h3 { font-size:1.5rem; margin-bottom:15px; text-transform:uppercase; letter-spacing:1px; }

        /* Philosophy */
        .philosophy-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-top:20px; }
        .philosophy-item { background: linear-gradient(135deg, #d72f4b, #d72f4b); color:white; padding:25px; border-radius:15px; text-align:center; transition: all 0.3s ease; }
        .philosophy-item:hover { transform: translateY(-5px) scale(1.02); box-shadow:0 15px 35px rgba(255,117,140,0.4); }
        .philosophy-item h4 { font-size:1.2rem; margin-bottom:10px; text-transform:uppercase; letter-spacing:1px; }

        /* Services */
        .services-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-top: 20px; }
        .service-card { background: #fff; border-radius: 20px; padding: 25px; text-align: center; position: relative; cursor: pointer; transition: transform 0.4s ease, box-shadow 0.4s ease; overflow: hidden; display: flex; flex-direction: column; align-items: center; }
        .service-card:hover { transform: translateY(-8px) scale(1.03); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .service-card::before { content:''; position: absolute; top:0; left:-100%; width:100%; height:100%; background: linear-gradient(120deg, rgba(255,117,140,0.15), rgba(85,99,222,0.15), rgba(255,117,140,0.15)); transition: all 0.5s ease; border-radius:20px; z-index:0; }
        .service-card:hover::before { left:0; }
        .service-icon { width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin-bottom: 15px; background: linear-gradient(135deg, #ff758c, #d72f4b); color: white; z-index: 1; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .service-card:hover .service-icon { transform: scale(1.2); box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .service-card h3 { color: #2c3e50; font-size: 1.3rem; margin-bottom: 10px; z-index:1; }
        .service-card p { color: #555; font-size: 1rem; line-height: 1.6; z-index:1; }

        /* Statistics */
        .stats-container { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-top:20px; }
        .stat-card { background: linear-gradient(135deg, #d72f4b, #d72f4b); color:white; padding:30px; border-radius:20px; text-align:center; transition: transform 0.3s ease; }
        .stat-card:hover { transform: scale(1.1); box-shadow:0 25px 50px rgba(255,117,140,0.3); }
        .stat-number { font-size:2.5rem; font-weight:700; margin-bottom:5px; display:block; }
        .stat-label { font-size:0.9rem; opacity:0.9; text-transform:uppercase; letter-spacing:1px; }

        /* Clients */
        .clients-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-top:20px; }
        .client-card { border-radius:15px; padding:20px; text-align:center; font-weight:500; color:#2c3e50; transition: all 0.3s ease; cursor:pointer; }
        .client-card:hover { transform:translateY(-5px); background:linear-gradient(135deg, #d72f4b, #d72f4b); color:white; }

        /* Contact */
        .contact-info { background: linear-gradient(135deg, #5563de, #8e44ad); border-radius:20px; padding:30px; color:white; }
        .contact-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:30px; }
        .contact-item { display:flex; align-items:flex-start; gap:15px; }
        .contact-icon { width:40px; height:40px; background: rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; }

        /* Footer */
        .footer { text-align:center; padding:30px; background:#2c3e50; color:white; margin-top:30px; }

        @media (max-width:768px) {
            .vision-mission { grid-template-columns:1fr; }
            .services-grid { grid-template-columns:1fr; }
            .contact-grid { grid-template-columns:1fr; }
        }

        /* Animations */
        .animate-fade-in { opacity:0; transform:translateY(30px); animation: fadeIn 1s ease-in-out forwards; }
        @keyframes fadeIn { to { opacity:1; transform:translateY(0); } }
    </style>

    <style>
        .clients-grid {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(150px,1fr));
    gap:20px;
    margin-top:20px;
}
.client-card {
    background:white;
    border-radius:15px;
    padding:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    transition: all 0.3s ease;
}
.client-card:hover {
    transform:translateY(-5px);
    background:linear-gradient(135deg, #d72f4b, #d72f4b);
}
.client-card img {
    max-height:80px;
    width:auto;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.map-embed {
    margin-top: 20px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.map-embed iframe {
    width: 100%;
    height: 350px; /* bisa disesuaikan */
    border: 0;
}


.video-container {
    position: relative;
    padding-bottom: 56.25%; /* rasio 16:9 */
    height: 0;
    overflow: hidden;
    border-radius: 15px;       /* rounded */
    box-shadow: 0 6px 16px rgba(0,0,0,0.15); /* shadow */
    margin: 20px 30px 30px 30px;  /* atas 20px, kanan 30px, bawah 30px, kiri 30px */
    transition: transform 0.3s ease;
}

.video-container:hover {
    transform: scale(1.02); /* efek zoom halus saat hover */
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
 


    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="profile-card animate-fade-in" style="position:relative;">
            <div class="header">
                <img src="{{ asset('img/qms_logo.png') }}" alt="Logo QMS">
                 <a href="{{ route('login') }}" class="login-btn">Login</a>
            </div>
        </div>

        <!-- About -->
        <div class="profile-card animate-fade-in">
            <div class="section">
                <h2 class="section-title">Tentang Kami</h2>
                <p class="about-text">
                    PT. Qiprah Multi Service adalah perusahaan alih daya (outsourcing) yang berdiri sejak tahun 2016, bergerak dalam semua aspek operasional dan pemeliharaan fasilitas di berbagai sektor perusahaan. Kami berkomitmen untuk menjadi solusi partner terpercaya yang membantu klien fokus pada bisnis inti mereka dengan semboyan "Attitude for Success".
                </p>
            </div>

             <div class="video-container">
        <iframe 
            src="https://www.youtube.com/embed/XG1QoxgK-0o?si=NzqsSKdRvodpHr27" 
            title="Company Profile Video" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
        </iframe>
    </div>
        </div>

        <!-- Vision & Mission -->
        <div class="profile-card animate-fade-in">
            <div class="section">
                <h2 class="section-title">Visi & Misi</h2>
                <div class="vision-mission">
                    <div class="vm-card">
                        <h3>Visi</h3>
                        <p>Menjadi partner bisnis terbaik dan terpercaya dalam memberikan solusi</p>
                    </div>
                    <div class="vm-card">
                        <h3>Misi</h3>
                        <p>Mengutamakan layanan secara terintegrasi, cepat dan tepat</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Philosophy -->
        <div class="profile-card animate-fade-in">
            <div class="section">
                <h2 class="section-title">Filosofi Perusahaan</h2>
                <p class="about-text">Tim kami bekerja dengan berpedoman pada empat pilar utama:</p>
                <div class="philosophy-grid">
                    <div class="philosophy-item"><h4>Attitude</h4><p>Sikap kerja yang profesional</p></div>
                    <div class="philosophy-item"><h4>Knowledge</h4><p>Pengetahuan yang memadai</p></div>
                    <div class="philosophy-item"><h4>Professional</h4><p>Kinerja yang profesional</p></div>
                    <div class="philosophy-item"><h4>Skill</h4><p>Keterampilan yang teruji</p></div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="profile-card animate-fade-in">
            <div class="section">
                <h2 class="section-title">Layanan Kami</h2>
                <div class="services-grid">
                    <div class="service-card"><div class="service-icon">🧹</div><h3>Jasa Kebersihan</h3><p>Tenaga cleaning service terlatih dengan peralatan modern dan bahan pembersih ramah lingkungan.</p></div>
                    <div class="service-card"><div class="service-icon">🛡️</div><h3>Jasa Keamanan</h3><p>Sistem keamanan terintegrasi dengan tenaga security profesional untuk menciptakan rasa aman.</p></div>
                    <div class="service-card"><div class="service-icon">👥</div><h3>Supporting Service</h3><p>Penyediaan SDM penunjang produktivitas dan layanan administrasi operasional.</p></div>
                    <div class="service-card"><div class="service-icon">🔨</div><h3>Pemborongan Pekerjaan</h3><p>Penyelesaian proyek dengan perhitungan berdasarkan output dan kualitas terjamin.</p></div>
                    <div class="service-card"><div class="service-icon">🚗</div><h3>Parkir Division</h3><p>Pengadaan sistem parkir modern dan pengelolaan parkir dengan teknologi terkini.</p></div>
                    <div class="service-card"><div class="service-icon">🏢</div><h3>Maintenance Building</h3><p>Pemeliharaan gedung menyeluruh dengan tim teknisi berpengalaman.</p></div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="profile-card animate-fade-in">
            <div class="section">
                <h2 class="section-title">Pencapaian Kami</h2>
                <div class="stats-container">
                    <div class="stat-card"><span class="stat-number">100+</span><span class="stat-label">Pelanggan Puas</span></div>
                    <div class="stat-card"><span class="stat-number">99%</span><span class="stat-label">Tingkat Kepuasan</span></div>
                    <div class="stat-card"><span class="stat-number">953+</span><span class="stat-label">Pekerja Profesional</span></div>
                    <div class="stat-card"><span class="stat-number">8+</span><span class="stat-label">Tahun Pengalaman</span></div>
                </div>
            </div>
        </div>




        <div class="profile-card animate-fade-in">
        <div class="section">
            <h2 class="section-title">Klien Terpercaya</h2>
            <div class="clients-grid">
                @foreach($clients as $client)
                    <div class="client-card">
                        <img src="{{ asset($client) }}" alt="Client Logo" style="max-width:150px; max-height:100px; object-fit:contain;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

            <div class="profile-card animate-fade-in">
    <div class="section">
        <h2 class="section-title">Hubungi Kami</h2>
        <div class="contact-info">
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div>
                        <strong>Alamat:</strong><br>
                        RUKO BASUDEWA RIVER VIEW<br>
                        Jl. Basudewa Raya No. 3A<br>
                        Semarang Selatan, Kec. Bulustalan<br>
                        Kota Semarang
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <div>
                        <strong>Telepon:</strong><br>
                        024-86042357
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">✉️</div>
                    <div>
                        <strong>Email:</strong><br>
                        pt.qms@qiprahmultiservice.co.id
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">🕒</div>
                    <div>
                        <strong>Jam Operasional:</strong><br>
                        Senin - Sabtu: 08.00 - 17.00 WIB<br>
                        Minggu: TUTUP
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="map-embed">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3129.983458139091!2d110.4030117!3d-6.9884492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708beb16cc030b%3A0x542707dd892bb98!2sPT.Qiprah%20Multi%20Service!5e1!3m2!1sid!2sid!4v1758553103681!5m2!1sid!2sid"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>

    </div>




    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 PT. Qiprah Multi Service. All rights reserved.</p>
        <p><strong>"Kami siap membantu dalam memberikan solusi terbaik yang menyesuaikan kebutuhan bisnis Anda"</strong></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer untuk fade-in
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) { entry.target.classList.add('animate-fade-in'); }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.profile-card').forEach(card => {
                observer.observe(card);
            });

            // Count-up animation untuk statistik
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(span => {
                let target = parseInt(span.innerText.replace(/\D/g,''));
                span.innerText = '0';
                let count = 0;
                const increment = Math.ceil(target / 100);
                const interval = setInterval(() => {
                    count += increment;
                    if(count >= target) { count = target; clearInterval(interval); }
                    span.innerText = count;
                }, 20);
            });
        });
    </script>
</body>
</html>
