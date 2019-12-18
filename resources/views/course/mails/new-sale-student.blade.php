<html>
    <body>
        <p>Olá, {{$user->name}}!</p>
        
        <p>Parabéns pela sua compra.</p>
        <p>Seu pedido para o curso foi realizado com sucesso.</p>
        <p><a href="{{route('course', $course->url)}}">Clique Aqui para te Acesso ao Curso</a></p>
        
        <p></p>
        <p>Att, <br>Equipe EspecializaTi!</p>
    </body>
</html>