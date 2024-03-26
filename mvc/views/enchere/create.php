{{ include('layouts/header.php', {title: 'Ajouter un produit'}) }}

<main class="main-login">

    <div class="form-form-login">

        <form class="form-login" method="post" enctype="multipart/form-data">
            <label>prix_min :
                <input type="text" name="prix_min" value="{{ stampee_enchere.prix_min }}">
            </label>
            {% if errors.prix_min is defined %}
            <span class="error">{{ errors.prix_min }}</span>
            {% endif %}

            <label>date_debut :
                <input type="date" name="date_debut" value="{{ stampee_enchere.date_debut }}">
            </label>
            {% if errors.date_debut is defined %}
            <span class="error">{{ errors.date_debut }}</span>
            {% endif %}

            <label>date fin :
                <input type="date" name="date_fin" value="{{ stampee_enchere.date_fin }}">
            </label>
            {% if errors.date_fin is defined %}
            <span class="error">{{ errors.date_fin }}</span>
            {% endif %}

            <label>coup_de_coeur :
                <input type="text" name="coup_de_coeur" value="{{ stampee_enchere.coup_de_coeur }}">
            </label>
            {% if errors.coup_de_coeur is defined %}
            <span class="error">{{ errors.coup_de_coeur }}</span>
            {% endif %}

            <label>active :
                <input type="text" name="active" value="{{ stampee_enchere.active }}">
            </label>
            {% if errors.active is defined %}
            <span class="error">{{ errors.active }}</span>
            {% endif %}


            <input type="hidden" name="id_user" value="{{session.user_id}}">
            <input type="hidden" name="id_timbre" value="{{session.id_timbre}}">

            <input type="submit" class="btn" value="Enregistrer">

        </form>
    </div>
</main>

{{ include('layouts/footer.php') }}