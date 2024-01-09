<!DOCTYPE html>
<html>
    <head>
        <title>Teste PHP</title>
    </head>
    <body>
        <?php echo "<p>Olá Mundo2</p>"; ?>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </body>
</html>