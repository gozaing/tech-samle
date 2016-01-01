public class ObjectJanken
{
    public static void main(String[] args)
    {
        Judge saito = new Judge();

        Player murata = new Player("村田さん");
        Tactics murataTactics = new RandomTactics();
        murata.setTactics(murataTactics);

        Player yamada = new Player("山田さん");
        Tactics yamadaTactics = new RandomTactics();
        yamada.setTactics(yamadaTactics);

        saito.startJanken(murata,yamada);

    }
}