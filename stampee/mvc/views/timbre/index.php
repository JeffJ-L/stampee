{{ include('layouts/header.php', {title:'Timbres Stampee'}) }}

<header>
        <div class="file-ariane">
            ← <a href="{{base}}/views/pages/catalogue.html">Catalogues</a> > ... > Lot 002
        </div>
</header>

<div class="container">
            <div class="image-section">
                <div class="main-image">
                    <img src="{{asset}}/img/lots/museum-of-new-zealand-te-papa-tongarewa.jpg" alt="Main Image">
                </div>
                <div class="thumbnails">
                    <button class="prev">&lt;</button>
                    <div class="thumbnail-container">
                        <img src="{{asset}}/img/lots/museum-of-new-zealand-te-papa-tongarewa.jpg" alt="Image 1">
                        <img src="{{asset}}/img/greatBritainstamp1.png" alt="Image 2">
                        <img src="{{asset}}/img/lots/museum-of-new-zealand-te-papa-tongarewa.jpg" alt="Image 3">
                        <img src="{{asset}}/img/lots/museum-of-new-zealand-te-papa-tongarewa.jpg" alt="Image 4">
                    </div>
                    <button class="next">&gt;</button>
                </div>
            </div>
            <div class="details-section">
                <h2>LOT 002 (1999)</h2>
                <p>Argentina Barquitos</p>
                <p><strong>Début:</strong> 5 jours</p>
                <p><strong>Fin:</strong> 2024/07/25</p>
                <p><strong>Estimation:</strong> 350,000 - 550,000 CA</p>
                <p><strong>Prix plancher:</strong> 100000 CA</p>
                <p><strong>Vendeur:</strong> Mr. Roberto</p>
                <hr>
                <p><strong>Offre actuelle(6 offres):</strong> 105000 CA</p>
                <p><strong>Par:</strong> Aymen007</p>
                <hr>
                <div class="description">
                    <h3>Description:</h3>
                    <p>Découvrez un timbre rare et emblématique issu de la collection d'Argentine Barquitos. Ce timbre, émis en 1930, fait partie d'une série dédiée à la promotion de la santé publique. En excellent état de conservation, il représente une pièce d'histoire fascinante, alliant un graphisme distinctif à une valeur philatélique exceptionnelle. Une opportunité unique pour les collectionneurs passionnés de posséder un témoignage tangible du passé, tout en enrichissant leur collection d'une pièce authentique et précieuse.</p>
                </div>
                <div class="bouton-actions">
                    <button class="btn primary">Enchérir</button>
                    <button class="btn secondary">Suivre</button>
                    <button class="btn tertiary">Contact le vendeur</button>
                </div>
            </div>
        </div>
        <div class="caroussel-wrapper">
            <div class="caroussel-tags">
                <a href="#">Recommandations</a>
                <a href="#">Enchères en vedette</a>
                <a href="#">Les plus achalandé</a>
                <a href="#">De la collection du Lord</a>
            </div>
            <hr>
            <section class="caroussel-conteneur">
                <div class="enveloppe-caroussel">
                    <div class="caroussel-images">
                        <img id="slide-1" src="{{asset}}/img/greatBritainstamp1.png" alt="Sans image">
                        <img id="slide-2" src="{{asset}}/img/greatBritainstamp2.png" alt="Sans image">
                        <img id="slide-3" src="{{asset}}/img/lots/rare.jpeg" alt="Sans image">
                        <img id="slide-4" src="{{asset}}/img/greatBritainstamp3.png" alt="Sans image">
                        <img id="slide-5" src="{{asset}}/img/lots/Vatican.jpg" alt="Sans image">
                    </div>
                    <div class="nav-caroussel">
                        <a href="#slide-1"><p>slide1</p></a>
                        <a href="#slide-2"><p>slide</p></a>
                        <a href="#slide-3"><p>slide</p></a>
                        <a href="#slide-4"><p>slide</p></a>
                        <a href="#slide-5"><p>slide</p></a>
                    </div>
                </div>
            </section>
        </div>

{{ include('layouts/footer.php')}}