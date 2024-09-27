{{ include('layouts/header.php', { title: 'Créer une Enchère' }) }}

<form action="{{base}}/enchere/store" method="POST">
    <div>
        <label for="Periode_d_activite">Période d'activité:</label>
        <input type="date" id="Periode_d_activite" name="Periode_d_activite">
    </div>

    <div>
        <label for="prix_plancher">Prix plancher:</label>
        <input type="number" step="0.01" id="prix_plancher" name="prix_plancher" placeholder="Enter prix plancher">
    </div>

    <div>
        <label for="timbre_idTimbre">Sélectionnez Timbre:</label>
        <select id="timbre_idTimbre" name="timbre_idTimbre">
            {% if timbres is not empty %}
                {% for timbre in timbres %}
                    <option value="{{ timbre.idTimbre }}">{{ timbre.nom }}</option>
                {% endfor %}
            {% else %}
                <option value="">Aucun timbre disponible</option>
            {% endif %}
        </select>
    </div>
    <div>
        <label for="estimation">Estimation:</label>
        <input type="number" id="estimation" name="estimation" placeholder="Enter estimation">
    </div>

    <div>
        <button type="submit" class="btn">Créer Une Enchère</button>
    </div>
</form>


{{ include('layouts/footer.php') }}