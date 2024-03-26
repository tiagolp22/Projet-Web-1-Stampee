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

            <div>
                <div class="icon-produit">
                    <div class="jaime">
                        J'aime
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="partager">
                        Partager
                        <i class="fa-regular fa-share-from-square"></i>
                    </div>
                </div>
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
                <div class="produit-quantite">
                    <!-- <label for="quantity">Quantite</label> -->
                    <!-- <input type="number" id="quantity" name="quantity" min="1" value="1" /> -->
                    <div class="prix">Prix {{ mise.prix_offert }}</div>
                </div>
                <a href="{{ base }}/product/edit?id={{ product.id }}" class="btn block">Edit</a>
                <form action="{{ base }}/product/delete" method="post">
                    <input type="hidden" name="id" value="{{ product.id }}">
                    <button class="btn block red">Delete</button>
                </form>

                <!-- <div class="btn btn-produit">Ajouter au Panier</div> -->
            </div>
        </div>

        <div class="produits-similaires">
            <h3 class="h3-produits-simulaires">Produits Similaires</h3>
            <hr />
            {% for similar_product in similar_products %}
            <img src="../assets/img/photos/{{ similar_product.img }}" alt="timbre {{ similar_product.timbre_nom }}" />
            {% endfor %}
        </div>
    </div>
</main>

{% include 'layouts/footer.php' %}
