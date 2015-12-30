public class ObjectJanken
{
    public static void main(String[] args)
    {
        Judge saito = new Judge();

        Player murata = new Player("村田さん");
        Player yamada = new Player("山田さん");

        saito.startJanken(murata,yamada);

    }
}