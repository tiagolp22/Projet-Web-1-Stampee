{{ include('layouts/header.php', {title: 'favoris'}) }}

<main class="main-login">

    {% if favoris %}
        <h1>Mes favoris</h1>
        <table class="table-produit">

            <tr>
                <th>Nom</th>
                <th>Pays de origine</th>
                <th>Tirage</th>
                <th>Date de Creation</th>
                <th> Delete? <th>
            </tr>

            {% for favoris in favoris%}
            <tr>
            <td><a href="{{ base }}/enchere/show?id={{ favoris.id }}">{{ favoris.timbre_nom }}</a></td>
                <td>{{ favoris.pays_origine }}</td>
                <td>{{ favoris.tirage }}</td>
                <td>{{ favoris.date_creation }}</td>
                <td><form id="deleteForm" action="{{ base }}/favoris/delete" method="post">
                    <input type="hidden" name="id" value="{{ favoris.id }}">
                    <button id="deleteButton" class="btn block red">Supprimer</button>
                </form>

                <script>
                    document.getElementById('deleteButton').addEventListener('click', function(event) {
                        event.preventDefault();

                        var confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement?");

                        if (confirmDelete) {
                            document.getElementById('deleteForm').submit();
                        }
                    });
                </script></td>
            </tr>
            {% endfor %}
        </table>
    {% else %}
    <h3> tu ne peux pas mettre deux fois la même chose en favori </h3>
    {% endif %}

    {{ include('layouts/footer.php') }}