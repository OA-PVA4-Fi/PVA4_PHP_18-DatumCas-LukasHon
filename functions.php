<?php

function dateLocalized($languageCode, $inputDate) {
    // Nastavení časové zóny na Českou republiku
    date_default_timezone_set('Europe/Prague');

    // Nastavení jazyka pro lokalizaci
    setlocale(LC_TIME, $languageCode);

    // Převedení vstupního datumu na timestamp
    $timestamp = strtotime($inputDate);

    // Formátování data podle zvoleného jazyka
    $formattedDate = strftime('%A, %e %B', $timestamp);

    return $formattedDate;
}
?>

<?php
function casoveTrvani($zacatek, $konec)
{
    // Převedení data a času na timestamp
    $zacatekTimestamp = strtotime($zacatek);
    $konecTimestamp = strtotime($konec);

    // Vypočítání rozdílu v sekundách
    $rozdilSekundy = $konecTimestamp - $zacatekTimestamp;

    // Výpočet délky trvání v dnech, hodinách a minutách
    $dny = floor($rozdilSekundy / (60 * 60 * 24));
    $hodiny = floor(($rozdilSekundy % (60 * 60 * 24)) / (60 * 60));
    $minuty = floor(($rozdilSekundy % (60 * 60)) / 60);

    // Sestavení přehledného textu
    $vysledek = '';
    if ($dny > 0) {
        $vysledek .= "$dny " . ($dny == 1 ? 'den' : 'dny') . ', ';
    }
    if ($hodiny > 0) {
        $vysledek .= "$hodiny " . ($hodiny == 1 ? 'hodina' : 'hodiny') . ', ';
    }
    $vysledek .= "$minuty " . ($minuty == 1 ? 'minuta' : 'minuty');

    return $vysledek;
}
?>


<?php
function generujUdalosti($pocatecniDatum, $pocetUdalosti)
{
    // Nastavení časové zóny na Českou republiku
    date_default_timezone_set('Europe/Prague');

    // Převedení počátečního data na timestamp
    $pocatecniTimestamp = strtotime($pocatecniDatum);

    // Inicializace seznamu událostí
    $udalosti = array();

    // Generování událostí
    for ($i = 0; $i < $pocetUdalosti; $i++) {
        // Vypočítání data pro každou událost
        $aktualniUdalostTimestamp = strtotime("+$i months", $pocatecniTimestamp);
        $datumUdalosti = date('Y-m-d H:i:s', $aktualniUdalostTimestamp);

        // Přidání dat do seznamu událostí
        $udalosti[] = $datumUdalosti;
    }

    return $udalosti;
}

// Příklad použití funkce
$pocatecniDatum = '2024-02-01 14:30:00'; // Aktuální datum
$pocetUdalosti = 5;

// Volání funkce a výpis výsledku
$udalosti = generujUdalosti($pocatecniDatum, $pocetUdalosti);
echo "Seznam následujících $pocetUdalosti událostí:\n";
foreach ($udalosti as $udalost) {
    echo "- $udalost\n";
}
?>


<?php
function formatujRelativniCas($cas)
{
    // Nastavení časové zóny na Českou republiku
    date_default_timezone_set('Europe/Prague');

    // Převedení vstupního času na timestamp
    $casTimestamp = strtotime($cas);

    // Aktuální timestamp
    $aktualniCas = time();

    // Rozdíl v sekundách
    $rozdilSekundy = $aktualniCas - $casTimestamp;

    // Výpočet relativního času
    if ($rozdilSekundy < 60) {
        return "před $rozdilSekundy sekundami";
    } elseif ($rozdilSekundy < 3600) {
        $minuty = floor($rozdilSekundy / 60);
        return "před $minuty minutami";
    } elseif ($rozdilSekundy < 86400) {
        $hodiny = floor($rozdilSekundy / 3600);
        return "před $hodiny hodinami";
    } else {
        $dny = floor($rozdilSekundy / 86400);
        return "před $dny dny";
    }
}

// Příklad použití
$cas = '2024-02-01 12:45:00'; // Aktuální datum a čas
$formatovanyCas = formatujRelativniCas($cas);

// Výpis formátovaného relativního času
echo "Formátovaný relativní čas: $formatovanyCas\n";
?>


<?php
function formatujDatumCas($vstup)
{
    // Nastavení časové zóny na Českou republiku
    date_default_timezone_set('Europe/Prague');

    // Převedení vstupního datumu a času na timestamp
    $timestamp = strtotime($vstup);

    // Formátování různých formátů
    $format1 = date('j. F Y, H:i A', $timestamp); // 15. ledna 2022, 09:30 AM
    $format2 = date('d.m.Y H:i:s', $timestamp);    // 15.01.2022 09:30:00
    $format3 = date('Y-m-d h:i:s A', $timestamp);   // 2022-01-15 09:30:00 AM

    // Výpis formátovaných dat
    echo "Formát 1: $format1\n";
    echo "Formát 2: $format2\n";
    echo "Formát 3: $format3\n";
}

// Příklad použití
$vstup = '2022-01-15 09:30:00';
formatujDatumCas($vstup);
?>