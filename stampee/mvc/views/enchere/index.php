{{ include('layouts/header.php', {title:'Catalogue Stampee'}) }}

<div class="presentation" >
        <h2>Lots proposés</h2>
        <p><b>Bienvenue sur notre page de catalogue !</b> Ici, vous découvrirez une variété de lots de timbres rares et précieux. Chaque lot est unique, provenant de différentes régions du monde et offrant une diversité de genres. .</p>
    </div>
        <div class="conteneur">  
            <aside>
                <h2>Filtres</h2>
                <div class="filtres-conteneur">
                    <div class="filtres">
                        <ul>
                            <li>
                                Prix
                                <ul class="sous-categories">
                                    <li><input type="checkbox"><label>Croissant<label>         </li>
                                    <li><input type="checkbox"><label>Decroissant<label>     
                                    </li>
                                </ul>
                            </li>
                            <li >Categorie
                                <ul class="sous-categories">
                                    <li><input type="checkbox"><label>Sciences<label>
                                        
                                    </li>
                                    <li><input type="checkbox"><label > Arts</label></li>
                                </ul>
                            </li>
                            <li >Etat
                                <ul class="sous-categories">
                                    <li><input type="checkbox"><label>Neuf<label>
                                        
                                    </li>
                                    <li><input type="checkbox"><label >Bonne condition</label></li>
                                    <li><input type="checkbox"><label >Usé</label></li>
                                </ul>
                            </li>
                            <li >Origine
                                <ul class="sous-categories">
                                    <li><input type="checkbox"><label>Angleterre<label>
                                        
                                    </li>
                                    <li><input type="checkbox"><label >Canada</label></li>
                                    <li><input type="checkbox"><label >États-Unis</label></li>
                                    <li><input type="checkbox"><label >Australie</label></li>
                                </ul>
                            </li>

                            <li >Date
                                <ul class="sous-categories">
                                    <li><input type="checkbox"><label>1950-1960<label>
                                       
                                    </li>
                                    <li><input type="checkbox"><label >1960-1970</label></li>
                                    <li><input type="checkbox"><label >1970-1980</label></li>
                                    <li><input type="checkbox"><label >1980-1990</label></li>
                                    <li><input type="checkbox"><label >1990-2000</label></li>
                                    <li><input type="checkbox"><label >2000-2010</label></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="buttons-conteneur ">

                            <button class="bouton gauche">Effacer</button>
                            <button class="bouton droite">Appliquer</button>
                        </div>
                    </div>
                </div>  
            </aside>
    
            <div class="grid">
                {% for enchere in encheres %}
                    <div class="timbre">
                        <img src="{{ base }}/image/{{ enchere.image_nom }}" alt="{{ enchere.timbre_nom }}">
                        <h3>Lot : <b>{{ enchere.timbre_nom }}</b></h3>
                        <h3>{{ enchere.timbre_pays_d_origine }}</h3>
                        <h3>Catégorie : <b>{{ enchere.timbre_couleur }}</b></h3>
                        <h3>Estimation : <b>{{ enchere.estimation }}$</b></h3>
                        <h3>Prix de vente : <b>{{ enchere.prix_plancher }}$</b></h3>
                        <h3><b>{{ enchere.timbre_etat }}</b></h3>
                        <div class="buttons-conteneur">
                            <button class="gauche bouton">Suivre</button>
                            <a href='{{ base }}/enchere/show?id={{ enchere.idEnchere }}' class="droite bouton">Enchérir</a>
                        </div>
                    </div>
                {% endfor %}
            </div>

        </div>
{{ include('layouts/footer.php')}}