{{ include('layouts/header.php', { title: 'Enchère Details' }) }}

<div class="auction-container">
    <div class="auction-header">
        <h1>{{ enchere.timbre_nom }}</h1>
    </div>

    <div class="section-enchere">
        <div class="image-section">
            <img src="{{ base }}/image/{{ enchere.image_nom }}" alt="{{ enchere.timbre_nom }}" width="300">
        </div>

        <div class="section-details">
            <h2>{{ enchere.timbre_nom }} ({{ enchere.timbre_date_de_creation|date("Y") }})</h2>
            <p>{{ enchere.timbre_pays_d_origine }}</p>
            <p><strong>Condition:</strong> {{ enchere.timbre_etat }}</p>
            <p><strong>Dimensions:</strong> {{ enchere.timbre_dimensions }}</p>
            <p><strong>Certified:</strong> {{ enchere.timbre_certifie == 1 ? 'Yes' : 'No' }}</p>
            <p><strong>Tirage:</strong> {{ enchere.timbre_tirage }}</p>
            <hr>
            <h3>Informations:</h3>
            <p><strong>Date de début:</strong> {{ enchere.Periode_d_activite }}</p>
            <p><strong>Prix plancher:</strong> {{ enchere.prix_plancher }}</p>
            <p><strong>Estimation:</strong> {{ enchere.estimation }}</p>
        </div>
    </div>

    <div class="section-description">
        <h3>Description:</h3>
        <p>{{ enchere.timbre_description }}</p>
    </div>

    <div class="section-offre">
        {% if not guest %}
            {% if enchere.utilisateur_id != userId %}
            <h3>Placer une offre:</h3>
            <form action="{{ base }}/mises/store" method="POST">
                <input type="hidden" name="enchere_id" value="{{ enchere.idEnchere }}">
                <input type="number" name="montant" min="{{ enchere.prix_plancher }}" placeholder="Entrer le montant" required>
                <button type="submit" class="btn primary">Soumettre</button>
            </form>
            {% endif %}
        {% else %}
        <p><a href="{{ base }}/login">Connectez-vous</a> pour placer une offre.</p>
        {% endif %}
    </div>

    {% if enchere.utilisateur_id == userId %}
    <div class="bouton-actions">
        <a href="{{ base }}/enchere/edit/{{ enchere.idEnchere }}" class="btn secondary">Modifier l'enchère</a>
        <a href="{{ base }}/enchere/delete/{{ enchere.idEnchere }}" class="btn danger">Supprimer l'enchère</a>
    </div>
    {% endif %}
</div>

<hr>
<div class="wrapper">
  <div class="accordion">
    <div class="accordion-panel">
      <h2 id="bids-history-title">
        <button class="accordion-trigger" aria-expanded="false" aria-controls="bids-history-content">
          Historique des offres
        </button>
      </h2>
      <div class="accordion-content" role="region" aria-labelledby="bids-history-title" aria-hidden="true" id="bids-history-content">
        <div>
          {% if mises is not empty %}
          <table>
            <thead>
              <tr>
                <th>Position</th>
                <th>Utilisateurs</th>
                <th>Date</th>
                <th>Prix</th>
              </tr>
            </thead>
            <tbody>
              {% for mise in mises %}
              <tr>
                <td>{{ loop.index }}</td>
                <td>{{ mise.username }}</td>
                <td>{{ mise.created_at|date("Y-m-d") }}</td>
                <td>{{ mise.montant }} CA</td>
              </tr>
              {% endfor %}
            </tbody>
          </table>
          {% else %}
          <p>Aucune offre trouvée pour cette enchère.</p>
          {% endif %}
        </div>
      </div>
    </div>
  </div>
</div>

{{ include('layouts/footer.php') }}
