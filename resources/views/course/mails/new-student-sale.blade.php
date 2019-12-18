<html>
    <body>
        <p>Olá, {{$user->name}}!</p>
        
        <p>Parabéns pela sua compra.</p>
        <p>Seu pedido para o curso foi realizado com sucesso.</p>
        <p><b>Seus Dados de Acesso:</b></p>
        <p>Logar: {{url('login')}}</p>
        <p>Usuário: {{$user->email}}</p>
        <p>Senha: {{$password}}</p>
        <p></p>
        <p><a href="{{route('course', $course->url)}}">Clique Aqui para te Acesso ao Curso</a></p>
        
        <p></p>
        <p>Att, <br>Equipe EspecializaTi!</p>
    </body>
</html>