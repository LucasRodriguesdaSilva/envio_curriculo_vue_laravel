<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exemplo de E-mail</title>
</head>
<body>
    <p>Candidato: {{ $dados_curriculo->candidato }}</p>
    <p>email: {{ $dados_curriculo->email }}</p>
    <p>telefone: {{ $dados_curriculo->telefone }}</p>
    <p>cargo desejado: {{ $dados_curriculo->cargo }}</p>
    <p>escolaridade: {{ $dados_curriculo->escolaridade }}</p>
    <p>Observação: {{ $dados_curriculo->obs ?? '---' }}</p>
    <p>Data e Hora do Envio: {{ $dados_curriculo->created_at }}</p>
</body>
</html>
