{{ include('layouts/header.php', { title: 'Liste des Timbres' }) }}

<div class="container">
    <div class="image-section">
        {% for timbre in timbres %}
        <div class="timbre-item">
            <div class="image-section">
                <div class="main-image">
                    {% if timbres is not empty %}
                    <img src="{{ base }}/image/{{ timbre.image_nom }}" alt="{{ timbre.nom }}" width="200">
                    {% else %}
                        <p><small>No image available</small></p>
                    {% endif %}
                </div>
                <div class="thumbnails">
                    <button class="prev">&lt;</button>
                    <div class="thumbnail-container">
                        {% if timbres is not empty %}
                            {% for image in timbres %}
                                <img src="{{ base }}/image/{{ image.image_nom  }}" alt="{{ timbre.nom }}" width="50">
                            {% endfor %}
                        {% endif %}
                    </div>
                    <button class="next">&gt;</button>
                </div>
            </div>

            <div class="details-section">
                <h2>{{ timbre.nom }} ({{ timbre.date_de_creation|date("Y") }})</h2>
                <p>{{ timbre.pays_d_origine }}</p>
                <p><strong>Date de création:</strong> {{ timbre.date_de_creation }}</p>
                <p><strong>Couleur:</strong> {{ timbre.couleur }}</p>
                <p><strong>Condition:</strong> {{ timbre.etat }}</p>
                <p><strong>Dimensions:</strong> {{ timbre.dimensions }}</p>
                <p><strong>Certifié:</strong> {{ timbre.certifie == 1 ? 'Yes' : 'No' }}</p>
                <p><strong>Tirage:</strong> {{ timbre.tirage }}</p>
                <hr>
                <div class="description">
                    <h3>Description:</h3>
                    <p>{{ timbre.description }}</p>
                </div>
                <div class="bouton-actions">
                    <!-- <button class="btn primary">Modifier</button> -->
                    <button class="btn primary">Archiver</button>
                    <!-- <button class="btn tertiary">Créer une enchère</button> -->
                </div>
            </div>
        </div>
        <hr>
        {% else %}
        <div>
            <p>No timbres found</p>
        </div>
        {% endfor %}
    </div>
</div>

{{ include('layouts/footer.php') }}
