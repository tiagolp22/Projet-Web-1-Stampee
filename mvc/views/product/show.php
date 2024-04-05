{% include 'layouts/header.php' with {'title': 'Product Show'} %}

<main class="main-produit">
    <div class="page-produit">
        <div class="timbre">
            <div class="timbre-photo">
                <i class="fa-solid fa-chevron-left"></i>
                <div class="photo-produit-g">
                    <img src="{{ base }}/upload/{{ img }}"></p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
        <div class="detail-produit">
            <div class="section-detail">
                <h3>{{ product.timbre_nom }}</h3>
                <p><strong>Couleurs:</strong> {{ product.couleurs }}</p>
                <p><strong>Tirage:</strong> {{ product.tirage }}</p>
                <p><strong>Dimensions:</strong> {{ product.dimensions }}</p>
                <p><strong>Pays Origine:</strong> {{ product.pays_origine }}</p>
                <p><strong>Categorie:</strong> {{ product.categorie }}</p>
                <p><strong>Condition:</strong> {{ product.condition_etat }}</p>
                <p><strong>Certifie:</strong> {{ product.certifie }}</p>

                <div class="form-enchere-show">

                <a href="{{ base }}/product/edit?id={{ product.id }}" class="btn block">Modifier</a>
                <form id="deleteForm" action="{{ base }}/product/delete" method="post">
                    <input type="hidden" name="id" value="{{ product.id }}">
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
                </script>
                <a href="{{base}}/enchere/create" class="btn block">ENCHERE</a>
                </div>

                <!-- <div class="btn btn-produit">Ajouter au Panier</div> -->
            </div>
        </div>
    </div>
</main>

{% include 'layouts/footer.php' %}