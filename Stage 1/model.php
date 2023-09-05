<?php

/*  L'héritage

    Dans la vie, si vous héritez, vous recevez quelque chose d'un parent.
    En POO, c'est un peu la même chose, l'héritage permet à une classe d'avoir
    des propriétés et/ou des méthodes définies dans une autre classe.
    Lorsqu'une classe X hérite d'une classe Y, on dit que Y est la classe mère/parente
    et X la classe fille/enfant.
    L'héritage présente plusieurs intérêts.
    Le premier c'est de supprimer les redondances de code entre des objets similaires.
    Le second c'est de pouvoir regrouper des objets différents sous un
    même type de donnée, ce qui ammène à une première notion de polymorphisme. Pour vous
    donner une image : un quad, une moto, une voiture, un camion... ce sont des "objets"
    qui ont tous leur spécificités. Mais je peux aussi ne pas vouloir faire de distinction
    entre eux en considérant que ce sont tous des "objets" de type véhicule.
*/


/*  Q1
  
    Vous aurez remarqué que votre classe Amiibo et votre classe Tshirt possèdent beaucoup
    en commun. Vous allez donc créer une classe Product qui regroupe tout ce qui est
    partagé entre ces deux classes. Puis vous les ferez hériter de la classe Product afin
    d'éliminer toutes les redondances de propriétés et de méthodes.
    Au passage, vous ferez en sorte que la méthode setImage de la classe Amiibo qui
    vérifie l'extension des images profite également à la classe Tshirt. Sans la dupliquer,
    évidemment.
    Vérifiez que tout fonctionne et, si vous avez un problème sur les prix, passez à
    la question suivante.
*/

/*  Q2

    Bien que cela puisse aussi dépendre de la façon dont vous avez répondu à la Q1,
    il est possible que les prix de vos articles, Amiibo ou Tshirt, ne soient pas
    conformes à vos attentes.
    Si c'est le cas, vous devez peut-être vous rappeler d'une chose : une propriété
    définie 'private' n'est directement accessible que depuis la définition de sa
    classe. Aussi, si vous faites référence à price (définie dans Product) depuis
    la classe Amiibo ou Tshirt, vous êtes en dehors des clous...
    Que modifier dans Product pour que la propriété price soit accessible depuis
    les classes Amiibo et Tshirt tout en restant masquée pour les utilisateurs de
    ces classes (c-à-d sans mettre price en 'public') ?
*/

/*  Q3

    A présent, plutôt que d'avoir un tableau d'Amiboo et un tableau de Tshirt, on
    aimerait autant avoir un tableau de produits. Car par héritage, les objets
    Amiibo et Tshirt sont aussi des objets de type Product. On préfère gérer un
    unique tableau de Product plutôt qu'autant de tableaux que de produits différents.
    Donc regrouper tout vos objets dans un seul tableau et modifiez index.php pour
    que tout reste fonctionel. Possiblement, vous pourrez avoir besoin de l'opérateur
    instanceof qui permet de tester le type d'un objet.
*/


class Amiibo
{
        private $name;
        private $compatibility;
        private $description;
        private $price;
        private $image;

        public function __construct(string $name, string $compawith)
        {
                $this->name = $name;
                $this->compatibility = $compawith;
        }

        /**
         * Get the value of description
         */
        public function getDescription(): string
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */
        public function setDescription(string $description): self
        {
                $this->description = $description;
                return $this;
        }

        /**
         * Get the value of price
         */
        public function getPrice(): float
        {
                return round( $this->price * 1.2, 2);
        }

        /**
         * Set the value of price
         *
         * @return  self
         */
        public function setPrice(float $price): self
        {
                $this->price = $price;
                return $this;
        }

        /**
         * Get the value of image
         */
        public function getImage(): string
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */
        public function setImage(string $image)
        {
                $tab = explode(".", $image);
                $ext = array_pop($tab);
                if ($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
                        $this->image = $image;
                }
                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName(): string
        {
                return $this->name;
        }

        /**
         * Get the value of compatibility
         */
        public function getCompatibility(): string
        {
                return $this->compatibility;
        }
}



class Tshirt
{
        private $name;
        private $description;
        private $sizes;
        private $price;
        private $image;

        public function __construct($name) {
                $this->name = $name;
        }


        /**
         * Get the value of name
         */
        public function getName(): string
        {
                return $this->name;
        }

        /**
         * Get the value of description
         */
        public function getDescription(): string
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */
        public function setDescription(string $description): self
        {
                $this->description = $description;
                return $this;
        }

        /**
         * Get the value of sizes
         */
        public function getSizes(): array
        {
                return $this->sizes;
        }

        /**
         * Set the value of sizes
         *
         * @return  self
         */
        public function setSizes(array $sizes): self
        {
                $this->sizes = $sizes;
                return $this;
        }

        /**
         * Get the value of price
         */
        public function getPrice(): float
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */
        public function setPrice(float $price): self
        {
                $this->price = $price;
                return $this;
        }

        /**
         * Get the value of image
         */
        public function getImage(): string
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */
        public function setImage(string $image): self
        {
                $this->image = $image;
                return $this;
        }

}
  



$archer = new Amiibo("Link [Archer]", "Switch and Switch Lite");
$archer->setDescription("Cette flèche archéonique vous emmènera loin ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux");
$archer->setPrice(58.25);
$archer->setImage("./asset/amiibo-link-archer_2x.png");


$zelda = new Amiibo("Zelda", "Switch, Wii U, Nintendo DS");
$zelda->setDescription("Ne sous-estimez pas la princesse Zelda ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux");
$zelda->setPrice(62.41)->setImage("./asset/amiibo-zelda_2x.png");

$rider = new Amiibo("Link [Rider]", "Wii U, Switch, Siwtch Lite");
$rider->setDescription("Il y a des chevaux et puis il y a Epona ! Découvrez vite
        les avantages de cet amiibo compatible avec de multiples jeux");
$rider->setPrice(54.08);
$rider->setImage("./asset/amiibo-link-rider_2x.png");



$triforce = new Tshirt("T-Shirt Tri-Force");
$triforce->setDescription("60% Cotton, 40% Polyester. Laver à l'eau froide. Ne pas utiliser de javel");
$triforce->setSizes(["S", "M", "L", "XL"]);
$triforce->setPrice(29.90);
$triforce->setImage("./asset/tshirt-triforce.png");

$hyrule = new Tshirt("T-Shirt Hyrule");
$hyrule->setDescription("50% Cotton, 50% Polyester. Lavage à 30° max.");
$hyrule->setSizes(["M", "L", "XL", "XXL"]);
$hyrule->setPrice(24.90);
$hyrule->setImage("./asset/tshirt-hyrule.png");

$sheika = new Tshirt("T-Shirt Sheika");
$sheika->setDescription("100% Synthétique. Lavage à 40°. Ne pas utiliser de détatachant.");
$sheika->setSizes(["XS", "S", "XL", "XXL"]);
$sheika->setPrice(24.90);
$sheika->setImage("./asset/tshirt-sheika.jpg");

$dataAmiibo = [$archer, $zelda, $rider];
$dataTshirt = [$triforce, $hyrule, $sheika];
