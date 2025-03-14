<?php
// Função para calcular todas as permutações possíveis
function permutacoes($itens, $prefixo = []) {
    if (empty($itens)) {
        return [$prefixo];
    }

    $resultado = [];
    foreach ($itens as $i => $item) {
        $novosItens = $itens;
        unset($novosItens[$i]);
        $resultado = array_merge($resultado, permutacoes(array_values($novosItens), array_merge($prefixo, [$item])));
    }
    return $resultado;
}

// Leitura da entrada
fscanf(STDIN, "%d", $N); // Número de enfeites
$confianças = [];
for ($i = 0; $i < $N; $i++) {
    $confianças[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// Gera todas as permutações possíveis das posições (de 1 a N)
$posicoes = range(0, $N - 1); // Índices começam em 0
$permutacoes = permutacoes($posicoes);

$maxConfianca = 0;
$melhorOrdem = [];

// Avalia a confiança total para cada permutação
foreach ($permutacoes as $permutacao) {
    $confiancaTotal = 1;
    for ($i = 0; $i < $N; $i++) {
        $confiancaTotal *= $confianças[$i][$permutacao[$i]];
    }
    if ($confiancaTotal > $maxConfianca) {
        $maxConfianca = $confiancaTotal;
        $melhorOrdem = $permutacao;
    }
}

// Converte a melhor ordem de índice (0-baseado) para posições (1-baseado)
foreach ($melhorOrdem as &$indice) {
    $indice += 1;
}

// Exibe o resultado
echo implode(' ', $melhorOrdem) . "\n";
?>
