{{ include('layouts/header.php', {title: 'Product Create'})}}
<main class="main-login">
    <div class="form-form-login">
        <form class="form-login" method="post" enctype="multipart/form-data">

            <!-- <label>Choisissez le timbre
                <select name="id_timbre">
                    <option value="">Choisir timbre</option>
                    {% for timbre in timbres %}
                    <option value="{{ timbre.id }}">{{ timbre.timbre_nom }}</option>
                    {% endfor %}
                </select>
            </label> -->

            <input type="hidden" name="id" value="{{ enchere.id }}">
            <label>prix_min :
                <input type="text" name="prix_min" value="{{ stampee_enchere.prix_min }}">
            </label>
            {% if errors.prix_min is defined %}
            <span class="error">{{ errors.prix_min }}</span>
            {% endif %}

            <label>date_debut :
                <input type="datetime-local" name="date_debut" value="{{ stampee_enchere.date_debut }}">
            </label>
            {% if errors.date_debut is defined %}
            <span class="error">{{ errors.date_debut }}</span>
            {% endif %}

            <label>date fin :
                <input type="datetime-local" name="date_fin" value="{{ stampee_enchere.date_fin }}">
            </label>
            {% if errors.date_fin is defined %}
            <span class="error">{{ errors.date_fin }}</span>
            {% endif %}


            <!-- {% if session.privilege_id == 1 %}
<label>Coup de coeur du Lord :
    <select name="coup_de_coeur">
        <option value="1" {% if stampee_enchere.coup_de_coeur == 1 %}selected{% endif %}>Oui</option>
        <option value="0" {% if stampee_enchere.coup_de_coeur == 0 %}selected{% endif %}>Non</option>
    </select>
</label>

{% if errors.coup_de_coeur is defined %}
<span class="error">{{ errors.coup_de_coeur }}</span>
{% endif %}

{% else %}
<input type="hidden" name="coup_de_coeur" value="0">
{% endif %} -->




            <!-- <label>Coup de coeur du Lord :
                <select name="coup_de_coeur">
                    <option value="1" {% if stampee_enchere.coup_de_coeur == 1 %}selected{% endif %}>Oui</option>
                    <option value="0" {% if stampee_enchere.coup_de_coeur == 0 %}selected{% endif %}>Non</option>
                </select>
            </label> -->
            <input type="hidden" name="coup_de_coeur" value="1">

            {% if errors.coup_de_coeur is defined %}
            <span class="error">{{ errors.coup_de_coeur }}</span>
            {% endif %}

            <label>Actif :
                <select name="active">
                    <option value="1" {% if stampee_enchere.active == 1 %}selected{% endif %}>Oui</option>
                    <option value="0" {% if stampee_enchere.active == 0 %}selected{% endif %}>Non</option>
                </select>
            </label>

            {% if errors.active is defined %}
            <span class="error">{{ errors.active }}</span>
            {% endif %}

            <input type="hidden" name="id_user" value="{{session.user_id}}">
            <input type="submit" class="btn" value="Update">

        </form>
    </div>
</main>

{{ include('layouts/footer.php') }}