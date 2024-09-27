{{ include('layouts/header.php', { title: 'Mon compte' }) }}

<div class="timbre-cards-container">
    {% if timbres is not empty %}
        {% for timbre in timbres %}
            <div class="timbre-card">
                <div class="card-header">
                    {% if timbre.image_nom is not empty %}
                        <img src="{{ base }}/image/{{ timbre.image_nom }}" alt="{{ timbre.nom }}">
                    {% else %}
                        <p><small>Pas d'image disponible</small></p>
                    {% endif %}
                </div>
                <div class="card-body">
                    <h3>{{ timbre.nom }}</h3>
                    <p><strong>Couleur:</strong> {{ timbre.couleur }}</p>
                    <p><strong>Condition:</strong> {{ timbre.etat }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ base }}/timbre/show?id={{ timbre.idTimbre }}" class="btn">Details</a>
                </div>
            </div>
        {% endfor %}
    {% else %}
        <p>Aucun timbre trouvé. <a href="{{ base }}/timbre/create">Ajouter un timbre</a></p>
    {% endif %}
</div>

<div>
    <a href="{{ base }}/timbre/create">Ajouter un timbre</a>
</div>


{{ include('layouts/footer.php') }}