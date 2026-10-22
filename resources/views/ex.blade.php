@php
$products = [
  [
    "id" => 1,
    "nomeProdotto" => "Olio Essenziale di Tea Tree Bio",
    "isCertificatoVegan" => true,
    "formatoMl" => 30,
  ],
  [
    "id" => 2,
    "nomeProdotto" => "Burro di Karité Puro Organico",
    "isCertificatoVegan" => true,
    "formatoMl" => 200,
  ],
  [
    "id" => 3,
    "nomeProdotto" => "Balsamo Labbra alla Cera d'Api Bio",
    "isCertificatoVegan" => false,
    "formatoMl" => 15,
  ],
  [
    "id" => 4,
    "nomeProdotto" => "Crema Viso alla Bava di Lumaca Biologica",
    "isCertificatoVegan" => false,
    "formatoMl" => 50,
  ],
];


$newProducts = [];

foreach($products as $product) {

    if($product["isCertificatoVegan"]) {
        $newProducts[] = $product["nomeProdotto"];
    }

}

@dd($newProducts)
@endphp