<?php
// Načtení funkce z functions.php
include 'functions.php';

// Volání funkce pro českou lokalizaci
$localizedDate = dateLocalized('cs_CZ', 'Tuesday, 14 December');

// Výpis formátovaného data
echo "Formátované datum: $localizedDate\n";
?>


<?php
// Nastavení časové zóny na Českou republiku
date_default_timezone_set('Europe/Prague');

// Aktuální datum dle vzoru: Rok-Měsíc-Den
$formatDatum1 = date('Y-m-d');

// Aktuální datum dle vzoru: YYYY-MM-DD
$formatDatum2 = date('Y-m-d');

// Aktuální čas ve tvaru Hodiny:Minuty:Sekundy
$formatCas = date('H:i:s');

// Aktuální Datum a čas dle vzoru: 2021-11-25 14:03:15
$formatDatumCas1 = date('Y-m-d H:i:s');

// Aktuální datum a čas dle české normy. Vzor: 14. 12. 2024 13:02
$formatDatumCas2 = date('d. m. Y H:i');

// Výpis dat a časů
echo "Aktuální datum dle vzoru 'Rok-Měsíc-Den': $formatDatum1\n";
echo "Aktuální datum dle vzoru 'YYYY-MM-DD': $formatDatum2\n";
echo "Aktuální čas ve tvaru 'Hodiny:Minuty:Sekundy': $formatCas\n";
echo "Aktuální Datum a čas dle vzoru '2021-11-25 14:03:15': $formatDatumCas1\n";
echo "Aktuální datum a čas dle české normy. Vzor: 14. 12. 2024 13:02: $formatDatumCas2\n";
?>

<?php
// Nastavení časové zóny na Českou republiku
date_default_timezone_set('Europe/Prague');

// Aktuální datum
$aktualniDatum = date('Y-m-d');

// Zítřejší datum
$zitrejsiDatum = date('Y-m-d', strtotime('+1 day'));

// První den následujícího měsíce
$prvniDenNasledujicihoMesice = date('Y-m-01', strtotime('+1 month'));

// Poslední den následujícího měsíce
$posledniDenNasledujicihoMesice = date('Y-m-t', strtotime('+1 month'));

// Včerejší datum
$vcerejsiDatum = date('Y-m-d', strtotime('-1 day'));

// Datum splatnosti 14 dní od data vystavení
$splatnostDatum = date('Y-m-d', strtotime('+14 days'));

// Datum zdanitelného plnění před třemi dny
$zdanitelneDatum = date('Y-m-d', strtotime('-3 days'));

// Výpis dat
echo "Aktuální datum: $aktualniDatum\n";
echo "Zítřejší datum: $zitrejsiDatum\n";
echo "První den následujícího měsíce: $prvniDenNasledujicihoMesice\n";
echo "Poslední den následujícího měsíce: $posledniDenNasledujicihoMesice\n";
echo "Včerejší datum: $vcerejsiDatum\n";
echo "Datum splatnosti 14 dní od data vystavení: $splatnostDatum\n";
echo "Datum zdanitelného plnění před třemi dny: $zdanitelneDatum\n";
?>