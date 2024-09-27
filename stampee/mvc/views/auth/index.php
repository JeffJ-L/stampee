{{ include('layouts/header.php', {title:'Connexion Stampee'}) }}


<div class="form-container">
    <div class="logo">
        <img src="{{ asset }}/img/logoStampee-2-alt.png" alt="logo royal Stampee">
        <div class="text-logo">
            <h1>Stampee</h1>
            <hr>
            <p>Site d'enchère de timbres</p>
        </div>
    </div>
    <div class="user-role">
        <a class="active" href="">Membre</a>
        <a href="">Admin</a>
    </div>
    <form method="post">
        {% if errors.message is defined %}
            <span class="error">{{ errors.message }}</span>
        {% endif %}
        <label for="username">Username <input type="text" name="username" id="username"></label>
        {% if errors.username is defined %}
            <span class="error">{{ errors.username }}</span>
        {% endif %}
        <label for="password">Mot de passe <input type="password" name="password" id="password"></label>
        {% if errors.password is defined %}
            <span class="error">{{ errors.password }}</span>
        {% endif %}
        <button type="submit">Connexion</button>
        <div class="lien-inscription">
            <a href="{{ base }}/user/create">Inscription</a>
            <a href="#">Mot de passe oublie?</a>
        </div>
    </form>
</div>




{{ include('layouts/footer.php')}}