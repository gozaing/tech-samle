public class ObjectJanken
{
    public static void main(String[] args)
    {
        Judge saito = new Judge();

        Player murata = new Murata("村田さん");
        Player yamada = new Yamada("山田さん");

        saito.startJanken(murata,yamada);

    }
}