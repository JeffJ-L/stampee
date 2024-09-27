{{ include('layouts/header.php', {title:'Create User'})}}
<div class="container">
    <form method="post" action="/stampee/mvc/user/store">
        <h2>Inscription</h2>

        <label>Name
            <input type="text" name="name" value="{{ user.name }}">
        </label>
        {% if errors.name is defined %}
            <span class="error">{{ errors.name }}</span>
        {% endif %}

        <label>Username
            <input type="text" name="username" value="{{ user.username }}">
        </label>
        {% if errors.username is defined %}
            <span class="error">{{ errors.username }}</span>
        {% endif %}

        <label>Password
            <input type="password" name="password">
        </label>
        {% if errors.password is defined %}
            <span class="error">{{ errors.password }}</span>
        {% endif %}

        <label>Email
            <input type="email" name="email" value="{{ user.email }}">
        </label>
        {% if errors.email is defined %}
            <span class="error">{{ errors.email }}</span>
        {% endif %}

        <label>Phone Number
            <input type="text" name="numero_de_telephone" value="{{ user.numero_de_telephone }}">
        </label>
        {% if errors.numero_de_telephone is defined %}
            <span class="error">{{ errors.numero_de_telephone }}</span>
        {% endif %}
        <input type="hidden" name="privilege_idprivilege" value="1">

        <input type="submit" class="btn" value="Save">
    </form>
</div>
{{ include('layouts/footer.php')}}