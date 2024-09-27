{{ include('layouts/header.php', {title:'Accueil Stampee'}) }}

<section class="section-accueil">
            <div class="conteneur-appel-a-action">
                <h1>Enchères en direct</h1>
                <p>Une collection de timbres rares choisit par le Lord Stampee</p>
                <h2>Participez maintenant</h2>
                <button class="btn acceuil"><a href="{{base}}/catalogue">Je participe</a></button>
            </div>
            <img src="{{asset}}/img/lots/museum-of-new-zealand-te-papa-tongarewa.jpg" alt="Image d'un timbre rare">
        </section>
        <section class="vers-mission">
            <header>
                <h2>Notre Mission</h2>
            </header>
            <div class="mission">
                <img src="{{asset}}/img/lots/Vatican.jpg" alt="image_mission">
                <article>
                    <h3>Des timbres authentiques</h3>
                    <p>Nous garantissons l'authenticité de chaque timbre mis aux enchères, sélectionnés avec le plus grand soin par nos experts philatéliques. Notre engagement envers l'excellence ne s'arrête pas là – nous nous efforçons de préserver l'histoire et la culture que chaque timbre incarne. Que vous soyez un collectionneur passionné ou un amateur de philatélie, nous valorisons et soutenons la communauté philatélique mondiale, en vous offrant des pièces rares et précieuses qui racontent des histoires uniques à travers le temps.

                    Découvrez une collection exceptionnelle où chaque timbre est non seulement un objet de valeur, mais aussi un fragment d'histoire, soigneusement préservé pour les générations futures. Rejoignez-nous dans cette célébration de la philatélie et enrichissez votre collection avec des pièces authentiques et garanties.</p>
                    <button class="btn philosophie">Philosophie</button>
                </article>   
            </div>
        </section>

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
                        <img id="slide-1" src="{{asset}}/img/greatBritainstamp1.png" alt="Stamp geat britain">
                        <img id="slide-2" src="{{asset}}/img/greatBritainstamp2.png" alt="Stamp geat britain">
                        <img id="slide-3" src="{{asset}}/img/lots/rare.jpeg" alt="SStamp geat britain">
                        <img id="slide-4" src="{{asset}}/img/greatBritainstamp3.png" alt="Sans image">
                        <img id="slide-5" src="{{asset}}/img/lots/Vatican.jpg" alt="Sans image">
                    </div>
                    <div class="nav-caroussel">
                        <a href="#slide-1"><b hidden>test</b></a>
                        <a href="#slide-2"><b hidden>test</b></a>
                        <a href="#slide-3"><b hidden>test</b></a>
                        <a href="#slide-4"><b hidden>test</b></a>
                        <a href="#slide-5"><b hidden>test</b></a>
                    </div>
                </div>
            </section>
        </div>
{{ include('layouts/footer.php')}}