{{ include('layouts/header.php', { title: 'Ajouter un Timbre' }) }}

<div class="container">
    <h2>Ajouter un timbre</h2>
    <form method="post" enctype="multipart/form-data" action="{{ base }}/timbre/store">
        <label for="nom">Nom
            <input type="text" name="nom" value="{{ timbre.nom }}">
        </label>
        {% if errors.nom is defined %}
            <span class="error">{{ errors.nom }}</span>
        {% endif %}

        <label for="date_de_creation">Date de création
            <input type="date" name="date_de_creation" value="{{ timbre.date_de_creation }}">
        </label>
        {% if errors.date_de_creation is defined %}
            <span class="error">{{ errors.date_de_creation }}</span>
        {% endif %}

        <label for="couleur">Couleur
            <input type="text" name="couleur" value="{{ timbre.couleur }}">
        </label>
        {% if errors.couleur is defined %}
            <span class="error">{{ errors.couleur }}</span>
        {% endif %}

        <label for="pays_d_origine">Pays d'origine
            <input type="text" name="pays_d_origine" value="{{ timbre.pays_d_origine }}">
        </label>
        {% if errors.pays_d_origine is defined %}
            <span class="error">{{ errors.pays_d_origine }}</span>
        {% endif %}

        <label for="etat">Condition
            <input type="text" name="etat" value="{{ timbre.etat }}">
        </label>
        {% if errors.etat is defined %}
            <span class="error">{{ errors.etat }}</span>
        {% endif %}

        <label for="dimensions">Dimensions
            <input type="text" name="dimensions" value="{{ timbre.dimensions }}">
        </label>
        {% if errors.Dimensions is defined %}
            <span class="error">{{ errors.Dimensions }}</span>
        {% endif %}

        <label for="certifie">Certifié
            <input type="checkbox" name="certifie" value="1" {% if timbre.certifie == 1 %}checked{% endif %}>
        </label>
        {% if errors.certifié is defined %}
            <span class="error">{{ errors.certifie }}</span>
        {% endif %}

        <label>Images
            <input type="file" name="images[]" multiple /> <!-- accept l'insertion de plusieurs images -->
        </label>
        {% if errors.images is defined %}
            <span class="error">{{ errors.images }}</span>
        {% endif %}

        <label for="tirage">Tirage
            <input type="text" name="tirage" value="{{ timbre.tirage }}">
        </label>
        {% if errors.tirage is defined %}
            <span class="error">{{ errors.tirage }}</span>
        {% endif %}
        <label for="description">Description
            <input type="text" name="description">
        </label>
        {% if errors.description is defined %}
            <span class="error">{{ errors.description }}</span>
        {% endif %}
        <input type="submit" value="Enregistrer Timbre">
    </form>
</div>

{{ include('layouts/footer.php') }}
