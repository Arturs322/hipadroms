<?php

echo "=======WELCOME TO THE MEGA SUPER HIPADROMS========" . PHP_EOL;


function createHorses($name, $symbol, $qoef): stdClass
{
    $horse = new stdClass();
    $horse->name = $name;
    $horse->symbol = $symbol;
    $horse->qoef = $qoef;

    return $horse;
}

function createTrack (array $track)
{
    foreach ($track as $line)
    {
        echo implode(" ", $line) . PHP_EOL;
    }
}
$horses = [
    createHorses("DIEGO", "0", 1.5),
    createHorses("BRUNO", "1", 1.9),
    createHorses("MARS", "2", 2.8)
];

$track = [];
$trackLength = 20;
foreach ($horses as $key => $horse)
{
    $track[] = array_fill(0, $trackLength, "_");
    $track[$key][0] = $horse->symbol;
    echo "Key to choose {$key}, {$horse->name} symbol: {$horse->symbol}" . PHP_EOL;
}

$input = (int) readline("Choose a horse to bet on: ");
if (is_numeric($input))
{
    echo "Let's watch!" . PHP_EOL;
} else
{
    echo "Invalid input!";
    exit;
}

$validBets = [20, 40, 60, 80, 100];
echo "Valid bets are: " . PHP_EOL;
foreach ($validBets as $key => $validBet)
{
    echo $validBet . PHP_EOL;
}

$bet = (int) readline("Choose your bet: ") . PHP_EOL;

if (!in_array($bet, $validBets))
{
    echo "Invalid bet!" . PHP_EOL;
    exit;
}

createTrack($track);

$winner = false;
$won = [];
while ($winner == false) {
    echo "==================<><>==================" . PHP_EOL;

    foreach ($track as &$line) {
        $movement = rand(1,2);

        foreach (range(1, $movement) as $step)
        {
            $lastElement = array_pop($line);
            array_unshift($line, "_");

            if ($lastElement !== "_") {
                $winner = true;
                $won[] = $lastElement;
                $end[] = $horse->symbol;
                echo "{$lastElement} won!" . PHP_EOL;

            }
        }

    }
createTrack($track);
    usleep(500000);

}
$won = array_unique($won);
foreach ($won as $place => $winners ) {

    $total = $bet * $horse->qoef;

    echo $place + 1 . " place->  $winners  " . PHP_EOL;
    if ($input == $winners)
    {
        echo "You won: {$total}$!" . PHP_EOL;
    } else
    {
        echo "You lost {$bet}$!" . PHP_EOL;
    }
}
