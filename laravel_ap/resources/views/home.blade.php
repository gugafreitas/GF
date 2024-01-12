<!DOCTYPE html>
<html>
<head>
    <title>TwitterDemo</title>
</head>
<body>
    <!-- Saudação ao usuário -->
    <h1>Olá, {{ Auth::user()->name }}!</h1>

    <!-- Formulário para nova mensagem -->
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="text" class="form-control" placeholder="O que está acontecendo?"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Postar Mensagem</button>
    </form>

    <!-- Botão de Logout -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Lista de mensagens -->
    <ul class="list-group mt-3">
        @foreach ($messages as $message)
        <li class="list-group-item">
            {{ $message->text }}
            
            <!-- Botões para mover mensagens -->
            <form action="{{ route('messages.move-up', $message) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-secondary">&#8679;</button>
            </form>
            <form action="{{ route('messages.move-down', $message) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-secondary">&#8681;</button>
            </form>
            
            <!-- Botão de apagar mensagem -->
            <form action="{{ route('messages.destroy', $message) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
